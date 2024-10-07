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

    // Close the statement
    $stmt->close();
}
?>
