<?php include 'head.php'; ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Car</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="MyCars.php">My Cars</a></li>
                                <li class="breadcrumb-item active">Add Car</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add New Car</h4>

                            <form id="car-form" action="submit_car.php" method="post" enctype="multipart/form-data">
                                <div id="basic-pills-wizard" class="twitter-bs-wizard">
                                    <ul class="twitter-bs-wizard-nav">
                                        <li class="nav-item">
                                            <a href="#car-details" class="nav-link active" data-toggle="tab">
                                                <span class="step-number">01</span>
                                                <span class="step-title">Car Details</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#car-specifications" class="nav-link" data-toggle="tab">
                                                <span class="step-number">02</span>
                                                <span class="step-title">Specifications</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#car-features" class="nav-link" data-toggle="tab">
                                                <span class="step-number">03</span>
                                                <span class="step-title">Features</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#car-images" class="nav-link" data-toggle="tab">
                                                <span class="step-number">04</span>
                                                <span class="step-title">Upload Images</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content twitter-bs-wizard-tab-content">
                                        <!-- Car Details -->
                                        <div class="tab-pane active" id="car-details">
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="car">Car</label>
                                                        <input type="text" class="form-control" id="car" name="car" placeholder="Enter Car name" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="model">Model</label>
                                                        <input type="text" class="form-control" id="model" name="model" placeholder="Enter Car Model" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="year">Year</label>
                                                        <input type="number" class="form-control" id="year" name="year" placeholder="Enter Year" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="price">Price</label>
                                                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" step="0.01" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="color">Color</label>
                                                        <input type="text" class="form-control" id="color" name="color" placeholder="Enter Color" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="bodytype">Body Type</label>
                                                        <input type="text" class="form-control" id="bodytype" name="bodytype" placeholder="Enter Body Type" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="doors">Doors</label>
                                                        <input type="number" class="form-control" id="doors" name="doors" placeholder="Enter Number of Doors" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="seats">Seats</label>
                                                        <input type="number" class="form-control" id="seats" name="seats" placeholder="Enter Number of Seats" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="car_description">Description</label>
                                                        <textarea class="form-control" id="car_description" name="car_description" rows="3" placeholder="Enter Description" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Specifications -->
                                        <div class="tab-pane" id="car-specifications">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="engine">Engine</label>
                                                        <input type="text" class="form-control" id="engine" name="engine" placeholder="Enter Engine Specifications" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="power">Power</label>
                                                        <input type="text" class="form-control" id="power" name="power" placeholder="Enter Power Specifications" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="torque">Torque</label>
                                                        <input type="text" class="form-control" id="torque" name="torque" placeholder="Enter Torque Specifications" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="transmission-spec">Transmission</label>
                                                        <input type="text" class="form-control" id="transmission-spec" name="transmission_spec" placeholder="Enter Transmission Type" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="fueltype">Fuel Type</label>
                                                        <input type="text" class="form-control" id="fueltype" name="fueltype" placeholder="Enter Fuel Type" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="mileage">Mileage</label>
                                                        <input type="text" class="form-control" id="mileage" name="mileage" placeholder="Enter Mileage" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Features -->
                                        <div class="tab-pane" id="car-features">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="top-features">Top Features</label>
                                                        <textarea class="form-control" id="top-features" name="top_features" rows="3" placeholder="Enter Top Features" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="stand-out-features">Stand Out Features</label>
                                                        <textarea class="form-control" id="stand-out-features" name="stand_out_features" rows="3" placeholder="Enter Stand Out Features" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Upload Images -->
                                        <div class="tab-pane" id="car-images">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="desktop-image">Desktop Image</label>
                                                        <input type="file" class="form-control" id="desktop-image" name="desktop_image" accept="image/*">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="mobile-image">Mobile Image</label>
                                                        <input type="file" class="form-control" id="mobile-image" name="mobile_image" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="additional-images">Additional Images</label>
                                                        <input type="file" class="form-control" id="additional-images" name="additional_images[]" accept="image/*" multiple>
                                                        <small class="text-muted">You can upload multiple images.</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                        <li class="previous"><a href="javascript:void(0);" onclick="prevStep()">Previous</a></li>
                                        <li class="next"><a href="javascript:void(0);" onclick="nextStep()">Next</a></li>
                                        <li class="finish"><a href="javascript:void(0);" onclick="submitForm()">Finish</a></li>
                                    </ul>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        var $wizard = $('#basic-pills-wizard');
        var $tabs = $wizard.find('.twitter-bs-wizard-nav li');
        var $tabContent = $wizard.find('.tab-content');

        function showStep(index) {
            $tabs.removeClass('active');
            $tabs.eq(index).addClass('active');
            $tabContent.find('.tab-pane').removeClass('active');
            $tabContent.find('.tab-pane').eq(index).addClass('active');
        }

        function nextStep() {
            var currentIndex = $tabs.filter('.active').index();
            if (currentIndex < $tabs.length - 1) {
                showStep(currentIndex + 1);
            }
        }

        function prevStep() {
            var currentIndex = $tabs.filter('.active').index();
            if (currentIndex > 0) {
                showStep(currentIndex - 1);
            }
        }

        function submitForm() {
            if ($('#car-form')[0].checkValidity()) {
                $('#car-form').submit();
            } else {
                $('#car-form')[0].reportValidity();
            }
        }

        // Bind click events to wizard pager buttons
        $('.pager .next').click(nextStep);
        $('.pager .previous').click(prevStep);
        $('.pager .finish').click(submitForm);

        // Initialize by showing the first step
        showStep(0);
    });
</script>

<?php include 'footer.php'; ?>