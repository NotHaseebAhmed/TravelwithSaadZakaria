<?php
header('Content-Type: application/json');
include_once __DIR__ . '/../travel-panel/includes/connection.php';

// Get search parameters
$location = isset($_POST['location']) ? trim($_POST['location']) : '';
$dateRange = isset($_POST['dateRange']) ? trim($_POST['dateRange']) : '';
$numRooms = isset($_POST['numRooms']) ? intval($_POST['numRooms']) : 1;

// Parse date range
$startDate = null;
$endDate = null;
$hasDateRange = false;

if (!empty($dateRange) && strpos($dateRange, ' to ') !== false) {
    $dates = explode(' to ', $dateRange);
    if (count($dates) === 2) {
        $startDate = trim($dates[0]);
        $endDate = trim($dates[1]);
        $hasDateRange = true;
    }
}

// Build base query
$query = "
    SELECT 
        h.id,
        h.hotel_title,
        h.hotel_slug,
        h.hotel_price,
        h.hotel_rating,
        h.hotel_location,
        h.meta_description,
        (
            SELECT GROUP_CONCAT(image_path ORDER BY id ASC SEPARATOR ',')
            FROM hotel_images 
            WHERE hotel_id = h.id
            LIMIT 4
        ) AS image_paths
    FROM hotels h
    WHERE 1=1
";

// Add location filter
if (!empty($location) && $location !== 'all') {
    $location = $conn->real_escape_string($location);
    $query .= " AND EXISTS (
        SELECT 1 FROM locations l 
        WHERE l.id = h.location_id 
        AND l.name = '$location'
    )";
}

$query .= " ORDER BY h.id DESC";

$result = $conn->query($query);

$hotels = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $hotelId = $row['id'];

        // Get first room (lowest price)
        $roomQuery = $conn->prepare("
            SELECT id, room_title, price_default
            FROM rooms
            WHERE hotel_id = ?
            ORDER BY price_default ASC, id ASC
            LIMIT 1
        ");
        $roomQuery->bind_param("i", $hotelId);
        $roomQuery->execute();
        $roomResult = $roomQuery->get_result();

        $calculatedPrice = 0;
        $roomId = null;

        if ($roomResult && $roomResult->num_rows > 0) {
            $room = $roomResult->fetch_assoc();
            $roomId = $room['id'];
            $defaultPrice = $room['price_default'];

            if ($hasDateRange && !empty($startDate) && !empty($endDate)) {
                // Calculate price from room_price_rules
                $calculatedPrice = calculatePriceForDateRange($conn, $roomId, $startDate, $endDate, $numRooms, $defaultPrice);
            } else {
                // Use default price for 1 night
                $calculatedPrice = $defaultPrice * $numRooms;
            }
        } else {
            // No room found, use hotel default price
            $calculatedPrice = $row['hotel_price'] * $numRooms;
        }

        // Convert images
        $row['images'] = !empty($row['image_paths']) ? explode(',', $row['image_paths']) : [];
        $row['calculated_price'] = round($calculatedPrice, 2);

        $hotels[] = $row;
    }
}

echo json_encode([
    'success' => true,
    'count' => count($hotels),
    'hotels' => $hotels,
    'filters' => [
        'location' => $location,
        'dateRange' => $dateRange,
        'numRooms' => $numRooms,
        'hasDateRange' => $hasDateRange
    ]
]);

/**
 * Calculate total price for a date range based on room_price_rules
 * This matches the logic in fetch_room_prices.php for consistency
 */
function calculatePriceForDateRange($conn, $roomId, $startDate, $endDate, $numRooms, $defaultPrice)
{
    $selectedStart = strtotime($startDate);
    $selectedEnd = strtotime($endDate);

    if (!$selectedStart || !$selectedEnd || $selectedStart >= $selectedEnd) {
        return 0;
    }

    // Get all price rules that overlap with the selected date range
    $ruleQuery = $conn->prepare("
        SELECT start_date, end_date, price
        FROM room_price_rules
        WHERE room_id = ?
          AND (
            (start_date <= ? AND end_date >= ?) OR
            (start_date BETWEEN ? AND ?) OR
            (end_date BETWEEN ? AND ?)
          )
        ORDER BY start_date ASC
    ");
    
    $ruleQuery->bind_param("issssss",
        $roomId,
        $endDate, $startDate,
        $startDate, $endDate,
        $startDate, $endDate
    );
    
    $ruleQuery->execute();
    $rulesResult = $ruleQuery->get_result();

    $totalPrice = 0;
    $rules = [];

    // Store all applicable rules
    while ($rule = $rulesResult->fetch_assoc()) {
        $rules[] = [
            'start' => strtotime($rule['start_date']),
            'end' => strtotime($rule['end_date']),
            'price' => floatval($rule['price'])
        ];
    }

    // If no rules found, use default price
    if (empty($rules)) {
        $nights = ceil(($selectedEnd - $selectedStart) / (60 * 60 * 24));
        return ($defaultPrice * $nights * $numRooms);
    }

    // Calculate price for each night in the selected range
    $currentDate = $selectedStart;
    
    while ($currentDate < $selectedEnd) {
        $nightPrice = $defaultPrice; // Default to room's base price
        $found = false;

        // Check each rule to see if it applies to this night
        foreach ($rules as $rule) {
            // Check if current night falls within this rule's date range
            if ($currentDate >= $rule['start'] && $currentDate < $rule['end']) {
                $nightPrice = $rule['price'];
                $found = true;
                break; // Use first matching rule
            }
        }

        $totalPrice += $nightPrice;

        // Move to next day
        $currentDate = strtotime('+1 day', $currentDate);
    }

    // Multiply by number of rooms
    return $totalPrice * $numRooms;
}
?>