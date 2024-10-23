<?php
include '../../includes/db.php'; // Include your database connection file

// Specify the directory for uploads
$uploadDir = '../uploads/advertisements/';
$errors = [];

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read input from the request
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $link = $_POST['link'] ?? '';
    $start_date = $_POST['start_date'] ?? '';
    $end_date = $_POST['end_date'] ?? '';

    // Validate input
    if (empty($title)) {
        $errors[] = 'Title is required.';
    }
    if (empty($description)) {
        $errors[] = 'Description is required.';
    }
    if (empty($_FILES['image']['name'])) {
        $errors[] = 'Image is required.';
    }
    if (empty($link)) {
        $errors[] = 'Link is required.';
    }
    if (empty($start_date)) {
        $errors[] = 'Start date is required.';
    }
    if (empty($end_date)) {
        $errors[] = 'End date is required.';
    }
    if (strtotime($start_date) >= strtotime($end_date)) {
        $errors[] = 'End date must be after start date.';
    }

    // Handle image upload
    $imageName = $_FILES['image']['name'];
    $imageTmp = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];

    // Validate image
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/svg+xml', 'image/webp']; // Allow images only jpg png gif jpeg svg webp
    $imageType = mime_content_type($imageTmp);

    if (!in_array($imageType, $allowedTypes)) {
        $errors[] = 'Invalid image type. Allowed types are JPEG, JPG, PNG, GIF, SVG, and WebP.';
    }

    // Check for errors
    if (!empty($errors)) {
        echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
        exit;
    }

    $imageName = uniqid() . '-' . basename($imageName);
    // Generate a unique name for the image
    $imagePath = $uploadDir . $imageName;

    // Move the uploaded file to the designated folder
    if (!move_uploaded_file($imageTmp, $imagePath)) {
        echo json_encode(['success' => false, 'message' => 'Failed to upload image.']);
        exit;
    }
   
    // Prepare the SQL statement to prevent SQL injection
    $sql = "INSERT INTO advertisements (title, description, image, link, start_datetime, end_datetime) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssss', $title, $description, $imageName, $link, $start_date, $end_date);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Advertisement added successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error adding advertisement. Please try again.']);
    }

    $stmt->close();
}
$conn->close();
?>
