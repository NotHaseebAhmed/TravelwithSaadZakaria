<?php
include_once __DIR__ . '/../travel-panel/includes/connection.php'; 

$slug = $_GET['slug'] ?? '';

if (!$slug) {
  die("Invalid car rental link");
}

// 1️⃣ Fetch car rental main info
$stmt = $conn->prepare("
  SELECT cr.*, r.pickup_location, r.dropoff_location
  FROM car_rentals cr
  LEFT JOIN car_rentals_routes r ON cr.route_id = r.id
  WHERE cr.car_rental_slug = ?
");
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();
$carRentals = $result->fetch_assoc();

if (!$carRentals) {
  http_response_code(404);
  include '../404.php';
  exit;
}

// 2️⃣ Fetch all images
$CarImages = [];
$stmt2 = $conn->prepare("SELECT image_path FROM car_rentals_images WHERE car_rental_id = ?");
$stmt2->bind_param("i", $carRentals['id']);
$stmt2->execute();
$result2 = $stmt2->get_result();
while ($row = $result2->fetch_assoc()) {
  $CarImages[] = $row['image_path'];
}
// $carRentals = $result->fetch_assoc();
$stmt->close();
$stmt2->close();
$conn->close();
?>
