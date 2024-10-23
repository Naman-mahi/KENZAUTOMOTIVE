<?php
include 'head.php';
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Manage Appearance</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Appearance</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Colorpicker</h2>
                                <div class="row">
                                    <div class="col-md-9">
                                        <form id="colorSettingsForm" action="save_colors.php" method="POST">
                                            <label for="textColor" class="form-label">Choose Text Color</label>
                                            <input type="color" class="form-control form-control-color p-0" id="textColor" name="textColor" value="#CCCCCC" title="Choose a color">

                                            <label for="buttonColor" class="form-label mt-3">Choose Button Color</label>
                                            <input type="color" class="form-control form-control-color p-0" id="buttonColor" name="buttonColor" value="#007bff" title="Choose a color">

                                            <label for="activeButtonColor" class="form-label mt-3">Choose Active Button Color</label>
                                            <input type="color" class="form-control form-control-color p-0" id="activeButtonColor" name="activeButtonColor" value="#0056b3" title="Choose a color">

                                            <label for="activeTextColor" class="form-label mt-3">Choose Active Text Color</label>
                                            <input type="color" class="form-control form-control-color p-0" id="activeTextColor" name="activeTextColor" value="#ffffff" title="Choose a color">

                                            <label class="form-label mt-3">Choose Button Padding</label>
                                            <div>
                                                <label class="radio-button">
                                                    <input type="radio" name="buttonPadding" value="p-0" checked>
                                                    <span>Padding 0</span>
                                                </label>
                                                <label class="radio-button">
                                                    <input type="radio" name="buttonPadding" value="p-1">
                                                    <span>Padding 1</span>
                                                </label>
                                                <label class="radio-button">
                                                    <input type="radio" name="buttonPadding" value="p-2">
                                                    <span>Padding 2</span>
                                                </label>
                                                <label class="radio-button">
                                                    <input type="radio" name="buttonPadding" value="p-3">
                                                    <span>Padding 3</span>
                                                </label>
                                                <label class="radio-button">
                                                    <input type="radio" name="buttonPadding" value="p-4">
                                                    <span>Padding 4</span>
                                                </label>
                                                <label class="radio-button">
                                                    <input type="radio" name="buttonPadding" value="p-5">
                                                    <span>Padding 5</span>
                                                </label>
                                            </div>

                                            <label class="form-label mt-3">Choose Button Rounded Style</label>
                                            <div>
                                                <label class="radio-button">
                                                    <input type="radio" name="buttonRounded" value="rounded-0" checked>
                                                    <span>No Rounded</span>
                                                </label>
                                                <label class="radio-button">
                                                    <input type="radio" name="buttonRounded" value="rounded-1">
                                                    <span>Rounded 1</span>
                                                </label>
                                                <label class="radio-button">
                                                    <input type="radio" name="buttonRounded" value="rounded-2">
                                                    <span>Rounded 2</span>
                                                </label>
                                                <label class="radio-button">
                                                    <input type="radio" name="buttonRounded" value="rounded-3">
                                                    <span>Rounded 3</span>
                                                </label>
                                                <label class="radio-button">
                                                    <input type="radio" name="buttonRounded" value="rounded-4">
                                                    <span>Rounded 4</span>
                                                </label>    
                                                <label class="radio-button">
                                                    <input type="radio" name="buttonRounded" value="rounded-5">
                                                    <span>Rounded 5</span>
                                                </label>
                                            </div>

                                            <label class="form-label mt-3">Choose Button Active State</label>
                                            <div>
                                                <label class="radio-button">
                                                    <input type="radio" name="buttonActive" value="active" checked>
                                                    <span>Active</span>
                                                </label>
                                                <label class="radio-button">
                                                    <input type="radio" name="buttonActive" value="inactive">
                                                    <span>Inactive</span>
                                                </label>
                                            </div>

                                            <button type="submit" class="btn btn-success mt-3">Save Settings</button>
                                        </form>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mt-4">
                                            <h3 id="textSample" style="color: #CCCCCC;">Sample Text</h3>
                                            <button id="sampleButton" class="btn btn-primary rounded-0 p-0">Sample Button</button>
                                            <h3 id="activeTextSample" class="mt-2" style="color: #ffffff;">Active Sample Text</h3>
                                            <button id="activeSampleButton" class="btn btn-primary rounded-0 p-0 active" style="background-color: #0056b3; color: #ffffff;">Active Button</button>
                                        </div>
                                    </div>
                                </div> <!-- end row -->
                            </div>

                            <style>
                                .radio-button {
                                    display: inline-block;
                                    margin-right: 15px;
                                }

                                .radio-button input[type="radio"] {
                                    display: none;
                                    /* Hide the default radio button */
                                }

                                .radio-button span {
                                    padding: 10px 15px;
                                    border: 1px solid #007bff;
                                    border-radius: 5px;
                                    cursor: pointer;
                                    background-color: #f8f9fa;
                                    /* Light background */
                                    transition: background-color 0.3s;
                                }

                                .radio-button input[type="radio"]:checked+span {
                                    background-color: #007bff;
                                    /* Highlight on check */
                                    color: white;
                                    /* White text on active */
                                }
                            </style>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const textColorInput = document.getElementById('textColor');
                                    const buttonColorInput = document.getElementById('buttonColor');
                                    const activeButtonColorInput = document.getElementById('activeButtonColor');
                                    const activeTextColorInput = document.getElementById('activeTextColor');
                                    const sampleButton = document.getElementById('sampleButton');
                                    const activeSampleButton = document.getElementById('activeSampleButton');
                                    const activeTextSample = document.getElementById('activeTextSample');

                                    // Change text color
                                    textColorInput.addEventListener('input', function() {
                                        document.getElementById('textSample').style.color = textColorInput.value;
                                    });

                                    // Change button color
                                    buttonColorInput.addEventListener('input', function() {
                                        sampleButton.style.backgroundColor = buttonColorInput.value;
                                        sampleButton.style.borderColor = buttonColorInput.value; // Update border color as well
                                    });

                                    // Change active button color and text color
                                    activeButtonColorInput.addEventListener('input', function() {
                                        if (activeSampleButton.classList.contains('active')) {
                                            activeSampleButton.style.backgroundColor = activeButtonColorInput.value;
                                            activeSampleButton.style.borderColor = activeButtonColorInput.value;
                                        }
                                    });

                                    activeTextColorInput.addEventListener('input', function() {
                                        if (activeSampleButton.classList.contains('active')) {
                                            activeSampleButton.style.color = activeTextColorInput.value; // Change text color when active
                                            activeTextSample.style.color = activeTextColorInput.value; // Change active text color
                                        }
                                    });

                                    // Change button padding
                                    document.querySelectorAll('input[name="buttonPadding"]').forEach(function(input) {
                                        input.addEventListener('change', function() {
                                            sampleButton.classList.remove('p-0', 'p-1', 'p-2', 'p-3');
                                            sampleButton.classList.add(input.value);
                                        });
                                    });

                                    // Change button rounded style
                                    document.querySelectorAll('input[name="buttonRounded"]').forEach(function(input) {
                                        input.addEventListener('change', function() {
                                            sampleButton.classList.remove('rounded-0', 'rounded-1', 'rounded-2');
                                            sampleButton.classList.add(input.value);
                                        });
                                    });

                                    // Change button active state
                                    document.querySelectorAll('input[name="buttonActive"]').forEach(function(input) {
                                        input.addEventListener('change', function() {
                                            if (input.value === 'active') {
                                                activeSampleButton.classList.add('active');
                                                activeSampleButton.style.backgroundColor = activeButtonColorInput.value;
                                                activeSampleButton.style.borderColor = activeButtonColorInput.value;
                                                activeSampleButton.style.color = activeTextColorInput.value; // Set active text color
                                                activeTextSample.style.color = activeTextColorInput.value; // Set active text color
                                            } else {
                                                activeSampleButton.classList.remove('active');
                                                activeSampleButton.style.backgroundColor = buttonColorInput.value; // Reset to normal color
                                                activeSampleButton.style.borderColor = buttonColorInput.value;
                                                activeSampleButton.style.color = ''; // Reset text color
                                                activeTextSample.style.color = ''; // Reset active text color
                                            }
                                        });
                                    });
                                });
                            </script>

<script>
                                $(document).ready(function() {
                                    $('#colorSettingsForm').on('submit', function(event) {
                                        event.preventDefault(); // Prevent the default form submission

                                        // Serialize form data
                                        var formData = $(this).serialize();

                                        // Send AJAX request
                                        $.ajax({
                                            url: 'save_colors.php', // Your PHP script to handle the form submission
                                            type: 'POST',
                                            data: formData,
                                            success: function(response) {
                                                // Show success message
                                                Swal.fire({
                                                    title: 'Success!',
                                                    text: 'Settings saved successfully!',
                                                    icon: 'success',
                                                    confirmButtonText: 'OK'
                                                });
                                            },
                                            error: function(xhr, status, error) {
                                                // Show error message
                                                Swal.fire({
                                                    title: 'Error!',
                                                    text: 'Failed to save settings: ' + error,
                                                    icon: 'error',
                                                    confirmButtonText: 'OK'
                                                });
                                            }
                                        });
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->
<?php
include 'footer.php';
?>