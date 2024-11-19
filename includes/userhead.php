<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();  // Start the session
}
include_once('../config.php');
include_once('db.php')
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, shrink-to-fit=no">
    <link rel="preload" href="<?php echo BASE_URL; ?>assets/css/importCss/latin.woff2" as="font" type="font/woff2" crossorigin>
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
    <title>KenzWheels: Web App for Buying and Selling Cars</title>
    <meta name="title" content="KenzWheels: Web App for Buying and Selling Cars" />
    <meta name="description" content="KenzWheels is a leading platform for buying and selling cars with advanced features, helping users make informed decisions with ease." />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="KenzWheels: Web App for Buying and Selling Cars" />
    <meta property="og:description" content="KenzWheels is a leading platform for buying and selling cars with advanced features, helping users make informed decisions with ease." />
    <meta property="og:url" content="https:/KenzWheels.com/" />
    <meta property="og:image" content="https:/KenzWheels.com/admin/images/ogImage/ogImage1649079006747.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="KenzWheels is a leading platform for buying and selling cars with advanced features, helping users make informed decisions with ease." />
    <meta name="twitter:title" content="KenzWheels: Web App for Buying and Selling Cars" />
    <meta name="twitter:site" content="@KenzWheelsTech" />
    <meta name="twitter:image" content="https://KenzWheels.com/admin/images/ogImage/ogImage1649079006747.png" />
    <meta name="twitter:creator" content="@KenzWheelsTech" />

    <link rel="icon" href="<?= BASE_URL ?>assets/images/logo/favicon_io/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?= BASE_URL ?>assets/images/logo/favicon_io/apple-touch-icon.png">
    <link rel="manifest" href="<?= BASE_URL ?>assets/images/logo/favicon_io/site.webmanifest">
    <link rel="canonical" href="https://KenzWheels.com/" />
    <meta name="msapplication-TileColor" content="#eb9126">
    <meta name="msapplication-TileImage" content="<?= BASE_URL ?>assets/images/logo/favicon_io/favicon.ico">

    <link href="<?= BASE_URL ?>Manage/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>Manage/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>Manage/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= BASE_URL ?>manage/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/css/header.css" as="style" media="all">





    <style>
        /* body {
            background: linear-gradient(91deg, #c7e8f1 24.08%, #fde2d9 71.22%);
        } */
    </style>
</head>