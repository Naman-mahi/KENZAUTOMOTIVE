<?php
include '../../includes/db.php'; // Ensure to include your database connection

// Get the JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Check if banner_id is present
if (isset($data['banner_id'])) {
    $bannerId = $data['banner_id'];

    // Fetch the current status
    $stmt = $conn->prepare("SELECT status FROM banners WHERE id = ?");
    $stmt->bind_param("i", $bannerId);
    $stmt->execute();
    $stmt->bind_result($currentStatus);
    $stmt->fetch();
    $stmt->close();

    // Toggle the status
    $newStatus = $currentStatus === 'active' ? 'inactive' : 'active';

    // Update the banner status
    $stmt = $conn->prepare("UPDATE banners SET status = ?, updated_at = NOW() WHERE id = ?");
    $stmt->bind_param("si", $newStatus, $bannerId);

    // Execute and check for success
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'new_status' => $newStatus]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to change banner status.']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input.']);
}

$conn->close();
