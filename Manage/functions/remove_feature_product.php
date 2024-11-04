<?php
include '../../includes/db.php';

$product_id = $_POST['product_id'];

$sql = "UPDATE products SET is_featured = 0 WHERE product_id = $product_id";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo json_encode(['success' => true, 'message' => 'Product removed from featured successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to remove product from featured: ' . mysqli_error($conn)]);
}
?>