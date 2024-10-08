<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../includes/db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data and sanitize
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password
    $role = $conn->real_escape_string($_POST['role']);
    $referral_code_input = isset($_POST['referral_code']) ? $conn->real_escape_string($_POST['referral_code']) : null;

    // Initialize referred_by as null
    $referred_by = null;

    // Check for a valid referral code
    if (!empty($referral_code_input)) {
        if (preg_match('/^REFKENZ0(\d+)$/', $referral_code_input, $matches)) {
            $referred_user_id = $matches[1];

            // Verify if the user ID exists
            $referrer_query = "SELECT user_id FROM users WHERE user_id = '$referred_user_id'";
            $referrer_result = $conn->query($referrer_query);
            
            if ($referrer_result->num_rows > 0) {
                $referred_by = $referred_user_id; // Valid referrer found
            } else {
                // Handle case where referred user ID does not exist
                echo json_encode(['success' => false, 'message' => 'Invalid referral code.']);
                exit;
            }
        } else {
            // Handle invalid referral code format
            echo json_encode(['success' => false, 'message' => 'Invalid referral code format.']);
            exit;
        }
    }

    // Insert the user into the database
    $sql = "INSERT INTO users (first_name, last_name, email, mobile_number, password_hash, role, referred_by) 
            VALUES ('$first_name', '$last_name', '$email', '$phone', '$password', '$role', '$referred_by')";

    if ($conn->query($sql) === TRUE) {
        // Get the user_id of the newly created user
        $user_id = $conn->insert_id;

        // Generate the referral code
        $referral_code = "REFKENZ" . $user_id;

        // Update the user record with the referral code
        $update_sql = "UPDATE users SET referral_code = '$referral_code' WHERE user_id = $user_id";
        $conn->query($update_sql);

        // Reward logic
        if ($referred_by) {
            // Example reward
            $reward_amount = 10.00; // Define the reward
            $sql_reward = "INSERT INTO referral_rewards (referrer_id, referred_id, reward_amount) 
                           VALUES ('$referred_by', '$user_id', '$reward_amount')";
            if (!$conn->query($sql_reward)) {
                // Log any error with the reward insertion
                error_log('Reward insertion error: ' . $conn->error);
            }
        }

        echo json_encode(['success' => true, 'referral_code' => $referral_code]);
    } else {
        // Log the SQL error for debugging
        error_log('Database error: ' . $conn->error);
        echo json_encode(['success' => false, 'message' => 'Database error.']);
    }

    $conn->close(); // Close the connection
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
