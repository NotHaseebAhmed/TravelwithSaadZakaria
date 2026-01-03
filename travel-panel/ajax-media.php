<?php
include 'includes/connection.php';

$action = $_POST['action'] ?? '';

if ($action === 'update') {
    $id = intval($_POST['image_id']);
    $title = $_POST['image_name'] ?? '';
    $alt = $_POST['alt_text'] ?? '';

    $stmt = $conn->prepare("UPDATE hotel_images SET image_title = ?, image_alt_text = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $alt, $id);
    $stmt->execute();
    echo json_encode(['status' => 'success']);
    exit;
}

if ($action === 'delete') {
    $id = intval($_POST['image_id']);
    $res = $conn->query("SELECT image_path FROM hotel_images WHERE id = $id");
    $row = $res->fetch_assoc();

    if ($row && file_exists('../' . $row['image_path'])) {
        unlink('../' . $row['image_path']);
    }

    $conn->query("DELETE FROM hotel_images WHERE id = $id");
    echo json_encode(['status' => 'deleted']);
    exit;
}

echo json_encode(['status' => 'error', 'msg' => 'Invalid action']);
?>
