<?php
include '../../includes/db.php'; // Include your database connection

// Start JSON output
header('Content-Type: application/json');

// Get JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Extract data from JSON
$role_id = $data['role_id'] ?? null;
$role_name = $data['role_name'] ?? null;
$description = $data['description'] ?? null;

// Validate inputs
if (empty($role_id) || empty($role_name) || empty($description)) {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit;
}

// Prepare the SQL update statement
$sql = "UPDATE roles SET role_name = ?, description = ? WHERE role_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $role_name, $description, $role_id);

// Execute the statement
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Role updated successfully.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update role.']);
}

$stmt->close();
$conn->close();
?>