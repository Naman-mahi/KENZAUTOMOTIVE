<?php
header('Content-Type: application/json');
include '../includes/db.php'; // Adjust to your database connection file

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']); // Sanitize input

    // Query to fetch product images for the specified product_id
    $sql = "
    SELECT image_url
    FROM product_images
    WHERE product_id = ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id); // Bind product_id
    $stmt->execute();
    $result = $stmt->get_result();

    // Prepare an array to hold media assets
    $mediaAssets = [];
    while ($row = $result->fetch_assoc()) {
        // Construct the local image URL
        $mediaAssets[] = [
            'url' => 'http://localhost/marketplace/Manage/uploads/products/' . htmlspecialchars($row['image_url']),
        ];
    }

    // Output as JSON
    echo json_encode($mediaAssets);
} else {
    echo json_encode([]); // Return empty array if no ID
}
?>