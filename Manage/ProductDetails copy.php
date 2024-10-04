<?php
include 'head.php';
include '../includes/db.php'; // Ensure you include your database connection
if (isset($_GET['id'])) {
    $carid = intval($_GET['id']); // Sanitize input
    $dealerid = 1; // Sanitize dealer ID
    // Query to fetch car details with dealer ID condition
    $sql = "SELECT * FROM cars WHERE carid = ? AND dealerid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $carid, $dealerid); // Bind both carid and dealerid
    $stmt->execute();
    $result = $stmt->get_result();
    // Check if a car was found
    if ($result->num_rows > 0) {
        $car = $result->fetch_assoc();
        // Proceed with displaying car details...
    } else {
        // Car ID not found or dealer ID mismatch, redirect to MyCars.php using JavaScript
        echo "<script>window.location.href = 'MyCars.php';</script>";
        exit;
    }
} else {
    // No car ID or dealer ID provided, redirect to MyCars.php using JavaScript
    echo "<script>window.location.href = 'MyCars.php';</script>";
    exit;
}
if (isset($_GET['id'])) {
    $carid = intval($_GET['id']); // Sanitize input
    // Query to fetch car publish details
    $sql = "SELECT * FROM car_publish WHERE car_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $carid); // Bind carid
    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();
    // Check if a record was found
    if ($result->num_rows > 0) {
        $car_publish = $result->fetch_assoc();
        // Proceed with displaying the car publish details...
        // Example: echo $car_publish['marketplace'];
    } else {
        // No record found for the given car_id, redirect to MyCars.php
        echo "<script>window.location.href = 'MyCars.php';</script>";
        exit;
    }
} else {
    // No car ID provided, redirect to MyCars.php
    echo "<script>window.location.href = 'MyCars.php';</script>";
    exit;
}
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Car Details</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="MyCars.php">My Cars</a></li>
                                <li class="breadcrumb-item active">Car Details</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">You Can Publish Your Car On:</h4>
                            <p>Choose where you'd like your car to be visible to potential buyers and other dealers:</p>
                            <form method="POST" action="car_publish.php" class="d-flex justify-content-between align-items-center">
                                <input type="hidden" name="id" value="<?= $car_publish['id'] ?>">
                                <div class="d-flex align-items-center">
                                    <div class="me-3 d-flex align-items-center">
                                        <span class="me-2 fw-bold">On Marketplace <a class=" waves-effect" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Visible to a wide audience including other dealers.">
                                                <i class="ri-question-line"></i>
                                            </a></span>
                                        <input class="form-check form-switch ms-2" type="checkbox" name="marketplace" id="switch1" switch="success" <?php echo $car_publish['marketplace'] ? 'checked' : ''; ?>>
                                        <label class="form-label" for="switch1" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    <div class="me-3 d-flex align-items-center">
                                        <span class="me-2 fw-bold">On Website <a class=" waves-effect" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Displayed on our official site for increased visibility.">
                                                <i class="ri-question-line"></i>
                                            </a></span>
                                        <input class="form-check form-switch ms-2" type="checkbox" name="website" id="switch2" switch="success" <?php echo $car_publish['website'] ? 'checked' : ''; ?>>
                                        <label class="form-label" for="switch2" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="me-2 fw-bold">On Your Own Website <a class=" waves-effect" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Promote your listing directly on your personal website.">
                                                <i class="ri-question-line"></i>
                                            </a></span>
                                        <input class="form-check form-switch ms-2" type="checkbox" name="own_website" id="switch3" switch="success" <?php echo $car_publish['own_website'] ? 'checked' : ''; ?>>
                                        <label class="form-label" for="switch3" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                </div>
                                <button type="submit" class="btn rounded-0  btn-sm btn-primary ms-3">Update Publish</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-end">
                        <a href="NewCar.php" type="button" class="btn rounded-0  btn-dark btn-sm waves-effect waves-light ms-auto">Update Car Info</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <img src="assets/images/car/<?php echo htmlspecialchars($car['desktop_image']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($car['car_name']); ?>">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo htmlspecialchars($car['car_name']); ?></h4>
                            <p class="card-title-desc">Car details overview.</p>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-justified nav-tabs-custom" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#car-info" role="tab" aria-selected="true">
                                        <i class="ri-roadster-line"></i> <span class="d-none d-md-inline-block fw-bold text-warning">Car Info</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#car-specifications" role="tab" aria-selected="false" tabindex="-1">
                                        <i class="dripicons-clipboard me-1 align-middle"></i> <span class="d-none d-md-inline-block fw-bold text-warning">Specifications</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#other-details" role="tab" aria-selected="false" tabindex="-1">
                                        <i class="ri-settings-line"></i> <span class="d-none d-md-inline-block fw-bold text-warning">Other Details</span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content p-3">
                                <div class="tab-pane active show" id="car-info" role="tabpanel">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Description:</th>
                                                <td><?php echo htmlspecialchars($car['car_description']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Price:</th>
                                                <td>$<?php echo number_format($car['price'], 2); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Color:</th>
                                                <td><?php echo htmlspecialchars($car['color']); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="car-specifications" role="tabpanel">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Model:</th>
                                                <td><?php echo htmlspecialchars($car['model']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Year:</th>
                                                <td><?php echo htmlspecialchars($car['year']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Body Type:</th>
                                                <td><?php echo htmlspecialchars($car['bodytype']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Doors:</th>
                                                <td><?php echo htmlspecialchars($car['doors']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Seats:</th>
                                                <td><?php echo htmlspecialchars($car['seats']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Mileage:</th>
                                                <td><?php echo htmlspecialchars($car['mileage']); ?> km</td>
                                            </tr>
                                            <tr>
                                                <th>Transmission:</th>
                                                <td><?php echo htmlspecialchars($car['transmission']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Fuel Type:</th>
                                                <td><?php echo htmlspecialchars($car['fueltype']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Engine:</th>
                                                <td><?php echo htmlspecialchars($car['engine']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Power:</th>
                                                <td><?php echo htmlspecialchars($car['power']); ?> hp</td>
                                            </tr>
                                            <tr>
                                                <th>Torque:</th>
                                                <td><?php echo htmlspecialchars($car['torque']); ?> Nm</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="other-details" role="tabpanel">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Top Features:</th>
                                                <td><?php echo htmlspecialchars($car['top_features']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Stand Out Features:</th>
                                                <td><?php echo htmlspecialchars($car['stand_out_features']); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content -->
<?php
include 'footer.php';
?>