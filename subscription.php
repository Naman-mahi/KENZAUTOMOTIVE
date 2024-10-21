<!doctype html>
<html lang="en">
<?php
session_start(); // Start the session

// Check if the user is already logged in
if (isset($_SESSION['role'])) {
    // Redirect based on user role
    switch ($_SESSION['role']) {
        case 'admin':
        case 'dealer':
            header("Location: Manage/Dashboard.php"); // Redirect to Dashboard
            exit();
        default:
            header("Location: mypage.php"); // Redirect to mypage for unrecognized roles
            exit();
    }
}
?>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Manage/assets/images/favicon.ico">
    <link href="Manage/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="Manage/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="Manage/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="Manage/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <script src="Manage/assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

    <style>
        body {
            background: #ffffff;
            /* Uncomment for a background gradient */
        }

        .plan-card {
            transition: transform 0.3s;
        }

        .plan-card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body data-sidebar="light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <img src="Manage/assets/images/kenzwheels.jpg" alt="Kenz Wheels Logo" height="80" class="img-fluid mb-4">
                    <h4 class="mb-4">Choose your Pricing Plan</h4>
                    <a href="index" class="btn btn-primary">Back to My Page</a>
                    <p class="text-muted">
                        <!-- write about the pricing plans -->
                        We offer three different pricing plans to suit your needs. The Entry Level plan is perfect for beginners, the Growth Plan is ideal for those looking to expand their business, and the Ultimate Package offers the most comprehensive features for ambitious dealers.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            // Define pricing plans in an array
            $plans = [
                ['title' => 'Entry Level', 'price' => 1999, 'icon' => 'fa-cube', 'featuresIncludes' => ['Unlimited car listings', 'Add unlimited spare parts', 'View product viewer', 'Basic customer details'], 'featuresNotIncludes' => ['Customer location notifications', 'Inventory tracking', 'Inquiry management', 'Subdomain for website', 'Dealer connect']],
                ['title' => 'Growth Plan', 'price' => 2999, 'icon' => 'fa-cog', 'featuresIncludes' => ['Unlimited car listings', 'Add unlimited spare parts', 'View product viewer', 'Detailed customer details', 'Customer location notifications', 'Inventory tracking'], 'featuresNotIncludes' => ['Inquiry management', 'Subdomain for website', 'Dealer connect']],
                ['title' => 'Ultimate Package', 'price' => 3999, 'icon' => 'fa-gem', 'featuresIncludes' => ['Unlimited car listings', 'Add unlimited spare parts', 'View product viewer', 'Detailed customer details', 'Customer location notifications', 'Inventory tracking', 'Inquiry management', 'Subdomain for website', 'Dealer connect'], 'featuresNotIncludes' => []],
            ];

            foreach ($plans as $plan): ?>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-0 shadow-lg plan-card">
                        <div class="card-body p-4 text-center">
                            <div class="d-flex mb-2 justify-content-center">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-sm">
                                        <span class="avatar-title rounded-circle bg-primary">
                                            <i class="fas <?php echo htmlspecialchars($plan['icon']); ?> font-size-20"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="font-size-16"><?php echo htmlspecialchars($plan['title']); ?></h5>
                                    <p class="text-muted">Choose the plan that best suits your needs.</p>
                                </div>
                            </div>
                            <div class="py-4 border-bottom">
                                <h4><sup><small>₹</small></sup><?php echo htmlspecialchars($plan['price']); ?> / <span class="font-size-16">Year</span></h4>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-primary btn-sm waves-effect waves-light">Sign up Now</a>
                                </div>
                            </div>

                            <div class="plan-features text-start mt-4">
                                <h5 class="font-size-15 mb-3">Plan Features:</h5>
                                <?php foreach ($plan['featuresIncludes'] as $feature): ?>
                                    <p><i class="mdi mdi-checkbox-marked-circle-outline font-size-16 align-middle text-primary me-2"></i><?php echo htmlspecialchars($feature); ?></p>
                                <?php endforeach; ?>
                                <?php foreach ($plan['featuresNotIncludes'] as $feature): ?>
                                    <p><i class="mdi mdi-close-circle-outline font-size-16 align-middle text-danger me-2"></i><?php echo htmlspecialchars($feature); ?></p>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- end row -->
    </div> <!-- container -->
    <div class="fixed-bottom bg-light py-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Kenz Wheels.
                </div>
                <div class="col-sm-6 text-end">
                    <a href="privacy" class="text-muted">Privacy Policy</a> | <a href="terms" class="text-muted">Terms of Service</a>
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

</body>

</html>