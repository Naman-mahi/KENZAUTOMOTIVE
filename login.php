<?php
session_start();
include 'includes/db.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement
    $sql = "SELECT user_id, first_name, last_name, profile_pic, password_hash, role FROM Users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password_hash'])) {
            // Password is correct
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['profile_pic'] = $user['profile_pic'];
            $_SESSION['role'] = $user['role'];

            // Success response
            echo json_encode([
                'success' => true,
                'redirect' => $_SESSION['role'] === 'admin' ? 'Manage/dashboard.php' : ($_SESSION['role'] === 'website_user' ? 'Manage/dashboard.php'  : ($_SESSION['role'] === 'sales_agent' ? 'Manage/dashboard.php' : ($_SESSION['role'] === 'dealer' ? 'Manage/dashboard.php' : 'mypage.php')))
            ]);
        } else {
            // Invalid password
            echo json_encode(['success' => false, 'message' => 'Invalid email or password.']);
        }
    } else {
        // User not found
        echo json_encode(['success' => false, 'message' => 'User not found.']);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
