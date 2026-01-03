<?php
include_once __DIR__ . '/../includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = trim($_POST['car_rental_title'] ?? '');
    $slug = trim($_POST['car_rental_slug'] ?? '');
    $route_id = $_POST['route_id'] ?? null;
    $price = $_POST['car_rental_price'] ?? '';
    $capacity = $_POST['car_capacity'] ?? '';  // ✅ NEW FIELD
    $overview = $_POST['car_rental_overview'] ?? '';
    $meta_title = $_POST['car_meta_title'] ?? '';
    $meta_description = $_POST['car_meta_description'] ?? '';

    if (empty($title) || empty($slug) || empty($route_id)) {
        echo json_encode(['success' => false, 'message' => 'All required fields must be filled!']);
        exit;
    }

    // ✅ Insert car rental (capacity added)
    $query = "INSERT INTO car_rentals 
        (car_rental_title, car_rental_slug, route_id, car_rental_price, car_capacity, car_rental_overview, meta_title, meta_description)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param(
        "sssdssss",
        $title,
        $slug,
        $route_id,
        $price,
        $capacity,       // 👈 NEW FIELD
        $overview,
        $meta_title,
        $meta_description
    );

    if ($stmt->execute()) {
        $car_rental_id = $stmt->insert_id;
        $stmt->close();

        // ---------- IMAGES SAME CODE ----------
        $uploadedFiles = [];
        if (!empty($_FILES['car_rental_images']['name'][0])) {
            $uploadDir = '../assets/uploads/car-rentals/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            foreach ($_FILES['car_rental_images']['tmp_name'] as $key => $tmp_name) {
                $fileName = time() . '_' . basename($_FILES['car_rental_images']['name'][$key]);
                $targetPath = $uploadDir . $fileName;

                if (move_uploaded_file($tmp_name, $targetPath)) {
                    $uploadedFiles[] = $fileName;

                    $stmt2 = $conn->prepare("INSERT INTO car_rentals_images (car_rental_id, image_path) VALUES (?, ?)");
                    $stmt2->bind_param("is", $car_rental_id, $fileName);
                    $stmt2->execute();
                    $stmt2->close();
                }
            }
        }

        echo json_encode([
            'success' => true,
            'message' => 'Car rental added successfully!',
            'uploaded_images' => $uploadedFiles
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Database insertion failed: ' . $stmt->error]);
        $stmt->close();
    }

    $conn->close();
}
?>
