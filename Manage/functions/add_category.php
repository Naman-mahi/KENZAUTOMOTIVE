<?php
include '../../includes/db.php'; // Ensure to include your database connection

// Get the JSON input
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['category_name'])) {
    $categoryName = $data['category_name'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO categories (category_name, created_at) VALUES (?, NOW())");
    $stmt->bind_param("s", $categoryName);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add category.']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input.']);
}

$conn->close();
?>
