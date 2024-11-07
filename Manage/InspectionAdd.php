<?php
include 'includes/head.php';
$product_id = $_GET['product_id'];
$sql = "SELECT * FROM vehicle_inspection WHERE car_id = '$product_id'";
$result = mysqli_query($conn, $sql);
$inspection_data = mysqli_fetch_assoc($result);
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Inspection Add</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Inspection Add</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="d-sm-flex align-items-center justify-content-end">
                        <button type="button" onclick="window.history.back();" class="btn btn-sm btn-dark">Back</button>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Accordion Form Start -->
                            <div class="accordion" id="inspectionAccordion">

                                <!-- Engine / Transmission / Clutch Section -->
                                <div class="accordion-item mb-3 border-2 border-primary">
                                    <h2 class="accordion-header" id="headingEngineTransmissionClutch">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEngineTransmissionClutch" aria-expanded="false" aria-controls="collapseEngineTransmissionClutch">
                                            Engine / Transmission / Clutch
                                        </button>
                                    </h2>
                                    <div id="collapseEngineTransmissionClutch" class="accordion-collapse collapse show" aria-labelledby="headingEngineTransmissionClutch" data-bs-parent="#inspectionAccordion">
                                        <form action="" id="engineTransmissionClutchForm">
                                            <input type="hidden" name="car_id" value="<?php echo $product_id; ?>">
                                            <div class="accordion-body">
                                                <h6>Fluids/Filters Check</h6>
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td><label for="engineOilLevel">Engine Oil Level</label></td>
                                                        <td><select class="form-control" id="engineOilLevel" name="engine_oil_level">
                                                                <option value="N/A" <?php echo isset($inspection_data['engine_oil_level']) && $inspection_data['engine_oil_level'] == 'N/A' ? 'selected' : ''; ?>>N/A</option>
                                                                <option value="Low" <?php echo isset($inspection_data['engine_oil_level']) && $inspection_data['engine_oil_level'] == 'Low' ? 'selected' : ''; ?>>Low</option>
                                                                <option value="Normal" <?php echo isset($inspection_data['engine_oil_level']) && $inspection_data['engine_oil_level'] == 'Normal' ? 'selected' : ''; ?>>Normal</option>
                                                                <option value="High" <?php echo isset($inspection_data['engine_oil_level']) && $inspection_data['engine_oil_level'] == 'High' ? 'selected' : ''; ?>>High</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="engineOilLeakage">Engine Oil Leakage</label></td>
                                                        <td><select class="form-control" id="engineOilLeakage" name="engine_oil_leakage">
                                                                <option value="No Leakage" <?php echo isset($inspection_data['engine_oil_leakage']) && $inspection_data['engine_oil_leakage'] == 'No Leakage' ? 'selected' : ''; ?>>No Leakage</option>
                                                                <option value="Minor Leakage" <?php echo isset($inspection_data['engine_oil_leakage']) && $inspection_data['engine_oil_leakage'] == 'Minor Leakage' ? 'selected' : ''; ?>>Minor Leakage</option>
                                                                <option value="Severe Leakage" <?php echo isset($inspection_data['engine_oil_leakage']) && $inspection_data['engine_oil_leakage'] == 'Severe Leakage' ? 'selected' : ''; ?>>Severe Leakage</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="transmissionOilLeakage">Transmission Oil Leakage</label></td>
                                                        <td><select class="form-control" id="transmissionOilLeakage" name="transmission_oil_leakage">
                                                                <option value="No Leakage" <?php echo isset($inspection_data['transmission_oil_leakage']) && $inspection_data['transmission_oil_leakage'] == 'No Leakage' ? 'selected' : ''; ?>>No Leakage</option>
                                                                <option value="Minor Leakage" <?php echo isset($inspection_data['transmission_oil_leakage']) && $inspection_data['transmission_oil_leakage'] == 'Minor Leakage' ? 'selected' : ''; ?>>Minor Leakage</option>
                                                                <option value="Severe Leakage" <?php echo isset($inspection_data['transmission_oil_leakage']) && $inspection_data['transmission_oil_leakage'] == 'Severe Leakage' ? 'selected' : ''; ?>>Severe Leakage</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="transferCaseOilLeakage">Transfer Case Oil Leakage</label></td>
                                                        <td><select class="form-control" id="transferCaseOilLeakage" name="transfer_case_oil_leakage">
                                                                <option value="No Leakage" <?php echo isset($inspection_data['transfer_case_oil_leakage']) && $inspection_data['transfer_case_oil_leakage'] == 'No Leakage' ? 'selected' : ''; ?>>No Leakage</option>
                                                                <option value="Minor Leakage" <?php echo isset($inspection_data['transfer_case_oil_leakage']) && $inspection_data['transfer_case_oil_leakage'] == 'Minor Leakage' ? 'selected' : ''; ?>>Minor Leakage</option>
                                                                <option value="Severe Leakage" <?php echo isset($inspection_data['transfer_case_oil_leakage']) && $inspection_data['transfer_case_oil_leakage'] == 'Severe Leakage' ? 'selected' : ''; ?>>Severe Leakage</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="coolantLeakage">Coolant Leakage</label></td>
                                                        <td><select class="form-control" id="coolantLeakage" name="coolant_leakage">
                                                                <option value="No Leakage" <?php echo isset($inspection_data['coolant_leakage']) && $inspection_data['coolant_leakage'] == 'No Leakage' ? 'selected' : ''; ?>>No Leakage</option>
                                                                <option value="Minor Leakage" <?php echo isset($inspection_data['coolant_leakage']) && $inspection_data['coolant_leakage'] == 'Minor Leakage' ? 'selected' : ''; ?>>Minor Leakage</option>
                                                                <option value="Severe Leakage" <?php echo isset($inspection_data['coolant_leakage']) && $inspection_data['coolant_leakage'] == 'Severe Leakage' ? 'selected' : ''; ?>>Severe Leakage</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="brakeOilLeakage">Brake Oil Leakage</label></td>
                                                        <td><select class="form-control" id="brakeOilLeakage" name="brake_oil_leakage">
                                                                <option value="No Leakage" <?php echo isset($inspection_data['brake_oil_leakage']) && $inspection_data['brake_oil_leakage'] == 'No Leakage' ? 'selected' : ''; ?>>No Leakage</option>
                                                                <option value="Minor Leakage" <?php echo isset($inspection_data['brake_oil_leakage']) && $inspection_data['brake_oil_leakage'] == 'Minor Leakage' ? 'selected' : ''; ?>>Minor Leakage</option>
                                                                <option value="Severe Leakage" <?php echo isset($inspection_data['brake_oil_leakage']) && $inspection_data['brake_oil_leakage'] == 'Severe Leakage' ? 'selected' : ''; ?>>Severe Leakage</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="powerSteeringOilLeakage">Power Steering Oil Leakage</label></td>
                                                        <td><select class="form-control" id="powerSteeringOilLeakage" name="power_steering_oil_leakage">
                                                                <option value="No Leakage" <?php echo isset($inspection_data['power_steering_oil_leakage']) && $inspection_data['power_steering_oil_leakage'] == 'No Leakage' ? 'selected' : ''; ?>>No Leakage</option>
                                                                <option value="Minor Leakage" <?php echo isset($inspection_data['power_steering_oil_leakage']) && $inspection_data['power_steering_oil_leakage'] == 'Minor Leakage' ? 'selected' : ''; ?>>Minor Leakage</option>
                                                                <option value="Severe Leakage" <?php echo isset($inspection_data['power_steering_oil_leakage']) && $inspection_data['power_steering_oil_leakage'] == 'Severe Leakage' ? 'selected' : ''; ?>>Severe Leakage</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="differentialOilLeakage">Differential Oil Leakage</label></td>
                                                        <td><select class="form-control" id="differentialOilLeakage" name="differential_oil_leakage">
                                                                <option value="No Leakage" <?php echo isset($inspection_data['differential_oil_leakage']) && $inspection_data['differential_oil_leakage'] == 'No Leakage' ? 'selected' : ''; ?>>No Leakage</option>
                                                                <option value="Minor Leakage" <?php echo isset($inspection_data['differential_oil_leakage']) && $inspection_data['differential_oil_leakage'] == 'Minor Leakage' ? 'selected' : ''; ?>>Minor Leakage</option>
                                                                <option value="Severe Leakage" <?php echo isset($inspection_data['differential_oil_leakage']) && $inspection_data['differential_oil_leakage'] == 'Severe Leakage' ? 'selected' : ''; ?>>Severe Leakage</option>
                                                            </select></td>
                                                    </tr>
                                                </table>
                                                <h6>Mechanical Check</h6>
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td><label for="beltsCondition">Belts (Fan)</label></td>
                                                        <td><select class="form-control" id="beltsCondition" name="fan_belt_condition">
                                                                <option value="Ok" <?php echo isset($inspection_data['fan_belt_condition']) && $inspection_data['fan_belt_condition'] == 'Ok' ? 'selected' : ''; ?>>Ok</option>
                                                                <option value="Worn" <?php echo isset($inspection_data['fan_belt_condition']) && $inspection_data['fan_belt_condition'] == 'Worn' ? 'selected' : ''; ?>>Worn</option>
                                                                <option value="Damaged" <?php echo isset($inspection_data['fan_belt_condition']) && $inspection_data['fan_belt_condition'] == 'Damaged' ? 'selected' : ''; ?>>Damaged</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="engineNoise">Engine Noise</label></td>
                                                        <td><select class="form-control" id="engineNoise" name="engine_noise">
                                                                <option value="No Noise" <?php echo isset($inspection_data['engine_noise']) && $inspection_data['engine_noise'] == 'No Noise' ? 'selected' : ''; ?>>No Noise</option>
                                                                <option value="Minor Noise" <?php echo isset($inspection_data['engine_noise']) && $inspection_data['engine_noise'] == 'Minor Noise' ? 'selected' : ''; ?>>Minor Noise</option>
                                                                <option value="Loud Noise" <?php echo isset($inspection_data['engine_noise']) && $inspection_data['engine_noise'] == 'Loud Noise' ? 'selected' : ''; ?>>Loud Noise</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="engineVibration">Engine Vibration</label></td>
                                                        <td><select class="form-control" id="engineVibration" name="engine_vibration">
                                                                <option value="No Vibration" <?php echo isset($inspection_data['engine_vibration']) && $inspection_data['engine_vibration'] == 'No Vibration' ? 'selected' : ''; ?>>No Vibration</option>
                                                                <option value="Minor Vibration" <?php echo isset($inspection_data['engine_vibration']) && $inspection_data['engine_vibration'] == 'Minor Vibration' ? 'selected' : ''; ?>>Minor Vibration</option>
                                                                <option value="Severe Vibration" <?php echo isset($inspection_data['engine_vibration']) && $inspection_data['engine_vibration'] == 'Severe Vibration' ? 'selected' : ''; ?>>Severe Vibration</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="exhaustSound">Exhaust Sound</label></td>
                                                        <td><select class="form-control" id="exhaustSound" name="exhaust_sound">
                                                                <option value="Ok" <?php echo isset($inspection_data['exhaust_sound']) && $inspection_data['exhaust_sound'] == 'Ok' ? 'selected' : ''; ?>>Ok</option>
                                                                <option value="Loud" <?php echo isset($inspection_data['exhaust_sound']) && $inspection_data['exhaust_sound'] == 'Loud' ? 'selected' : ''; ?>>Loud</option>
                                                                <option value="Rough" <?php echo isset($inspection_data['exhaust_sound']) && $inspection_data['exhaust_sound'] == 'Rough' ? 'selected' : ''; ?>>Rough</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="radiatorCondition">Radiator</label></td>
                                                        <td><select class="form-control" id="radiatorCondition" name="radiator_condition">
                                                                <option value="Ok" <?php echo isset($inspection_data['radiator_condition']) && $inspection_data['radiator_condition'] == 'Ok' ? 'selected' : ''; ?>>Ok</option>
                                                                <option value="Leaking" <?php echo isset($inspection_data['radiator_condition']) && $inspection_data['radiator_condition'] == 'Leaking' ? 'selected' : ''; ?>>Leaking</option>
                                                                <option value="Damaged" <?php echo isset($inspection_data['radiator_condition']) && $inspection_data['radiator_condition'] == 'Damaged' ? 'selected' : ''; ?>>Damaged</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="transmissionElectronics">Transmission Electronics</label></td>
                                                        <td><select class="form-control" id="transmissionElectronics" name="transmission_electronics">
                                                                <option value="Ok" <?php echo isset($inspection_data['transmission_electronics']) && $inspection_data['transmission_electronics'] == 'Ok' ? 'selected' : ''; ?>>Ok</option>
                                                                <option value="Faulty" <?php echo isset($inspection_data['transmission_electronics']) && $inspection_data['transmission_electronics'] == 'Faulty' ? 'selected' : ''; ?>>Faulty</option>
                                                                <option value="Not Responding" <?php echo isset($inspection_data['transmission_electronics']) && $inspection_data['transmission_electronics'] == 'Not Responding' ? 'selected' : ''; ?>>Not Responding</option>
                                                            </select></td>
                                                    </tr>
                                                </table>
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <!-- Brakes Section -->
                                <div class="accordion-item mb-3 border-2 border-primary">
                                    <h2 class="accordion-header" id="headingBrakes">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBrakes" aria-expanded="false" aria-controls="collapseBrakes">
                                            Brakes
                                        </button>
                                    </h2>
                                    <div id="collapseBrakes" class="accordion-collapse collapse show" aria-labelledby="headingBrakes" data-bs-parent="#inspectionAccordion">
                                        <form action="" id="brakesForm">
                                            <input type="hidden" name="car_id" value="<?php echo $product_id; ?>">
                                            <div class="accordion-body">
                                                <h6>Mechanical Check</h6>
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td><label for="frontRightDisc">Front Right Disc</label></td>
                                                        <td><select class="form-control" id="frontRightDisc" name="front_right_disc_condition">
                                                                <option value="Smooth" <?php echo isset($inspection_data['front_right_disc_condition']) && $inspection_data['front_right_disc_condition'] == 'Smooth' ? 'selected' : ''; ?>>Smooth</option>
                                                                <option value="Worn" <?php echo isset($inspection_data['front_right_disc_condition']) && $inspection_data['front_right_disc_condition'] == 'Worn' ? 'selected' : ''; ?>>Worn</option>
                                                                <option value="Damaged" <?php echo isset($inspection_data['front_right_disc_condition']) && $inspection_data['front_right_disc_condition'] == 'Damaged' ? 'selected' : ''; ?>>Damaged</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="frontLeftDisc">Front Left Disc</label></td>
                                                        <td><select class="form-control" id="frontLeftDisc" name="front_left_disc_condition">
                                                                <option value="Smooth" <?php echo isset($inspection_data['front_left_disc_condition']) && $inspection_data['front_left_disc_condition'] == 'Smooth' ? 'selected' : ''; ?>>Smooth</option>
                                                                <option value="Worn" <?php echo isset($inspection_data['front_left_disc_condition']) && $inspection_data['front_left_disc_condition'] == 'Worn' ? 'selected' : ''; ?>>Worn</option>
                                                                <option value="Damaged" <?php echo isset($inspection_data['front_left_disc_condition']) && $inspection_data['front_left_disc_condition'] == 'Damaged' ? 'selected' : ''; ?>>Damaged</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="frontRightBrakePad">Front Right Brake Pad</label></td>
                                                        <td><select class="form-control" id="frontRightBrakePad" name="front_right_brake_pad_condition">
                                                                <option value="More than 50%" <?php echo isset($inspection_data['front_right_brake_pad_condition']) && $inspection_data['front_right_brake_pad_condition'] == 'More than 50%' ? 'selected' : ''; ?>>More than 50%</option>
                                                                <option value="Less than 50%" <?php echo isset($inspection_data['front_right_brake_pad_condition']) && $inspection_data['front_right_brake_pad_condition'] == 'Less than 50%' ? 'selected' : ''; ?>>Less than 50%</option>
                                                                <option value="Worn Out" <?php echo isset($inspection_data['front_right_brake_pad_condition']) && $inspection_data['front_right_brake_pad_condition'] == 'Worn Out' ? 'selected' : ''; ?>>Worn Out</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="frontLeftBrakePad">Front Left Brake Pad</label></td>
                                                        <td><select class="form-control" id="frontLeftBrakePad" name="front_left_brake_pad_condition">
                                                                <option value="More than 50%">More than 50%</option>
                                                                <option value="Less than 50%" <?php echo isset($inspection_data['front_left_brake_pad_condition']) && $inspection_data['front_left_brake_pad_condition'] == 'Less than 50%' ? 'selected' : ''; ?>>Less than 50%</option>
                                                                <option value="Worn Out" <?php echo isset($inspection_data['front_left_brake_pad_condition']) && $inspection_data['front_left_brake_pad_condition'] == 'Worn Out' ? 'selected' : ''; ?>>Worn Out</option>
                                                            </select></td>
                                                    </tr>
                                                </table>
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Suspension / Steering Section -->
                                <div class="accordion-item mb-3 border-2 border-primary">
                                    <h2 class="accordion-header" id="headingSuspensionSteering">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSuspensionSteering" aria-expanded="false" aria-controls="collapseSuspensionSteering">
                                            Suspension / Steering
                                        </button>
                                    </h2>
                                    <div id="collapseSuspensionSteering" class="accordion-collapse collapse show" aria-labelledby="headingSuspensionSteering" data-bs-parent="#inspectionAccordion">
                                        <form action="" id="suspensionSteeringForm">
                                            <input type="hidden" name="car_id" value="<?php echo $product_id; ?>">
                                            <div class="accordion-body">
                                                <h6>Front Suspension</h6>
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td><label for="steeringWheelPlay">Steering Wheel Play</label></td>
                                                        <td><select class="form-control" id="steeringWheelPlay" name="steering_wheel_play">
                                                                <option value="Ok" <?php echo isset($inspection_data['steering_wheel_play']) && $inspection_data['steering_wheel_play'] == 'Ok' ? 'selected' : ''; ?>>Ok</option>
                                                                <option value="Loose" <?php echo isset($inspection_data['steering_wheel_play']) && $inspection_data['steering_wheel_play'] == 'Loose' ? 'selected' : ''; ?>>Loose</option>
                                                                <option value="Stiff" <?php echo isset($inspection_data['steering_wheel_play']) && $inspection_data['steering_wheel_play'] == 'Stiff' ? 'selected' : ''; ?>>Stiff</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="ballJoints">Ball Joints</label></td>
                                                        <td><select class="form-control" id="ballJoints" name="ball_joints_condition">
                                                                <option value="Ok (Right & Left)" <?php echo isset($inspection_data['ball_joints_condition']) && $inspection_data['ball_joints_condition'] == 'Ok (Right & Left)' ? 'selected' : ''; ?>>Ok (Right & Left)</option>
                                                                <option value="Worn" <?php echo isset($inspection_data['ball_joints_condition']) && $inspection_data['ball_joints_condition'] == 'Worn' ? 'selected' : ''; ?>>Worn</option>
                                                                <option value="Damaged" <?php echo isset($inspection_data['ball_joints_condition']) && $inspection_data['ball_joints_condition'] == 'Damaged' ? 'selected' : ''; ?>>Damaged</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="zLinks">Z Links</label></td>
                                                        <td><select class="form-control" id="zLinks" name="z_links_condition">
                                                                <option value="Ok (Right & Left)" <?php echo isset($inspection_data['z_links_condition']) && $inspection_data['z_links_condition'] == 'Ok (Right & Left)' ? 'selected' : ''; ?>>Ok (Right & Left)</option>
                                                                <option value="Worn" <?php echo isset($inspection_data['z_links_condition']) && $inspection_data['z_links_condition'] == 'Worn' ? 'selected' : ''; ?>>Worn</option>
                                                                <option value="Damaged" <?php echo isset($inspection_data['z_links_condition']) && $inspection_data['z_links_condition'] == 'Damaged' ? 'selected' : ''; ?>>Damaged</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="tieRodEnds">Tie Rod Ends</label></td>
                                                        <td><select class="form-control" id="tieRodEnds" name="tie_rod_ends_condition">
                                                                <option value="Ok (Right & Left)" <?php echo isset($inspection_data['tie_rod_ends_condition']) && $inspection_data['tie_rod_ends_condition'] == 'Ok (Right & Left)' ? 'selected' : ''; ?>>Ok (Right & Left)</option>
                                                                <option value="Worn" <?php echo isset($inspection_data['tie_rod_ends_condition']) && $inspection_data['tie_rod_ends_condition'] == 'Worn' ? 'selected' : ''; ?>>Worn</option>
                                                                <option value="Damaged" <?php echo isset($inspection_data['tie_rod_ends_condition']) && $inspection_data['tie_rod_ends_condition'] == 'Damaged' ? 'selected' : ''; ?>>Damaged</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="shockAbsorbers">Shock Absorbers</label></td>
                                                        <td><select class="form-control" id="shockAbsorbers" name="shock_absorbers_condition">
                                                                <option value="Ok (Right & Left)" <?php echo isset($inspection_data['shock_absorbers_condition']) && $inspection_data['shock_absorbers_condition'] == 'Ok (Right & Left)' ? 'selected' : ''; ?>>Ok (Right & Left)</option>
                                                                <option value="Worn" <?php echo isset($inspection_data['shock_absorbers_condition']) && $inspection_data['shock_absorbers_condition'] == 'Worn' ? 'selected' : ''; ?>>Worn</option>
                                                                <option value="Leaking" <?php echo isset($inspection_data['shock_absorbers_condition']) && $inspection_data['shock_absorbers_condition'] == 'Leaking' ? 'selected' : ''; ?>>Leaking</option>
                                                            </select></td>
                                                    </tr>
                                                </table>
                                                <h6>Rear Suspension</h6>
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td><label for="rearSuspensionBushes">Rear Right & Left Bushes</label></td>
                                                        <td><select class="form-control" id="rearSuspensionBushes" name="rear_suspension_bushes_condition">
                                                                <option value="No Damage Found" <?php echo isset($inspection_data['rear_suspension_bushes_condition']) && $inspection_data['rear_suspension_bushes_condition'] == 'No Damage Found' ? 'selected' : ''; ?>>No Damage Found</option>
                                                                <option value="Worn" <?php echo isset($inspection_data['rear_suspension_bushes_condition']) && $inspection_data['rear_suspension_bushes_condition'] == 'Worn' ? 'selected' : ''; ?>>Worn</option>
                                                                <option value="Damaged" <?php echo isset($inspection_data['rear_suspension_bushes_condition']) && $inspection_data['rear_suspension_bushes_condition'] == 'Damaged' ? 'selected' : ''; ?>>Damaged</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="rearShocks">Rear Right & Left Shocks</label></td>
                                                        <td><select class="form-control" id="rearShocks" name="rear_shocks_condition">
                                                                <option value="Ok" <?php echo isset($inspection_data['rear_shocks_condition']) && $inspection_data['rear_shocks_condition'] == 'Ok' ? 'selected' : ''; ?>>Ok</option>
                                                                <option value="Leaking" <?php echo isset($inspection_data['rear_shocks_condition']) && $inspection_data['rear_shocks_condition'] == 'Leaking' ? 'selected' : ''; ?>>Leaking</option>
                                                                <option value="Worn" <?php echo isset($inspection_data['rear_shocks_condition']) && $inspection_data['rear_shocks_condition'] == 'Worn' ? 'selected' : ''; ?>>Worn</option>
                                                            </select></td>
                                                    </tr>
                                                </table>
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <!-- Interior Section -->
                                <div class="accordion-item mb-3 border-2 border-primary">
                                    <h2 class="accordion-header" id="headingInterior">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInterior" aria-expanded="false" aria-controls="collapseInterior">
                                            Interior
                                        </button>
                                    </h2>
                                    <div id="collapseInterior" class="accordion-collapse collapse show" aria-labelledby="headingInterior" data-bs-parent="#inspectionAccordion">
                                        <form action="" id="interiorForm">
                                            <input type="hidden" name="car_id" value="<?php echo $product_id; ?>">
                                            <div class="accordion-body">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td><label for="steeringWheelCondition">Steering Wheel Condition</label></td>
                                                        <td><select class="form-control" id="steeringWheelCondition" name="steering_wheel_condition">
                                                                <option value="Ok" <?php echo isset($inspection_data['steering_wheel_condition']) && $inspection_data['steering_wheel_condition'] == 'Ok' ? 'selected' : ''; ?>>Ok</option>
                                                                <option value="Worn" <?php echo isset($inspection_data['steering_wheel_condition']) && $inspection_data['steering_wheel_condition'] == 'Worn' ? 'selected' : ''; ?>>Worn</option>
                                                                <option value="Damaged" <?php echo isset($inspection_data['steering_wheel_condition']) && $inspection_data['steering_wheel_condition'] == 'Damaged' ? 'selected' : ''; ?>>Damaged</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="seatsElectricFunction">Seats Electric Function</label></td>
                                                        <td><select class="form-control" id="seatsElectricFunction" name="seats_electric_function">
                                                                <option value="Working (Right & Left Front)" <?php echo isset($inspection_data['seats_electric_function']) && $inspection_data['seats_electric_function'] == 'Working (Right & Left Front)' ? 'selected' : ''; ?>>Working (Right & Left Front)</option>
                                                                <option value="Not Working" <?php echo isset($inspection_data['seats_electric_function']) && $inspection_data['seats_electric_function'] == 'Not Working' ? 'selected' : ''; ?>>Not Working</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="seatBelts">Seat Belts</label></td>
                                                        <td><select class="form-control" id="seatBelts" name="seat_belts_condition">
                                                                <option value="Working (Front & Rear)" <?php echo isset($inspection_data['seat_belts_condition']) && $inspection_data['seat_belts_condition'] == 'Working (Front & Rear)' ? 'selected' : ''; ?>>Working (Front & Rear)</option>
                                                                <option value="Not Working" <?php echo isset($inspection_data['seat_belts_condition']) && $inspection_data['seat_belts_condition'] == 'Not Working' ? 'selected' : ''; ?>>Not Working</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="windows">Windows</label></td>
                                                        <td><select class="form-control" id="windows" name="windows_condition">
                                                                <option value="Working Properly (All 4 Windows)" <?php echo isset($inspection_data['windows_condition']) && $inspection_data['windows_condition'] == 'Working Properly (All 4 Windows)' ? 'selected' : ''; ?>>Working Properly (All 4 Windows)</option>
                                                                <option value="Not Working" <?php echo isset($inspection_data['windows_condition']) && $inspection_data['windows_condition'] == 'Not Working' ? 'selected' : ''; ?>>Not Working</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="dashControls">Dash Controls</label></td>
                                                        <td><select class="form-control" id="dashControls" name="dash_controls_condition">
                                                                <option value="Working (A/C, De-Fog, Hazard Lights, etc.)" <?php echo isset($inspection_data['dash_controls_condition']) && $inspection_data['dash_controls_condition'] == 'Working (A/C, De-Fog, Hazard Lights, etc.)' ? 'selected' : ''; ?>>Working (A/C, De-Fog, Hazard Lights, etc.)</option>
                                                                <option value="Not Working" <?php echo isset($inspection_data['dash_controls_condition']) && $inspection_data['dash_controls_condition'] == 'Not Working' ? 'selected' : ''; ?>>Not Working</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="audioVideo">Audio/Video</label></td>
                                                        <td><select class="form-control" id="audioVideo" name="audio_video_condition">
                                                                <option value="Working" <?php echo isset($inspection_data['audio_video_condition']) && $inspection_data['audio_video_condition'] == 'Working' ? 'selected' : ''; ?>>Working</option>
                                                                <option value="Not Working" <?php echo isset($inspection_data['audio_video_condition']) && $inspection_data['audio_video_condition'] == 'Not Working' ? 'selected' : ''; ?>>Not Working</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="rearViewCamera">Rear View Camera</label></td>
                                                        <td><select class="form-control" id="rearViewCamera" name="rear_view_camera_condition">
                                                                <option value="Working" <?php echo isset($inspection_data['rear_view_camera_condition']) && $inspection_data['rear_view_camera_condition'] == 'Working' ? 'selected' : ''; ?>>Working</option>
                                                                <option value="Not Working" <?php echo isset($inspection_data['rear_view_camera_condition']) && $inspection_data['rear_view_camera_condition'] == 'Not Working' ? 'selected' : ''; ?>>Not Working</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="trunkBonnetRelease">Trunk & Bonnet Release</label></td>
                                                        <td><select class="form-control" id="trunkBonnetRelease" name="trunk_bonnet_release_condition">
                                                                <option value="Working" <?php echo isset($inspection_data['trunk_bonnet_release_condition']) && $inspection_data['trunk_bonnet_release_condition'] == 'Working' ? 'selected' : ''; ?>>Working</option>
                                                                <option value="Not Working" <?php echo isset($inspection_data['trunk_bonnet_release_condition']) && $inspection_data['trunk_bonnet_release_condition'] == 'Not Working' ? 'selected' : ''; ?>>Not Working</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="sunRoofControl">Sun Roof Control</label></td>
                                                        <td><select class="form-control" id="sunRoofControl" name="sun_roof_control_condition">
                                                                <option value="Working" <?php echo isset($inspection_data['sun_roof_control_condition']) && $inspection_data['sun_roof_control_condition'] == 'Working' ? 'selected' : ''; ?>>Working</option>
                                                                <option value="Not Working" <?php echo isset($inspection_data['sun_roof_control_condition']) && $inspection_data['sun_roof_control_condition'] == 'Not Working' ? 'selected' : ''; ?>>Not Working</option>
                                                            </select></td>
                                                    </tr>
                                                </table>
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- AC / Heater Section -->
                                <div class="accordion-item mb-3 border-2 border-primary">
                                    <h2 class="accordion-header" id="headingACHeater">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseACHeater" aria-expanded="false" aria-controls="collapseACHeater">
                                            AC / Heater
                                        </button>
                                    </h2>
                                    <div id="collapseACHeater" class="accordion-collapse collapse show" aria-labelledby="headingACHeater" data-bs-parent="#inspectionAccordion">
                                        <form action="" id="acHeaterForm">
                                            <input type="hidden" name="car_id" value="<?php echo $product_id; ?>">
                                            <div class="accordion-body">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td><label for="acOperational">AC Operational</label></td>
                                                        <td><select class="form-control" id="acOperational" name="ac_operational_condition">
                                                                <option value="Yes" <?php echo isset($inspection_data['ac_operational_condition']) && $inspection_data['ac_operational_condition'] == 'Yes' ? 'selected' : ''; ?>>Yes</option>
                                                                <option value="No" <?php echo isset($inspection_data['ac_operational_condition']) && $inspection_data['ac_operational_condition'] == 'No' ? 'selected' : ''; ?>>No</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="blowerAirThrow">Blower Air Throw</label></td>
                                                        <td><select class="form-control" id="blowerAirThrow" name="blower_air_throw_condition">
                                                                <option value="Excellent" <?php echo isset($inspection_data['blower_air_throw_condition']) && $inspection_data['blower_air_throw_condition'] == 'Excellent' ? 'selected' : ''; ?>>Excellent</option>
                                                                <option value="Good" <?php echo isset($inspection_data['blower_air_throw_condition']) && $inspection_data['blower_air_throw_condition'] == 'Good' ? 'selected' : ''; ?>>Good</option>
                                                                <option value="Weak" <?php echo isset($inspection_data['blower_air_throw_condition']) && $inspection_data['blower_air_throw_condition'] == 'Weak' ? 'selected' : ''; ?>>Weak</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="cooling">Cooling</label></td>
                                                        <td><select class="form-control" id="cooling" name="cooling_condition">
                                                                <option value="Excellent" <?php echo isset($inspection_data['cooling_condition']) && $inspection_data['cooling_condition'] == 'Excellent' ? 'selected' : ''; ?>>Excellent</option>
                                                                <option value="Good" <?php echo isset($inspection_data['cooling_condition']) && $inspection_data['cooling_condition'] == 'Good' ? 'selected' : ''; ?>>Good</option>
                                                                <option value="Poor" <?php echo isset($inspection_data['cooling_condition']) && $inspection_data['cooling_condition'] == 'Poor' ? 'selected' : ''; ?>>Poor</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="heating">Heating</label></td>
                                                        <td><select class="form-control" id="heating" name="heating_condition">
                                                                <option value="Excellent" <?php echo isset($inspection_data['heating_condition']) && $inspection_data['heating_condition'] == 'Excellent' ? 'selected' : ''; ?>>Excellent</option>
                                                                <option value="Good" <?php echo isset($inspection_data['heating_condition']) && $inspection_data['heating_condition'] == 'Good' ? 'selected' : ''; ?>>Good</option>
                                                                <option value="Poor" <?php echo isset($inspection_data['heating_condition']) && $inspection_data['heating_condition'] == 'Poor' ? 'selected' : ''; ?>>Poor</option>
                                                            </select></td>
                                                    </tr>
                                                </table>
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <!-- Electrical & Electronics Section -->
                                <div class="accordion-item mb-3 border-2 border-primary">
                                    <h2 class="accordion-header" id="headingElectricalElectronics">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseElectricalElectronics" aria-expanded="false" aria-controls="collapseElectricalElectronics">
                                            Electrical & Electronics
                                        </button>
                                    </h2>
                                    <div id="collapseElectricalElectronics" class="accordion-collapse collapse show" aria-labelledby="headingElectricalElectronics" data-bs-parent="#inspectionAccordion">
                                        <form action="" id="electricalElectronicsForm">
                                            <input type="hidden" name="car_id" value="<?php echo $product_id; ?>">
                                            <div class="accordion-body">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td><label for="warningLights">Warning Lights</label></td>
                                                        <td><select class="form-control" id="warningLights" name="warning_lights_condition">
                                                                <option value="ABS Warning Light Present" <?php echo isset($inspection_data['warning_lights_condition']) && $inspection_data['warning_lights_condition'] == 'ABS Warning Light Present' ? 'selected' : ''; ?>>ABS Warning Light Present</option>
                                                                <option value="No Warning Light" <?php echo isset($inspection_data['warning_lights_condition']) && $inspection_data['warning_lights_condition'] == 'No Warning Light' ? 'selected' : ''; ?>>No Warning Light</option>
                                                                <option value="Other" <?php echo isset($inspection_data['warning_lights_condition']) && $inspection_data['warning_lights_condition'] == 'Other' ? 'selected' : ''; ?>>Other</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="batteryCondition">Battery</label></td>
                                                        <td><select class="form-control" id="batteryCondition" name="battery_condition">
                                                                <option value="12V, Terminals Condition Ok" <?php echo isset($inspection_data['battery_condition']) && $inspection_data['battery_condition'] == '12V, Terminals Condition Ok' ? 'selected' : ''; ?>>12V, Terminals Condition Ok</option>
                                                                <option value="Low Voltage" <?php echo isset($inspection_data['battery_condition']) && $inspection_data['battery_condition'] == 'Low Voltage' ? 'selected' : ''; ?>>Low Voltage</option>
                                                                <option value="Corroded Terminals" <?php echo isset($inspection_data['battery_condition']) && $inspection_data['battery_condition'] == 'Corroded Terminals' ? 'selected' : ''; ?>>Corroded Terminals</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="instrumentCluster">Instrument Cluster</label></td>
                                                        <td><select class="form-control" id="instrumentCluster" name="instrument_cluster_condition">
                                                                <option value="Gauges Working" <?php echo isset($inspection_data['instrument_cluster_condition']) && $inspection_data['instrument_cluster_condition'] == 'Gauges Working' ? 'selected' : ''; ?>>Gauges Working</option>
                                                                <option value="Gauges Not Working" <?php echo isset($inspection_data['instrument_cluster_condition']) && $inspection_data['instrument_cluster_condition'] == 'Gauges Not Working' ? 'selected' : ''; ?>>Gauges Not Working</option>
                                                                <option value="Partial Functionality" <?php echo isset($inspection_data['instrument_cluster_condition']) && $inspection_data['instrument_cluster_condition'] == 'Partial Functionality' ? 'selected' : ''; ?>>Partial Functionality</option>
                                                            </select></td>
                                                    </tr>
                                                </table>
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Exterior & Body Section -->
                                <div class="accordion-item mb-3 border-2 border-primary">
                                    <h2 class="accordion-header" id="headingExteriorBody">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExteriorBody" aria-expanded="false" aria-controls="collapseExteriorBody">
                                            Exterior & Body
                                        </button>
                                    </h2>
                                    <div id="collapseExteriorBody" class="accordion-collapse collapse show" aria-labelledby="headingExteriorBody" data-bs-parent="#inspectionAccordion">
                                        <form action="" id="exteriorBodyForm">
                                            <input type="hidden" name="car_id" value="<?php echo $product_id; ?>">
                                            <div class="accordion-body">
                                                <h6>Car Frame</h6>
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td><label for="trunkLock">Trunk Lock</label></td>
                                                        <td><select class="form-control" id="trunkLock" name="trunk_lock_condition">
                                                                <option value="Ok" <?php echo isset($inspection_data['trunk_lock_condition']) && $inspection_data['trunk_lock_condition'] == 'Ok' ? 'selected' : ''; ?>>Ok</option>
                                                                <option value="Not Working" <?php echo isset($inspection_data['trunk_lock_condition']) && $inspection_data['trunk_lock_condition'] == 'Not Working' ? 'selected' : ''; ?>>Not Working</option>
                                                                <option value="Damaged" <?php echo isset($inspection_data['trunk_lock_condition']) && $inspection_data['trunk_lock_condition'] == 'Damaged' ? 'selected' : ''; ?>>Damaged</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="windshieldCondition">Windshield Condition</label></td>
                                                        <td><select class="form-control" id="windshieldCondition" name="windshield_condition">
                                                                <option value="Chip (Front)" <?php echo isset($inspection_data['windshield_condition']) && $inspection_data['windshield_condition'] == 'Chip (Front)' ? 'selected' : ''; ?>>Chip (Front)</option>
                                                                <option value="Crack (Front)" <?php echo isset($inspection_data['windshield_condition']) && $inspection_data['windshield_condition'] == 'Crack (Front)' ? 'selected' : ''; ?>>Crack (Front)</option>
                                                                <option value="Ok (No Damage)" <?php echo isset($inspection_data['windshield_condition']) && $inspection_data['windshield_condition'] == 'Ok (No Damage)' ? 'selected' : ''; ?>>Ok (No Damage)</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="windowCondition">Window Condition</label></td>
                                                        <td><select class="form-control" id="windowCondition" name="window_condition">
                                                                <option value="Ok (All Windows)" <?php echo isset($inspection_data['window_condition']) && $inspection_data['window_condition'] == 'Ok (All Windows)' ? 'selected' : ''; ?>>Ok (All Windows)</option>
                                                                <option value="Cracked (One or More)" <?php echo isset($inspection_data['window_condition']) && $inspection_data['window_condition'] == 'Cracked (One or More)' ? 'selected' : ''; ?>>Cracked (One or More)</option>
                                                                <option value="Damaged" <?php echo isset($inspection_data['window_condition']) && $inspection_data['window_condition'] == 'Damaged' ? 'selected' : ''; ?>>Damaged</option>
                                                            </select></td>
                                                    </tr>
                                                </table>

                                                <h6>Exterior Lights</h6>
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td><label for="headlights">Headlights</label></td>
                                                        <td><select class="form-control" id="headlights" name="headlights_condition">
                                                                <option value="Working (Perfect Condition)" <?php echo isset($inspection_data['headlights_condition']) && $inspection_data['headlights_condition'] == 'Working (Perfect Condition)' ? 'selected' : ''; ?>>Working (Perfect Condition)</option>
                                                                <option value="Dimmed" <?php echo isset($inspection_data['headlights_condition']) && $inspection_data['headlights_condition'] == 'Dimmed' ? 'selected' : ''; ?>>Dimmed</option>
                                                                <option value="Not Working" <?php echo isset($inspection_data['headlights_condition']) && $inspection_data['headlights_condition'] == 'Not Working' ? 'selected' : ''; ?>>Not Working</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="taillights">Taillights</label></td>
                                                        <td><select class="form-control" id="taillights" name="taillights_condition">
                                                                <option value="Working (Perfect Condition)" <?php echo isset($inspection_data['taillights_condition']) && $inspection_data['taillights_condition'] == 'Working (Perfect Condition)' ? 'selected' : ''; ?>>Working (Perfect Condition)</option>
                                                                <option value="Dimmed" <?php echo isset($inspection_data['taillights_condition']) && $inspection_data['taillights_condition'] == 'Dimmed' ? 'selected' : ''; ?>>Dimmed</option>
                                                                <option value="Not Working" <?php echo isset($inspection_data['taillights_condition']) && $inspection_data['taillights_condition'] == 'Not Working' ? 'selected' : ''; ?>>Not Working</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="fogLights">Fog Lights</label></td>
                                                        <td><select class="form-control" id="fogLights" name="fog_lights_condition">
                                                                <option value="Working" <?php echo isset($inspection_data['fog_lights_condition']) && $inspection_data['fog_lights_condition'] == 'Working' ? 'selected' : ''; ?>>Working</option>
                                                                <option value="Not Working" <?php echo isset($inspection_data['fog_lights_condition']) && $inspection_data['fog_lights_condition'] == 'Not Working' ? 'selected' : ''; ?>>Not Working</option>
                                                                <option value="Flickering" <?php echo isset($inspection_data['fog_lights_condition']) && $inspection_data['fog_lights_condition'] == 'Flickering' ? 'selected' : ''; ?>>Flickering</option>
                                                            </select></td>
                                                    </tr>
                                                </table>
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <!-- Tyres Section -->
                                <div class="accordion-item mb-3 border-2 border-primary">
                                    <h2 class="accordion-header" id="headingTyres">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTyres" aria-expanded="false" aria-controls="collapseTyres">
                                            Tyres
                                        </button>
                                    </h2>
                                    <div id="collapseTyres" class="accordion-collapse collapse show" aria-labelledby="headingTyres" data-bs-parent="#inspectionAccordion">
                                        <form action="" id="tyresForm">
                                            <input type="hidden" name="car_id" value="<?php echo $product_id; ?>">
                                            <div class="accordion-body">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td><label for="tyreBrand">Tyre Brand</label></td>
                                                        <td><input type="text" class="form-control" id="tyreBrand" name="tyre_brand" value="<?php echo isset($inspection_data['tyre_brand']) ? $inspection_data['tyre_brand'] : ''; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="tyreTread">Tyre Tread</label></td>
                                                        <td><input type="text" class="form-control" id="tyreTread" name="tyre_tread" value="<?php echo isset($inspection_data['tyre_tread']) ? $inspection_data['tyre_tread'] : '7.0mm (Remaining)'; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="tyreSize">Tyre Size</label></td>
                                                        <td><input type="text" class="form-control" id="tyreSize" name="tyre_size" value="<?php echo isset($inspection_data['tyre_size']) ? $inspection_data['tyre_size'] : '275/50/R21'; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="rims">Rims</label></td>
                                                        <td><select class="form-control" id="rims" name="rims_condition">
                                                                <option value="Alloy" <?php echo isset($inspection_data['rims_condition']) && $inspection_data['rims_condition'] == 'Alloy' ? 'selected' : ''; ?>>Alloy</option>
                                                                <option value="Steel" <?php echo isset($inspection_data['rims_condition']) && $inspection_data['rims_condition'] == 'Steel' ? 'selected' : ''; ?>>Steel</option>
                                                                <option value="Chrome" <?php echo isset($inspection_data['rims_condition']) && $inspection_data['rims_condition'] == 'Chrome' ? 'selected' : ''; ?>>Chrome</option>
                                                                <option value="Carbon Fiber" <?php echo isset($inspection_data['rims_condition']) && $inspection_data['rims_condition'] == 'Carbon Fiber' ? 'selected' : ''; ?>>Carbon Fiber</option>
                                                            </select></td>
                                                    </tr>
                                                </table>
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Test Drive Feedback Section -->
                                <div class="accordion-item mb-3 border-2 border-primary">
                                    <h2 class="accordion-header" id="headingTestDriveFeedback">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTestDriveFeedback" aria-expanded="false" aria-controls="collapseTestDriveFeedback">
                                            Test Drive Feedback
                                        </button>
                                    </h2>
                                    <div id="collapseTestDriveFeedback" class="accordion-collapse collapse show" aria-labelledby="headingTestDriveFeedback" data-bs-parent="#inspectionAccordion">
                                        <form action="" id="testDriveFeedbackForm">
                                            <input type="hidden" name="car_id" value="<?php echo $product_id; ?>">
                                            <div class="accordion-body">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td><label for="enginePick">Engine Pick</label></td>
                                                        <td><select class="form-control" id="enginePick" name="engine_pick_feedback">
                                                                <option value="Ok" <?php echo isset($inspection_data['engine_pick_feedback']) && $inspection_data['engine_pick_feedback'] == 'Ok' ? 'selected' : ''; ?>>Ok</option>
                                                                <option value="Weak" <?php echo isset($inspection_data['engine_pick_feedback']) && $inspection_data['engine_pick_feedback'] == 'Weak' ? 'selected' : ''; ?>>Weak</option>
                                                                <option value="Powerful" <?php echo isset($inspection_data['engine_pick_feedback']) && $inspection_data['engine_pick_feedback'] == 'Powerful' ? 'selected' : ''; ?>>Powerful</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="gearShifting">Gear Shifting</label></td>
                                                        <td><select class="form-control" id="gearShifting" name="gear_shifting_feedback">
                                                                <option value="Smooth" <?php echo isset($inspection_data['gear_shifting_feedback']) && $inspection_data['gear_shifting_feedback'] == 'Smooth' ? 'selected' : ''; ?>>Smooth</option>
                                                                <option value="Stiff" <?php echo isset($inspection_data['gear_shifting_feedback']) && $inspection_data['gear_shifting_feedback'] == 'Stiff' ? 'selected' : ''; ?>>Stiff</option>
                                                                <option value="Laggy" <?php echo isset($inspection_data['gear_shifting_feedback']) && $inspection_data['gear_shifting_feedback'] == 'Laggy' ? 'selected' : ''; ?>>Laggy</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="brakePedal">Brake Pedal Operation</label></td>
                                                        <td><select class="form-control" id="brakePedal" name="brake_pedal_operation_feedback">
                                                                <option value="Timely Response" <?php echo isset($inspection_data['brake_pedal_operation_feedback']) && $inspection_data['brake_pedal_operation_feedback'] == 'Timely Response' ? 'selected' : ''; ?>>Timely Response</option>
                                                                <option value="Delayed Response" <?php echo isset($inspection_data['brake_pedal_operation_feedback']) && $inspection_data['brake_pedal_operation_feedback'] == 'Delayed Response' ? 'selected' : ''; ?>>Delayed Response</option>
                                                                <option value="Hard Pedal" <?php echo isset($inspection_data['brake_pedal_operation_feedback']) && $inspection_data['brake_pedal_operation_feedback'] == 'Hard Pedal' ? 'selected' : ''; ?>>Hard Pedal</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="absOperation">ABS Operation</label></td>
                                                        <td><select class="form-control" id="absOperation" name="abs_operation_feedback">
                                                                <option value="Timely Response" <?php echo isset($inspection_data['abs_operation_feedback']) && $inspection_data['abs_operation_feedback'] == 'Timely Response' ? 'selected' : ''; ?>>Timely Response</option>
                                                                <option value="Delayed Response" <?php echo isset($inspection_data['abs_operation_feedback']) && $inspection_data['abs_operation_feedback'] == 'Delayed Response' ? 'selected' : ''; ?>>Delayed Response</option>
                                                                <option value="No ABS" <?php echo isset($inspection_data['abs_operation_feedback']) && $inspection_data['abs_operation_feedback'] == 'No ABS' ? 'selected' : ''; ?>>No ABS</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="suspensionNoise">Suspension Noise</label></td>
                                                        <td><select class="form-control" id="suspensionNoise" name="suspension_noise_feedback">
                                                                <option value="No Noise" <?php echo isset($inspection_data['suspension_noise_feedback']) && $inspection_data['suspension_noise_feedback'] == 'No Noise' ? 'selected' : ''; ?>>No Noise</option>
                                                                <option value="Clunking Noise" <?php echo isset($inspection_data['suspension_noise_feedback']) && $inspection_data['suspension_noise_feedback'] == 'Clunking Noise' ? 'selected' : ''; ?>>Clunking Noise</option>
                                                                <option value="Squeaking Noise" <?php echo isset($inspection_data['suspension_noise_feedback']) && $inspection_data['suspension_noise_feedback'] == 'Squeaking Noise' ? 'selected' : ''; ?>>Squeaking Noise</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="steeringOperation">Steering Operation</label></td>
                                                        <td><select class="form-control" id="steeringOperation" name="steering_operation_feedback">
                                                                <option value="Smooth" <?php echo isset($inspection_data['steering_operation_feedback']) && $inspection_data['steering_operation_feedback'] == 'Smooth' ? 'selected' : ''; ?>>Smooth</option>
                                                                <option value="Heavy" <?php echo isset($inspection_data['steering_operation_feedback']) && $inspection_data['steering_operation_feedback'] == 'Heavy' ? 'selected' : ''; ?>>Heavy</option>
                                                                <option value="Loose" <?php echo isset($inspection_data['steering_operation_feedback']) && $inspection_data['steering_operation_feedback'] == 'Loose' ? 'selected' : ''; ?>>Loose</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label for="acHeater">AC & Heater</label></td>
                                                        <td><select class="form-control" id="acHeater" name="ac_heater_feedback">
                                                                <option value="Perfect" <?php echo isset($inspection_data['ac_heater_feedback']) && $inspection_data['ac_heater_feedback'] == 'Perfect' ? 'selected' : ''; ?>>Perfect</option>
                                                                <option value="Weak" <?php echo isset($inspection_data['ac_heater_feedback']) && $inspection_data['ac_heater_feedback'] == 'Weak' ? 'selected' : ''; ?>>Weak</option>
                                                                <option value="Not Working" <?php echo isset($inspection_data['ac_heater_feedback']) && $inspection_data['ac_heater_feedback'] == 'Not Working' ? 'selected' : ''; ?>>Not Working</option>
                                                            </select></td>
                                                    </tr>
                                                </table>
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
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
<script>
    // Wait for document to be ready
    $(document).ready(function() {

        // Handle form submissions
        $('#engineTransmissionClutchForm, #brakesForm, #tyresForm, #interiorForm, #acHeaterForm, #electricalElectronicsForm, #exteriorBodyForm, #testDriveFeedbackForm, #suspensionSteeringForm').on('submit', function(e) {
            e.preventDefault();

            // Get form ID and data
            const formId = $(this).attr('id');
            const formData = $(this).serializeArray();

            // Extract car_id from URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const car_id = urlParams.get('product_id'); // Assuming the car_id is passed as 'product_id'

            // Append car_id to form data
            if (car_id) {
                formData.push({
                    name: 'car_id',
                    value: car_id
                });
            }

            // Debugging: Log the form data to check it's correct
            console.log("Form Data:", formData);

            // Send AJAX request
            $.ajax({
                url: 'functions/inspection.php',
                type: 'POST',
                data: {
                    formId: formId,
                    formData: formData
                },
                dataType: 'json',
                success: function(response) {
                    // Debugging: Log the response
                    console.log("Server Response:", response);

                    if (response.success) {
                        // Show success message
                        Swal.fire({
                            title: 'Success!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        });
                    } else {
                        // Show error message from server
                        Swal.fire({
                            title: 'Error!',
                            text: response.message || 'An error occurred while saving the data',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Show error message if AJAX request fails
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while saving the data',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                    console.error('AJAX Error:', error);
                    console.error('Server Response:', xhr.responseText);
                }
            });
        });

    });
</script>

<!-- end main content-->
<?php
include 'includes/footer.php';
?>