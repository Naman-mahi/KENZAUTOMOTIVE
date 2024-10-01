<!doctype html>
<html lang="en">
<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'dealer') {
        header("Location: Manage/dashboard.php");
    } else {
        header("Location: mypage.php");
    }
    exit();
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
                <div class="col-xl-8 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Dealer Registration</h4>

                            <div id="progrss-wizard" class="twitter-bs-wizard">
                                <ul class="twitter-bs-wizard-nav nav-justified nav nav-pills" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="#progress-seller-details" class="nav-link active" data-toggle="tab" aria-selected="true" role="tab">
                                            <span class="step-number">01</span>
                                            <span class="step-title">Account Details</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#progress-business-details" class="nav-link" data-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                                            <span class="step-number">02</span>
                                            <span class="step-title">Business Details</span>
                                        </a>
                                    </li>
                                </ul>

                                <div id="bar" class="progress mt-4">
                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: 50%;"></div>
                                </div>

                                <div class="tab-content twitter-bs-wizard-tab-content">
                                    <div class="tab-pane active show" id="progress-seller-details" role="tabpanel">
                                        <form id="accountDetailsForm">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="firstname">First Name</label>
                                                        <input type="text" class="form-control" id="firstname" placeholder="Enter your First Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="lastname">Last Name</label>
                                                        <input type="text" class="form-control" id="lastname" placeholder="Enter your Last Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="phoneno">Phone</label>
                                                        <input type="text" class="form-control" id="phoneno" placeholder="Enter Phone Number" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="email">Email</label>
                                                        <input type="email" class="form-control" id="email" placeholder="Enter your Email Id" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="password">Create Password</label>
                                                        <input type="password" class="form-control" id="password" placeholder="Create a Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="logo">Upload Dealer Logo</label>
                                                <input type="file" class="form-control" id="logo" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="otp">Enter OTP</label>
                                                <input type="text" class="form-control" id="otp" placeholder="Enter the OTP sent to your email" required>
                                            </div>
                                            <div class="text-center">
                                                <button type="button" class="btn btn-primary" id="sendOtpBtn">Send OTP</button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane" id="progress-business-details" role="tabpanel">
                                        <form id="businessDetailsForm">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="company_name">Company Name</label>
                                                        <input type="text" class="form-control" id="company_name" placeholder="Enter your Company Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="contact_person">Contact Person</label>
                                                        <input type="text" class="form-control" id="contact_person" placeholder="Enter the Contact Person's Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="business_phone">Business Phone</label>
                                                        <input type="text" class="form-control" id="business_phone" placeholder="Enter your Business Phone" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="business_email">Business Email</label>
                                                        <input type="email" class="form-control" id="business_email" placeholder="Enter your Business Email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="pan_number">PAN Number</label>
                                                        <input type="text" class="form-control" id="pan_number" placeholder="Enter your PAN Number" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="gst_number">GST Number</label>
                                                        <input type="text" class="form-control" id="gst_number" placeholder="Enter your GST Number" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="address_line1">Address Line 1</label>
                                                        <input type="text" class="form-control" id="address_line1" placeholder="Enter Address Line 1" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="address_line2">Address Line 2</label>
                                                        <input type="text" class="form-control" id="address_line2" placeholder="Enter Address Line 2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="city">City</label>
                                                        <input type="text" class="form-control" id="city" placeholder="Enter City" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="state">State</label>
                                                        <input type="text" class="form-control" id="state" placeholder="Enter State" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="postal_code">Postal Code</label>
                                                        <input type="text" class="form-control" id="postal_code" placeholder="Enter Postal Code" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="country">Country</label>
                                                        <input type="text" class="form-control" id="country" placeholder="Enter Country" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="document_upload">Upload Document</label>
                                                <input type="file" class="form-control" id="document_upload" required>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="actions clearfix">
                                    <button type="button" class="btn btn-primary next">Next</button>
                                    <button type="button" class="btn btn-secondary previous disabled">Previous</button>
                                    <button type="button" class="btn btn-success submit" style="display:none;">Submit</button>
                                </div>
                            </div>
                        </div>
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
</body>
</html>


   <script>
        $(document).ready(function() {
            var currentTab = 0; // Current tab is set to be the first tab (0)
            showTab(currentTab); // Display the current tab

            function showTab(n) {
                var x = $(".tab-pane");
                $(x[n]).addClass("active show").siblings().removeClass("active show");

                if (n === 0) {
                    $(".previous").addClass("disabled");
                } else {
                    $(".previous").removeClass("disabled");
                }
                if (n === (x.length - 1)) {
                    $(".next").hide();
                    $(".submit").show();
                } else {
                    $(".next").show();
                    $(".submit").hide();
                }

                var progress = ((n + 1) / x.length) * 100;
                $("#bar .progress-bar").css("width", progress + "%");
            }

            $(".next").click(function() {
                var valid = true;
                var form = $("form").eq(currentTab);
                $(form).find("input, textarea").each(function() {
                    if (!$(this).val()) {
                        valid = false;
                    }
                });

                if (valid) {
                    if (currentTab === 0) {
                        const email = $('#email').val();
                        const password = $('#password').val();
                        const logo = $('#logo')[0].files[0];

                        // Send OTP to the user's email
                        $.ajax({
                            url: 'send_otp.php',
                            type: 'POST',
                            data: { email: email },
                            success: function(response) {
                                const data = JSON.parse(response);
                                if (data.success) {
                                    currentTab++;
                                    showTab(currentTab);
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: data.message,
                                    });
                                }
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'An error occurred. Please try again.',
                                });
                            }
                        });
                    } else {
                        currentTab++;
                        showTab(currentTab);
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please fill in all required fields.',
                    });
                }
            });

            $(".previous").click(function() {
                currentTab--;
                showTab(currentTab);
            });

            $("#sendOtpBtn").click(function() {
                const email = $('#email').val();
                $.ajax({
                    url: 'send_otp.php',
                    type: 'POST',
                    data: { email: email },
                    success: function(response) {
                        const data = JSON.parse(response);
                        if (data.success) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'OTP sent to your email!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.message,
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to send OTP. Please try again.',
                        });
                    }
                });
            });

            $(document).ready(function() {
    $("#submitBtn").click(function() {
        const sellerData = $("#sellerDetailsForm").serializeArray(); // Use serializeArray to get an array of objects
        const businessData = $("#businessDetailsForm").serializeArray();
        const otp = $('#otp').val();
        const logo = $('#logo')[0].files[0]; // Assuming you have an input for logo
        const documentUpload = $('#document_upload')[0].files[0]; // Assuming you have an input for document upload

        const formData = new FormData();
        if (logo) {
            formData.append('logo', logo);
        }
        if (documentUpload) {
            formData.append('document_upload', documentUpload);
        }
        formData.append('otp', otp);

        // Append seller data
        sellerData.forEach(item => {
            formData.append(item.name, item.value);
        });

        // Append business data
        businessData.forEach(item => {
            formData.append(item.name, item.value);
        });

        // Now send the FormData via AJAX
        $.ajax({
            url: 'submit_registration.php',
            type: 'POST',
            data: formData,
            processData: false, // Important
            contentType: false, // Important
            success: function(response) {
                const data = JSON.parse(response);
                if (data.success) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Registration successful!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = 'success_page.php';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message,
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred. Please try again.',
                });
            }
        });
    });
});
        });
    </script>