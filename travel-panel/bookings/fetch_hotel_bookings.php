<?php
/**
 * Fetch Hotel Bookings - Real-time API
 * Save as: travel-panel/api/fetch_hotel_bookings.php
 */

header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');

require_once __DIR__ . '/../includes/connection.php';
require_once __DIR__ . '/../includes/auth_functions.php';

start_secure_session(); // ✅ REQUIRED

if (!is_logged_in()) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

try {
    // Fetch all hotel bookings with related data
    $query = "
        SELECT 
            b.id,
            b.name,
            b.email,
            b.phone,
            b.total_price,
            b.adults,
            b.children,
            b.check_in_out,
            b.status,
            b.created_at,
            h.hotel_title,
            r.room_title,
            bh.number_of_rooms
        FROM bookings b
        INNER JOIN booking_hotels bh ON b.id = bh.booking_id
        INNER JOIN rooms r ON bh.room_id = r.id
        INNER JOIN hotels h ON r.hotel_id = h.id
        WHERE b.service_type = 'hotel'
        ORDER BY b.created_at DESC
    ";
    
    $result = $conn->query($query);
    
    if (!$result) {
        throw new Exception($conn->error);
    }
    
    $bookings = [];
    while ($row = $result->fetch_assoc()) {
        // Parse check-in and check-out dates
        $dates = explode(' to ', $row['check_in_out']);
        $check_in = $dates[0] ?? 'N/A';
        $check_out = $dates[1] ?? 'N/A';
        
        // Format created date
        $inquiry_date = date('d M Y', strtotime($row['created_at']));
        
        // Status badge color
        $status_class = '';
        switch ($row['status']) {
            case 'confirmed':
                $status_class = 'success';
                break;
            case 'pending':
                $status_class = 'warning';
                break;
            case 'cancelled':
                $status_class = 'danger';
                break;
            default:
                $status_class = 'secondary';
        }
        
        $bookings[] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'inquiry_date' => $inquiry_date,
            'hotel_name' => $row['hotel_title'],
            'check_in' => $check_in,
            'check_out' => $check_out,
            'adults' => $row['adults'],
            'children' => $row['children'],
            'room_type' => $row['room_title'],
            'number_of_rooms' => $row['number_of_rooms'],
            'total_price' => number_format($row['total_price'], 2),
            'status' => ucfirst($row['status']),
            'status_class' => $status_class,
            'raw_created_at' => $row['created_at']
        ];
    }
    
    echo json_encode([
        'success' => true,
        'data' => $bookings,
        'count' => count($bookings),
        'timestamp' => time()
    ]);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error fetching bookings: ' . $e->getMessage()
    ]);
}

$conn->close();
?>