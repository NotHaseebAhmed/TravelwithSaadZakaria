<?php
include_once __DIR__ . '/../includes/connection.php'; // adjust path as needed

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form inputs safely
    $title = $_POST['hotel_title'] ?? '';
    $slug = $_POST['hotel_slug'] ?? '';
    $price = $_POST['hotel_price'] ?? '';
    $rating = $_POST['hotel_rating'] ?? '';
    $location_id = $_POST['location_id'] ?? ''; // 🔥 updated: location ID, not name
    $map_link = $_POST['map_link'] ?? '';
    $overview = $_POST['hotel_overview'] ?? '';
    $meta_title = $_POST['meta_title'] ?? '';
    $meta_description = $_POST['meta_description'] ?? '';

    // Validation
    if (empty($title) || empty($slug) || empty($location_id)) {
        echo json_encode(['success' => false, 'message' => 'Missing required fields.']);
        exit;
    }

    // Insert into hotels table
    $stmt = $conn->prepare("
        INSERT INTO hotels 
        (hotel_title, hotel_slug, hotel_price, hotel_rating, location_id, map_link, hotel_overview, meta_title, meta_description)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param(
        "ssdisssss",
        $title,
        $slug,
        $price,
        $rating,
        $location_id,
        $map_link,
        $overview,
        $meta_title,
        $meta_description
    );

    if ($stmt->execute()) {
        $hotel_id = $conn->insert_id; // ✅ get last inserted hotel id

        // Handle image uploads
        $uploadedFiles = [];
        if (!empty($_FILES['hotel_images']['name'][0])) {
            $uploadDir = __DIR__ . '/../assets/uploads/hotels/'; // ✅ fixed directory
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            foreach ($_FILES['hotel_images']['tmp_name'] as $key => $tmp_name) {
                if (!is_uploaded_file($tmp_name)) continue;

                $fileName = time() . '_' . basename($_FILES['hotel_images']['name'][$key]);
                $targetPath = $uploadDir . $fileName;

                if (move_uploaded_file($tmp_name, $targetPath)) {
                    $uploadedFiles[] = $fileName;

                    // Insert image info into separate table
                    $stmt2 = $conn->prepare("INSERT INTO hotel_images (hotel_id, image_path) VALUES (?, ?)");
                    $stmt2->bind_param("is", $hotel_id, $fileName);
                    $stmt2->execute();
                    $stmt2->close();
                }
            }
        }

        echo json_encode([
            'success' => true,
            'message' => 'Hotel added successfully with ' . count($uploadedFiles) . ' image(s)!'
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Database insert failed.']);
    }

    $stmt->close();
    $conn->close();
}
?>
