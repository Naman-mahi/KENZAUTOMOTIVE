<?php
include '../../includes/db.php'; // Include your database connection

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the product ID from the POST request
    $product_id = intval($_POST['product_id']);

    // Get the other form fields
    $product_name = $_POST['product_name'];
    $price = floatval($_POST['price']);
    $color = $_POST['color'];
    $product_description = $_POST['product_description'];
    $top_features = $_POST['top_features'];
    $stand_out_features = $_POST['stand_out_features'];
    $brand = isset($_POST['brand']) ? $_POST['brand'] : '';
    // Handle file upload
    $product_image = null;
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/ProductThumbnail/'; // Define the upload directory
        $uploadFile = $uploadDir . basename($_FILES['product_image']['name']);

        // Move uploaded file to the desired directory
        if (move_uploaded_file($_FILES['product_image']['tmp_name'], $uploadFile)) {
            $product_image = basename($_FILES['product_image']['name']); // Store only the filename
        }
    }

    // Prepare the SQL update statement
    $sql_update = "UPDATE products SET product_name = ?, price = ?, color = ?, product_description = ?, top_features = ?, stand_out_features = ?, brand_id = ? ";

    // If a new image is uploaded, add it to the query
    if ($product_image) {
        $sql_update .= ", product_image = ?";
    }
    $sql_update .= " WHERE product_id = ?";

    // Prepare the statement
    $stmt_update = $conn->prepare($sql_update);

    // Bind parameters
    if ($product_image) {
        $stmt_update->bind_param("ssisssssi", $product_name, $price, $color, $product_description, $top_features, $stand_out_features, $product_image, $brand, $product_id);
    } else {
        $stmt_update->bind_param("ssissssi", $product_name, $price, $color, $product_description, $top_features, $stand_out_features, $brand, $product_id);
    }

    // Execute the update
    if ($stmt_update->execute()) {
        $response = [
            'status' => 'success',
            'message' => 'Product updated successfully.'
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Failed to update product: ' . $stmt_update->error
        ];
    }

    // Close the statement
    $stmt_update->close();

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

// If the request method is not POST, return an error
$response = [
    'status' => 'error',
    'message' => 'Invalid request method. Only POST requests are allowed.'
];

header('Content-Type: application/json');
echo json_encode($response);
exit();
