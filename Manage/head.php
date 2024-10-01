<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Kenz Automotive</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.28/dist/fancybox.css" />
    <link href="assets/libs/sweetalert2/sweetalert2.min.css"rel="stylesheet" type="text/css" />
    <script src="assets/libs/sweetalert2/sweetalert2.all.min.js"></script>
<script src="assets/libs/jquery/jquery.min.js"></script>

    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- twitter-bootstrap-wizard css -->
    <link rel="stylesheet" href="assets/libs/twitter-bootstrap-wizard/prettify.css">
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body data-sidebar="light">
    <div id="layout-wrapper">
        <?php
        include 'header.php';
        include 'sidebar.php';
        ?>

        <?php
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'dealer') {
            $userId = $_SESSION['user_id'];
            $sql = "SELECT product_category_id FROM dealers WHERE user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                $product_category_id = $row['product_category_id'];
                // echo "Category ID: " . htmlspecialchars($product_category_id);
            } else {
                echo "No dealer found for this user ID.";
            }
            $stmt->close();
        }
        ?>
        <?php
$categoryId = $product_category_id; // Make sure you set this in the first script

// SQL to fetch existing specifications
$sql = "SELECT `pf_name` FROM `product_attributes` WHERE `category_id` = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("SQL prepare failed: " . htmlspecialchars($conn->error));
}

$stmt->bind_param("i", $categoryId); // "i" indicates the type is integer
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Initialize the specs array
$specs = [];

// Populate the specs array from the fetched results
while ($row = $result->fetch_assoc()) {
    $specs[] = [
        'label' => $row['pf_name'], // Using pf_name as label
        'name' => strtolower(str_replace(' ', '_', $row['pf_name'])) // Create a name from the label
    ];
}

// Close the statement
$stmt->close();
?>