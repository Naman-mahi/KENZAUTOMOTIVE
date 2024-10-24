<?php
include '../../includes/db.php';

// Check if image_id is set and is a valid integer
if (!isset($_POST['image_id']) || !filter_var($_POST['image_id'], FILTER_VALIDATE_INT)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid image ID']);
    exit;
}

$image_id = intval($_POST['image_id']);

// First, get the image file path
$sql_select = "SELECT image_url FROM product_images WHERE image_id = ?";
$stmt_select = $conn->prepare($sql_select);
$stmt_select->bind_param("i", $image_id);
$stmt_select->execute();
$result = $stmt_select->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['status' => 'error', 'message' => 'Image not found']);
    exit;
}

$row = $result->fetch_assoc();
$image_path = $row['image_url'];

// Delete the record from the database
$sql_delete = "DELETE FROM product_images WHERE image_id = ?";
$stmt_delete = $conn->prepare($sql_delete);
$stmt_delete->bind_param("i", $image_id);

if ($stmt_delete->execute()) {
    // If database deletion is successful, attempt to delete the file
    if (file_exists('../uploads/ProductImages/' . $image_path) && unlink('../uploads/ProductImages/' . $image_path)) {
        echo json_encode(['status' => 'success', 'message' => 'Image deleted successfully']);
    } else {
        echo json_encode(['status' => 'warning', 'message' => 'Database record deleted, but file deletion failed']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to delete image']);
}

$stmt_select->close();
$stmt_delete->close();
$conn->close();
?>