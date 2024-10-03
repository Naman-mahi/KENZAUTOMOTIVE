<?php
include '../includes/db.php'; // Ensure to include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category_id'], $_POST['attribute_name'])) {
    $categoryId = intval($_POST['category_id']);
    $attributeName = trim($_POST['attribute_name']);

    // Insert the new custom attribute into the product_attributes table
    $insertQuery = "INSERT INTO product_attributes (category_id, pf_name, pf_created_date, pf_updated_date) VALUES (?, ?, NOW(), NOW())";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("is", $categoryId, $attributeName);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Custom attribute added successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error adding custom attribute.']);
    }
    $stmt->close();
} else {
    // Handle invalid requests
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Invalid request']);
}
?>
