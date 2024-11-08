<?php
include 'includes/head.php';

// Check if inspection_id is set in URL parameters
if (!isset($_GET['inspection_id'])) {
    echo "<script>window.location.href='InspectionManagements';</script>";
    exit;
}

$inspection_id = intval($_GET['inspection_id']); // Sanitize input

// Prepare and execute query using prepared statement
$sql = "SELECT * FROM vehicle_inspection 
        JOIN products ON vehicle_inspection.car_id = products.product_id 
        JOIN users ON products.dealer_id = users.user_id 
        WHERE vehicle_inspection.inspection_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $inspection_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<script>window.location.href='InspectionManagements';</script>";
    exit;
}

$row = $result->fetch_assoc();
?>
<?php
// SQL query to fetch all points
$inspection_id = $_GET['inspection_id'];
$sql = "SELECT * FROM inspection_car_points where inspection_id = $inspection_id";
$inspection_points = $conn->query($sql);

// Store points in an array
$points = [];
if ($inspection_points->num_rows > 0) {
    while ($row1 = $inspection_points->fetch_assoc()) {
        $points[] = $row1;
    }
} else {
    echo "No points found.";
}
?>
<style>
    /* Style for the dot */
    .dot {
        position: absolute;
        width: 10px;
        height: 10px;
        background-color: red;
        border-radius: 50%;
        cursor: pointer;
        z-index: 100;
    }

    .dot.active {
        background-color: #007bff;
    }

    .point-content {
        display: none;
    }

    .point-content.active {
        display: block;
    }

    .point-content img {
        max-width: 100%;
        height: auto;
        margin-bottom: 15px;
    }

    /* Container for image and dots */
    .image-wrapper {
        position: relative;
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
    }

    /* Make image responsive */
    .image-wrapper img {
        width: 100%;
        height: auto;
        display: block;
    }
</style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Inspection Details</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Inspection Details</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="d-sm-flex align-items-center justify-content-end">
                        <a href="InspectionManagements" class="btn btn-primary btn-sm me-2">Back</a>
                        <a href="InspectionAdd?inspection_id=<?php echo $inspection_id; ?>" class="btn btn-primary btn-sm">Add Inspection</a>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center mb-4"> <u><?php echo $row['product_name']; ?> - Inspection Report</u></h1>
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="image-wrapper">
                                        <img src="assets/images/test.jpg" alt="Car Inspection Image" class="img-fluid">

                                        <!-- Dots with their positions -->
                                        <div class="dot-container">
                                            <?php foreach ($points as $point): ?>
                                                <div class="dot" data-point="<?= $point['point_id']; ?>"
                                                    style="top: <?= $point['position_y']; ?>%; left: <?= $point['position_x']; ?>%;"></div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Content for each point -->
                                    <?php foreach ($points as $point): ?>
                                        <div id="point<?= $point['point_id']; ?>" class="point-content">
                                            <h3><?= htmlspecialchars($point['title']); ?></h3>
                                            <img src="uploads/inspection_points/<?= htmlspecialchars($point['image_url']); ?>" alt="<?= htmlspecialchars($point['title']); ?>">
                                            <p><?= htmlspecialchars($point['description']); ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">

                                    <!-- Car Details Section -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Car Details</h5>
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Customer/Dealer Name</strong></td>
                                                        <td><?php echo isset($row['first_name']) ? $row['first_name'] . ' ' . $row['last_name'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Engine Capacity</strong></td>
                                                        <td><?php echo isset($row['engine_capacity']) ? $row['engine_capacity'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Mileage</strong></td>
                                                        <td><?php echo isset($row['mileage']) ? $row['mileage'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Fuel Type</strong></td>
                                                        <td><?php echo isset($row['fuel_type']) ? $row['fuel_type'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Inspection Date</strong></td>
                                                        <td><?php echo isset($row['inspection_date']) ? $row['inspection_date'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Chassis No</strong></td>
                                                        <td><?php echo isset($row['chassis_no']) ? $row['chassis_no'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Engine No</strong></td>
                                                        <td><?php echo isset($row['engine_no']) ? $row['engine_no'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Registration No</strong></td>
                                                        <td><?php echo isset($row['registration_no']) ? $row['registration_no'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Location</strong></td>
                                                        <td><?php echo isset($row['location']) ? $row['location'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Registered City</strong></td>
                                                        <td><?php echo isset($row['registered_city']) ? $row['registered_city'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Transmission Type</strong></td>
                                                        <td><?php echo isset($row['transmission_type']) ? $row['transmission_type'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Color</strong></td>
                                                        <td><?php echo isset($row['color']) ? $row['color'] : 'N/A'; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Inspection Summary Section -->
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <h5 class="card-title">Inspection Summary</h5>
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Overall Rating</strong></td>
                                                        <td><?php echo isset($row['overall_rating']) ? $row['overall_rating'] : 'N/A'; ?> / 10</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Exterior Condition</strong></td>
                                                        <td><?php echo isset($row['exterior_condition']) ? $row['exterior_condition'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Body Frame Accident Checklist</strong></td>
                                                        <td><?php echo isset($row['body_frame_accident_checklist']) ? $row['body_frame_accident_checklist'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Engine / Transmission / Clutch</strong></td>
                                                        <td><?php echo isset($row['engine_transmission_clutch']) ? $row['engine_transmission_clutch'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Brakes</strong></td>
                                                        <td><?php echo isset($row['brakes']) ? $row['brakes'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Suspension/Steering</strong></td>
                                                        <td><?php echo isset($row['suspension_steering']) ? $row['suspension_steering'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Interior</strong></td>
                                                        <td><?php echo isset($row['interior']) ? $row['interior'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>AC/Heater</strong></td>
                                                        <td><?php echo isset($row['ac_heater']) ? $row['ac_heater'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Electrical & Electronics</strong></td>
                                                        <td><?php echo isset($row['electrical_electronics']) ? $row['electrical_electronics'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Exterior & Body</strong></td>
                                                        <td><?php echo isset($row['exterior_body']) ? $row['exterior_body'] : 'N/A'; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Tyres</strong></td>
                                                        <td><?php echo isset($row['tyres']) ? $row['tyres'] : 'N/A'; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Detailed Inspection Report -->

                            <!-- Accordion Form Start -->
                            <div class="accordion" id="inspectionAccordion">

                                <!-- Engine / Transmission / Clutch Section -->
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header" id="headingEngineTransmissionClutch">
                                        <button class="accordion-button bg-dark text-white bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEngineTransmissionClutch" aria-expanded="false" aria-controls="collapseEngineTransmissionClutch">
                                            Engine / Transmission / Clutch
                                        </button>
                                    </h2>
                                    <div id="collapseEngineTransmissionClutch" class="accordion-collapse collapse show" aria-labelledby="headingEngineTransmissionClutch" data-bs-parent="#inspectionAccordion">
                                        <div class="accordion-body">
                                            <h6>Fluids/Filters Check</h6>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Engine Oil Level</td>
                                                    <td><?php echo isset($row['engine_oil_level']) ? $row['engine_oil_level'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Engine Oil Leakage</td>
                                                    <td><?php echo isset($row['engine_oil_leakage']) ? $row['engine_oil_leakage'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Transmission Oil Leakage</td>
                                                    <td><?php echo isset($row['transmission_oil_leakage']) ? $row['transmission_oil_leakage'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Transfer Case Oil Leakage</td>
                                                    <td><?php echo isset($row['transfer_case_oil_leakage']) ? $row['transfer_case_oil_leakage'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Coolant Leakage</td>
                                                    <td><?php echo isset($row['coolant_leakage']) ? $row['coolant_leakage'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Brake Oil Leakage</td>
                                                    <td><?php echo isset($row['brake_oil_leakage']) ? $row['brake_oil_leakage'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Power Steering Oil Leakage</td>
                                                    <td><?php echo isset($row['power_steering_oil_leakage']) ? $row['power_steering_oil_leakage'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Differential Oil Leakage</td>
                                                    <td><?php echo isset($row['differential_oil_leakage']) ? $row['differential_oil_leakage'] : 'N/A'; ?></td>
                                                </tr>
                                            </table>
                                            <h6>Mechanical Check</h6>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Belts (Fan)</td>
                                                    <td><?php echo isset($row['belts_fan']) ? $row['belts_fan'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Engine Noise</td>
                                                    <td><?php echo isset($row['engine_noise']) ? $row['engine_noise'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Engine Vibration</td>
                                                    <td><?php echo isset($row['engine_vibration']) ? $row['engine_vibration'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Exhaust Sound</td>
                                                    <td><?php echo isset($row['exhaust_sound']) ? $row['exhaust_sound'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Radiator</td>
                                                    <td><?php echo isset($row['radiator']) ? $row['radiator'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Transmission Electronics</td>
                                                    <td><?php echo isset($row['transmission_electronics']) ? $row['transmission_electronics'] : 'N/A'; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Brakes Section -->
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header" id="headingBrakes">
                                        <button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBrakes" aria-expanded="false" aria-controls="collapseBrakes">
                                            Brakes
                                        </button>
                                    </h2>
                                    <div id="collapseBrakes" class="accordion-collapse collapse show" aria-labelledby="headingBrakes" data-bs-parent="#inspectionAccordion">
                                        <div class="accordion-body">
                                            <h6>Mechanical Check</h6>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Front Right Disc</td>
                                                    <td><?php echo isset($row['front_right_disc']) ? $row['front_right_disc'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Front Left Disc</td>
                                                    <td><?php echo isset($row['front_left_disc']) ? $row['front_left_disc'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Front Right Brake Pad</td>
                                                    <td><?php echo isset($row['front_right_brake_pad']) ? $row['front_right_brake_pad'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Front Left Brake Pad</td>
                                                    <td><?php echo isset($row['front_left_brake_pad']) ? $row['front_left_brake_pad'] : 'N/A'; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Suspension / Steering Section -->
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header" id="headingSuspensionSteering">
                                        <button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSuspensionSteering" aria-expanded="false" aria-controls="collapseSuspensionSteering">
                                            Suspension / Steering
                                        </button>
                                    </h2>
                                    <div id="collapseSuspensionSteering" class="accordion-collapse collapse show" aria-labelledby="headingSuspensionSteering" data-bs-parent="#inspectionAccordion">
                                        <div class="accordion-body">
                                            <h6>Front Suspension</h6>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Steering Wheel Play</td>
                                                    <td><?php echo isset($row['steering_wheel_play']) ? $row['steering_wheel_play'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Ball Joints</td>
                                                    <td><?php echo isset($row['ball_joints']) ? $row['ball_joints'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Z Links</td>
                                                    <td><?php echo isset($row['z_links']) ? $row['z_links'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tie Rod Ends</td>
                                                    <td><?php echo isset($row['tie_rod_ends']) ? $row['tie_rod_ends'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Shock Absorbers</td>
                                                    <td><?php echo isset($row['shock_absorbers']) ? $row['shock_absorbers'] : 'N/A'; ?></td>
                                                </tr>
                                            </table>
                                            <h6>Rear Suspension</h6>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Rear Right & Left Bushes</td>
                                                    <td><?php echo isset($row['rear_right_left_bushes']) ? $row['rear_right_left_bushes'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Rear Right & Left Shocks</td>
                                                    <td><?php echo isset($row['rear_right_left_shocks']) ? $row['rear_right_left_shocks'] : 'N/A'; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Interior Section -->
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header" id="headingInterior">
                                        <button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInterior" aria-expanded="false" aria-controls="collapseInterior">
                                            Interior
                                        </button>
                                    </h2>
                                    <div id="collapseInterior" class="accordion-collapse collapse show" aria-labelledby="headingInterior" data-bs-parent="#inspectionAccordion">
                                        <div class="accordion-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Steering Wheel Condition</td>
                                                    <td><?php echo isset($row['steering_wheel_condition']) ? $row['steering_wheel_condition'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Seats Electric Function</td>
                                                    <td><?php echo isset($row['seats_electric_function']) ? $row['seats_electric_function'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Seat Belts</td>
                                                    <td><?php echo isset($row['seat_belts']) ? $row['seat_belts'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Windows</td>
                                                    <td><?php echo isset($row['windows']) ? $row['windows'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Dash Controls</td>
                                                    <td><?php echo isset($row['dash_controls']) ? $row['dash_controls'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Audio/Video</td>
                                                    <td><?php echo isset($row['audio_video']) ? $row['audio_video'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Rear View Camera</td>
                                                    <td><?php echo isset($row['rear_view_camera']) ? $row['rear_view_camera'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Trunk & Bonnet Release</td>
                                                    <td><?php echo isset($row['trunk_bonnet_release']) ? $row['trunk_bonnet_release'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Sun Roof Control</td>
                                                    <td><?php echo isset($row['sun_roof_control']) ? $row['sun_roof_control'] : 'N/A'; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- AC / Heater Section -->
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header" id="headingACHeater">
                                        <button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseACHeater" aria-expanded="false" aria-controls="collapseACHeater">
                                            AC / Heater
                                        </button>
                                    </h2>
                                    <div id="collapseACHeater" class="accordion-collapse collapse show" aria-labelledby="headingACHeater" data-bs-parent="#inspectionAccordion">
                                        <div class="accordion-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>AC Operational</td>
                                                    <td><?php echo isset($row['ac_operational']) ? $row['ac_operational'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Blower Air Throw</td>
                                                    <td><?php echo isset($row['blower_air_throw']) ? $row['blower_air_throw'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Cooling</td>
                                                    <td><?php echo isset($row['cooling']) ? $row['cooling'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Heating</td>
                                                    <td><?php echo isset($row['heating']) ? $row['heating'] : 'N/A'; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Electrical & Electronics Section -->
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header" id="headingElectricalElectronics">
                                        <button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseElectricalElectronics" aria-expanded="false" aria-controls="collapseElectricalElectronics">
                                            Electrical & Electronics
                                        </button>
                                    </h2>
                                    <div id="collapseElectricalElectronics" class="accordion-collapse collapse show" aria-labelledby="headingElectricalElectronics" data-bs-parent="#inspectionAccordion">
                                        <div class="accordion-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Warning Lights</td>
                                                    <td><?php echo isset($row['abs_warning_light']) ? $row['abs_warning_light'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Battery</td>
                                                    <td><?php echo isset($row['battery']) ? $row['battery'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Instrument Cluster</td>
                                                    <td><?php echo isset($row['instrument_cluster']) ? $row['instrument_cluster'] : 'N/A'; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Exterior & Body Section -->
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header" id="headingExteriorBody">
                                        <button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExteriorBody" aria-expanded="false" aria-controls="collapseExteriorBody">
                                            Exterior & Body
                                        </button>
                                    </h2>
                                    <div id="collapseExteriorBody" class="accordion-collapse collapse show" aria-labelledby="headingExteriorBody" data-bs-parent="#inspectionAccordion">
                                        <div class="accordion-body">
                                            <h6>Car Frame</h6>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Trunk Lock</td>
                                                    <td><?php echo isset($row['trunk_lock']) ? $row['trunk_lock'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Windshield Condition</td>
                                                    <td><?php echo isset($row['windshield_condition']) ? $row['windshield_condition'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Window Condition</td>
                                                    <td><?php echo isset($row['window_condition']) ? $row['window_condition'] : 'N/A'; ?></td>
                                                </tr>
                                            </table>

                                            <h6>Exterior Lights</h6>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Headlights</td>
                                                    <td><?php echo isset($row['headlights']) ? $row['headlights'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Taillights</td>
                                                    <td><?php echo isset($row['taillights']) ? $row['taillights'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Fog Lights</td>
                                                    <td><?php echo isset($row['fog_lights']) ? $row['fog_lights'] : 'N/A'; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tyres Section -->
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header" id="headingTyres">
                                        <button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTyres" aria-expanded="false" aria-controls="collapseTyres">
                                            Tyres
                                        </button>
                                    </h2>
                                    <div id="collapseTyres" class="accordion-collapse collapse show" aria-labelledby="headingTyres" data-bs-parent="#inspectionAccordion">
                                        <div class="accordion-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Tyre Brand</td>
                                                    <td><?php echo isset($row['tyre_brand']) ? $row['tyre_brand'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tyre Tread</td>
                                                    <td><?php echo isset($row['tyre_tread']) ? $row['tyre_tread'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tyre Size</td>
                                                    <td><?php echo isset($row['tyre_size']) ? $row['tyre_size'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Rims</td>
                                                    <td><?php echo isset($row['rims']) ? $row['rims'] : 'N/A'; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Test Drive Feedback Section -->
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header" id="headingTestDriveFeedback">
                                        <button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTestDriveFeedback" aria-expanded="false" aria-controls="collapseTestDriveFeedback">
                                            Test Drive Feedback
                                        </button>
                                    </h2>
                                    <div id="collapseTestDriveFeedback" class="accordion-collapse collapse show" aria-labelledby="headingTestDriveFeedback" data-bs-parent="#inspectionAccordion">
                                        <div class="accordion-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Engine Pick</td>
                                                    <td><?php echo isset($row['engine_pick']) ? $row['engine_pick'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Gear Shifting</td>
                                                    <td><?php echo isset($row['gear_shifting']) ? $row['gear_shifting'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Brake Pedal Operation</td>
                                                    <td><?php echo isset($row['brake_pedal_operation']) ? $row['brake_pedal_operation'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>ABS Operation</td>
                                                    <td><?php echo isset($row['abs_operation']) ? $row['abs_operation'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Suspension Noise</td>
                                                    <td><?php echo isset($row['suspension_noise']) ? $row['suspension_noise'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Steering Operation</td>
                                                    <td><?php echo isset($row['steering_operation']) ? $row['steering_operation'] : 'N/A'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>AC & Heater</td>
                                                    <td><?php echo isset($row['ac_heater']) ? $row['ac_heater'] : 'N/A'; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- Accordion Form End -->
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
            document.querySelectorAll('.dot').forEach(dot => {
                // Show content on hover
                dot.addEventListener('mouseenter', function() {
                    showPoint(this.dataset.point);
                });

                // Handle click for mobile devices
                dot.addEventListener('click', function(e) {
                    e.stopPropagation();
                    showPoint(this.dataset.point);
                });
            });

            function showPoint(pointNumber) {
                // Remove active class from all dots and contents
                document.querySelectorAll('.dot').forEach(d => d.classList.remove('active'));
                document.querySelectorAll('.point-content').forEach(content => content.classList.remove('active'));

                // Add active class to clicked dot and its content
                document.querySelector(`.dot[data-point="${pointNumber}"]`).classList.add('active');
                document.querySelector(`#point${pointNumber}`).classList.add('active');
            }

            // Hide content when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.dot')) {
                    document.querySelectorAll('.dot').forEach(d => d.classList.remove('active'));
                    document.querySelectorAll('.point-content').forEach(content => content.classList.remove('active'));
                }
    });
</script>
<?php
include 'includes/footer.php';
?>