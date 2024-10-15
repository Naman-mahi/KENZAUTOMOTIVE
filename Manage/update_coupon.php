<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start output buffering
ob_start();

// Include your database connection
include '../includes/db.php';

// Get the JSON input
$data = json_decode(file_get_contents('php://input'), true);
if ($data === null) {
    echo json_encode(['success' => false, 'message' => 'Invalid JSON input']);
    ob_end_flush(); // Send the buffer contents
    exit;
}

// Check if required fields are set
if (isset($data['coupon_id'], $data['coupon_name'], $data['coupon_code'], $data['discount_type'], $data['discount_value'], $data['expiration_date'], $data['status'])) {
    $coupon_id = $data['coupon_id'];
    $coupon_name = $data['coupon_name'];
    $coupon_code = $data['coupon_code'];
    $discount_type = $data['discount_type'];
    $discount_value = $data['discount_value'];
    $expiration_date = $data['expiration_date'];
    $status = $data['status'];

    // Prepare the SQL statement
    $sql = "UPDATE coupons SET coupon_name = ?, code = ?, discount_type = ?, discount_value = ?, expiration_date = ?, status = ? WHERE coupon_id = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssssssi", $coupon_name, $coupon_code, $discount_type, $discount_value, $expiration_date, $status, $coupon_id);

    // Execute and check for success
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Coupon updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update coupon: ' . $stmt->error]);
    }

    // Close the statement
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Missing required fields']);
}

// Clean output buffer and send JSON response
ob_end_flush();
$conn->close();
