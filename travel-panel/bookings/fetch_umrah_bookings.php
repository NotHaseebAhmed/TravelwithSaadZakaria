<?php
/**
 * Fetch Umrah Package Bookings - Real-time API
 * Save as: travel-panel/api/fetch_umrah_bookings.php
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

try {
    // Fetch all umrah package bookings with related data
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
            up.package_title,
            up.package_type,
            up.nights_makkah,
            up.nights_madinah,
            bup.selected_room_option,
            h_makkah.hotel_title as makkah_hotel,
            h_madinah.hotel_title as madinah_hotel
        FROM bookings b
        INNER JOIN booking_umrah_packages bup ON b.id = bup.booking_id
        INNER JOIN umrah_packages up ON bup.umrah_package_id = up.id
        LEFT JOIN hotels h_makkah ON up.makkah_hotel_id = h_makkah.id
        LEFT JOIN hotels h_madinah ON up.madinah_hotel_id = h_madinah.id
        WHERE b.service_type = 'umrah'
        ORDER BY b.created_at DESC
    ";
    
    $result = $conn->query($query);
    
    if (!$result) {
        throw new Exception($conn->error);
    }
    
    $bookings = [];
    while ($row = $result->fetch_assoc()) {
        // Format travel date (single date for umrah packages)
        $travel_date = $row['check_in_out'] ?? 'N/A';
        
        // Format created date
        $inquiry_date = date('d M Y', strtotime($row['created_at']));
        
        // Calculate total nights
        $total_nights = ($row['nights_makkah'] ?? 0) + ($row['nights_madinah'] ?? 0);
        
        // Package type badge color
        $type_class = '';
        switch (strtolower($row['package_type'])) {
            case 'premium':
            case 'premium package':
                $type_class = 'primary';
                break;
            case 'business':
            case 'business package':
                $type_class = 'info';
                break;
            case 'economy':
            case 'economy package':
                $type_class = 'secondary';
                break;
            default:
                $type_class = 'secondary';
        }
        
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
        
        // Calculate total persons
        $total_persons = ($row['adults'] ?? 0) + ($row['children'] ?? 0);
        
        $bookings[] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'check_in_out' => $row['check_in_out'],
            'package_title' => $row['package_title'] ?? 'N/A',
            'package_type' => ucfirst($row['package_type'] ?? 'N/A'),
            'package_type_class' => $type_class,
            'nights_makkah' => $row['nights_makkah'] ?? 0,
            'nights_madinah' => $row['nights_madinah'] ?? 0,
            'total_nights' => $total_nights,
            'package_duration' => $total_nights . ' nights',
            'travel_date' => $travel_date,
            'makkah_hotel' => $row['makkah_hotel'] ?? 'N/A',
            'madinah_hotel' => $row['madinah_hotel'] ?? 'N/A',
            'room_option' => $row['selected_room_option'] ?? 'N/A',
            'adults' => $row['adults'] ?? 0,
            'children' => $row['children'] ?? 0,
            'total_persons' => $total_persons,
            'number_of_persons' => $total_persons . ' person(s)',
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