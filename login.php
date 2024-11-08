<?php
session_start();
include 'includes/db.php'; // Include your database connection file

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        echo json_encode(['success' => false, 'message' => 'Email and password are required.']);
        exit;
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement
    $sql = "SELECT user_id, first_name, last_name, profile_pic, password_hash, role_id FROM users WHERE email = ?";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'SQL statement preparation failed: ' . $conn->error]);
        exit;
    }

    $stmt->bind_param("s", $email);

    if (!$stmt->execute()) {
        echo json_encode(['success' => false, 'message' => 'Database query failed: ' . $stmt->error]);
        exit;
    }

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password_hash'])) {
            // Password is correct
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['profile_pic'] = $user['profile_pic'];
            $_SESSION['role'] = $user['role_id'];

            // Set a cookie to keep the user logged in for 30 days
            $cookie_name = 'user_login';
            $cookie_value = base64_encode(json_encode([
                'user_id' => $user['user_id'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'profile_pic' => $user['profile_pic'],
                'role' => $user['role_id']
            ]));
            $cookie_expiry = time() + (30 * 24 * 60 * 60); // 30 days
            setcookie($cookie_name, $cookie_value, $cookie_expiry, '/', '', true, true);

            // Success response
            echo json_encode([
                'success' => true,
                'redirect' => $_SESSION['role'] === '4' ? '../mypage' : 'Manage/dashboard'
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
} else {
    // Check for existing login cookie
    if (isset($_COOKIE['user_login'])) {
        $cookie_data = json_decode(base64_decode($_COOKIE['user_login']), true);
        if ($cookie_data) {
            $_SESSION['user_id'] = $cookie_data['user_id'];
            $_SESSION['first_name'] = $cookie_data['first_name'];
            $_SESSION['last_name'] = $cookie_data['last_name'];
            $_SESSION['profile_pic'] = $cookie_data['profile_pic'];
            $_SESSION['role'] = $cookie_data['role'];

            // Redirect based on role
            $redirect = $_SESSION['role'] === '1' ? 'Manage/dashboard.php' : ($_SESSION['role'] === '2' ? 'Manage/dashboard.php' : ($_SESSION['role'] === '3' ? 'Manage/dashboard.php' : ($_SESSION['role'] === '4' ? 'Manage/dashboard.php' : 'mypage.php')));

            header("Location: $redirect");
            exit;
        }
    }
}
