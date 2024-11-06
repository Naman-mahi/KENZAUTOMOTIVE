<?php
session_start();
include '../../includes/db.php';

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];
$sql = "SELECT `wallet_id`, `user_id`, `balance`, `created_at` FROM `wallets` WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$balance = $row['balance'];
$wallet_id = $row['wallet_id'];

if ($balance < 20) {
    echo json_encode(['success' => false, 'message' => 'Insufficient balance']);
    exit;
}

$sql = "UPDATE wallets SET balance = balance - 20 WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);

$sql = "INSERT INTO wallet_transactions (wallet_id, user_id, amount, transaction_type, created_at) VALUES ($wallet_id, $user_id, -20, 'Feature Product', NOW())";
$result = mysqli_query($conn, $sql);


$sql = "UPDATE products SET is_featured = 1 WHERE product_id = $product_id";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo json_encode(['success' => true, 'message' => 'Product featured successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to feature product: ' . mysqli_error($conn)]);
}
?>