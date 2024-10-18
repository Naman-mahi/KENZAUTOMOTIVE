<?php
include '../includes/db.php'; // Include your database connection file

$data = json_decode(file_get_contents("php://input"), true);
$start_date = $data['start_date'] ?? null; // Use null if not provided
$end_date = $data['end_date'] ?? null;

if ($start_date && $end_date) {
    // SQL to check for overlaps
    $sql = "SELECT * FROM advertisements WHERE (start_datetime < ? AND end_datetime > ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $end_date, $start_date);
    $stmt->execute();
    $result = $stmt->get_result();

    $response = ['isOverlap' => $result->num_rows > 0];
} else {
    // If no dates are provided, fetch all booked dates
    $sql = "SELECT start_datetime, end_datetime FROM advertisements";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    $bookedDates = [];
    while ($row = $result->fetch_assoc()) {
        $bookedDates[] = [
            'start' => $row['start_datetime'],
            'end' => $row['end_datetime']
        ];
    }

    $response = ['bookedDates' => $bookedDates];
}

echo json_encode($response);
