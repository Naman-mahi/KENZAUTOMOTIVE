<?php
session_start();
include '../../includes/db.php';

$product_id = $_POST['product_id'];
$user_id = $_SESSION['user_id'];

// First check wallet balance
$sql = "SELECT `wallet_id`, `user_id`, `balance`, `created_at` FROM `wallets` WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$balance = $row['balance'];
$wallet_id = $row['wallet_id'];
if ($balance < 200) {
    echo json_encode(['success' => false, 'message' => 'Insufficient balance']);
    exit;
}

$sql = "UPDATE wallets SET balance = balance - 200 WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);

$sql = "INSERT INTO wallet_transactions (wallet_id, user_id, amount, transaction_type, created_at) VALUES ($wallet_id, $user_id, -200, 'Inspection Request', NOW())";
$result = mysqli_query($conn, $sql);

$sql = "UPDATE products SET inspection_request = 1 WHERE product_id = $product_id";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo json_encode(['success' => true, 'message' => 'Inspection request submitted successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to submit inspection request: ' . mysqli_error($conn)]);
}
