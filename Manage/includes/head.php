<!doctype html>
<html lang="en">
<?php
session_start();
include '../includes/db.php';

if (!isset($_SESSION['role'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SESSION['role'] === '4') {
    header("Location: ../mypage123");
    exit();
}
?>

<head>
    <meta charset="utf-8" />
    <title>Kenz Wheels</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.28/dist/fancybox.css" />
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <script src="assets/libs/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- twitter-bootstrap-wizard css -->
    <link rel="stylesheet" href="assets/libs/twitter-bootstrap-wizard/prettify.css">
    <!-- plugin css -->
    <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
    <link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet">
    <!-- App Css-->

    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <style>
        .overflow-hidden {
            overflow: hidden;
        }
    </style>
    <?php

    $sql = "SELECT * FROM settings ORDER BY id DESC LIMIT 1"; // Fetch the latest settings
    $result = $conn->query($sql);

    $settings = null;

    if ($result && $result->num_rows > 0) {
        $settings = $result->fetch_assoc();
    } else {
        echo "No settings found.";
    }
    // Define CSS variables based on settings
    echo "<style>
    :root {
        --text-color: " . ($settings['text_color'] ?? '#000000') . ";
        --button-color: " . ($settings['button_color'] ?? '#007bff') . ";
        --active-button-color: " . ($settings['active_button_color'] ?? '#0056b3') . ";
        --active-text-color: " . ($settings['active_text_color'] ?? '#ffffff') . ";
        --button-padding: " . ($settings['button_padding'] ?? '0.375rem 0.75rem') . ";
        --button-rounded: " . ($settings['button_rounded'] ?? '0.25rem') . ";
        --button-active: " . ($settings['button_active'] ?? '0.2') . ";
    }

   
</style>";


    ?>
</head>


<body data-sidebar="light">
    <div id="layout-wrapper">
        <?php
        include 'header.php';
        include 'sidebar.php';
        ?>
        <?php
        $role = $_SESSION['role'];
        $user_id = $_SESSION['user_id'];
        if ($role == '2') {
            // Check if user has an active subscription
            $sql = "SELECT s.*, sp.title as plan_name 
                FROM subscriptions s
                JOIN subscription_plans sp ON s.plan_id = sp.id
                WHERE s.user_id = ? 
                AND s.status = 'active'
                AND s.end_date > NOW()
                LIMIT 1";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            $subscriptionURL = "http://localhost/marketplace/Manage/subscription"; // Subscription page URL
            $currentURL = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // Get current full URL

            if ($result->num_rows == 0) {
                // No active subscription found
                if ($currentURL !== $subscriptionURL) {
                    // Show modal if the user is not already on the subscription page
                    echo "<script>
                        $(document).ready(function() {
                            $('#subscriptionModal').modal('show');
                        });
                    </script>";
                }
            }
            $subscription = $result->fetch_assoc();
        }
        ?>
        <!-- Modal for expired subscription -->
        <div class="modal fade" id="subscriptionModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="subscriptionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="subscriptionModalLabel">Subscription Required</h5>
                    </div>
                    <div class="modal-body text-center">
                        <p>Your plan has expired. Please subscribe to continue using our services.</p>
                        <button type="button" class="btn btn-primary mt-3 bg-kenz" onclick="window.location.href='subscription'">View Subscription Plans</button>
                    </div>
                </div>
            </div>
        </div>
 
