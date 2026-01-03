<?php
/**
 * Fetch Car Rental Bookings - Real-time API
 * Save as: travel-panel/api/fetch_car_bookings.php
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
    // Fetch all car rental bookings with related data
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
            cr.car_rental_title,
            cr.car_capacity,
            cr.car_rental_price,
            bcr.pickup_location,
            bcr.dropoff_location,
            bcr.number_of_cars,
            crr.pickup_location as route_pickup,
            crr.dropoff_location as route_dropoff
        FROM bookings b
        INNER JOIN booking_car_rentals bcr ON b.id = bcr.booking_id
        INNER JOIN car_rentals cr ON bcr.car_rental_id = cr.id
        LEFT JOIN car_rentals_routes crr ON cr.route_id = crr.id
        WHERE b.service_type = 'car'
        ORDER BY b.created_at DESC
    ";
    
    $result = $conn->query($query);
    
    if (!$result) {
        throw new Exception($conn->error);
    }
    
    $bookings = [];
    while ($row = $result->fetch_assoc()) {
        // Parse pickup and dropoff dates/times
        $dates = explode(' to ', $row['check_in_out']);
        $pickup_datetime = $dates[0] ?? 'N/A';
        $dropoff_datetime = $dates[1] ?? 'N/A';
        
        // Calculate rental duration
        $duration = 'N/A';
        if (count($dates) == 2) {
            $pickup = strtotime($dates[0]);
            $dropoff = strtotime($dates[1]);
            if ($pickup && $dropoff) {
                $diff = $dropoff - $pickup;
                $days = floor($diff / (60 * 60 * 24));
                $hours = floor(($diff % (60 * 60 * 24)) / (60 * 60));
                
                if ($days > 0) {
                    $duration = $days . ' day' . ($days > 1 ? 's' : '');
                    if ($hours > 0) {
                        $duration .= ' ' . $hours . 'h';
                    }
                } else {
                    $duration = $hours . ' hour' . ($hours > 1 ? 's' : '');
                }
            }
        }
        
        // Format created date
        $inquiry_date = date('d M Y', strtotime($row['created_at']));
        
        // Use actual pickup/dropoff locations or fallback to route locations
        $pickup_loc = !empty($row['pickup_location']) ? $row['pickup_location'] : $row['route_pickup'];
        $dropoff_loc = !empty($row['dropoff_location']) ? $row['dropoff_location'] : $row['route_dropoff'];
        
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
            'car_name' => $row['car_rental_title'],
            'car_capacity' => $row['car_capacity'],
            'pickup_location' => $pickup_loc,
            'dropoff_location' => $dropoff_loc,
            'pickup_datetime' => $pickup_datetime,
            'dropoff_datetime' => $dropoff_datetime,
            'duration' => $duration,
            'adults' => $row['adults'],
            'children' => $row['children'],
            'number_of_cars' => $row['number_of_cars'],
            'price_per_car' => number_format($row['car_rental_price'], 2),
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