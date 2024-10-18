<?php
// Start session
session_start();
// includes/functions.php
include('../config.php');
include('db.php');

// Function to sanitize input
function sanitizeInput($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

// Handle login
if (isset($_POST['login'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Sanitize input
    $email = sanitizeInput($email);

    // Prepare and execute SQL statement
    $query = "SELECT userid, passwordhash, email, role FROM users WHERE email = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($userid, $hashed_password, $email, $role);
            $stmt->fetch();

            // Verify password
            if (password_verify($password, $hashed_password)) {
                // Store session variables
                $_SESSION['userid'] = $userid;
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $role;

                // Redirect based on role
                if ($role === 'dealer') {
                    header('Location: ' . BASE_URL . 'dealer/dashboard');
                } else {
                    header('Location: ' . BASE_URL . 'index');
                }
                exit();
            } else {
                echo '<p>Invalid credentials</p>';
            }
        } else {
            echo '<p>User not found</p>';
        }

        $stmt->close();
    } else {
        echo '<p>Error preparing the SQL statement.</p>';
    }
}

// Handle registration
if (isset($_POST['register'])) {
    $username = sanitizeInput($_POST['username'] ?? '');
    $password = sanitizeInput($_POST['password'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $fullname = sanitizeInput($_POST['fullname'] ?? '');
    $phonenumber = sanitizeInput($_POST['phonenumber'] ?? '');
    $address = sanitizeInput($_POST['address'] ?? '');
    $role = sanitizeInput($_POST['role'] ?? '');

    // Check for required fields
    if (empty($username) || empty($password) || empty($email) || empty($role)) {
        echo '<div class="alert alert-danger">Please fill all required fields.</div>';
    } else {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute SQL statement
        $query = "INSERT INTO users (username, password, email, fullname, phonenumber, address, role) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("sssssss", $username, $passwordHash, $email, $fullname, $phonenumber, $address, $role);

            if ($stmt->execute()) {
                echo '<div class="alert alert-success">Registration successful!</div>';
            } else {
                echo '<div class="alert alert-danger">Error: ' . $stmt->error . '</div>';
            }

            $stmt->close();
        } else {
            echo '<div class="alert alert-danger">Error preparing the SQL statement.</div>';
        }
    }
}

// Close database connection
$conn->close();
