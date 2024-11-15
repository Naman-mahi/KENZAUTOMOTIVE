<?php
include '../includes/db.php'; // Adjust to your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note = isset($_POST['note']) ? htmlspecialchars(trim($_POST['note'])) : '';
    $action = $_POST['action'];
    $user_id = $_POST['user_id']; // Assuming you are passing user_id from the form
    // Prepare the update query
    if ($action === 'approve') {
        $verification_status = 'Approved';
    } elseif ($action === 'reject') {
        $verification_status = 'Rejected';
    } else {
        echo "Invalid action.";
        exit;
    }

    // SQL to update the dealer's verification status and note
    $sql = "UPDATE `dealers` SET 
                `verification_status` = ?, 
                `verification_note` = ?, 
                `updated_at` = NOW() 
            WHERE `user_id` = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("SQL prepare failed: " . htmlspecialchars($conn->error));
    }

    // Bind parameters
    $stmt->bind_param("ssi", $verification_status, $note, $user_id); // "ssi" means two strings and one integer

    // Execute the statement
    if ($stmt->execute()) {
        echo "Verification $action." . ($note ? " Note: $note" : "");
    } else {
        echo "Error updating record: " . htmlspecialchars($stmt->error);
    }


    if ($action === 'approve') {
        // Add 7 day trial subscription
        $trial_start = date('Y-m-d H:i:s');
        $trial_end = date('Y-m-d H:i:s', strtotime('+7 days'));

        $sql = "INSERT INTO subscriptions (
            user_id, 
            plan_id,
            start_date,
            end_date,
            status,
            billing_cycle,
            trial_end_date,
            auto_renew,
            created_at,
            updated_at
        ) VALUES (?, 1, ?, ?, 'trial', 'yearly', ?, 1, NOW(), NOW())";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('isss', $user_id, $trial_start, $trial_end, $trial_end);

        if (!$stmt->execute()) {
            echo "Error creating trial subscription: " . htmlspecialchars($stmt->error);
        } else {
            echo "7 day trial subscription activated";
        }
        $stmt->close();

        // Update user table
        $sql = "UPDATE users SET 
                `subscription_id` = ?,
                `user_status` = 'active',
                `updated_at` = NOW() 
            WHERE `user_id` = ?";
    }
    // Close the statement
    $stmt->close();
}
