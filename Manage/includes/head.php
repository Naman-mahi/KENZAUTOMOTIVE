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
       