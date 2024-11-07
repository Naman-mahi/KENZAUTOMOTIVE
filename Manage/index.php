<?php
session_start(); // Start the session

// Check if the user is logged in (role is set)
if (isset($_SESSION['role'])) {
    // If the role is 4 (customer), redirect to mypage
    if ($_SESSION['role'] === '4') {
        header("Location: ../mypage.php"); // Redirect to mypage.php for role 4
    } else {
        header("Location: Dashboard"); // Redirect to Dashboard for all other roles
    }
    exit(); // Stop script execution
} else {
    // If the role is not set, redirect to the homepage or login page
    header("Location: ../"); // Redirect to homepage or login
    exit(); // Stop script execution
}
