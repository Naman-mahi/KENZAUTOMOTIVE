<!doctype html>
<html lang="en">
<?php
session_start(); // Start the session
include '../includes/db.php'; // Include your database connection file

// Check if the user is already logged in
if (isset($_SESSION['role'])) {
    // Redirect based on user role
    if ($_SESSION['role'] === 'admin') {
        header("Location: Manage/dashboard.php"); // Redirect to admin dashboard
    } elseif ($_SESSION['role'] === 'dealer') {
        header("Location: Manage/dashboard.php"); // Redirect to admin dashboard
    } else {
        header("Location: mypage.php"); // Redirect to mypage for unrecognized roles
    }
    exit(); // Stop script execution
}

// If the user is not logged in, show the login form
?>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="Manage/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="Manage/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="Manage/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="Manage/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body data-sidebar="light">

    <div class="account-pages d-flex align-items-center min-vh-100 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <a href="index.html" class="d-inline-block">
                                    <img src="Manage/assets/images/logo_new-removebg.png" alt="" height="24" class="auth-logo logo-dark mx-auto">
                                    <img src="Manage/assets/images/logo_new-removebg.png" alt="" height="24" class="auth-logo logo-light mx-auto">
                                </a>
                            </div>
                            <!-- <h4 class="font-size-18 text-muted mt-2 text-center">Welcome Back !</h4> -->
                            <p class="mb-5 text-center">Sign in to continue to Kenz Automotive.</p>
                            <form class="form-horizontal" method="POST" action="login.php">
                                <div class="mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="userpassword">Password</label>
                                    <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password">
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customControlInline">
                                            <label class="form-check-label" for="customControlInline">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="PasswordRecover.php" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p class="text-dark-50">Don't have an account? <a href="AuthRegister.php" class="fw-medium text-primary">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>