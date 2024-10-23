<!doctype html>
<html lang="en">
<?php
session_start(); // Start the session
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
    <title>Dealer Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Manage/assets/images/favicon.ico">
    <link href="Manage/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="Manage/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="Manage/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="Manage/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <script src="Manage/assets/libs/sweetalert2/sweetalert2.all.min.js"></script>
</head>

<body data-sidebar="light">
    <div class="account-pages d-flex align-items-center min-vh-100 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <h5 class="text-center mb-4">Dealer Registration</h5>
                            <form id="registrationForm" class="form-horizontal" novalidate>
                                <div class="mb-3">
                                    <label class="form-label" for="first-name">First Name</label>
                                    <input type="text" class="form-control" id="first-name" name="first_name" placeholder="Enter First Name" required>
                                    <div class="invalid-feedback">Please enter your first name.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="last-name">Last Name</label>
                                    <input type="text" class="form-control" id="last-name" name="last_name" placeholder="Enter Last Name" required>
                                    <div class="invalid-feedback">Please enter your last name.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="mobile-number">Mobile Number</label>
                                    <input type="tel" class="form-control" id="mobile-number" name="mobile_number" placeholder="Enter Mobile Number" required pattern="[0-9]{10}">
                                    <div class="invalid-feedback">Please enter a valid mobile number (10 digits).</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                                    <div class="invalid-feedback">Please enter a valid email address.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required minlength="6">
                                    <div class="invalid-feedback">Please enter a password (at least 6 characters).</div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn rounded-0 btn-primary waves-effect waves-light" type="submit">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p class="text-dark-50">Already have an account? <a href="index" class="fw-medium text-primary">Login</a></p>
                    </div>
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
            // Form validation
            $('#registrationForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission
                // Check if the form is valid
                if (this.checkValidity()) {
                    $.ajax({
                        url: 'register.php', // Your PHP script to handle registration
                        type: 'POST',
                        data: $(this).serialize(), // Serialize form data
                        dataType: 'json', // Expect JSON response
                        success: function(data) {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: data.message,
                                    text: 'Redirecting to OTP verification...',
                                    timer: 1500,
                                    onClose: () => {
                                        window.location.href = data.redirect; // Redirect to OTP verification page
                                    }
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data.message,
                                });
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            Swal.fire({
                                icon: 'error',
                                title: 'An error occurred',
                                text: 'Please try again later. Error: ' + errorThrown,
                            });
                        }
                    });
                } else {
                    // Show validation errors
                    this.classList.add('was-validated');
                }
            });
        });
    </script>
</body>

</html>