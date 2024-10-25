<?php

// Include database connection
require_once '../../includes/db.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $productId = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
    $categoryId = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;

    // Get specifications from POST data
    $specifications = isset($_POST['specifications']) ? $_POST['specifications'] : [];
    $newSpecLabels = isset($_POST['new_specification_labels']) ? $_POST['new_specification_labels'] : [];
    $newSpecValues = isset($_POST['new_specification_values']) ? $_POST['new_specification_values'] : [];

    $response = ['status' => 'error', 'message' => 'An error occurred'];

    if ($productId && $categoryId) {
        $conn->begin_transaction();

        try {
            // Update existing specifications
            foreach ($specifications as $key => $value) {
                if (is_numeric($key)) {
                    // Standard attribute
                    $checkSql = "SELECT COUNT(*) as count FROM product_attributes_value 
                                WHERE product_id = ? AND attribute_id = ?";
                    $checkStmt = $conn->prepare($checkSql);
                    $checkStmt->bind_param("ii", $productId, $key);
                    $checkStmt->execute();
                    $result = $checkStmt->get_result();
                    $row = $result->fetch_assoc();
                    $checkStmt->close();

                    if ($row['count'] > 0) {
                        // Update existing attribute
                        $sql = "UPDATE product_attributes_value 
                                SET value = ? 
                                WHERE product_id = ? AND attribute_id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("sii", $value, $productId, $key);
                    } else {
                        // Insert new attribute
                        $sql = "INSERT INTO product_attributes_value (product_id, attribute_id, value) 
                                VALUES (?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("iis", $productId, $key, $value);
                    }
                    $stmt->execute();
                    $stmt->close();
                } else {
                    // Custom attribute (non-numeric key means it's a custom spec)
                    $sql = "UPDATE product_custom_attributes 
                            SET attribute_value = ? 
                            WHERE product_id = ? AND attribute_name = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sis", $value, $productId, $key);
                    $stmt->execute();
                    $stmt->close();
                }
            }

            // Insert new specifications
            if (!empty($newSpecLabels) && !empty($newSpecValues)) {
                $sql = "INSERT INTO product_custom_attributes (product_id, attribute_name, attribute_value) 
                        VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);

                for ($i = 0; $i < count($newSpecLabels); $i++) {
                    if (!empty($newSpecLabels[$i]) && !empty($newSpecValues[$i])) {
                        $stmt->bind_param("iss", $productId, $newSpecLabels[$i], $newSpecValues[$i]);
                        $stmt->execute();
                    }
                }
                $stmt->close();
            }

            $conn->commit();
            $response = ['status' => 'success', 'message' => 'Specifications updated successfully'];
        } catch (Exception $e) {
            $conn->rollback();
            $response = ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// If not a POST request, return an error
header('HTTP/1.1 405 Method Not Allowed');
echo "Method Not Allowed";
