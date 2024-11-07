<?php
include '../../includes/db.php'; // Include your database connection

// Start JSON output
header('Content-Type: application/json');

// Get JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Get the role name from the request
$role_name = $data['role_name'] ?? null;
$description = $data['description'] ?? null;

// Validate inputs
if (empty($role_name) || empty($description)) {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit;
}

// Check if role name already exists
$check_sql = "SELECT role_id FROM roles WHERE role_name = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("s", $role_name);
$check_stmt->execute();
$check_result = $check_stmt->get_result();

if ($check_result->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Role name already exists.']);
    exit;
}

// Prepare the SQL insert statement
$sql = "INSERT INTO roles (role_name, description) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $role_name, $description);

// Execute the statement
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Role added successfully.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to add role.']);
}

$stmt->close();
$conn->close();
?>