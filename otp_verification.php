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
                            <h5 class="text-center">Enter OTP</h5>
                            <form id="otpForm" method="post">
                                <div class="mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="otp">OTP</label>
                                    <input type="number" class="form-control" id="otp" name="otp" placeholder="Enter your OTP" required>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary" type="submit">Verify OTP</button>
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
        $('#otpForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            $.ajax({
                url: 'verify_otp.php', // Your PHP script to handle OTP verification
                type: 'POST',
                data: $(this).serialize(), // Serialize form data
                success: function(response) {
                    const data = JSON.parse(response);
                    if (data.success) {
                        // Use SweetAlert for success
                        Swal.fire({
                            icon: 'success',
                            title: 'OTP Verified!',
                            text: 'You have successfully verified your OTP.',
                            showConfirmButton: false,
                            timer: 1500 // Optional timer to auto-close the alert
                        }).then(() => {
                            window.location.href = 'add_business_details.php'; // Redirect to add business details page
                        });
                    } else {
                        // Use SweetAlert for error
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: data.message
                        });
                    }
                }
            });
        });
    </script>

</body>

</html>