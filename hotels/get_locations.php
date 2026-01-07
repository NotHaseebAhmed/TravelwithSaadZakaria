<?php
/**
 * Get Locations for Hotel Search Dropdown
 * Fetches all locations from the locations table
 * Returns JSON array of locations
 */

header('Content-Type: application/json');
include_once __DIR__ . '/../travel-panel/includes/connection.php'; 


// Get unique locations from locations table
$query = $conn->query("
    SELECT id, name, slug
    FROM locations
    ORDER BY name ASC
");

$locations = [];

if ($query && $query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $locations[] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'slug' => $row['slug']
        ];
    }
}

echo json_encode([
    'success' => true,
    'count' => count($locations),
    'locations' => $locations
]);
?>