<?php
include 'head.php';

// Fetch settings from the database
include '../includes/db.php'; // Make sure to include this again if you're not including it globally
$sql = "SELECT * FROM settings ORDER BY id DESC LIMIT 1"; // Fetch the latest settings
$result = $conn->query($sql);

$settings = null;

if ($result && $result->num_rows > 0) {
    $settings = $result->fetch_assoc();
} else {
    echo "No settings found.";
}
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

                        <div class="row">
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="card-title">Colorpicker</h2>
                                        <form id="colorSettingsForm" action="save_colors.php" method="POST">
                                            <label for="textColor" class="form-label">Choose Text Color</label>
                                            <input type="color" class="form-control form-control-color p-0" id="textColor" name="textColor" value="<?php echo isset($settings['text_color']) ? htmlspecialchars($settings['text_color']) : '#CCCCCC'; ?>" title="Choose a color">

                                            <label for="buttonColor" class="form-label mt-3">Choose Button Color</label>
                                            <input type="color" class="form-control form-control-color p-0" id="buttonColor" name="buttonColor" value="<?php echo isset($settings['button_color']) ? htmlspecialchars($settings['button_color']) : '#007bff'; ?>" title="Choose a color">

                                            <label for="activeButtonColor" class="form-label mt-3">Choose Active Button Color</label>
                                            <input type="color" class="form-control form-control-color p-0" id="activeButtonColor" name="activeButtonColor" value="<?php echo isset($settings['active_button_color']) ? htmlspecialchars($settings['active_button_color']) : '#0056b3'; ?>" title="Choose a color">

                                            <label for="activeTextColor" class="form-label mt-3">Choose Active Text Color</label>
                                            <input type="color" class="form-control form-control-color p-0" id="activeTextColor" name="activeTextColor" value="<?php echo isset($settings['active_text_color']) ? htmlspecialchars($settings['active_text_color']) : '#ffffff'; ?>" title="Choose a color">

                                            <label class="form-label my-3">Choose Button Padding</label>
                                            <div>
                                                <?php
                                                $buttonPaddingOptions = ['p-0', 'p-1', 'p-2', 'p-3'];
                                                foreach ($buttonPaddingOptions as $option):
                                                    $checked = (isset($settings['button_padding']) && $settings['button_padding'] === $option) ? 'checked' : '';
                                                ?>
                                                    <label class="radio-button">
                                                        <input type="radio" name="buttonPadding" value="<?php echo $option; ?>" <?php echo $checked; ?>>
                                                        <span><?php echo ucfirst($option); ?></span>
                                                    </label>
                                                <?php endforeach; ?>
                                            </div>

                                            <label class="form-label my-3">Choose Button Rounded Style</label>
                                            <div>
                                                <?php
                                                $buttonRoundedOptions = ['rounded-0', 'rounded-1', 'rounded-2', 'rounded-3', 'rounded-4', 'rounded-5'];
                                                foreach ($buttonRoundedOptions as $option):
                                                    $checked = (isset($settings['button_rounded']) && $settings['button_rounded'] === $option) ? 'checked' : '';
                                                ?>
                                                    <label class="radio-button">
                                                        <input type="radio" name="buttonRounded" value="<?php echo $option; ?>" <?php echo $checked; ?>>
                                                        <span><?php echo ucfirst(str_replace('-', ' ', $option)); ?></span>
                                                    </label>
                                                <?php endforeach; ?>
                                            </div>

                                            <label class="form-label my-3">Choose Button Active State</label>
                                            <div>
                                                <label class="radio-button">
                                                    <input type="radio" name="buttonActive" value="active" <?php echo (isset($settings['button_active']) && $settings['button_active'] === 'active') ? 'checked' : ''; ?>>
                                                    <span>Active</span>
                                                </label>
                                                <label class="radio-button">
                                                    <input type="radio" name="buttonActive" value="inactive" <?php echo (isset($settings['button_active']) && $settings['button_active'] === 'inactive') ? 'checked' : ''; ?>>
                                                    <span>Inactive</span>
                                                </label>
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-success mt-3">Save Settings</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="text-center">Display Sample</h2>
                                        <hr>
                                        <div class="mt-4">
                                            <h3 id="textSample" style="color: <?php echo isset($settings['text_color']) ? htmlspecialchars($settings['text_color']) : '#CCCCCC'; ?>;">Sample Text</h3>
                                            <button id="sampleButton" class="btn <?php echo isset($settings['button_rounded']) ? htmlspecialchars($settings['button_rounded']) : 'rounded-0'; ?> <?php echo isset($settings['button_padding']) ? htmlspecialchars($settings['button_padding']) : 'p-0'; ?>" style="background-color: <?php echo isset($settings['button_color']) ? htmlspecialchars($settings['button_color']) : '#007bff'; ?>; color: <?php echo isset($settings['text_color']) ? htmlspecialchars($settings['text_color']) : '#FFFFFF'; ?>;">Sample Button</button>

                                            <h3 id="activeTextSample" class="mt-2" style="color: <?php echo isset($settings['active_text_color']) ? htmlspecialchars($settings['active_text_color']) : '#ffffff'; ?>;">Active Sample Text</h3>
                                            <button id="activeSampleButton" class="btn <?php echo isset($settings['button_rounded']) ? htmlspecialchars($settings['button_rounded']) : 'rounded-0'; ?> <?php echo isset($settings['button_padding']) ? htmlspecialchars($settings['button_padding']) : 'p-0'; ?> active" style="background-color: <?php echo isset($settings['active_button_color']) ? htmlspecialchars($settings['active_button_color']) : '#0056b3'; ?>; color: <?php echo isset($settings['active_text_color']) ? htmlspecialchars($settings['active_text_color']) : '#ffffff'; ?>;">Active Button</button>
                                        </div>
                                    </div>
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
                        }

                        .radio-button span {
                            padding: 10px 15px;
                            border: 1px solid #007bff;
                            border-radius: 5px;
                            cursor: pointer;
                            background-color: #f8f9fa;
                            transition: background-color 0.3s;
                        }

                        .radio-button input[type="radio"]:checked+span {
                            background-color: #007bff;
                            color: white;
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
                                sampleButton.style.borderColor = buttonColorInput.value;
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
                                    activeSampleButton.style.color = activeTextColorInput.value;
                                    activeTextSample.style.color = activeTextColorInput.value;
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
                                    sampleButton.classList.remove('rounded-0', 'rounded-1', 'rounded-2', 'rounded-3', 'rounded-4', 'rounded-5');
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
                                        activeSampleButton.style.color = activeTextColorInput.value;
                                        activeTextSample.style.color = activeTextColorInput.value;
                                    } else {
                                        activeSampleButton.classList.remove('active');
                                        activeSampleButton.style.backgroundColor = buttonColorInput.value;
                                        activeSampleButton.style.borderColor = buttonColorInput.value;
                                        activeSampleButton.style.color = '';
                                        activeTextSample.style.color = '';
                                    }
                                });
                            });
                        });
                    </script>

                    <script>
                        $(document).ready(function() {
                            $('#colorSettingsForm').on('submit', function(event) {
                                event.preventDefault();

                                // Serialize form data
                                var formData = $(this).serialize();

                                // Send AJAX request
                                $.ajax({
                                    url: 'save_colors.php',
                                    type: 'POST',
                                    data: formData,
                                    success: function(response) {
                                        Swal.fire({
                                            title: 'Success!',
                                            text: 'Settings saved successfully!',
                                            icon: 'success',
                                            confirmButtonText: 'OK'
                                        });
                                    },
                                    error: function(xhr, status, error) {
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