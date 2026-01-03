<?php
// locations_api.php
header('Content-Type: application/json; charset=utf-8');
include_once __DIR__ . '/../includes/connection.php'; // adjust path as needed

// Allow only POST requests (except read & check-slug which can be GET)
$action = $_REQUEST['action'] ?? '';

function jsonErr($msg) { echo json_encode(['success'=>false,'message'=>$msg]); exit; }
function jsonOk($data=[]) { echo json_encode(array_merge(['success'=>true], (array)$data)); exit; }

// sanitize helper
function clean($v) { return trim($v); }

if ($action === 'read') {
    // Return all locations
    $res = $conn->query("SELECT id, name, slug, description, image_path, created_at, updated_at FROM locations ORDER BY id DESC");
    $rows = [];
    while ($r = $res->fetch_assoc()) $rows[] = $r;
    jsonOk(['locations'=>$rows]);
}

// Slug availability (POST or GET)
if ($action === 'check-slug') {
    $slug = $_REQUEST['slug'] ?? '';
    $id   = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0; // if editing, exclude current id
    if (!$slug) jsonErr('slug missing');
    $stmt = $conn->prepare("SELECT id FROM locations WHERE slug = ? " . ($id ? "AND id != ?" : ""));
    if ($id) $stmt->bind_param('si', $slug, $id);
    else $stmt->bind_param('s', $slug);
    $stmt->execute();
    $res = $stmt->get_result();
    $exists = $res->num_rows > 0;
    $stmt->close();
    jsonOk(['exists' => $exists]);
}

// For create/update/delete we expect POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') jsonErr('Invalid method');

if ($action === 'create' || $action === 'update') {
    $name = clean($_POST['name'] ?? '');
    $slug = clean($_POST['slug'] ?? '');
    $desc = $_POST['description'] ?? '';

    if (!$name || !$slug) jsonErr('Name and slug are required.');

    // ensure slug uniqueness
    $id = ($action === 'update') ? intval($_POST['id'] ?? 0) : 0;
    $stmt = $conn->prepare("SELECT id FROM locations WHERE slug = ? " . ($id ? "AND id != ?" : ""));
    if ($id) $stmt->bind_param('si', $slug, $id); else $stmt->bind_param('s', $slug);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows > 0) { $stmt->close(); jsonErr('Slug already taken'); }
    $stmt->close();

    // handle image upload (optional)
    $uploadDir = __DIR__ . './assets/uploads/locations/';
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

    $image_path_db = null;
    if (!empty($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
        $f = $_FILES['image'];
        if ($f['error'] !== UPLOAD_ERR_OK) jsonErr('Image upload error');
        // basic checks
        $maxBytes = 5 * 1024 * 1024;
        if ($f['size'] > $maxBytes) jsonErr('Image too large (max 5MB).');

        $allowed = ['image/jpeg','image/png','image/webp','image/gif'];
        if (!in_array(mime_content_type($f['tmp_name']), $allowed)) jsonErr('Invalid image type.');

        $ext = pathinfo($f['name'], PATHINFO_EXTENSION);
        $fileName = time() . '_' . bin2hex(random_bytes(6)) . '.' . $ext;
        $target = $uploadDir . $fileName;
        if (!move_uploaded_file($f['tmp_name'], $target)) jsonErr('Failed to move uploaded file.');

        // relative path for DB (adjust to your usage)
        $image_path_db = './assets/uploads/locations/' . $fileName;
    }

    if ($action === 'create') {
        $stmt = $conn->prepare("INSERT INTO locations (name, slug, description, image_path) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $name, $slug, $desc, $image_path_db);
        if ($stmt->execute()) {
            $stmt->close();
            jsonOk(['message'=>'Location created']);
        } else jsonErr('DB error on insert');
    } else {
        // update
        if ($image_path_db) {
            $stmt = $conn->prepare("UPDATE locations SET name=?, slug=?, description=?, image_path=? WHERE id=?");
            $stmt->bind_param('ssssi', $name, $slug, $desc, $image_path_db, $id);
        } else {
            $stmt = $conn->prepare("UPDATE locations SET name=?, slug=?, description=? WHERE id=?");
            $stmt->bind_param('sssi', $name, $slug, $desc, $id);
        }
        if ($stmt->execute()) {
            $stmt->close();
            jsonOk(['message'=>'Location updated']);
        } else jsonErr('DB error on update');
    }
}

if ($action === 'delete') {
    $id = intval($_POST['id'] ?? 0);
    if (!$id) jsonErr('Missing id');
    // optional: fetch image_path to unlink file
    $stmt = $conn->prepare("SELECT image_path FROM locations WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $rs = $stmt->get_result();
    $row = $rs->fetch_assoc();
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM locations WHERE id = ?");
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        // delete file if exists
        if (!empty($row['image_path'])) {
            $p = __DIR__ . '/' . ltrim($row['image_path'], '/');
            if (file_exists($p)) @unlink($p);
        }
        $stmt->close();
        jsonOk(['message'=>'Deleted']);
    } else jsonErr('DB delete error');
}

jsonErr('Unknown action');
