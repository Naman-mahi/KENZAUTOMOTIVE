<?php
include 'includes/head.php';

// Check for database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch subscriptions from the database
$sql = "SELECT 
    id,
    title,
    yearly_price,
    monthly_price, 
    icon,
    features_includes,
    features_not_includes,
    created_at,
    updated_at
FROM subscription_plans";

$subscriptionPlan = $conn->query($sql);

// Fetch features from database
$features_sql = "SELECT `id`, `name` FROM `website_features` ORDER BY `name` ASC";
$features_result = $conn->query($features_sql);

$features = [];
if ($features_result && $features_result->num_rows > 0) {
    while ($row = $features_result->fetch_assoc()) {
        $features[] = $row['name'];
    }
}

?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Manage Subscription Plan</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Subscription Plan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Alert container -->
            <div id="alert-container"></div>

            <!-- Subscription Plans Cards -->
            <div class="row">
                <?php
                if ($subscriptionPlan && $subscriptionPlan->num_rows > 0) {
                    while ($row = $subscriptionPlan->fetch_assoc()) {
                        // Escape values
                        $title = htmlspecialchars($row['title'], ENT_QUOTES);
                        $monthly_price = htmlspecialchars($row['monthly_price'], ENT_QUOTES);
                        $yearly_price = htmlspecialchars($row['yearly_price'], ENT_QUOTES);
                        $icon = htmlspecialchars($row['icon'], ENT_QUOTES);
                        $features_includes = !empty($row['features_includes']) ? explode("\n", $row['features_includes']) : [];
                        $features_not_includes = !empty($row['features_not_includes']) ? explode("\n", $row['features_not_includes']) : [];
                        $plan_id = (int)$row['id'];

                        // Create card for each subscription plan
                        echo "<div class='col-md-3 mb-4'>";
                        echo "<div class='card shadow'>";
                        echo "<div class='card-header text-center'>";
                        echo "<p><i class='fas fs-3 fa-solid " . $icon . "'></i></p>";
                        echo "<h5 class='card-title'>" . $title . "</h5>";
                        echo "<form method='POST' class='update-price-form' data-plan-id='" . $plan_id . "'>";
                        echo "<div class='mb-2'>";
                        echo "<label class='me-2'><strong>Monthly: </strong>$</label>";
                        echo "<input type='number' step='0.01' min='0' class='form-control form-control-sm d-inline-block' style='width: 80px;' value='" . $monthly_price . "' name='monthly_price' required>";
                        echo "</div>";
                        echo "<div class='mb-2'>";
                        echo "<label class='me-2'><strong>Yearly: </strong>$</label>";
                        echo "<input type='number' step='0.01' min='0' class='form-control form-control-sm d-inline-block' style='width: 80px;' value='" . $yearly_price . "' name='yearly_price' required>";
                        echo "</div>";
                        echo "<input type='hidden' name='plan_id' value='" . $plan_id . "'>";
                        echo "<button type='submit' class='btn mt-2 btn-sm bg-kenz'>Update Plan Price</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "<div class='card-body'>";

                        // Open form for updating features
                        echo "<form class='subscription-form' data-plan-id='" . $plan_id . "'>";
                        echo "<input type='hidden' name='plan_id' value='" . $plan_id . "'>";

                        // Features Included Checkbox List
                        echo "<h6>Features Included:</h6>";
                        foreach ($features as $feature) {
                            $checked = in_array($feature, $features_includes) ? 'checked' : '';
                            echo "<div class='form-check'>";
                            echo "<input type='checkbox' class='form-check-input' name='features[]' value='" . htmlspecialchars($feature, ENT_QUOTES) . "' " . $checked . ">";
                            echo "<label class='form-check-label'>" . htmlspecialchars($feature, ENT_QUOTES) . "</label>";
                            echo "</div>";
                        }

                        // Submit button to update the features
                        echo "<div class='text-center mt-3'>";
                        echo "<button type='submit' class='btn btn-primary'>Update</button>";
                        echo "</div>";
                        echo "</form>"; // Close form

                        echo "</div>"; // End of card-body
                        echo "</div>"; // End of card
                        echo "</div>"; // End of col-md-3
                    }
                } else {
                    echo "<div class='col-12 text-center'>No subscription plans found</div>";
                }
                ?>
            </div>
            <!-- End Subscription Plans Cards -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>

<script>
    $(document).ready(function() {
        // Handle subscription form submission
        $('.subscription-form').on('submit', function(e) {
            e.preventDefault();

            const form = $(this);
            const formData = new FormData(form[0]);
            formData.append('update_features', '1');

            $.ajax({
                url: 'functions/subscription_plan.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    showToast(response.status === 'success' ? 'success' : 'error', response.message);
                },
                error: function() {
                    showToast('error', 'An error occurred while updating features');
                }
            });
        });

        // Handle price update form submission 
        $('.update-price-form').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);
            const formData = new FormData(form[0]);
            formData.append('update_price', '1');

            $.ajax({
                url: 'functions/subscription_plan_price.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    showToast(response.status === 'success' ? 'success' : 'error', response.message);
                    if (response.status === 'success') {
                        setTimeout(() => {
                            location.reload();
                        }, 3000);
                    }
                },
                error: function() {
                    showToast('error', 'An error occurred while updating prices');
                }
            });
        });

        // Toast notification helper function
        function showToast(icon, title) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon: icon,
                title: title
            });
        }
    });
</script>

<?php
include 'includes/footer.php';
?>