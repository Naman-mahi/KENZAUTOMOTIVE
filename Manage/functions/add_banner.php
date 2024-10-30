<?php
include '../../includes/db.php'; // Ensure to include your database connection

// Specify upload directory
$uploadDir = '../uploads/Banners/';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if required fields are present
    if (!isset($_POST['title']) || empty($_POST['title'])) {
        $errors[] = 'Title is required.';
    }
    if (!isset($_POST['link']) || empty($_POST['link'])) {
        $errors[] = 'Link is required.';
    }
    if (!isset($_POST['status']) || empty($_POST['status'])) {
        $errors[] = 'Status is required.';
    }
    if (!isset($_FILES['image']) || empty($_FILES['image']['name'])) {
        $errors[] = 'Image is required.';
    }

    // Only proceed if required fields are present
    if (empty($errors)) {
        $title = $_POST['title'];
        $link = $_POST['link'];
        $status = $_POST['status'];
        
        // Handle image upload
        $imageName = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageSize = $_FILES['image']['size'];
        
        // Validate image
        $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        $imageType = mime_content_type($imageTmp);

        if (!in_array($imageType, $allowedTypes)) {
            $errors[] = 'Invalid image type. Allowed types are JPEG, JPG, PNG, and GIF.';
        }

        // Check file size (2MB limit)
        if ($imageSize > 2000000) {
            $errors[] = 'File is too large. Maximum size is 2MB.';
        }

        if (empty($errors)) {
            // Generate a unique image name with date and time
            $dateTime = date('Ymd_His'); // Format: YYYYMMDD_HHMMSS
            $imageName = $dateTime . '-' . uniqid() . '.' . pathinfo($imageName, PATHINFO_EXTENSION);
            $imagePath = $uploadDir . $imageName;

            // Move uploaded file
            if (!move_uploaded_file($imageTmp, $imagePath)) {
                $errors[] = 'Failed to upload image.';
            }
        }

        // If no errors, insert into database
        if (empty($errors)) {
            $stmt = $conn->prepare("INSERT INTO banners (title, image, link, status, created_at) VALUES (?, ?, ?, ?, NOW())");
            $stmt->bind_param("ssss", $title, $imageName, $link, $status);

            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'Banner added successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to add banner.']);
            }

            $stmt->close();
        }
    }
    
    // Output any errors
    if (!empty($errors)) {
        echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}

$conn->close();
