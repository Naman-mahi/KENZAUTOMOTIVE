<?php
session_start();
include 'includes/db.php'; // Include your database connection

$email = $_POST['email'] ?? ''; // Get email from the form
$entered_otp = $_POST['otp'] ?? '';

// Validate inputs
if (empty($email) || empty($entered_otp)) {
    echo json_encode(['success' => false, 'message' => 'Email and OTP are required.']);
    exit();
}

// Check the OTP in the database
$stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ? AND otp = ?");
$stmt->bind_param('ss', $email, $entered_otp);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // OTP is correct, proceed with the next steps
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['user_id']; // Store user_id in session

    // Optionally update user status or delete the OTP
    // $stmt = $conn->prepare("UPDATE users SET otp = NULL WHERE email = ?");
    // $stmt->bind_param('s', $email);
    // $stmt->execute();

    echo json_encode(['success' => true, 'message' => 'OTP verified successfully!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid OTP.']);
}

// Close the statement and connection
$stmt->close();
$conn->close();
