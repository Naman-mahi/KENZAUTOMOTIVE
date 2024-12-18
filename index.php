<!doctype html>
<html lang="en">
<?php
session_start(); // Start the session

// Check if the user is already logged in
if (isset($_SESSION['role'])) {
    // Redirect based on user role
    if ($_SESSION['role'] === '4') {
        header("Location: mypage.php"); // Redirect to customer user page
    } else {
        header("Location: Manage/Dashboard.php"); // Redirect to Manage Dashboard for all other roles
    }
    exit(); // Stop script execution
}
?>



<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Manage/assets/images/favicon.ico">
    <link href="Manage/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="Manage/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="Manage/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="Manage/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <script src="Manage/assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

    <style>
        /* body {
            background: linear-gradient(91deg, #c7e8f1 24.08%, #fde2d9 71.22%);
        } */
    </style>
</head>

<body data-sidebar="light">

    <div class="account-pages d-flex align-items-center min-vh-100 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <img src="Manage/assets/images/kenzwheels-light.png" alt="Kenz Wheels Logo" class="img-fluid mb-4">
                            <p class="mb-3 text-center">Sign in to continue to Kenz Wheels.</p>
                            <form id="loginForm" class="form-horizontal">
                                <div class="mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="userpassword">Password</label>
                                    <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password" required>
                                </div>
                                <div class="d-grid">
                                    <button class="btn rounded-0  btn-primary waves-effect waves-light" type="submit">Log In</button>
                                </div>
                                <div class="row mt-3 d-flex justify-content-end">
                                    <div class="col-auto">
                                        <a href="PasswordRecover.php" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p class="text-dark-50">
                            Don’t have an account yet? <a href="DealerRegistration.php" class="fw-medium text-primary">Register now</a> to get started!
                            Want to learn more? Check out our <a href="subscription.php" class="fw-medium text-primary">Pricing</a> options.
                        </p>

                    </div>
                </div>
            </div>
            
        </div>
       
               
            
    </div>
    <div class="fixed-bottom bg-light py-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Kenz Wheels.
                </div>
                <div class="col-sm-6 text-end">
                    <a href="privacy" class="text-muted">Privacy Policy</a> | <a href="terms" class="text-muted">Terms of Service</a>
                </div>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT -->
    <script src="Manage/assets/libs/jquery/jquery.min.js"></script>
    <script src="Manage/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Manage/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="Manage/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="Manage/assets/libs/node-waves/waves.min.js"></script>
    <script src="Manage/assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                $.ajax({
                    url: 'login.php', // Your PHP script to handle the login
                    type: 'POST',
                    data: $(this).serialize(), // Serialize form data
                    success: function(response) {
                        // Handle response
                        const data = JSON.parse(response);
                        if (data.success) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Login successful!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.href = data.redirect; // Redirect to the appropriate page
                            });
                        } else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'An error occurred. Please try again.',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            });
        });
    </script>


</body>

</html>