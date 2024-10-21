<?php
session_start(); // Ensure session is started
include '../../includes/db.php'; // Include your database connection

// Ensure the request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die(json_encode(['success' => false, 'message' => 'Invalid request method.']));
}

// Check if category_id is set
if (isset($_POST['category_id'])) {
    $category_id = intval($_POST['category_id']);
} else {
    die(json_encode(['success' => false, 'message' => 'Category ID is required.']));
}

// Retrieve and sanitize form data
$product_name = trim($_POST['product_name']);
$price = floatval($_POST['price']);
$color = trim($_POST['color']);
$product_condition = $_POST['new_or_old'];
$product_description = trim($_POST['product_description']);
$top_features = trim($_POST['top_features']);
$stand_out_features = trim($_POST['stand_out_features']);
$dealer_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : die(json_encode(['success' => false, 'message' => 'User not logged in.']));

// Log for debugging
error_log("dealer_id: $dealer_id, category_id: $category_id, product_name: $product_name, product_description: $product_description, price: $price, color: $color, product_condition: $product_condition, top_features: $top_features, stand_out_features: $stand_out_features");

// Prepare SQL to insert product data
$stmt = $conn->prepare("INSERT INTO products (dealer_id, category_id, product_name, product_description, price, color, product_condition, top_features, stand_out_features, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");

if ($stmt === false) {
    die(json_encode(['success' => false, 'message' => 'Failed to prepare SQL statement.']));
}

// Bind parameters
$stmt->bind_param("iissdssss", $dealer_id, $category_id, $product_name, $product_description, $price, $color, $product_condition, $top_features, $stand_out_features);

// Execute the statement
if ($stmt->execute()) {
    $product_id = $stmt->insert_id;

    // Handle image uploads
    $uploaded_images = $_FILES['imagesthumbnail'];
    $upload_dir = '../uploads/ProductThumbnail/';
    $uploaded_file_names = [];

    foreach ($uploaded_images['tmp_name'] as $key => $tmp_name) {
        $date_time = date('YmdHis');
        $file_extension = pathinfo($uploaded_images['name'][$key], PATHINFO_EXTENSION);
        $file_name = 'product_' . $date_time . '_' . uniqid() . '.' . $file_extension;
        $file_path = $upload_dir . $file_name;

        // Check for valid image types and size limits
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($uploaded_images['type'][$key], $allowed_types) && $uploaded_images['size'][$key] <= 2000000) { // Limit size to 2MB
            if (move_uploaded_file($tmp_name, $file_path)) {
                $uploaded_file_names[] = $file_name;
            }
        }
    }

    // Update the product with the first image as the main image
    if (!empty($uploaded_file_names)) {
        $main_image = $uploaded_file_names[0];
        $stmt = $conn->prepare("UPDATE products SET product_image = ? WHERE product_id = ?");
        $stmt->bind_param("si", $main_image, $product_id);
        $stmt->execute();
    }

    // Return a success response
    echo json_encode(['success' => true, 'message' => 'Product added successfully', 'product_id' => $product_id]);
} else {
    // Return an error response
    echo json_encode(['success' => false, 'message' => 'Failed to add product: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
