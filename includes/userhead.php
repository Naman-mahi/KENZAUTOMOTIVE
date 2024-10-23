<?php
include_once ('../config.php');
include_once ('db.php')
?>
<!doctype html>
<html lang="en">
<?php
// session_start(); // Start the session

// Check if the user is already logged in
if (isset($_SESSION['role'])) {
    // Redirect based on user role
    if ($_SESSION['role'] === 'admin') {
        header("Location: Manage/dashboard.php"); // Redirect to admin dashboard
    } elseif ($_SESSION['role'] === 'dealer') {
        header("Location: Manage/dashboard.php"); // Redirect to dealer dashboard
    } else {
        header("Location: mypage.php"); // Redirect to mypage for unrecognized roles
    }
    exit(); // Stop script execution
}
?>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= BASE_URL ?>Manage/assets/images/favicon.ico">
    <link href="<?= BASE_URL ?>Manage/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>Manage/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>Manage/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>manage/assets/libs/sweetalert2/sweetalert2.min.css"rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/css/header.css" as="style" media="all">




    <style>
        /* body {
            background: linear-gradient(91deg, #c7e8f1 24.08%, #fde2d9 71.22%);
        } */
    </style>
</head>