<!doctype html>
<html lang="en">
<?php
session_start(); // Start the session
if (!isset($_SESSION['user_id'])) {
    header("Location: index");
    exit();
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
    <link href="Manage/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <script src="Manage/assets/libs/sweetalert2/sweetalert2.all.min.js"></script>
</head>

<body data-sidebar="light">
    <div class="account-pages d-flex align-items-center min-vh-100 py-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-8 col-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <h5 class="text-center mb-4">Add Business Details</h5>
                            <form id="businessDetailsForm" class="form-horizontal needs-validation" method="POST" action="your_action_page.php" enctype="multipart/form-data" novalidate>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="company-name">Company Name</label>
                                        <input type="text" class="form-control" id="company-name" name="company_name" placeholder="Enter Company Name" required>
                                        <div class="invalid-feedback">Please enter a company name.</div>
                                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $_SESSION['user_id'] ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="contact-person">Contact Person</label>
                                        <input type="text" class="form-control" id="contact-person" name="contact_person" placeholder="Enter Contact Person's Name" required>
                                        <div class="invalid-feedback">Please enter a contact person's name.</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="phone-number">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone-number" name="phone_number" placeholder="Enter Phone Number" required>
                                        <div class="invalid-feedback">Please enter a valid phone number.</div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                                        <div class="invalid-feedback">Please enter a valid email address.</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="address-line1">Address Line 1</label>
                                        <input type="text" class="form-control" id="address-line1" name="address_line1" placeholder="Enter Address Line 1" required>
                                        <div class="invalid-feedback">Please enter an address.</div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="address-line2">Address Line 2</label>
                                        <input type="text" class="form-control" id="address-line2" name="address_line2" placeholder="Enter Address Line 2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required>
                                        <div class="invalid-feedback">Please enter a city.</div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="state">State</label>
                                        <input type="text" class="form-control" id="state" name="state" placeholder="Enter State" required>
                                        <div class="invalid-feedback">Please enter a state.</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="postal-code">Postal Code</label>
                                        <input type="text" class="form-control" id="postal-code" name="postal_code" placeholder="Enter Postal Code" required>
                                        <div class="invalid-feedback">Please enter a postal code.</div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="country">Country</label>
                                        <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" required>
                                        <div class="invalid-feedback">Please enter a country.</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="pan-number">PAN Number</label>
                                        <input type="text" class="form-control" id="pan-number" name="pan_number" placeholder="Enter PAN Number" required>
                                        <div class="invalid-feedback">Please enter a PAN number.</div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label" for="pan-number">GST Number</label>
                                        <input type="text" class="form-control" id="pan-number" name="gst_number" placeholder="Enter GST Number" required>
                                        <div class="invalid-feedback">Please enter a GST number.</div>
                                    </div>

                                </div>

                                <div class="mb-4">
    <label class="form-label">Select Document Types:</label><br>
    <div style="display: flex; flex-wrap: wrap;">
        <div style="margin-right: 15px;">
            <input type="checkbox" class="document-checkbox" id="proprietorship_document" name="document_types[]" value="proprietorship_document" checked disabled required>
            <label for="proprietorship_document">Proprietorship Registration <strong class="text-danger"><sup>*</sup></strong></label>
        </div>
        <div style="margin-right: 15px;">
            <input type="checkbox" class="document-checkbox" id="business_address_proof" name="document_types[]" value="business_address_proof" checked disabled required>
            <label for="business_address_proof">Business Address Proof <strong class="text-danger"><sup>*</sup></strong></label>
        </div>
        <div style="margin-right: 15px;">
            <input type="checkbox" class="document-checkbox" id="list_of_products" name="document_types[]" value="list_of_products" checked disabled required>
            <label for="list_of_products">List of Products <strong class="text-danger"><sup>*</sup></strong></label>
        </div>
        <div style="margin-right: 15px;">
            <input type="checkbox" class="document-checkbox" id="gst_certificate" name="document_types[]" value="gst_certificate">
            <label for="gst_certificate">GST Certificate <strong>(optional)</strong></label>
        </div>
        <div style="margin-right: 15px;">
            <input type="checkbox" class="document-checkbox" id="pan_card" name="document_types[]" value="pan_card">
            <label for="pan_card">PAN Card of the Business <strong>(optional)</strong></label>
        </div>
    </div>
    <div class="invalid-feedback" style="display: none;">Please select at least one mandatory document type.</div>
</div>

<div id="upload-section" class="row">
    <div class="col-md-6 mb-4" id="proprietorship_document-upload" style="display: none;">
        <label class="form-label">Proprietorship Registration Upload <strong class="text-danger"><sup>*</sup></strong></label>
        <input type="file" class="form-control" name="document_upload[]" accept=".jpg, .jpeg, .png, .pdf" required>
    </div>
    <div class="col-md-6 mb-4" id="business_address_proof-upload" style="display: none;">
        <label class="form-label">Business Address Proof Upload <strong class="text-danger"><sup>*</sup></strong></label>
        <input type="file" class="form-control" name="document_upload[]" accept=".jpg, .jpeg, .png, .pdf" required>
    </div>
    <div class="col-md-6 mb-4" id="list_of_products-upload" style="display: none;">
        <label class="form-label">List of Products Upload <strong class="text-danger"><sup>*</sup></strong></label>
        <input type="file" class="form-control" name="document_upload[]" accept=".jpg, .jpeg, .png, .pdf" required>
    </div>
</div>

                                <div class="d-grid">
                                    <button class="btn btn-primary rounded-0 waves-effect waves-light" type="submit" id="submit-button">Submit</button>
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
    <script src="Manage/assets/libs/jquery/jquery.min.js"></script>
    <script src="Manage/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Manage/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="Manage/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="Manage/assets/libs/node-waves/waves.min.js"></script>
    <script src="Manage/assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            // Automatically show upload fields for checked mandatory checkboxes
            $('.document-checkbox:checked').each(function() {
                const checkboxId = $(this).attr('id');
                const uploadSection = $('#upload-section');
                uploadSection.find(`#${checkboxId}-upload`).closest('.col-md-6').show();
            });

            $('.document-checkbox').change(function() {
                const checkboxId = $(this).attr('id');
                const uploadSection = $('#upload-section');

                if ($(this).is(':checked')) {
                    uploadSection.append(`
                <div class="col-md-6 mb-4">
                    <label class="form-label" for="${checkboxId}-upload">${$(this).next('label').text()} Upload</label>
                    <input type="file" class="form-control" id="${checkboxId}-upload" name="document_upload[]" accept=".jpg, .jpeg, .png, .pdf">
                </div>
            `);
                } else {
                    uploadSection.find(`#${checkboxId}-upload`).closest('.col-md-6').remove(); // Remove the associated file input
                }
            });

            // Form submission handler
            $('#businessDetailsForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                // Validate the form fields
                if (this.checkValidity() === false) {
                    e.stopPropagation(); // Stop form submission if invalid
                    this.classList.add('was-validated'); // Show validation feedback
                } else {
                    // AJAX form submission logic here
                    $.ajax({
                        url: 'add_business_details_register.php', // Your PHP script to handle form submission
                        type: 'POST',
                        data: new FormData(this),
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
                                        window.location.href = 'index'; // Redirect after success
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
                }

                this.classList.add('was-validated'); // Add validation feedback classes
            });
        });
    </script>

</body>

</html>