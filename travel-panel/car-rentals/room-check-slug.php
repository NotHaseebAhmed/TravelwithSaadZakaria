<?php
include_once __DIR__ . '/../includes/connection.php'; // adjust path as needed

if (isset($_POST['slug'])) {
    $slug = trim($_POST['slug']);

    $sql = "SELECT COUNT(*) FROM car_rentals WHERE car_rental_slug = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    echo json_encode([
        'exists' => $count > 0
    ]);
}
?>
