<!doctype html>
<html lang="en">
<?php
session_start(); // Start the session
if (!isset($_SESSION['user_id'])) {
    // If not set, redirect to index.php
    header("Location: index.php");
    exit(); // Ensure no further code is executed
}
include 'includes/db.php';

?>

<head>
    <meta charset="utf-8" />
    <title>Add Business Details</title>
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
                <div class="col-xl-8 col-lg-10 col-md-10">
                    <div class="card">
                        <div class="card-body p-4">
                            <h5 class="text-center mb-4">Add Business Details</h5>
                            <form id="businessDetailsForm" class="form-horizontal" method="POST" action="your_action_page.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6 mb-4">
                                        <label class="form-label" for="company-name">Company Name</label>
                                        <input type="text" class="form-control" id="company-name" name="company_name" placeholder="Enter Company Name" required>
                                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $_SESSION['user_id'] ?>" required>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label class="form-label" for="contact-person">Contact Person</label>
                                        <input type="text" class="form-control" id="contact-person" name="contact_person" placeholder="Enter Contact Person's Name" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-4">
                                        <label class="form-label" for="phone-number">Phone Number</label>
                                        <input type="text" class="form-control" id="phone-number" name="phone_number" placeholder="Enter Phone Number" required>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-4">
                                        <label class="form-label" for="address-line1">Address Line 1</label>
                                        <input type="text" class="form-control" id="address-line1" name="address_line1" placeholder="Enter Address Line 1" required>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label class="form-label" for="address-line2">Address Line 2</label>
                                        <input type="text" class="form-control" id="address-line2" name="address_line2" placeholder="Enter Address Line 2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-4">
                                        <label class="form-label" for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label class="form-label" for="state">State</label>
                                        <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-4">
                                        <label class="form-label" for="postal-code">Postal Code</label>
                                        <input type="text" class="form-control" id="postal-code" name="postal_code" placeholder="Enter Postal Code" required>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label class="form-label" for="country">Country</label>
                                        <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-4">
                                        <label class="form-label" for="pan-number">PAN Number</label>
                                        <input type="text" class="form-control" id="pan-number" name="pan_number" placeholder="Enter PAN Number" required>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label class="form-label" for="product-category">Product Category</label>
                                        <select class="form-select" id="product-category" name="product_category_id" required>
                                            <option value="">Select a Category</option>
                                            <?php
                                            // Fetch categories from the database
                                            $stmt = $conn->prepare("SELECT category_id, category_name FROM categories");
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row['category_id'] . '">' . htmlspecialchars($row['category_name']) . '</option>';
                                            }

                                            // Close the statement
                                            $stmt->close();
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-4">
                                        <label class="form-label" for="gst-number">GST Number</label>
                                        <input type="text" class="form-control" id="gst-number" name="gst_number" placeholder="Enter GST Number" required>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <label class="form-label" for="document-upload">Document Upload</label>
                                        <input type="file" class="form-control" id="document-upload" name="document_upload" required>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <p class="text-dark-50"><a href="index.php" class="fw-medium text-primary">Login</a></p>
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
            $('#businessDetailsForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                $.ajax({
                    url: 'add_business_details_register.php', // Your PHP script to handle form submission
                    type: 'POST',
                    data: new FormData(this), // Use FormData for file uploads
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(data) {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: data.message,
                                text: 'Business details added successfully!',
                                timer: 1500,
                                onClose: () => {
                                    window.location.href = 'some_page.php'; // Redirect after success
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