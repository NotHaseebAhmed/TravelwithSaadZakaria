<?php
/**
 * Update Booking Status API
 * Save as: travel-panel/api/update_booking_status.php
 * 
 * This allows you to change booking status (pending/confirmed/cancelled)
 */

header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');

require_once __DIR__ . '/../includes/connection.php';
require_once __DIR__ . '/../includes/auth_functions.php';

start_secure_session();

// Check if user is logged in
if (!is_logged_in()) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

try {
    $booking_id = isset($_POST['booking_id']) ? intval($_POST['booking_id']) : 0;
    $new_status = isset($_POST['status']) ? $_POST['status'] : '';
    
    // Validate inputs
    if ($booking_id <= 0) {
        throw new Exception('Invalid booking ID');
    }
    
    $allowed_statuses = ['pending', 'confirmed', 'cancelled'];
    if (!in_array($new_status, $allowed_statuses)) {
        throw new Exception('Invalid status. Allowed: pending, confirmed, cancelled');
    }
    
    // Update booking status
    $stmt = $conn->prepare("UPDATE bookings SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $new_status, $booking_id);
    
    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => 'Booking status updated successfully',
            'booking_id' => $booking_id,
            'new_status' => $new_status
        ]);
    } else {
        throw new Exception('Failed to update booking status');
    }
    
    $stmt->close();
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}

$conn->close();
?>