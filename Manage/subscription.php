<?php
include 'includes/head.php';
require_once '../includes/db.php'; // Ensure database connection is included

?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Subscription</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Subscription</li>
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
                            <div class="modal-body">
                                <div class="text-center mb-4">
                                    <div class="btn-group" role="group">
                                        <input type="radio" class="btn-check" name="billing" id="monthly" checked>
                                        <label class="btn" for="monthly">Monthly</label>

                                        <input type="radio" class="btn-check" name="billing" id="yearly">
                                        <label class="btn" for="yearly">Yearly</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <?php
                                    // Fetch subscription plans from the database
                                    $sql = "SELECT * FROM subscription_plans ORDER BY yearly_price ASC";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($plan = $result->fetch_assoc()) {
                                            $icon = htmlspecialchars($plan['icon']);
                                            $title = htmlspecialchars($plan['title']);
                                            $yearlyPrice = htmlspecialchars($plan['yearly_price']);
                                            $monthlyPrice = htmlspecialchars($plan['monthly_price']);
                                    ?>
                                            <div class="col-md-3 mb-4">
                                                <div class="card h-100">
                                                    <div class="card-body text-center">
                                                        <div class="mb-3">
                                                            <div class="avatar-sm mx-auto">
                                                                <span class="avatar-title rounded-circle bg-kenz">
                                                                    <i class="fas <?= $icon ?> font-size-20"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <h5 class="card-title"><?= $title ?></h5>
                                                        <h4 class="mb-3 price-monthly">₹<?= $monthlyPrice ?>/Month</h4>
                                                        <h4 class="mb-3 price-yearly" style="display:none">₹<?= $yearlyPrice ?>/Year</h4>
                                                        <div class="plan-features text-start">
                                                            <?php
                                                            // Display included features
                                                            if (!empty($plan['features_includes'])) {
                                                                $features = explode(',', $plan['features_includes']);
                                                                foreach ($features as $feature) {
                                                                    $feature = htmlspecialchars(trim($feature));
                                                                    echo "<p><i class='mdi mdi-checkbox-marked-circle-outline text-primary me-2'></i>{$feature}</p>";
                                                                }
                                                            }

                                                            // Display not included features
                                                            if (!empty($plan['features_not_includes'])) {
                                                                $features = explode(',', $plan['features_not_includes']);
                                                                foreach ($features as $feature) {
                                                                    $feature = htmlspecialchars(trim($feature));
                                                                    echo "<p><i class='mdi mdi-close-circle-outline text-danger me-2'></i>{$feature}</p>";
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                        <button type="button" class="btn btn-primary mt-3 bg-kenz" onclick="subscribeToPlan(<?= $plan['id'] ?>)">Subscribe Now</button>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    } else {
                                        echo '<div class="col-12"><p class="text-center">No subscription plans available.</p></div>';
                                    }
                                    ?>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        // Handle toggle between monthly and yearly prices
                                        $('input[name="billing"]').change(function() {
                                            if ($('#monthly').is(':checked')) {
                                                $('.price-monthly').show();
                                                $('.price-yearly').hide();
                                              
                                            } else {
                                                $('.price-monthly').hide();
                                                $('.price-yearly').show();
                                             
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->

<?php
include 'includes/footer.php';
?>