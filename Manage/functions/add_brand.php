<?php
include '../../includes/db.php'; // Ensure you include your database connection

// Start JSON output
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandName = $_POST['brand_name'];
    $categoryId = $_POST['category_id'];
    $createdDate = date('Y-m-d');

    // Handle logo upload
    if (isset($_FILES['brand_logo']) && $_FILES['brand_logo']['error'] == UPLOAD_ERR_OK) {
        $logoTmpName = $_FILES['brand_logo']['tmp_name'];
        $logoName = basename($_FILES['brand_logo']['name']);
        $uploadDir = '../uploads/BrandLogo/';
        $fileName = uniqid() . '-' . $logoName;
        $logoPath = $uploadDir . $fileName; // Unique filename

        if (move_uploaded_file($logoTmpName, $logoPath)) {
            // Insert brand into the database
            $sql = "INSERT INTO Brands (brand_name, brand_logo, category_id, created_date) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssis", $brandName, $fileName, $categoryId, $createdDate);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to insert brand.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to upload logo.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Logo upload error.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
