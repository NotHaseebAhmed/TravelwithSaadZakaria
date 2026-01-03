<?php
header('Content-Type: application/json');
include_once __DIR__ . '/../includes/connection.php'; // adjust path

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success'=>false,'message'=>'Invalid request']);
    exit;
}

// Basic sanitize
$room_title = trim($_POST['room_title'] ?? '');
$hotel_id = intval($_POST['hotel_id'] ?? 0);
$price_default = isset($_POST['price_default']) && $_POST['price_default'] !== '' ? floatval($_POST['price_default']) : null;
$price_rules_json = $_POST['price_rules'] ?? '[]';

if ($room_title === '' || $hotel_id <= 0) {
    echo json_encode(['success'=>false,'message'=>'Missing room title or hotel selection']);
    exit;
}

// Verify hotel exists (security)
$stmt = $conn->prepare("SELECT id FROM hotels WHERE id = ?");
$stmt->bind_param("i", $hotel_id);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows === 0) {
    echo json_encode(['success'=>false,'message'=>'Selected hotel does not exist']);
    $stmt->close();
    exit;
}
$stmt->close();

// Handle file upload (single image)
$image_path = null;
if (isset($_FILES['room_image']) && $_FILES['room_image']['error'] !== UPLOAD_ERR_NO_FILE) {
    $file = $_FILES['room_image'];
    // Validate MIME and size
    $allowed = ['image/jpeg','image/png','image/gif','image/webp'];
    if (!in_array($file['type'], $allowed)) {
        echo json_encode(['success'=>false,'message'=>'Invalid image type']);
        exit;
    }
    if ($file['size'] > 5 * 1024 * 1024) { // 5MB
        echo json_encode(['success'=>false,'message'=>'Image too large (max 5MB)']);
        exit;
    }

    // Save file
    $uploadDir = __DIR__ . '/../assets/uploads/rooms/'; // physical path
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = 'room_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
    $target = $uploadDir . $filename;

    if (!move_uploaded_file($file['tmp_name'], $target)) {
        echo json_encode(['success'=>false,'message'=>'Failed to move uploaded image']);
        exit;
    }

    // Save web path for DB (relative to site root)
    $image_path = 'assets/uploads/rooms/' . $filename;
}

// Insert room
$stmt = $conn->prepare("INSERT INTO rooms (hotel_id, room_title, image_path, price_default) VALUES (?, ?, ?, ?)");
$stmt->bind_param("issd", $hotel_id, $room_title, $image_path, $price_default);
if (!$stmt->execute()) {
    echo json_encode(['success'=>false,'message'=>'DB error: '.$stmt->error]);
    $stmt->close();
    exit;
}
$room_id = $conn->insert_id;
$stmt->close();

// Insert price rules (if any)
$rules = json_decode($price_rules_json, true);
if (is_array($rules) && count($rules)) {
    $stmt2 = $conn->prepare("INSERT INTO room_price_rules (room_id, start_date, end_date, price) VALUES (?, ?, ?, ?)");
    foreach ($rules as $rule) {
        // validate rule fields
        $start = $rule['startDate'] ?? null;
        $end = $rule['endDate'] ?? null;
        $price = isset($rule['price']) ? floatval($rule['price']) : null;
        if (!$start || !$end || !$price) continue;

        $stmt2->bind_param("issd", $room_id, $start, $end, $price);
        $stmt2->execute();
    }
    $stmt2->close();
}

echo json_encode(['success'=>true,'message'=>'Room saved','room_id'=>$room_id]);
$conn->close();
