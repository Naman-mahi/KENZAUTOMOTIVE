<?php
// Database connection configuration

// Set environment (true for development, false for production)
$isDevelopment = true;

// Database credentials
if ($isDevelopment) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "marketplace";
} else {
    $servername = "localhost";
    $username = "wtxoeyoq_kenzwheels";
    $password = "8JyGGP6VyqqEhU7trfJD";
    $dbname = "wtxoeyoq_kenzwheels";
}

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection and terminate if failed
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
