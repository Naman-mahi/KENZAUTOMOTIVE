<?php
include '../../includes/db.php'; // Include your database connection

// Check if the product_id and file are set
if (!isset($_POST['product_id']) || !isset($_FILES['file'])) {
    echo json_encode(['status' => 'error', 'message' => 'Missing product ID or file.']);
    exit;
}

$product_id = intval($_POST['product_id']);
if ($product_id <= 0) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid product ID.']);
    exit;
}

$upload_dir = '../uploads/ProductImages/'; // Ensure this directory exists and is writable
$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
$response = [];

// Ensure the upload directory exists
if (!is_dir($upload_dir) || !is_writable($upload_dir)) {
    echo json_encode(['status' => 'error', 'message' => 'Upload directory is not writable.']);
    exit;
}

// Handle single file input as an array
if (!is_array($_FILES['file']['name'])) {
    $_FILES['file'] = [
        'name' => [$_FILES['file']['name']],
        'type' => [$_FILES['file']['type']],
        'tmp_name' => [$_FILES['file']['tmp_name']],
        'error' => [$_FILES['file']['error']],
        'size' => [$_FILES['file']['size']]
    ];
}

foreach ($_FILES['file']['name'] as $key => $name) {
    $file_tmp = $_FILES['file']['tmp_name'][$key];
    $file_error = $_FILES['file']['error'][$key];

    // Check for upload errors
    if ($file_error !== UPLOAD_ERR_OK) {
        $response[] = ['status' => 'error', 'message' => 'Error uploading file: ' . $file_error];
        continue;
    }

    // Validate the file type
    $file_ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    if (!in_array($file_ext, $allowed_extensions)) {
        $response[] = ['status' => 'error', 'message' => 'Invalid file type: ' . htmlspecialchars($file_ext)];
        continue;
    }

    // Create a unique file name and move the uploaded file
    $file_name = uniqid('', true) . '.' . $file_ext;

    if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
        // Save the file path in the database
        $sql = "INSERT INTO product_images (product_id, image_url) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $product_id, $file_name);

        if ($stmt->execute()) {
            $response[] = ['status' => 'success', 'file_name' => $file_name, 'file_path' => $upload_dir . $file_name];
        } else {
            $response[] = ['status' => 'error', 'message' => 'Database error: ' . $stmt->error];
        }
        $stmt->close();
    } else {
        $response[] = ['status' => 'error', 'message' => 'Failed to move uploaded file.'];
    }
}

echo json_encode(['status' => 'success', 'uploaded_files' => $response]);
?>
