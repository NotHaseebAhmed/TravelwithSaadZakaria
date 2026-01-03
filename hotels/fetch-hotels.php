<?php
include_once __DIR__ . '/../travel-panel/includes/connection.php'; 

// Build query
$sql = "
    SELECT 
        h.id,
        h.hotel_title,
        h.hotel_slug,
        h.hotel_price,
        h.meta_description,
        h.hotel_location,
        (
            SELECT GROUP_CONCAT(image_path ORDER BY id ASC SEPARATOR ',')
            FROM hotel_images 
            WHERE hotel_id = h.id
            LIMIT 4
        ) AS image_paths
    FROM hotels h
    ORDER BY h.id DESC
";

// Execute query
$result = $conn->query($sql);

// Convert data into array
$hotels = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Convert comma-separated list into PHP array
        $row['images'] = !empty($row['image_paths']) ? explode(',', $row['image_paths']) : [];
        $hotels[] = $row;
    }
}


?>
