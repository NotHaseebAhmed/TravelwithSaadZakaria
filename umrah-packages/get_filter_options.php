<?php
header('Content-Type: application/json');
include_once __DIR__ . '/../travel-panel/includes/connection.php';

// Get unique package types
$package_types_query = $conn->query("
    SELECT DISTINCT package_type 
    FROM umrah_packages 
    WHERE status = 1 AND package_type IS NOT NULL AND package_type != ''
    ORDER BY package_type ASC
");

$package_types = [];
while ($row = $package_types_query->fetch_assoc()) {
    $package_types[] = $row['package_type'];
}

// Get unique total days (nights_makkah + nights_madinah)
$days_query = $conn->query("
    SELECT DISTINCT (nights_makkah + nights_madinah) AS total_days
    FROM umrah_packages 
    WHERE status = 1
    ORDER BY total_days ASC
");

$total_days = [];
while ($row = $days_query->fetch_assoc()) {
    $total_days[] = intval($row['total_days']);
}

echo json_encode([
    'success' => true,
    'package_types' => $package_types,
    'total_days' => $total_days
]);
?>