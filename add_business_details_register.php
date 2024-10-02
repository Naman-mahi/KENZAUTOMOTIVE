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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the POST data
    $product_category_id = 4; // This can be dynamic based on your application logic
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

    // Validate inputs
    if (
        empty($product_category_id) || empty($company_name) || empty($contact_person) ||
        empty($phone_number) || empty($email) || empty($address_line1) ||
        empty($city) || empty($state) || empty($postal_code) ||
        empty($country) || empty($pan_number)
    ) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit();
    }

    // Check for file uploads
    if (isset($_FILES['document_upload']) && count($_FILES['document_upload']['name']) > 0) {
        // Array to hold file names
        $uploaded_files = [];
        $target_dir = 'uploads/';

        // Loop through each file in the uploaded array
        foreach ($_FILES['document_upload']['name'] as $key => $name) {
            // Check if any file was selected
            if ($_FILES['document_upload']['error'][$key] === UPLOAD_ERR_NO_FILE) {
                continue; // Skip this iteration if no file was uploaded for this input
            }

            // Handle other upload errors
            if ($_FILES['document_upload']['error'][$key] !== UPLOAD_ERR_OK) {
                $error_code = $_FILES['document_upload']['error'][$key];
                $error_message = 'Unknown error occurred.';
                switch ($error_code) {
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:
                        $error_message = 'File exceeds the maximum allowed size.';
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        $error_message = 'File was only partially uploaded.';
                        break;
                    case UPLOAD_ERR_NO_TMP_DIR:
                        $error_message = 'Missing a temporary folder.';
                        break;
                    case UPLOAD_ERR_CANT_WRITE:
                        $error_message = 'Failed to write file to disk.';
                        break;
                    case UPLOAD_ERR_EXTENSION:
                        $error_message = 'File upload stopped by extension.';
                        break;
                }
                echo json_encode(['success' => false, 'message' => 'Upload error for file ' . $name . ': ' . $error_message]);
                exit();
            }

            // Generate a unique filename
            $randomString = bin2hex(random_bytes(5));
            $timestamp = date('Ymd_His');
            $fileType = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $newFileName = "{$randomString}_{$timestamp}.{$fileType}";

            $target_file = $target_dir . $newFileName;

            // Check file type
            if (in_array($fileType, ['jpg', 'jpeg', 'png', 'pdf'])) {
                // Move uploaded file to target directory
                if (move_uploaded_file($_FILES['document_upload']['tmp_name'][$key], $target_file)) {
                    $uploaded_files[] = $newFileName; // Add new file name to the array
                } else {
                    echo json_encode(['success' => false, 'message' => 'Error moving file: ' . $name]);
                    exit();
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Only JPG, JPEG, PNG & PDF files are allowed.']);
                exit();
            }
        }

        // Join file names with a comma
        $document_upload = implode(',', $uploaded_files);
    } else {
        $document_upload = ''; // No files uploaded
    }

    // Prepare and execute the update statement
    $stmt = $conn->prepare("UPDATE dealers SET 
        product_category_id = ?, 
        company_name = ?, 
        contact_person = ?, 
        phone_number = ?, 
        email = ?, 
        address_line1 = ?, 
        address_line2 = ?, 
        city = ?, 
        state = ?, 
        postal_code = ?, 
        country = ?, 
        pan_number = ?, 
        gst_number = ?, 
        document_upload = ? 
        WHERE user_id = ?");

    // Bind parameters (14 variables to match 14 placeholders)
    $stmt->bind_param(
        'issssssssssssss',
        $product_category_id,
        $company_name,
        $contact_person,
        $phone_number,
        $email,
        $address_line1,
        $address_line2,
        $city,
        $state,
        $postal_code,
        $country,
        $pan_number,
        $gst_number,
        $document_upload,
        $user_id
    );

    if ($stmt->execute()) {
        // Prepare email content
        $subject = "Your Registration Update is Under Review";

        // Prepare HTML email body
        $body = '
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Registration Update Under Review</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body { background-color: #f8f9fa; }
                .email-container { max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #dee2e6; border-radius: 0.5rem; background-color: #ffffff; }
                .footer { text-align: center; margin-top: 20px; font-size: 0.9rem; color: #6c757d; }
            </style>
        </head>
        <body>
            <div class="email-container">
                <h2 class="text-center">Hello!</h2>
                <p class="text-center">Thank you for updating your registration with Kenz Automotive. Your application is currently under review.</p>
                <p class="text-center">Once your details are verified, you will receive a notification on your email regarding the approval or rejection of your application.</p>
                <p class="text-center">If you have any questions, feel free to contact us.</p>
                <div class="footer">
                    <p>Best regards,<br>Kenz Automotive Team</p>
                </div>
            </div>
        </body>
        </html>
        ';

        // Send the email
        if (sendEmail($email, $subject, $body)) {
            echo json_encode(['success' => true, 'message' => 'Update successful! An email has been sent to notify you.', 'redirect' => 'index.php']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to send notification email.']);
        }

        // Destroy the session
        session_unset();
        session_destroy();
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update business details: ' . $stmt->error]);
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
