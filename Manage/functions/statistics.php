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

// Function to get statistics based on user role
function getStatistics() {
    global $conn;
    
    // Check user role
    $userRole = $_SESSION['role'] ?? '4'; // Default to '4' if role not set in session
    
    // If role is '4' (customer), redirect to 'mypage'
    if ($userRole === '4') {
        header("Location: mypage.php");
        exit();
    }

    $dealerId = null;
    if ($userRole === '2') {
        $dealerId = $_SESSION['user_id'] ?? null;
    }

    // Get user statistics
    $whereClause = ($userRole === '1') ? '' : 'WHERE role_id = ?';
    $userStatsQuery = "
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
    $userStatsParams = ($userRole !== '1') ? [$userRole] : null;
    $userStats = executeQuery($conn, $userStatsQuery, $userStatsParams);

    // Get product statistics
    $productStatsQuery = "SELECT COUNT(*) as total_products FROM products";
    $productStatsParams = [];
    if ($dealerId) {
        $productStatsQuery .= " WHERE dealer_id = ?";
        $productStatsParams[] = $dealerId;
    }
    $productStats = executeQuery($conn, $productStatsQuery, $productStatsParams);

    // Get publication statistics
    $publishStatsQuery = "SELECT 
        COUNT(*) as total_published_website,
        SUM(CASE WHEN marketplace = 1 THEN 1 ELSE 0 END) as total_published_marketplace,
        SUM(CASE WHEN own_website = 1 THEN 1 ELSE 0 END) as total_published_own_website 
    FROM product_publish 
    JOIN products ON product_publish.product_id = products.product_id";
    if ($dealerId) {
        $publishStatsQuery .= " WHERE products.dealer_id = ?";
    }
    $publishStatsParams = $dealerId ? [$dealerId] : [];
    $publishStats = executeQuery($conn, $publishStatsQuery, $publishStatsParams);

    // Get referral statistics
    $referralStatsQuery = "SELECT COUNT(*) as total_referral_rewards FROM referral_rewards";
    $referralStatsParams = [];
    if ($dealerId) {
        $referralStatsQuery .= " WHERE referrer_id = ?";
        $referralStatsParams[] = $dealerId;
    }
    $referralStats = executeQuery($conn, $referralStatsQuery, $referralStatsParams);

    // Get subscription and inquiry statistics
    $subscriptionStats = executeQuery($conn, "SELECT COUNT(*) as total_active_subscriptions FROM subscriptions WHERE status = 'active'");
    $inquiryStats = executeQuery($conn, "SELECT COUNT(*) as total_inquiries FROM product_inquiries");

    // Combine all statistics
    return array_merge(
        $userStats, 
        $productStats, 
        $publishStats, 
        $referralStats, 
        $subscriptionStats, 
        $inquiryStats
    );
}

// Function to get sales agent statistics
function getAgentStatistics($agentId) {
    global $conn;
    
    $agentStats = [];
    
    // Get total products for agent
    $productQuery = "SELECT COUNT(*) as total_products FROM products WHERE agent_id = ?";
    $productStats = executeQuery($conn, $productQuery, [$agentId]);
    $agentStats['total_products'] = $productStats['total_products'] ?? 0;
    
    // Get total inquiries for agent's products
    $inquiryQuery = "SELECT COUNT(*) as total_inquiries FROM product_inquiries pi 
                     JOIN products p ON pi.product_id = p.product_id 
                     WHERE p.agent_id = ?";
    $inquiryStats = executeQuery($conn, $inquiryQuery, [$agentId]);
    $agentStats['total_inquiries'] = $inquiryStats['total_inquiries'] ?? 0;
    
    // Get total views for agent's products
    $viewsQuery = "SELECT COUNT(*) as total_views FROM product_views pv
                   JOIN products p ON pv.product_id = p.product_id 
                   WHERE p.agent_id = ?";
    $viewStats = executeQuery($conn, $viewsQuery, [$agentId]);
    $agentStats['total_views'] = $viewStats['total_views'] ?? 0;
    
    // Get total sales for agent
    $salesQuery = "SELECT COUNT(*) as total_sales FROM sales 
                   JOIN products p ON sales.product_id = p.product_id
                   WHERE p.agent_id = ?";
    $salesStats = executeQuery($conn, $salesQuery, [$agentId]);
    $agentStats['total_sales'] = $salesStats['total_sales'] ?? 0;
    
    return $agentStats;
}
?>
