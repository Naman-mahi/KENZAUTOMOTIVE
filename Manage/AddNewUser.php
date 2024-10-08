<?php
include 'head.php';
require_once '../includes/db.php'; // Ensure database connection is included
// Fetch inquiries securely
$sql = "SELECT * FROM `users` WHERE role = 'sales_agent'";
$result = $conn->query($sql);
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add New User</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add New User</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="registrationForm" class="form-horizontal" novalidate>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="firstName">First Name</label>
                                        <input type="text" class="form-control" id="firstName" name="first_name" placeholder="First name" required>
                                        <div class="invalid-feedback">
                                            Please provide your first name.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="lastName">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Last name" required>
                                        <div class="invalid-feedback">
                                            Please provide your last name.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid email address.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="phone">Phone</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" required pattern="[0-9]{10}">
                                        <div class="invalid-feedback">
                                            Please provide a valid phone number (10 digits).
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                        <div class="invalid-feedback">
                                            Please provide a password.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="confirmPassword">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirmPassword" name="confirm_password" required>
                                        <div class="invalid-feedback">
                                            Please confirm your password.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="role">Role</label>
                                        <select class="form-select" id="role" name="role" required>
                                            <option value="" disabled selected>Select</option>
                                            <option value="sales_agent">Sales Agent</option>
                                            <option value="website_user">Website User</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a role.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="referral_code">Referral Code</label>
                                        <input type="text" class="form-control" id="referral_code" name="referral_code" placeholder="Referral Code">
                                    </div>
                                    

                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-primary">Add User</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>
<!-- end main content-->

<script>
    // Form validation
    (function() {
        'use strict';
        const forms = document.querySelectorAll('form');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            });
        });
    })();

    $(document).ready(function() {
        $('#registrationForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the form from submitting normally

            if (this.checkValidity()) {
                const formData = $(this).serialize(); // Serialize form data
                console.log(formData);
                $.ajax({
    type: 'POST',
    url: 'registerUser.php',
    data: formData,
    success: function(response) {
        console.log(response); // Log the raw response for debugging
        const result = JSON.parse(response);
        if (result.success) {
            Swal.fire({
                title: 'Success!',
                text: 'User registered successfully.',
                icon: 'success',
            }).then(() => {
                window.location.href = 'WebsiteUsersManagement.php';
            });
        } else {
            Swal.fire({
                title: 'Error!',
                text: result.message,
                icon: 'error',
            });
        }
    },
    error: function() {
        Swal.fire({
            title: 'Error!',
            text: 'An error occurred. Please try again later.',
            icon: 'error',
        });
    }
});

            } else {
                this.classList.add('was-validated'); // Add validation class
            }
        });
    });
</script>
<?php
include 'footer.php';
?>