<?php
session_start(); // Start a session
include 'includes/db.php'; // Include your database connection file

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Debugging output
    echo "Attempting login for email: " . htmlspecialchars($email) . "<br>";
    // exit; // Uncomment for debugging

    // Prepare SQL statement
    $sql = "SELECT user_id, first_name, last_name, profile_pic, password_hash, role FROM Users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email); // "s" specifies the variable type => 'string'
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Print user data for debugging
        echo "User found: ";
        print_r($user);
        
        if (password_verify($password, $user['password_hash'])) {
            // Password is correct
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['profile_pic'] = $user['profile_pic'];
            $_SESSION['role'] = $user['role']; // Store role if needed
            
            // Redirect to dashboard or another page
            header("Location: Manage/Dashboard.php"); // Change to your desired page
            exit;
        } else {
            // Invalid password
            echo "<script>alert('Invalid email or password.'); window.location.href='index.php';</script>";
        }
    } else {
        // User not found
        echo "<script>alert('User not found.'); window.location.href='index.php';</script>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
