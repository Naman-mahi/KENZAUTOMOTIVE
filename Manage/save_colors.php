<?php
include '../includes/db.php'; // Include your database connection

// save_colors.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connection.php'; // Include your database connection file

    // Sanitize input data
    $textColor = $_POST['textColor'];
    $buttonColor = $_POST['buttonColor'];
    $activeButtonColor = $_POST['activeButtonColor'];
    $activeTextColor = $_POST['activeTextColor'];
    $buttonPadding = $_POST['buttonPadding'];
    $buttonRounded = $_POST['buttonRounded'];
    $buttonActive = $_POST['buttonActive'];

    // Prepare SQL statement to save colors
    $stmt = $conn->prepare("INSERT INTO settings (text_color, button_color, active_button_color, active_text_color, button_padding, button_rounded, button_active) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $textColor, $buttonColor, $activeButtonColor, $activeTextColor, $buttonPadding, $buttonRounded, $buttonActive);

    // Execute and check for success
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Settings saved successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
