<?php
include_once __DIR__ . '/../travel-panel/includes/connection.php'; 

// If included by template and no slug provided, just leave variables empty and return.
if (!isset($_GET['slug']) || empty($_GET['slug'])) {
    $hotel = null;
    $images = [];
    $rooms = [];
    return;
}

$slug = $conn->real_escape_string($_GET['slug']);

$sql_hotel = "
    SELECT 
        id,
        hotel_title,
        hotel_slug,
        hotel_price,
        hotel_rating,
        hotel_location,
        map_link,
        hotel_overview,
        meta_title,
        meta_description
    FROM hotels
    WHERE hotel_slug = '$slug'
    LIMIT 1
";
$result_hotel = $conn->query($sql_hotel);

if (!$result_hotel || $result_hotel->num_rows === 0) {
    $hotel = null;
    $images = [];
    $rooms = [];
    return;
}

$hotel = $result_hotel->fetch_assoc();
$hotel_id = (int)$hotel['id'];

$sql_images = "
    SELECT image_path, image_title, image_alt_text
    FROM hotel_images
    WHERE hotel_id = $hotel_id
    ORDER BY id ASC
";
$result_images = $conn->query($sql_images);

$images = [];
if ($result_images && $result_images->num_rows > 0) {
    while ($row = $result_images->fetch_assoc()) {
        // store only the path string (template expects a string)
        $images[] = $row['image_path'];
    }
}

$sql_rooms = "
    SELECT id, room_title, image_path, price_default
    FROM rooms
    WHERE hotel_id = $hotel_id
    ORDER BY id ASC
";
$result_rooms = $conn->query($sql_rooms);

$rooms = [];
if ($result_rooms && $result_rooms->num_rows > 0) {
    while ($row = $result_rooms->fetch_assoc()) {
        $rooms[] = $row;
    }
}

// Do not echo JSON or send headers when included by the template.
// Variables $hotel, $images, $rooms are now available to the caller.
?>