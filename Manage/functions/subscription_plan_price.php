<?php
include '../../includes/db.php';

// Handle AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_price'])) {
    $response = array();
    
    try {
        $plan_id = $_POST['plan_id'];
        $monthly_price = $_POST['monthly_price'];
        $yearly_price = $_POST['yearly_price'];

        // Validate inputs
        if (empty($plan_id) || empty($monthly_price) || empty($yearly_price)) {
            throw new Exception("All fields are required");
        }

        // Update the prices in the database
        $update_sql = "UPDATE subscription_plans 
                      SET monthly_price = ?, yearly_price = ?
                      WHERE id = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param('ddi', $monthly_price, $yearly_price, $plan_id);
        
        if($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'Subscription Plan prices updated successfully!';
        } else {
            throw new Exception("Error executing query");
        }
        
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = 'Error updating subscription plan prices: ' . $e->getMessage();
    }
    
    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>