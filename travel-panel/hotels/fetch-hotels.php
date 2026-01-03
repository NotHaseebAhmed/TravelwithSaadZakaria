<?php
include_once __DIR__ . '/../includes/connection.php'; // adjust path as needed

$sql = "SELECT id, hotel_title FROM hotels ORDER BY hotel_title ASC";
$result = $conn->query($sql);

$hotels = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $hotels[] = [
            'id' => $row['id'],
            'name' => $row['hotel_title']
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($hotels, JSON_PRETTY_PRINT);
$conn->close();
?>
