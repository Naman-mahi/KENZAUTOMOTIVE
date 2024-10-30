<?php
include '../../includes/db.php'; // Include your database connection file

// Specify the directory for uploads
$uploadDir = '../uploads/Banners/';
$errors = [];

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read input from the request
    $bannerId = $_POST['banner_id'] ?? '';
    $title = $_POST['title'] ?? '';
    $link = $_POST['link'] ?? '';
    $status = $_POST['status'] ?? '';

    // Validate input
    if (empty($title)) {
        $errors[] = 'Title is required.';
    }
    if (empty($link)) {
        $errors[] = 'Link is required.';
    }
    if (empty($status)) {
        $errors[] = 'Status is required.';
    }

    // Handle image upload if provided
    $imagePath = '';
    if (!empty($_FILES['image']['name'])) {
        $imageName = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageSize = $_FILES['image']['size'];
        $imageError = $_FILES['image']['error'];

        // Validate image
        $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        $imageType = mime_content_type($imageTmp);

        if (!in_array($imageType, $allowedTypes)) {
            $errors[] = 'Invalid image type. Allowed types are JPEG, JPG, PNG and GIF.';
        }

        // Check file size (2MB limit)
        if ($imageSize > 2000000) {
            $errors[] = 'File is too large. Maximum size is 2MB.';
        }

        if (empty($errors)) {
            $imageName = uniqid() . '-' . basename($imageName);
            $imagePath = $uploadDir . $imageName;

            // Move the uploaded file
            if (!move_uploaded_file($imageTmp, $imagePath)) {
                $errors[] = 'Failed to upload image.';
            }
        }
    }

    // Check for errors
    if (!empty($errors)) {
        echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
        exit;
    }

    // Prepare the SQL statement
    if ($imagePath) {
        $sql = "UPDATE banners SET title = ?, link = ?, status = ?, image = ?, updated_at = NOW() WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssi', $title, $link, $status, $imageName, $bannerId);
    } else {
        $sql = "UPDATE banners SET title = ?, link = ?, status = ?, updated_at = NOW() WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssi', $title, $link, $status, $bannerId);
    }

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Banner updated successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error updating banner. Please try again.']);
    }

    $stmt->close();
}

$conn->close();
