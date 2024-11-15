<?php
ob_start(); // Start output buffering
session_start();
include 'includes/db.php';
include 'EmailSender.php'; // Include the email sending functionality

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the POST data
$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$mobile_number = $_POST['full_mobile_number'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$referral_code = $_POST['referral_code'] ?? '';

// Validate inputs
if (empty($first_name) || empty($last_name) || empty($mobile_number) || empty($email) || empty($password)) {
  header('Content-Type: application/json');
  echo json_encode(['success' => false, 'message' => 'All fields are required.']);
  exit();
}

// Check if email already exists
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  header('Content-Type: application/json');
  echo json_encode(['success' => false, 'message' => 'Email is already registered.']);
  exit();
}

if (!empty($referral_code)) {
  $referred_by = 0;
  $sql = "SELECT user_id FROM users WHERE referral_code = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('s', $referral_code);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $referred_by = $row['user_id'];
  }
}

// Hash the password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Generate OTP
$otp = rand(100000, 999999); // Generate a random 6-digit OTP

try {
  // Begin transaction
  $conn->begin_transaction();

  // Insert the new user into the database, including the OTP
  $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, mobile_number, email, password_hash, role_id, otp, created_at, referred_by) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), ?)");
  $role = 2; // Set default role as dealer
  $referred_by = $referred_by ?? 0; // Set default value if not set
  $stmt->bind_param('sssssiis', $first_name, $last_name, $mobile_number, $email, $password_hash, $role, $otp, $referred_by);

  if (!$stmt->execute()) {
    throw new Exception('Failed to create user: ' . $stmt->error);
  }

  // Get user's first name for personalization
  $firstName = htmlspecialchars($first_name);

  // Get the user ID of the newly registered user
  $user_id = $stmt->insert_id;

  // Insert user_id into the dealers table
  $stmt = $conn->prepare("INSERT INTO dealers (user_id) VALUES (?)");
  $stmt->bind_param('i', $user_id);

  if (!$stmt->execute()) {
    throw new Exception('Failed to create dealer record: ' . $stmt->error);
  }
  $referralcode =  'REFKENZ0' . $user_id;
  $update_referral = "UPDATE users SET referral_code = ? WHERE user_id = ?";
  $stmt_update_referral = $conn->prepare($update_referral);
  $stmt_update_referral->bind_param('si', $referralcode, $user_id);
  if (!$stmt_update_referral->execute()) {
    throw new Exception('Failed to update referral: ' . $stmt_update_referral->error);
  }
  // Prepare email content
  $subject = "Welcome to Kenz Automotive, $firstName! Your OTP Code Inside";

  // Prepare HTML email body
  $body = '
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your OTP Code</title>
    <style>
      body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
      }
      .email-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #dee2e6;
        border-radius: 0.5rem;
        background-color: #ffffff;
      }
      .otp-code {
        font-size: 2rem;
        font-weight: bold;
        color: #0d6efd;
        padding: 10px;
        border: 2px solid #0d6efd;
        border-radius: 0.25rem;
        text-align: center;
        margin: 20px 0;
      }
      .footer {
        text-align: center;
        margin-top: 20px;
        font-size: 0.9rem;
        color: #6c757d;
      }
      h2, p {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="email-container">
      <h2>Welcome, ' . $firstName . '!</h2>
      <p>Thank you for registering with Kenz Automotive. Your OTP code is below:</p>
      <div class="otp-code">' . $otp . '</div>
      <p>Please enter this code to complete your registration.</p>
      <div class="footer">
        <p>If you did not request this, please ignore this email.</p>
      </div>
    </div>
  </body>
</html>';

  // Send OTP via email using the reusable function
  if (!sendEmail($email, $subject, $body)) {
    throw new Exception('Failed to send OTP email');
  }

  // If we got here, commit the transaction
  $conn->commit();

  header('Content-Type: application/json');
  echo json_encode([
    'success' => true,
    'message' => 'Registration successful! An OTP has been sent to your email.',
    'redirect' => 'otp_verification.php'
  ]);
} catch (Exception $e) {
  // Something went wrong, rollback the transaction
  $conn->rollback();

  header('Content-Type: application/json');
  echo json_encode([
    'success' => false,
    'message' => 'Registration failed: ' . $e->getMessage()
  ]);
}

// Close the statement and connection
$stmt->close();
$conn->close();
