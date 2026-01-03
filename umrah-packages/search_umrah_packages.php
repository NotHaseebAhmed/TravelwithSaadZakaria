<?php
header('Content-Type: application/json');
include_once __DIR__ . '/../travel-panel/includes/connection.php';

// Get filter parameters
$package_type = isset($_POST['package_type']) ? trim($_POST['package_type']) : 'all';
$total_days = isset($_POST['total_days']) ? intval($_POST['total_days']) : 0;

// Build the query
$query = "
    SELECT 
        up.*,
        mh.hotel_title AS makkah_hotel,
        mdh.hotel_title AS madinah_hotel
    FROM umrah_packages up
    LEFT JOIN hotels mh ON up.makkah_hotel_id = mh.id
    LEFT JOIN hotels mdh ON up.madinah_hotel_id = mdh.id
    WHERE up.status = 1
";

// Add package type filter
if ($package_type !== 'all' && !empty($package_type)) {
    $query .= " AND up.package_type = '" . $conn->real_escape_string($package_type) . "'";
}

// Add total days filter
if ($total_days > 0) {
    $query .= " AND (up.nights_makkah + up.nights_madinah) = " . $total_days;
}

$query .= " ORDER BY up.id DESC";

$result = $conn->query($query);

$packages = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $img = !empty($row['package_image']) 
               ? '/travelwithsaadzakaria/travel-panel/assets/uploads/umrah-packages/' . $row['package_image'] 
               : '/assets/img/placeholder.png';
        
        $total_days_calc = $row['nights_makkah'] + $row['nights_madinah'];
        
        $packages[] = [
            'id' => $row['id'],
            'title' => $row['package_title'],
            'slug' => $row['package_slug'],
            'image' => $img,
            'package_type' => $row['package_type'],
            'nights_makkah' => $row['nights_makkah'],
            'nights_madinah' => $row['nights_madinah'],
            'total_days' => $total_days_calc,
            'makkah_hotel' => $row['makkah_hotel'],
            'madinah_hotel' => $row['madinah_hotel'],
            'price' => $row['package_price'],
            'description' => $row['package_description']
        ];
    }
}

echo json_encode([
    'success' => true,
    'count' => count($packages),
    'packages' => $packages
]);
?>