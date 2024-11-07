<?php
// Include necessary files and start session if not already started
if (!file_exists('../includes/db.php')) {
    die("Error: Database connection file not found.");
}
require_once '../includes/db.php'; // Include your database connection

// Check if the connection was successful
if (!isset($conn) || $conn->connect_error) {
    die("Error: Database connection file not found.");
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$userRole = $_SESSION['role'] ?? '4'; // Use null coalescing operator

// Start building the query
$whereClause = ($userRole === '1') ? '' : 'WHERE role_id = ?';

// User statistics query
$sql = "
    SELECT 
        COUNT(*) as total_users,
        SUM(role_id = '2') as total_dealers,
        SUM(role_id = '1') as total_admins,
        SUM(role_id = '4') as total_customers,
        SUM(role_id = '3') as total_sales_agents,
        SUM(role_id = '5') as total_website_users 
    FROM users 
    $whereClause
";

$stmt = $conn->prepare($sql);
if ($userRole !== '1') {
    $stmt->bind_param("s", $userRole);
}

if (!$stmt->execute()) {
    error_log("Execution failed: " . $stmt->error);
    $userStats = ['error' => 'Database error.'];
} else {
    $userStats = $stmt->get_result()->fetch_assoc();
}
$stmt->close();

// Function to execute queries
function executeQuery($conn, $query, $params = null) {
    $stmt = $conn->prepare($query);
    if ($params) {
        $stmt->bind_param(str_repeat('s', count($params)), ...$params);
    }
    if (!$stmt->execute()) {
        error_log("Execution failed: " . $stmt->error);
        return ['error' => 'Database error.'];
    }
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $result;
}

$dealerId = null;

// Check if the session role is 'dealer' and set the dealer ID
if (isset($_SESSION['role']) && $_SESSION['role'] === '2') {
    // Assuming user_id is a safe value in the session
    $dealerId = $_SESSION['user_id'] ?? null; // Get dealer_id from session
}

// Query to get total products
$productStatsQuery = "SELECT COUNT(*) as total_products FROM products";
$productStatsParams = [];

// If dealerId is set, modify the query to filter by dealer_id
if ($dealerId) {
    $productStatsQuery .= " WHERE dealer_id = ?";
    $productStatsParams[] = $dealerId; // Add dealerId to parameters
}

// Execute the product stats query
$productStats = executeQuery($conn, $productStatsQuery, $productStatsParams);

// Prepare and execute publication statistics query
$publishStatsQuery = "SELECT 
    COUNT(*) as total_published_website,
    SUM(CASE WHEN marketplace = 1 THEN 1 ELSE 0 END) as total_published_marketplace,
    SUM(CASE WHEN own_website = 1 THEN 1 ELSE 0 END) as total_published_own_website 
FROM product_publish 
JOIN products ON product_publish.product_id = products.product_id";

// If dealerId is set, add a condition to the publication stats query
if ($dealerId) {
    $publishStatsQuery .= " WHERE products.dealer_id = ?";
}

// Prepare parameters for publication stats
$publishStatsParams = $dealerId ? [$dealerId] : [];
$publishStats = executeQuery($conn, $publishStatsQuery, $publishStatsParams);

// Get total referral rewards
$referralStatsQuery = "SELECT COUNT(*) as total_referral_rewards FROM referral_rewards";
$referralStatsParams = [];

// If dealerId is set, add a condition for the referrer_id
if ($dealerId) {
    $referralStatsQuery .= " WHERE referrer_id = ?";
    $referralStatsParams[] = $dealerId; // Add dealerId to parameters
}

$referralStats = executeQuery($conn, $referralStatsQuery, $referralStatsParams);



$subscriptionStats = executeQuery($conn, "SELECT COUNT(*) as total_active_subscriptions FROM subscriptions WHERE status = 'active'");
$inquiryStats = executeQuery($conn, "SELECT COUNT(*) as total_inquiries FROM product_inquiries");

// Combine all statistics into a single array
$statistics = array_merge($userStats, $productStats, $publishStats, $referralStats, $subscriptionStats, $inquiryStats);

// Output the statistics as JSON
 json_encode($statistics);
?>
