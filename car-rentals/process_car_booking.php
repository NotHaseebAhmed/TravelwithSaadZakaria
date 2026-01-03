<?php
session_start();
header('Content-Type: application/json');


include_once __DIR__ . '/../travel-panel/includes/connection.php';

// Function to send JSON response
function sendResponse($success, $message, $data = []) {
    echo json_encode(array_merge([
        'success' => $success,
        'message' => $message
    ], $data));
    exit;
}

// Check if POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendResponse(false, 'Invalid request method');
}

// Get and validate form data
$name = trim($_POST['booking_name'] ?? '');
$email = trim($_POST['booking_email'] ?? '');
$phone = trim($_POST['booking_phone'] ?? '');
$adults = intval($_POST['booking_adults'] ?? 1);
$children = intval($_POST['booking_children'] ?? 0);
$car_rental_id = intval($_POST['car_rental_id'] ?? 0);
$pickup_location = trim($_POST['pickup_location'] ?? '');
$dropoff_location = trim($_POST['dropoff_location'] ?? '');
$pickup_datetime = trim($_POST['pickup_datetime'] ?? '');
$dropoff_datetime = trim($_POST['dropoff_datetime'] ?? '');
$total_price = floatval($_POST['total_price'] ?? 0);
$number_of_cars = intval($_POST['number_of_cars'] ?? 1);

// Validation
if (empty($name)) {
    sendResponse(false, 'Name is required');
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    sendResponse(false, 'Valid email is required');
}
if (empty($phone)) {
    sendResponse(false, 'Phone number is required');
}
if ($car_rental_id <= 0) {
    sendResponse(false, 'Invalid car rental selection');
}
if (empty($pickup_location) || empty($dropoff_location)) {
    sendResponse(false, 'Pickup and dropoff locations are required');
}
if (empty($pickup_datetime) || empty($dropoff_datetime)) {
    sendResponse(false, 'Pickup and dropoff dates are required');
}
if ($total_price <= 0) {
    sendResponse(false, 'Invalid price');
}
if ($number_of_cars <= 0) {
    sendResponse(false, 'Number of cars must be at least 1');
}

// Validate dates
$pickupTime = strtotime($pickup_datetime);
$dropoffTime = strtotime($dropoff_datetime);
if (!$pickupTime || !$dropoffTime || $dropoffTime <= $pickupTime) {
    sendResponse(false, 'Invalid pickup or dropoff dates');
}

// Begin transaction
$conn->begin_transaction();

try {
    // Insert into bookings table
    $stmt = $conn->prepare("
        INSERT INTO bookings 
        (name, email, phone, total_price, adults, children, check_in_out, service_type, service_id, status, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, 'car', ?, 'pending', NOW())
    ");
    
    // Merge pickup and dropoff into check_in_out field
    $check_in_out = $pickup_datetime . ' to ' . $dropoff_datetime;
    
    $stmt->bind_param(
        "sssdiisi",
        $name,
        $email,
        $phone,
        $total_price,
        $adults,
        $children,
        $check_in_out,
        $car_rental_id
    );
    
    if (!$stmt->execute()) {
        throw new Exception('Failed to create booking: ' . $stmt->error);
    }
    
    $booking_id = $conn->insert_id;
    $stmt->close();
    
    // Insert into booking_car_rentals table
    $stmt2 = $conn->prepare("
        INSERT INTO booking_car_rentals 
        (booking_id, car_rental_id, pickup_location, dropoff_location, number_of_cars) 
        VALUES (?, ?, ?, ?, ?)
    ");
    
    $stmt2->bind_param(
        "iissi", 
        $booking_id, 
        $car_rental_id, 
        $pickup_location, 
        $dropoff_location, 
        $number_of_cars
    );
    
    if (!$stmt2->execute()) {
        throw new Exception('Failed to save car rental booking details: ' . $stmt2->error);
    }
    
    $stmt2->close();
    
    // Commit transaction
    $conn->commit();
    
    sendResponse(true, 'Car rental booking confirmed successfully!', [
        'booking_id' => $booking_id
    ]);
    
} catch (Exception $e) {
    // Rollback on error
    $conn->rollback();
    sendResponse(false, 'Booking failed: ' . $e->getMessage());
}

$conn->close();
?>