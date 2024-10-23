change_status.php
<?php
include '../../includes/db.php'; // Ensure to include your database connection

// Get the JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Check if all required fields are present
if (isset($data['coupon_id'])) {
    $couponId = $data['coupon_id'];
    $status = $data['status'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE coupons SET status = ? WHERE id = ?");
    $stmt->bind_param("ss", $status, $couponId);

    // Execute and check for success
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to change status.']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input.']);
}

$conn->close();
?>