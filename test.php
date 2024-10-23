<?php
// Database configuration
$host = 'localhost'; // Your database host
$db = 'marketplace'; // Your database name
$user = 'root'; // Your database username
$pass = ''; // Your database password

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// User data to insert
// $username = 'dealer@marketplace.com';
$password = '12345'; // Plain text password
$email = 'dealer4@marketplace.com';
$role = 'dealer'; // or 'admin', 'customer'

// Hash the password
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Prepare SQL statement
$sql = "INSERT INTO Users (password_hash, email, role, created_at) VALUES (:password_hash, :email, :role, NOW())";
$stmt = $pdo->prepare($sql);

// Bind parameters
$stmt->bindParam(':password_hash', $passwordHash);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':role', $role);

// Execute the statement
try {
    $stmt->execute();
    echo "User inserted successfully!";
} catch (PDOException $e) {
    echo "Error inserting user: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>
