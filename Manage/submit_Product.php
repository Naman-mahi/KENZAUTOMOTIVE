<?php
session_start();
include '../includes/db.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve product details
    $productName = $_POST['product_name'];
    $price = $_POST['price'];
    $description = $_POST['product_description'];
    $topFeatures = $_POST['top_features'];
    $standOutFeatures = $_POST['stand_out_features'];
    $specificationLabels = $_POST['id'];
    $specificationValues = $_POST['specification_values'];

    // Assuming you have a dealers table with user_id
    $userId = $_SESSION['user_id'];
    $categoryId = 1; // Replace with actual category ID if available

    // Insert product details into the products table
    $stmt = $conn->prepare("INSERT INTO products (product_name, price, product_description, top_features, stand_out_features, category_id, dealer_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sdssssi", $productName, $price, $description, $topFeatures, $standOutFeatures, $categoryId, $userId);

    if ($stmt->execute()) {
        $productId = $stmt->insert_id; // Get the last inserted product ID

        // Insert specifications
        $specStmt = $conn->prepare("INSERT INTO product_attributes_value (product_id, attribute_id, value) VALUES (?, ?, ?)");
        foreach ($specificationLabels as $index => $label) {
            $value = $specificationValues[$index];
            $specStmt->bind_param("iss", $productId, $label, $value);
            $specStmt->execute();
        }
        $specStmt->close();

      // Handle image uploads
if (isset($_FILES['images'])) {
    $imageDir = 'uploads/products/';
    mkdir($imageDir, 0777, true); // Create product-specific directory

    foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
        $fileName = basename($_FILES['images']['name'][$key]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Validate file type
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array(strtolower($fileType), $allowedTypes)) {
            // Generate a random number and the current timestamp
            $randomNumber = rand(100000, 999999); // Random number between 100000 and 999999
            $timestamp = date('Ymd_His'); // Current date and time
            $newFileName = $randomNumber . '_' . $timestamp . '.' . $fileType;
            $targetFilePath = $imageDir . $newFileName;

            // Move the uploaded file
            if (move_uploaded_file($tmpName, $targetFilePath)) {
                // Insert only the file name into the database
                $imgStmt = $conn->prepare("INSERT INTO product_images (product_id, image_url) VALUES (?, ?)");
                $imgStmt->bind_param("is", $productId, $newFileName); // Store only the file name
                if (!$imgStmt->execute()) {
                    // Handle database insert error
                    echo "Error inserting image: " . $imgStmt->error;
                }
                $imgStmt->close();
            } else {
                // Handle upload error
                echo "Error moving uploaded file: " . $_FILES['images']['error'][$key];
            }
        } else {
            echo "Invalid file type for file: $fileName";
        }
    }
}


        // Insert custom attributes (if you have a form for them)
        if (!empty($_POST['custom_attribute_names']) && !empty($_POST['custom_attribute_values'])) {
            $customAttrStmt = $conn->prepare("INSERT INTO product_custom_attributes (product_id, attribute_name, attribute_value) VALUES (?, ?, ?)");
            foreach ($_POST['custom_attribute_names'] as $index => $attrName) {
                $attrValue = $_POST['custom_attribute_values'][$index];
                $customAttrStmt->bind_param("iss", $productId, $attrName, $attrValue);
                $customAttrStmt->execute();
            }
            $customAttrStmt->close();
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
