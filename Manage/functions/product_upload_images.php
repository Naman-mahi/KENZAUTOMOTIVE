<?php
include '../../includes/db.php'; // Include your database connection

// Check if the product_id and file are set
if (!isset($_POST['product_id']) || !isset($_FILES['file'])) {
    echo json_encode(['status' => 'error', 'message' => 'Missing product ID or file.']);
    exit;
}

$product_id = intval($_POST['product_id']);
$upload_dir = '../uploads/ProductImages/'; // Ensure this directory exists and is writable
$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
$response = [];

foreach ($_FILES['file']['name'] as $key => $name) {     
    $file_tmp = $_FILES['file']['tmp_name'][$key];
    $file_error = $_FILES['file']['error'][$key];
    
    // Check for upload errors
    if ($file_error !== UPLOAD_ERR_OK) {
        echo json_encode(['status' => 'error', 'message' => 'Error uploading file.']);
        continue;
    }

    // Validate the file type
    $file_ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    if (!in_array($file_ext, $allowed_extensions)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid file type: ' . htmlspecialchars($file_ext)]);
        continue;
    }

    // Create a unique file name and move the uploaded file
    $file_name = uniqid('', true) . '.' . $file_ext;
    $file_path = $upload_dir . $file_name;

    if (move_uploaded_file($file_tmp, $file_path)) {
        // Save the file path in the database
        $sql = "INSERT INTO product_images (product_id, image_path) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $product_id, $file_path);

        if ($stmt->execute()) {
            $response[] = ['status' => 'success', 'file_name' => $file_name, 'file_path' => $file_path];
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $stmt->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file.']);
    }
}

echo json_encode(['status' => 'success', 'uploaded_files' => $response]);
?>
