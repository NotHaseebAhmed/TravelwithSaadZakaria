<?php
/**
 * Process Umrah Package Booking
 * Save as: process_umrah_booking.php
 */
header('Content-Type: application/json');
include_once __DIR__ . '/../travel-panel/includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $package_id = intval($_POST['package_id'] ?? 0);
    $room_id = intval($_POST['room_id'] ?? 0);
    $name = trim($_POST['booking_name'] ?? '');
    $email = trim($_POST['booking_email'] ?? '');
    $phone = trim($_POST['booking_phone'] ?? '');
    $adults = intval($_POST['booking_adults'] ?? 1);
    $room_title = trim($_POST['room_type'] ?? ''); // Fixed: removed intval, kept as string
    $children = intval($_POST['booking_children'] ?? 0);
    $travel_date = trim($_POST['travel_date'] ?? '');
    $total_price = floatval($_POST['total_price'] ?? 0);
    
    // Validate required fields
    if (!$package_id || !$room_id || !$name || !$email || !$phone || !$travel_date) {
        echo json_encode([
            'success' => false,
            'message' => 'Please fill in all required fields.'
        ]);
        exit;
    }
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            'success' => false,
            'message' => 'Please enter a valid email address.'
        ]);
        exit;
    }
    
    // Start transaction
    $conn->begin_transaction();
    
    try {
        // Insert into bookings table
        // Fixed: Added service_id column
        $stmt = $conn->prepare("
            INSERT INTO bookings 
            (name, email, phone, total_price, adults, children, check_in_out, service_type, service_id, status, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, 'umrah', ?, 'pending', NOW())
        ");
        
        $stmt->bind_param(
            "sssdiisi",
            $name,
            $email,
            $phone,
            $total_price,
            $adults,
            $children,
            $travel_date,
            $package_id  // Added: service_id should be the package_id
        );
        
        if (!$stmt->execute()) {
            throw new Exception("Failed to create booking: " . $stmt->error);
        }
        
        $booking_id = $conn->insert_id;
        $stmt->close();
        
        // Insert into booking_umrah_packages table
        $stmt2 = $conn->prepare("
            INSERT INTO booking_umrah_packages 
            (booking_id, umrah_package_id, selected_room_option) 
            VALUES (?, ?, ?)
        ");
        
        // Fixed: Changed bind_param from "iisi" to "iis" (3 parameters, not 4)
        $stmt2->bind_param(
            "iis",
            $booking_id,
            $package_id,
            $room_title
        );
        
        if (!$stmt2->execute()) {
            throw new Exception("Failed to save package details: " . $stmt2->error);
        }
        
        $stmt2->close();
        
        // Commit transaction
        $conn->commit();
        
        echo json_encode([
            'success' => true,
            'message' => 'Booking inquiry submitted successfully! Your booking ID is #' . $booking_id . '. We will contact you soon.',
            'booking_id' => $booking_id
        ]);
        
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode([
            'success' => false,
            'message' => 'Booking failed: ' . $e->getMessage()
        ]);
    }
    
    $conn->close();
    
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
}
?>