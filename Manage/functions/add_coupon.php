<?php
include '../../includes/db.php'; // Ensure to include your database connection

// Get the JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Check if all required fields are present
if (isset($data['coupon_name'], $data['coupon_code'], $data['discount_type'], $data['discount_value'], $data['expiration_date'], $data['status'])) {
    $couponName = $data['coupon_name'];
    $couponCode = $data['coupon_code'];
    $discountType = $data['discount_type'];
    $discountValue = $data['discount_value'];
    $expirationDate = $data['expiration_date'];
    $status = $data['status'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO coupons (coupon_name, code, discount_type, discount_value, expiration_date, status, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssssss", $couponName, $couponCode, $discountType, $discountValue, $expirationDate, $status);

    // Execute and check for success
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add coupon.']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input.']);
}

$conn->close();
