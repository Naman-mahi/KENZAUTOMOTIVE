<?php
// Start the session
session_start();

// Check if the necessary data is provided
if (isset($_POST['user_id'], $_POST['email'], $_POST['first_name'], $_POST['last_name'], $_POST['mobile_number'], 
          $_POST['profile_pic'], $_POST['user_status'], $_POST['otp'], $_POST['created_at'], $_POST['referral_code'], 
          $_POST['referred_by'], $_POST['role_id'])) {

    // Store user data in session
    $_SESSION['user_id'] = $_POST['user_id'] ?? null;
    $_SESSION['email'] = $_POST['email'] ?? null;
    $_SESSION['first_name'] = $_POST['first_name'] ?? null;
    $_SESSION['last_name'] = $_POST['last_name'] ?? null;
    $_SESSION['mobile_number'] = $_POST['mobile_number'] ?? null;
    $_SESSION['profile_pic'] = $_POST['profile_pic'] ?? null;
    $_SESSION['user_status'] = $_POST['user_status'] ?? null;
    $_SESSION['otp'] = $_POST['otp'] ?? null;
    $_SESSION['created_at'] = $_POST['created_at'] ?? null;
    $_SESSION['referral_code'] = $_POST['referral_code'] ?? null;
    $_SESSION['referred_by'] = $_POST['referred_by'] ?? null;
    $_SESSION['role_id'] = $_POST['role_id'] ?? null;

    // Return success response
    echo json_encode(['status' => 'success']);
} else {
    // Return error if data is missing
    echo json_encode(['status' => 'error', 'message' => 'Incomplete user data']);
}
?>
