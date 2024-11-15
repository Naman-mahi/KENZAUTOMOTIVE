<?php
session_start();
include('../../includes/db.php');

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verify user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'User not logged in'
    ]);
    exit;
}

// Cashfree secret key 
$secretkey = "your key";

// Get and sanitize POST data
$orderId = filter_input(INPUT_POST, "orderId", FILTER_SANITIZE_STRING);
$orderAmount = filter_input(INPUT_POST, "orderAmount", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$referenceId = filter_input(INPUT_POST, "referenceId", FILTER_SANITIZE_STRING); 
$txStatus = filter_input(INPUT_POST, "txStatus", FILTER_SANITIZE_STRING);
$paymentMode = filter_input(INPUT_POST, "paymentMode", FILTER_SANITIZE_STRING);
$txMsg = filter_input(INPUT_POST, "txMsg", FILTER_SANITIZE_STRING);
$txTime = filter_input(INPUT_POST, "txTime", FILTER_SANITIZE_STRING);
$signature = filter_input(INPUT_POST, "signature", FILTER_SANITIZE_STRING);

// Verify required fields exist
if (!$orderId || !$orderAmount || !$referenceId || !$txStatus || !$signature) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Missing required fields',
        'data' => [
            'orderId' => $orderId,
            'orderAmount' => $orderAmount,
            'referenceId' => $referenceId,
            'txStatus' => $txStatus,
            'signature' => $signature
        ]
    ]);
    exit;
}

// Validate inputs
if ($orderAmount <= 0) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Invalid order amount'
    ]);
    exit;
}

if (!in_array($txStatus, ['SUCCESS', 'FAILED'])) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Invalid transaction status'
    ]);
    exit;
}

// Verify signature
// $computedSignature = computeSignature();

// function computeSignature(){
//     $rawBody = file_get_contents('php://input');
//     $headers = getallheaders();
    
//     if (!isset($headers['x-webhook-timestamp'])) {
//         header('Content-Type: application/json');
//         echo json_encode([
//             'success' => false,
//             'message' => 'Missing webhook timestamp header'
//         ]);
//         exit;
//     }
    
//     $ts = $headers['x-webhook-timestamp'];
//     $signStr = $ts . $rawBody;
//     $key = "Key"; // Using the secret key
//     $key = "Key"; // Using the secret key
//     $computeSig = base64_encode(hash_hmac('sha256', $signStr, $key, true));
//     return $computeSig;
// }

function computeSignature($ts, $rawBody){
    $rawBody = file_get_contents('php://input');
		$ts = getallheaders()['x-webhook-timestamp'];
  
    $signStr = $ts . $rawBody;
    $key = "your key";
    $computeSig = base64_encode(hash_hmac('sha256', $signStr, $key, true));
    return $computeSig;
}

// Begin transaction
$conn->begin_transaction();

try {
    // Insert payment transaction
    $payment_session_id = uniqid('session_', true);
    $payment_status = ($txStatus === 'SUCCESS') ? 'SUCCESS' : 'FAILED';
    
    if (strtotime($txTime) === false) {
        throw new Exception("Invalid transaction time format");
    }
    
    $payment_time = date('Y-m-d H:i:s', strtotime($txTime));
    
    $sql = "INSERT INTO payment_transaction (
        id, order_id, order_amount, user_id, cf_order_id,
        payment_mode, payment_session_id, payment_status,
        payment_time, callback_response, created_on
    ) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception("Failed to prepare statement: " . $conn->error);
    }

    $callback_response = json_encode($_POST);
    $user_id = $_SESSION['user_id'];

    $stmt->bind_param(
        "sdissssss",
        $orderId,
        $orderAmount, 
        $user_id,
        $referenceId,
        $paymentMode,
        $payment_session_id,
        $payment_status,
        $payment_time,
        $callback_response
    );

    if (!$stmt->execute()) {
        throw new Exception("Failed to execute statement: " . $stmt->error);
    }
    
    // If payment successful, update wallet
    if ($payment_status === 'SUCCESS') {
        // Get wallet ID
        $wallet_id = get_wallet_id_by_user($_SESSION['user_id'], $conn);
        if (!$wallet_id) {
            // Create wallet if it doesn't exist
            $sql = "INSERT INTO wallets (user_id, balance) VALUES (?, 0)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $_SESSION['user_id']);
            $stmt->execute();
            $wallet_id = $conn->insert_id;
        }
        
        // Update wallet balance
        $sql = "UPDATE wallets SET balance = balance + ? WHERE wallet_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("di", $orderAmount, $wallet_id);
        if (!$stmt->execute()) {
            throw new Exception("Failed to update wallet balance");
        }
        
        // Record wallet transaction
        $sql = "INSERT INTO wallet_transactions (
            wallet_id, user_id, amount, transaction_type, created_at
        ) VALUES (?, ?, ?, 'credit', NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iid", $wallet_id, $_SESSION['user_id'], $orderAmount);
        if (!$stmt->execute()) {
            throw new Exception("Failed to record wallet transaction");
        }
    }
    
    // Commit transaction
    $conn->commit();

    // Return success response
    $response = [
        'success' => true,
        'status' => $payment_status,
        'message' => 'Payment processed successfully',
        'data' => [
            'orderId' => $orderId,
            'amount' => $orderAmount,
            'referenceId' => $referenceId,
            'status' => $txStatus,
            'mode' => $paymentMode,
            'time' => $txTime
        ]
    ];
        
} catch (Exception $e) {
    // Rollback on error
    $conn->rollback();
    
    // Log error for debugging
    error_log("Payment Error: " . $e->getMessage());
    error_log("Stack trace: " . $e->getTraceAsString());
    
    // Return error response with more details in development
    $response = [
        'success' => false,
        'message' => 'An error occurred while processing your payment: ' . $e->getMessage(),
        'error_details' => [
            'error' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]
    ];
}

// Close connection
$conn->close();

// // Output response
// header('Content-Type: application/json');
// echo json_encode($response);
echo '<script>window.location.href = "../Dashboard";</script>';

/**
 * Get wallet ID for user
 */
function get_wallet_id_by_user($user_id, $conn) {
    $sql = "SELECT wallet_id FROM wallets WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['wallet_id'];
    }
    return null;
}
?>