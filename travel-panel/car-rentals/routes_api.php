<?php
include_once __DIR__ . '/../includes/connection.php';
header('Content-Type: application/json');

$response = ['success' => false, 'message' => 'Invalid request.'];

// ---- DELETE ----
if (isset($_POST['delete_id'])) {
    $id = intval($_POST['delete_id']);
    $stmt = $conn->prepare("DELETE FROM car_rentals_routes WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $response = ['success' => true, 'message' => 'Route deleted successfully.'];
    } else {
        $response = ['success' => false, 'message' => 'Failed to delete route.'];
    }
    $stmt->close();
    echo json_encode($response);
    exit;
}

// ---- INSERT / UPDATE ----
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $pickup = trim($_POST['pickup_location'] ?? '');
    $dropoff = trim($_POST['dropoff_location'] ?? '');

    if (empty($pickup) || empty($dropoff)) {
        echo json_encode(['success' => false, 'message' => 'Both pickup and dropoff are required.']);
        exit;
    }

    if (!empty($id)) {
        $stmt = $conn->prepare("UPDATE car_rentals_routes SET pickup_location=?, dropoff_location=? WHERE id=?");
        $stmt->bind_param("ssi", $pickup, $dropoff, $id);
        $action = 'updated';
    } else {
        $stmt = $conn->prepare("INSERT INTO car_rentals_routes (pickup_location, dropoff_location) VALUES (?, ?)");
        $stmt->bind_param("ss", $pickup, $dropoff);
        $action = 'added';
    }

    if ($stmt->execute()) {
        $response = ['success' => true, 'message' => "Route $action successfully."];
    } else {
        $response = ['success' => false, 'message' => 'Database error.'];
    }
    $stmt->close();
    echo json_encode($response);
    exit;
}

// ---- FETCH ALL ----
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $conn->query("SELECT * FROM car_rentals_routes ORDER BY id DESC");
    $routes = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $routes[] = $row;
        }
    }
    echo json_encode(['success' => true, 'data' => $routes]);
    exit;
}
?>
