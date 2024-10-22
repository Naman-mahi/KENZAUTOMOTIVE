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

    <style>
        body {
            background: #ffffff;
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
                    <img src="Manage/assets/images/kenzwheels.jpg" alt="Kenz Wheels Logo" height="60" width="150" class="img-fluid mb-4">
                    <h4 class="mb-4">Choose your Pricing Plan</h4>
                    <a href="index" class="btn btn-primary">Back to My Page</a>
                    <p class="text-muted">We offer three different pricing plans to suit your needs.</p>
                    <p class="text-muted">All plans are subject to GST @ 18%</p>
                </div>
            </div>
            
        </div>

        <div class="row justify-content-center align-items-center" style="min-height: 100px;">
            <div class="col-lg-4 text-center">
                <div class="mb-4">
                    <div class="form-check form-switch form-switch-lg d-inline-block">
                        <label for="SwitchCheckSizelg">Yearly Plan</label>
                        <input class="form-check-input" type="checkbox" id="SwitchCheckSizelg" checked="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <?php
            // Define pricing plans in an array
            $plans = [
                ['title' => 'Entry Level', 'yearlyPrice' => 1999, 'monthlyPrice' => 199, 'icon' => 'fa-cube', 'featuresIncludes' => ['Unlimited car listings', 'Add unlimited spare parts', 'View product viewer', 'Basic customer details'], 'featuresNotIncludes' => ['Customer location notifications', 'Inventory tracking', 'Inquiry management', 'Subdomain for website', 'Dealer connect']],
                ['title' => 'Growth Plan', 'yearlyPrice' => 2999, 'monthlyPrice' => 299, 'icon' => 'fa-cog', 'featuresIncludes' => ['Unlimited car listings', 'Add unlimited spare parts', 'View product viewer', 'Detailed customer details', 'Customer location notifications', 'Inventory tracking'], 'featuresNotIncludes' => ['Inquiry management', 'Subdomain for website', 'Dealer connect']],
                ['title' => 'Ultimate Package', 'yearlyPrice' => 3999, 'monthlyPrice' => 399, 'icon' => 'fa-gem', 'featuresIncludes' => ['Unlimited car listings', 'Add unlimited spare parts', 'View product viewer', 'Detailed customer details', 'Customer location notifications', 'Inventory tracking', 'Inquiry management', 'Subdomain for website', 'Dealer connect'], 'featuresNotIncludes' => []],
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
                                </div>
                            </div>
                            <div class="py-4 border-bottom">
                                <h4 class="price" data-yearly="<?php echo htmlspecialchars($plan['yearlyPrice']); ?>" data-monthly="<?php echo htmlspecialchars($plan['monthlyPrice']); ?>">
                                    <sup><small>₹</small></sup><span class="price-amount"><?php echo htmlspecialchars($plan['yearlyPrice']); ?></span> / <span class="font-size-16">Year</span>
                                </h4>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-primary btn-sm waves-effect waves-light">Sign up Now</a>
                                </div>
                            </div>

                            <div class="plan-features mt-4">
                                <h5 class="font-size-15 mb-3">Plan Features:</h5>
                                <?php foreach ($plan['featuresIncludes'] as $feature): ?>
                                    <p class="text-start"><i class="mdi mdi-checkbox-marked-circle-outline font-size-16 align-middle text-primary me-2"></i><?php echo htmlspecialchars($feature); ?></p>
                                <?php endforeach; ?>
                                <?php foreach ($plan['featuresNotIncludes'] as $feature): ?>
                                    <p class="text-start"><i class="mdi mdi-close-circle-outline font-size-16 align-middle text-danger me-2"></i><?php echo htmlspecialchars($feature); ?></p>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

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
    <script>
        $(document).ready(function() {
            $('#SwitchCheckSizelg').change(function() {
                const isYearly = $(this).is(':checked');
                $('.price').each(function() {
                    const yearlyPrice = $(this).data('yearly');
                    const monthlyPrice = $(this).data('monthly');
                    $(this).find('.price-amount').text(isYearly ? yearlyPrice : monthlyPrice);
                    $(this).find('span').last().text(isYearly ? 'Year' : 'Month');
                });
                $(this).next().text(isYearly ? 'Yearly Plan' : 'Monthly Plan');
            });
        });
    </script>

</body>

</html>