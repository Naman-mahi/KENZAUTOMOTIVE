<?php
include '../../includes/db.php';

$product_id = $_POST['product_id'];

$sql = "UPDATE products SET is_featured = 1 WHERE product_id = $product_id";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo json_encode(['success' => true, 'message' => 'Product featured successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to feature product: ' . mysqli_error($conn)]);
}
?>