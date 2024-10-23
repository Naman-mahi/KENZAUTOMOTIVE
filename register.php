<?php
ob_start(); // Start output buffering
session_start();
include 'includes/db.php';
include 'EmailSender.php'; // Include the email sending functionality

// Disable error reporting for production
error_reporting(0);

// Get the POST data
$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$mobile_number = $_POST['mobile_number'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Validate inputs
if (empty($first_name) || empty($last_name) || empty($mobile_number) || empty($email) || empty($password)) {
  echo json_encode(['success' => false, 'message' => 'All fields are required.']);
  exit();
}

// Check if email already exists
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  echo json_encode(['success' => false, 'message' => 'Email is already registered.']);
  exit();
}

// Hash the password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Generate OTP
$otp = rand(100000, 999999); // Generate a random 6-digit OTP

// Insert the new user into the database, including the OTP
$stmt = $conn->prepare("INSERT INTO users (first_name, last_name, mobile_number, email, password_hash, role, otp, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
$role = 'dealer'; // Set default role as dealer
$stmt->bind_param('sssssss', $first_name, $last_name, $mobile_number, $email, $password_hash, $role, $otp);

if ($stmt->execute()) {
  // Get user's first name for personalization
  $firstName = htmlspecialchars($first_name);

  // Get the user ID of the newly registered user
  $user_id = $stmt->insert_id;

  // Insert user_id into the dealers table
  $stmt = $conn->prepare("INSERT INTO dealers (user_id) VALUES (?)");
  $stmt->bind_param('i', $user_id);

  if ($stmt->execute()) {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-color: #f8f9fa;
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
    </style>
  </head>
  <body>
    <div class="email-container">
      <h2 class="text-center">Welcome, ' . $firstName . '!</h2>
      <p class="text-center">Thank you for registering with Kenz Automotive. Your OTP code is below:</p>
      <div class="otp-code">' . $otp . '</div>
      <p class="text-center">Please enter this code to complete your registration.</p>
      <div class="footer">
        <p>If you did not request this, please ignore this email.</p>
      </div>
    </div>
  </body>
</html>
';

    // Send OTP via email using the reusable function
    if (sendEmail($email, $subject, $body)) {
      echo json_encode(['success' => true, 'message' => 'Registration successful! An OTP has been sent to your email.', 'redirect' => 'otp_verification.php']);
    } else {
      echo json_encode(['success' => false, 'message' => 'OTP could not be sent.']);
    }
  } else {
    echo json_encode(['success' => false, 'message' => 'Failed to store dealer information: ' . $stmt->error]);
  }
} else {
  echo json_encode(['success' => false, 'message' => 'Registration failed: ' . $stmt->error]);
}

// Close the statement and connection
$stmt->close();
$conn->close();
