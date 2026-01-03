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
$room_id = intval($_POST['booking_room_id'] ?? 0);
$hotel_id = intval($_POST['hotel_id'] ?? 0);
$date_range = trim($_POST['date_range'] ?? '');
$total_price = floatval($_POST['total_price'] ?? 0);
$number_of_rooms = intval($_POST['number_of_rooms'] ?? 1);

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
if ($room_id <= 0) {
    sendResponse(false, 'Invalid room selection');
}
if ($hotel_id <= 0) {
    sendResponse(false, 'Invalid hotel selection');
}
if (empty($date_range)) {
    sendResponse(false, 'Check-in and check-out dates are required');
}
if ($total_price <= 0) {
    sendResponse(false, 'Invalid price');
}
if ($number_of_rooms <= 0) {
    sendResponse(false, 'Number of rooms must be at least 1');
}

// Parse date range
$dates = explode(' to ', $date_range);
if (count($dates) < 2) {
    sendResponse(false, 'Invalid date range format');
}

$check_in = $dates[0];
$check_out = $dates[1];

// Begin transaction
$conn->begin_transaction();

try {
    // Insert into bookings table
    $stmt = $conn->prepare("
        INSERT INTO bookings 
        (name, email, phone, total_price, adults, children, check_in_out, service_type, service_id, status, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, 'hotel', ?, 'pending', NOW())
    ");
    
    $check_in_out = $check_in . ' to ' . $check_out;
    
    $stmt->bind_param(
        "sssdiisi",
        $name,
        $email,
        $phone,
        $total_price,
        $adults,
        $children,
        $check_in_out,
        $hotel_id
    );
    
    if (!$stmt->execute()) {
        throw new Exception('Failed to create booking: ' . $stmt->error);
    }
    
    $booking_id = $conn->insert_id;
    $stmt->close();
    
    // Insert into booking_hotels table
    $stmt2 = $conn->prepare("
        INSERT INTO booking_hotels 
        (booking_id, room_id, number_of_rooms) 
        VALUES (?, ?, ?)
    ");
    
    $stmt2->bind_param("iii", $booking_id, $room_id, $number_of_rooms);
    
    if (!$stmt2->execute()) {
        throw new Exception('Failed to save hotel booking details: ' . $stmt2->error);
    }
    
    $stmt2->close();
    
    // Commit transaction
    $conn->commit();
    
    sendResponse(true, 'Booking confirmed successfully!', [
        'booking_id' => $booking_id
    ]);
    
} catch (Exception $e) {
    $conn->rollback();
    sendResponse(false, 'Booking failed: ' . $e->getMessage());
}

$conn->close();
?>