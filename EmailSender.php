<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Function to send email
function sendEmail($recipientEmail, $subject, $body) {
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'mail.kenzwheels.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mails@kenzwheels.com';
        $mail->Password = 'Qyt7SCaCpVArH4hyGksJ';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('mails@kenzwheels.com', 'Kenz Wheels');
        $mail->addAddress($recipientEmail);
        $mail->addReplyTo('no-reply@kenzwheels.com', 'No Reply');

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
