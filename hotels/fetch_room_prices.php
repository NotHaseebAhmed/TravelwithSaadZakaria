<?php
include_once __DIR__ . '/../travel-panel/includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hotelId   = intval($_POST['hotel_id'] ?? 0);
    $dateRange = trim($_POST['dateRange'] ?? '');

    if (!$hotelId || !$dateRange) {
        echo json_encode(['success' => false, 'message' => 'Missing data']);
        exit;
    }

    // Parse flatpickr format: "YYYY-MM-DD to YYYY-MM-DD"
    $parts = explode(' to ', $dateRange);
    if (count($parts) < 2) {
        echo json_encode(['success' => false, 'message' => 'Invalid date range']);
        exit;
    }

    $startDate = $parts[0];
    $endDate   = $parts[1];

    // Fetch all rooms for this hotel
    $roomQuery = $conn->prepare("SELECT id, room_title FROM rooms WHERE hotel_id = ?");
    $roomQuery->bind_param("i", $hotelId);
    $roomQuery->execute();
    $rooms = $roomQuery->get_result();

    $prices = [];
    $selectedStart = strtotime($startDate);
    $selectedEnd   = strtotime($endDate);

    while ($room = $rooms->fetch_assoc()) {
        $roomId = $room['id'];

        // Fetch price rules overlapping the selected date range
        $ruleQuery = $conn->prepare("
            SELECT start_date, end_date, price
            FROM room_price_rules
            WHERE room_id = ?
              AND (
                (start_date <= ? AND end_date >= ?) OR
                (start_date BETWEEN ? AND ?) OR
                (end_date BETWEEN ? AND ?)
              )
        ");
        $ruleQuery->bind_param("issssss",
            $roomId,
            $endDate, $startDate,
            $startDate, $endDate,
            $startDate, $endDate
        );
        $ruleQuery->execute();
        $rules = $ruleQuery->get_result();

        $totalPrice = 0;

        while ($rule = $rules->fetch_assoc()) {
            $ruleStart = strtotime($rule['start_date']);
            $ruleEnd   = strtotime($rule['end_date']);

            // Overlap period
            $overlapStart = max($selectedStart, $ruleStart);
            $overlapEnd   = min($selectedEnd, $ruleEnd);

            if ($overlapStart <= $overlapEnd) {
                $days = (($overlapEnd - $overlapStart) / (60 * 60 * 24)) + 1;
                $days = $days -1;
                $totalPrice += ($days * $rule['price']);
            }
        }

        $prices[] = [
            'id'    => $roomId,
            'title' => $room['room_title'],
            'total_price' => round($totalPrice, 2)
        ];
    }

    echo json_encode(['success' => true, 'prices' => $prices]);
    exit;
}


?>
