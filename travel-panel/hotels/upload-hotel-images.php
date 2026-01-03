<?php
// upload_hotel_images.php
include_once __DIR__ . '/../includes/connection.php'; // adjust path as needed
 // your DB connection file

$upload_dir = "uploads/hotels/"; 

if (!empty($_FILES['file']['name'])) {
    $filename = uniqid() . "_" . basename($_FILES['file']['name']);
    $target_path = $upload_dir . $filename;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
        // Optional: Insert into database
        $stmt = $conn->prepare("INSERT INTO hotel_images (hotel_id, image_path) VALUES (?, ?)");
        $stmt->bind_param("is", $_POST['hotel_id'], $filename);
        $stmt->execute();

        echo json_encode(["status" => "success", "file" => $filename]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to upload file."]);
    }
}
?>
