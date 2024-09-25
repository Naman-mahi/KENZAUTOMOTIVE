<?php
session_start();
include 'db_connection.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve product details
    $productName = $_POST['product_name'];
    $price = $_POST['price'];
    $description = $_POST['product_description'];
    $topFeatures = $_POST['top_features'];
    $standOutFeatures = $_POST['stand_out_features'];
    $specificationLabels = $_POST['specification_labels'];
    $specificationValues = $_POST['specification_values'];

    // Assuming you have a dealers table with user_id
    $userId = $_SESSION['user_id'];
    $categoryId = 1; // Replace with actual category ID if available

    // Insert product details into the products table
    $stmt = $conn->prepare("INSERT INTO products (name, price, description, top_features, stand_out_features, category_id, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sdssssi", $productName, $price, $description, $topFeatures, $standOutFeatures, $categoryId, $userId);
    if ($stmt->execute()) {
        $productId = $stmt->insert_id; // Get the last inserted product ID

        // Insert specifications
        $specStmt = $conn->prepare("INSERT INTO product_specifications (product_id, label, value) VALUES (?, ?, ?)");
        foreach ($specificationLabels as $index => $label) {
            $value = $specificationValues[$index];
            $specStmt->bind_param("iss", $productId, $label, $value);
            $specStmt->execute();
        }
        $specStmt->close();

        // Handle image uploads
        if (isset($_FILES['images'])) {
            $imageDir = 'uploads/products/' . $productId . '/';
            mkdir($imageDir, 0777, true); // Create product-specific directory

            foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
                $fileName = basename($_FILES['images']['name'][$key]);
                $targetFilePath = $imageDir . $fileName;

                // Move the uploaded file
                if (move_uploaded_file($tmpName, $targetFilePath)) {
                    // Insert image info into the database if needed
                    $imgStmt = $conn->prepare("INSERT INTO product_images (product_id, image_path) VALUES (?, ?)");
                    $imgStmt->bind_param("is", $productId, $targetFilePath);
                    $imgStmt->execute();
                    $imgStmt->close();
                }
            }
        }

        // Redirect or show success message
        header("Location: success.php"); // Replace with your success page
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // If the request is not POST, redirect to the form
    header("Location: AddProduct.php");
    exit;
}
?>
   