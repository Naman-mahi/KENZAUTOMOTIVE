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
    <link href="manage/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <script src="manage/assets/libs/sweetalert2/sweetalert2.all.min.js"></script>
</head>

<body data-sidebar="light">
    <div class="account-pages d-flex align-items-center min-vh-100 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <h5 class="text-center mb-4">Dealer Registration</h5>
                            <form id="registrationForm" class="form-horizontal">
                                <div class="mb-4">
                                    <label class="form-label" for="first-name">First Name</label>
                                    <input type="text" class="form-control" id="first-name" name="first_name" placeholder="Enter First Name" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="last-name">Last Name</label>
                                    <input type="text" class="form-control" id="last-name" name="last_name" placeholder="Enter Last Name" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="mobile-number">Mobile Number</label>
                                    <input type="text" class="form-control" id="mobile-number" name="mobile_number" placeholder="Enter Mobile Number" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p class="text-dark-50">Already have an account? <a href="Login.php" class="fw-medium text-primary">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="manage/assets/libs/jquery/jquery.min.js"></script>
    <script src="manage/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="manage/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="manage/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="manage/assets/libs/node-waves/waves.min.js"></script>
    <script src="manage/assets/js/app.js"></script>

    <script>
$(document).ready(function() {
    $('#registrationForm').on('submit', function(e) { // Ensure the form ID is correct
        e.preventDefault(); // Prevent default form submission

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
    });
});
</script>

</body>
</html>

