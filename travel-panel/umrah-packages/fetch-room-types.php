<?php
include_once __DIR__ . '/../includes/connection.php'; // adjust path as needed

$hotel_id = $_POST['hotel_id'] ?? 0;

$stmt = $conn->prepare("
    SELECT id, room_title, price_default 
    FROM rooms 
    WHERE hotel_id = ? 
    ORDER BY id ASC
");
$stmt->bind_param("i", $hotel_id);
$stmt->execute();
$rooms = $stmt->get_result();

while ($row = $rooms->fetch_assoc()) {
    echo "
    <div class='col-lg-4'>
        <label>{$row['room_title']}</label>
        <input type='text' name='room_price[{$row['id']}]' 
               value='{$row['price_default']}' />
    </div>
    ";
}
?>
