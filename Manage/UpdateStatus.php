
<?php
require_once '../includes/db.php'; // Ensure database connection is included

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'] ?? '';
    $dealer_id = $_POST['dealer_id'] ?? '';

    if (empty($status) || empty($dealer_id)) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid input.']);
        exit;
    }

    $stmt = $conn->prepare("UPDATE users SET user_status = ? WHERE user_id = ?");
    $stmt->bind_param("si", $status, $dealer_id);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'No changes made.']);
        }
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Database error: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed.']);
}
?>