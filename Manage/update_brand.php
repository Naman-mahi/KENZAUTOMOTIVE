<?php
include '../includes/db.php'; // Include your database connection

// Start JSON output
header('Content-Type: application/json');

// Handle file upload
$uploadDir = 'uploads/BrandLogo/';
$brandLogo = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brand_id = $_POST['brand_id'] ?? null;
    $brand_name = $_POST['brand_name'] ?? null;
    $category_id = $_POST['category_id'] ?? null;

    // Validate inputs
    if (empty($brand_id) || empty($brand_name) || empty($category_id)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit;
    }

    // Check if a new file was uploaded
    if (isset($_FILES['brand_logo']) && $_FILES['brand_logo']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['brand_logo']['tmp_name'];
        $fileName = $_FILES['brand_logo']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Define allowed file extensions
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExtension, $allowedExtensions)) {
            // Create unique file name
            $fileName = uniqid() . '-' . preg_replace('/[^a-zA-Z0-9-_\.]/', '', $fileName);
            $destPath = $uploadDir . $fileName;

            // Move the file to the designated folder
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $brandLogo = $fileName;
            } else {
                echo json_encode(['success' => false, 'message' => 'Error moving the uploaded file.']);
                exit;
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid file type.']);
            exit;
        }
    }

    // Prepare the SQL update statement
    $sql = "UPDATE Brands SET brand_name = ?, category_id = ?" . ($brandLogo ? ", brand_logo = ?" : "") . " WHERE brand_id = ?";
    $stmt = $conn->prepare($sql);

    if ($brandLogo) {
        $stmt->bind_param("sisi", $brand_name, $category_id, $brandLogo, $brand_id);
    } else {
        $stmt->bind_param("sii", $brand_name, $category_id, $brand_id);
    }

    // Execute the statement and return response
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update brand.']);
    }

    $stmt->close();
}
$conn->close();
