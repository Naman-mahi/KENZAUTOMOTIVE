<?php
session_start();
include 'includes/db.php'; // Include your database connection
include 'EmailSender.php'; // Include the email sending functionality

// Check if user_id is set in the session
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
    exit();
}

$user_id = $_SESSION['user_id'];

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the POST data
    $product_category_id = $_POST['product_category_id'] ?? '';
    $company_name = $_POST['company_name'] ?? '';
    $contact_person = $_POST['contact_person'] ?? '';
    $phone_number = $_POST['phone_number'] ?? '';
    $email = $_POST['email'] ?? '';
    $address_line1 = $_POST['address_line1'] ?? '';
    $address_line2 = $_POST['address_line2'] ?? '';
    $city = $_POST['city'] ?? '';
    $state = $_POST['state'] ?? '';
    $postal_code = $_POST['postal_code'] ?? '';
    $country = $_POST['country'] ?? '';
    $pan_number = $_POST['pan_number'] ?? '';
    $gst_number = $_POST['gst_number'] ?? '';
    $document_upload = $_FILES['document_upload']['name'] ?? ''; // For file uploads

    // Validate inputs
    if (empty($product_category_id) || empty($company_name) || empty($contact_person) || empty($phone_number) || empty($email)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit();
    }

    // Prepare and execute the insert statement
    $stmt = $conn->prepare("INSERT INTO dealers (user_id, product_category_id, company_name, contact_person, phone_number, email, address_line1, address_line2, city, state, postal_code, country, pan_number, gst_number, document_upload, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param('issssssssssssss', $user_id, $product_category_id, $company_name, $contact_person, $phone_number, $email, $address_line1, $address_line2, $city, $state, $postal_code, $country, $pan_number, $gst_number, $document_upload);

    if ($stmt->execute()) {
        // Handle file upload
        if (!empty($_FILES['document_upload']['tmp_name'])) {
            move_uploaded_file($_FILES['document_upload']['tmp_name'], 'uploads/' . $document_upload);
        }

        // Prepare email content
        $subject = "Your Registration is Under Review";

        // Prepare HTML email body
        $body = '
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Under Review</title>
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
        <h2 class="text-center">Hello!</h2>
        <p class="text-center">Thank you for registering with Kenz Automotive. Your application is currently under review.</p>
        <p class="text-center">Once your details are verified, you will receive a notification on your email regarding the approval or rejection of your application.</p>
        <p class="text-center">If you have any questions, feel free to contact us.</p>
        <div class="footer">
            <p>Best regards,<br>Kenz Automotive Team</p>
        </div>
    </div>
</body>
</html>
';

        // Send the email (ensure you have a function or method to handle sending)
        if (sendEmail($user_email, $subject, $body)) {
            echo json_encode(['success' => true, 'message' => 'Registration successful! An email has been sent to notify you.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to send notification email.']);
        }

        // Destroy the session
        session_unset(); // Unset all session variables
        session_destroy(); // Destroy the session

        echo json_encode(['success' => true, 'message' => 'Business details registered successfully! You will be redirected to the homepage.', 'redirect' => 'index.php']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to store business details: ' . $stmt->error]);
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
