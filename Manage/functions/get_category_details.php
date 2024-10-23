<?php
include '../../includes/db.php'; // Ensure to include your database connection

if (isset($_GET['id'])) {
    $categoryId = intval($_GET['id']);
    
    // Fetch category details
    $categoryQuery = "SELECT category_name, created_at FROM categories WHERE category_id = ?";
    $stmt = $conn->prepare($categoryQuery);
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    $categoryResult = $stmt->get_result();
    
    $category = $categoryResult->fetch_assoc();

    // Fetch product attributes associated with the category
    $attributesQuery = "SELECT pf_name FROM product_attributes WHERE category_id = ?";
    $stmt = $conn->prepare($attributesQuery);
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    $attributesResult = $stmt->get_result();

    $attributes = [];
    while ($attr = $attributesResult->fetch_assoc()) {
        $attributes[] = $attr['pf_name'];
    }

    // Fetch custom attributes for products in the category
    $customAttributesQuery = "
        SELECT p.product_name, p.product_id, ca.attribute_name
        FROM products p
        JOIN product_custom_attributes ca ON p.product_id = ca.product_id
        WHERE p.category_id = ?";
    
    $stmt = $conn->prepare($customAttributesQuery);
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    $customAttributesResult = $stmt->get_result();

    $customAttributes = [];
    while ($customAttr = $customAttributesResult->fetch_assoc()) {
        $customAttributes[] = [
            'product_name' => $customAttr['product_name'],
            'attribute_name' => $customAttr['attribute_name'],
            'product_id' => $customAttr['product_id']
        ];
    }

    // Prepare response
    $response = [
        'category' => $category,
        'attributes' => $attributes,
        'custom_attributes' => $customAttributes // Add custom attributes to the response
    ];
    
    // Set the content type to application/json
    header('Content-Type: application/json');
    echo json_encode($response);
    exit; // Important to stop further execution
} else {
    // Optionally return an error if 'id' is not set
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Invalid request']);
    exit;
}
?>
