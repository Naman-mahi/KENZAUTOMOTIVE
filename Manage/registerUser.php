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

    // Insert the user into the database
    $sql = "INSERT INTO users (first_name, last_name, email, mobile_number, password_hash, role) VALUES ('$first_name', '$last_name', '$email', '$phone', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
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
