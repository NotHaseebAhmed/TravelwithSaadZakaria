<?php
// save-umrah-package.php
header('Content-Type: application/json; charset=utf-8');
ini_set('display_errors', 0);

// include DB connection (adjust path if needed)
include_once __DIR__ . '/../includes/connection.php';

// helper: send JSON and exit
function jsonExit($ok, $msg, $extra = []) {
    echo json_encode(array_merge(['success' => $ok, 'message' => $msg], $extra));
    exit;
}

// Basic POST check
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonExit(false, 'Invalid request method.');
}

// Collect + sanitize POST values (minimal sanitization here; prepared statements used for DB)
$package_title = trim($_POST['umrah_package_title'] ?? '');
$package_slug = trim($_POST['umrah_package_slug'] ?? '');
$package_overview = trim($_POST['umrah_package_overview'] ?? '');
$meta_title = trim($_POST['umrah_package_meta_title'] ?? '');
$meta_description = trim($_POST['umrah_package_meta_description'] ?? '');
$package_type = trim($_POST['umrah_package_type'] ?? '');

$makkah_hotel_id = intval($_POST['makkah_hotel'] ?? 0);
$madina_hotel_id = intval($_POST['madina_hotel'] ?? 0);

$stays_at_makkah = intval($_POST['stays_at_makkah'] ?? 0);
$stays_at_madina  = intval($_POST['stays_at_madina'] ?? 0);

$package_price = isset($_POST['package_price']) ? floatval($_POST['package_price']) : 0.00;

// Room prices: expected as associative array room_price[room_id] => price
$room_price_inputs = $_POST['room_price'] ?? [];          // e.g. [ '5' => '1200', '7' => '1500' ]
$room_title_inputs = $_POST['room_title'] ?? [];          // optional, id->title mapping

// Itinerary: expected as an array of items: itinerary[index][day_number], [heading], [description]
$itinerary = $_POST['itinerary'] ?? [];

// Basic validation
if ($package_title === '' || $package_slug === '') {
    jsonExit(false, 'Title and slug are required.');
}
if ($makkah_hotel_id === 0 || $madina_hotel_id === 0) {
    jsonExit(false, 'Please select both Makkah and Madina hotels.');
}

// Validate slug uniqueness (optional - prevent duplicated slugs)
$slug_check_stmt = $conn->prepare("SELECT id FROM umrah_packages WHERE package_slug = ? LIMIT 1");
$slug_check_stmt->bind_param("s", $package_slug);
$slug_check_stmt->execute();
$slug_check_stmt->store_result();
if ($slug_check_stmt->num_rows > 0) {
    $slug_check_stmt->close();
    jsonExit(false, 'Slug already exists. Choose another slug.');
}
$slug_check_stmt->close();

// Handle single image upload: input name = 'room_image'
$uploaded_filename = null;
if (isset($_FILES['room_image']) && $_FILES['room_image']['error'] !== UPLOAD_ERR_NO_FILE) {
    $file = $_FILES['room_image'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        jsonExit(false, 'File upload error. Code: ' . $file['error']);
    }

    // Validate size (max 5MB)
    $maxBytes = 5 * 1024 * 1024;
    if ($file['size'] > $maxBytes) {
        jsonExit(false, 'Image exceeds 5MB size limit.');
    }

    // Validate type
    $allowed = ['image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($mime, $allowed)) {
        jsonExit(false, 'Invalid image type. Allowed: JPG, PNG, GIF.');
    }

    // Prepare upload directory
    $uploadDir = __DIR__ . '/../assets/uploads/umrah-packages/';
    if (!is_dir($uploadDir)) {
        if (!mkdir($uploadDir, 0777, true)) {
            jsonExit(false, 'Failed to create upload directory.');
        }
    }

    // Build safe filename
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $basename = time() . '_' . bin2hex(random_bytes(6));
    $safeName = $basename . '.' . $ext;
    $targetPath = $uploadDir . $safeName;

    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        jsonExit(false, 'Failed to move uploaded file.');
    }

    $uploaded_filename = $safeName; // store in DB
}

// Start transaction
$conn->begin_transaction();

try {
    // 1) Insert into umrah_packages
    $insertPkgSql = "
        INSERT INTO umrah_packages
        (package_title, package_slug, makkah_hotel_id, madinah_hotel_id, nights_makkah, nights_madinah, package_price, package_image, package_description, package_type, meta_title, meta_description, status, created_at, updated_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, NOW(), NOW())
    ";
    $stmt = $conn->prepare($insertPkgSql);
    if (!$stmt) throw new Exception("Prepare failed (pkg): " . $conn->error);

    // package_image may be null
    $imgForDb = $uploaded_filename ?? null;

    $stmt->bind_param(
        "ssiiiidsssss",
        $package_title,
        $package_slug,
        $makkah_hotel_id,
        $madina_hotel_id,
        $stays_at_makkah,
        $stays_at_madina,
        $package_price,
        $imgForDb,
        $package_overview,
        $package_type,
        $meta_title,
        $meta_description
    );

    if (!$stmt->execute()) {
        throw new Exception("Insert umrah_packages failed: " . $stmt->error);
    }

    $package_id = $stmt->insert_id;
    $stmt->close();

    // 2) Insert room prices into umrah_package_room_prices
    // Expecting $room_price_inputs as [room_id => price]
    if (!empty($room_price_inputs) && is_array($room_price_inputs)) {
        $rpStmt = $conn->prepare("
            INSERT INTO umrah_package_room_prices (package_id, room_id, room_price, created_at, updated_at)
            VALUES (?, ?, ?, NOW(), NOW())
        ");
        if (!$rpStmt) throw new Exception("Prepare failed (room prices): " . $conn->error);

        foreach ($room_price_inputs as $roomIdKey => $priceVal) {
            $room_id = intval($roomIdKey);
            // Normalize price (allow comma or empty)
            $price = $priceVal === '' ? 0.00 : floatval(str_replace(',', '', $priceVal));
            $rpStmt->bind_param("iid", $package_id, $room_id, $price);
            if (!$rpStmt->execute()) {
                throw new Exception("Insert room price failed for room_id {$room_id}: " . $rpStmt->error);
            }
        }
        $rpStmt->close();
    }

    // 3) Insert itinerary rows (if any)
    // Expecting $itinerary as array of items e.g. itinerary[0]['day_number'], ['heading'], ['description']
    if (!empty($itinerary) && is_array($itinerary)) {
        $itStmt = $conn->prepare("
            INSERT INTO umrah_itinerary (package_id, day_number, itinerary_title, itinerary_description)
            VALUES (?, ?, ?, ?)
        ");
        if (!$itStmt) throw new Exception("Prepare failed (itinerary): " . $conn->error);

        // Normalize: often itinerary is an indexed array, but double-check shapes
        foreach ($itinerary as $item) {
            // item should be array with keys day_number, heading, description (your JS used 'heading' and 'description')
            $day_number = isset($item['day_number']) ? trim($item['day_number']) : '';
            // preserve user-provided day_number string (could be "3" or "3-4"), but store as INT if numeric, else 0
            $daynum_int = is_numeric($day_number) ? intval($day_number) : 0;
            $title = trim($item['heading'] ?? $item['itinerary_title'] ?? '');
            $desc  = trim($item['description'] ?? $item['itinerary_description'] ?? '');

            // if both title and desc empty and day number empty skip
            if ($title === '' && $desc === '' && $daynum_int === 0) continue;

            $itStmt->bind_param("iiss", $package_id, $daynum_int, $title, $desc);
            if (!$itStmt->execute()) {
                throw new Exception("Insert itinerary failed: " . $itStmt->error);
            }
        }
        $itStmt->close();
    }

    // Commit transaction
    $conn->commit();

    jsonExit(true, 'Umrah package saved successfully.', ['package_id' => $package_id]);
} catch (Exception $e) {
    // rollback, remove uploaded file if present
    $conn->rollback();
    if (!empty($uploaded_filename)) {
        @unlink(__DIR__ . '/../assets/uploads/umrah-packages/' . $uploaded_filename);
    }
    jsonExit(false, 'Save failed: ' . $e->getMessage());
}
