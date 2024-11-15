<?php
include '../../includes/db.php';

// Handle AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_features'])) {
    $response = array();
    
    try {
        $plan_id = $_POST['plan_id'];
        $selected_features = isset($_POST['features']) ? $_POST['features'] : [];

        // Get all available features from database
        $features_sql = "SELECT `name` FROM `website_features` WHERE 1";
        $features_result = $conn->query($features_sql);
        
        $all_features = [];
        if ($features_result->num_rows > 0) {
            while ($row = $features_result->fetch_assoc()) {
                $all_features[] = $row['name'];
            }
        }

        // Prepare the feature lists
        $features_includes = implode("\n", $selected_features);
        $features_not_includes = implode("\n", array_diff($all_features, $selected_features));

        // Update the features in the database
        $update_sql = "UPDATE subscription_plans 
                      SET features_includes = ?, features_not_includes = ?
                      WHERE id = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param('ssi', $features_includes, $features_not_includes, $plan_id);
        
        if($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'Subscription Plan updated successfully!';
        } else {
            throw new Exception("Error executing query");
        }
        
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = 'Error updating subscription plan: ' . $e->getMessage();
    }
    
    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>