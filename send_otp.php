<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

    // Generate a random OTP
    $otp = rand(100000, 999999);
    $_SESSION['otp'] = $otp;

    // Create an instance of PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'mail.kenzwheels.com'; // Updated SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'mails@kenzwheels.com'; // Your email address
        $mail->Password = 'Qyt7SCaCpVArH4hyGksJ'; // Your email password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('mails@kenzwheels.com', 'Kenz Wheels'); // Updated sender address
        $mail->addAddress($email);
        $mail->addReplyTo('no-reply@kenzwheels.com', 'No Reply'); // Set reply-to address

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body = "Your OTP code is: $otp. Please enter this code to verify your email.";

        // Send the email
        $mail->send();
        echo json_encode(['success' => true, 'message' => 'OTP sent successfully.']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Failed to send OTP: ' . $mail->ErrorInfo]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
