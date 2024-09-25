<?php
include '../includes/db.php'; // Adjust to your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize user input
    $id = intval($_POST['product_id']);
    $marketplace = isset($_POST['marketplace']) ? 1 : 0;
    $website = isset($_POST['website']) ? 1 : 0;
    $own_website = isset($_POST['own_website']) ? 1 : 0;

    // Construct SQL query (be careful with SQL injection risks)
   $sql = "UPDATE product_publish SET marketplace = $marketplace, website = $website, own_website = $own_website WHERE product_id = $id";
   
  // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Output JavaScript to redirect back
        echo "<script>window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    exit;
}
?>
