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
    <link href="Manage/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
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
                                    <label class="form-label" for="mobile-number">Country Code</label>
                                    <div class="input-group">
                                        <select class="form-select select2 form-control" id="country-code" name="country_code" style="
                                                    display: block;
                                                    width: 100%;
                                                    padding: 0.47rem 0.75rem;
                                                    font-size: 0.875rem;
                                                    font-weight: 400;
                                                    line-height: 1.5;
                                                    color: var(--bs-body-color);
                                                    -webkit-appearance: none;
                                                    -moz-appearance: none;
                                                    appearance: none;
                                                    background-color: var(--bs-secondary-bg);
                                                    background-clip: padding-box;
                                                    border: var(--bs-border-width) solid var(--bs-border-color);
                                                    border-radius: var(--bs-border-radius);
                                                    -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
                                                    transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
                                                    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                                                    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
                                                ">
                                            <option value="">Select country</option>
                                            <!-- Will be populated via API -->
                                        </select>

                                    </div>
                                    <div class="invalid-feedback">Please enter a valid mobile number with country code.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="mobile-number">Mobile Number</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="mobile-number" name="mobile_number" placeholder="Enter Mobile Number" required>
                                        <input type="hidden" id="full-mobile-number" name="full_mobile_number">
                                    </div>
                                    <div class="invalid-feedback">Please enter a valid mobile number with country code.</div>
                                </div>
                                <script>
                                    // Combine country code and mobile number before form submission
                                    document.getElementById('registrationForm').addEventListener('submit', function(e) {
                                        const countryCode = document.getElementById('country-code').value;
                                        const mobileNumber = document.getElementById('mobile-number').value;
                                        document.getElementById('full-mobile-number').value = countryCode + mobileNumber;
                                    });
                                </script>
                                <script>
                                    // Wait for document ready and jQuery to be available
                                    document.addEventListener('DOMContentLoaded', function() {
                                        // Initialize select2 with search functionality after jQuery is loaded
                                        setTimeout(function() {
                                            $('#country-code').select2({
                                                placeholder: 'Select country',
                                                allowClear: true,
                                            });
                                        }, 100);

                                        // Get user's location and fetch country codes
                                        fetch('https://ipapi.co/json/')
                                            .then(response => response.json())
                                            .then(locationData => {
                                                // Store user's country code
                                                const userCountry = locationData.country_name;

                                                // Fetch country codes
                                                return fetch('https://restcountries.com/v3.1/all')
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        const countrySelect = document.getElementById('country-code');
                                                        let countries = data.filter(country => country.idd.root)
                                                            .sort((a, b) => {
                                                                return a.name.common.localeCompare(b.name.common);
                                                            });

                                                        // Populate options
                                                        countries.forEach(country => {
                                                            const code = country.idd.root + (country.idd.suffixes ? country.idd.suffixes[0] : "");
                                                            const option = document.createElement('option');
                                                            option.value = code;
                                                            option.text = `${country.name.common} (${code})`;
                                                            if (country.name.common === userCountry) {
                                                                option.selected = true;
                                                            }
                                                            countrySelect.appendChild(option);
                                                        });

                                                        // Trigger select2 to update with selected value
                                                        setTimeout(function() {
                                                            $('#country-code').trigger('change');
                                                        }, 100);
                                                    });
                                            })
                                            .catch(error => {
                                                console.error('Error:', error);
                                                // Fallback to populating the dropdown without preselection
                                                fetch('https://restcountries.com/v3.1/all')
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        const countrySelect = document.getElementById('country-code');
                                                        let countries = data.filter(country => country.idd.root)
                                                            .sort((a, b) => {
                                                                return a.name.common.localeCompare(b.name.common);
                                                            });

                                                        countries.forEach(country => {
                                                            const code = country.idd.root + (country.idd.suffixes ? country.idd.suffixes[0] : "");
                                                            const option = document.createElement('option');
                                                            option.value = code;
                                                            option.text = `${country.name.common} (${code})`;
                                                            countrySelect.appendChild(option);
                                                        });

                                                        setTimeout(function() {
                                                            $('#country-code').trigger('change');
                                                        }, 100);
                                                    });
                                            });
                                    });
                                </script>
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                                    <div class="invalid-feedback">Please enter a valid email address.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required minlength="8" maxlength="16" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,16}$">
                                    <div class="invalid-feedback">Password must be 8-16 characters and include letters, numbers and special characters.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="referral_code">Referral Code (Optional)</label>
                                    <input type="text" class="form-control" id="referral_code" name="referral_code" placeholder="Enter Referral Code (Optional)">
                                    <div class="invalid-feedback">Please enter a valid referral code.</div>
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
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="Manage/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Manage/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="Manage/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="Manage/assets/libs/node-waves/waves.min.js"></script>
    <script src="Manage/assets/js/app.js"></script>
    <script src="Manage/assets/libs/select2/js/select2.min.js"></script>

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