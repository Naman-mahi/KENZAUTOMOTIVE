<?php
include 'includes/head.php';
require_once '../includes/db.php'; // Ensure database connection is included
require_once 'functions/statistics.php'; // Include statistics functions

// Get statistics data
$statistics = getStatistics(); // Function from statistics.php that returns array of stats

// Define card configurations for each role
$roleCards = [
    '1' => [ // Admin
        [
            'title' => 'Total Users',
            'icon' => 'mdi-account-multiple',
            'key' => 'total_users'
        ],
        [
            'title' => 'Total Dealers',
            'icon' => 'mdi-account-tie',
            'key' => 'total_dealers'
        ],
        [
            'title' => 'Total Admins',
            'icon' => 'mdi-shield-account',
            'key' => 'total_admins'
        ],
        [
            'title' => 'Total Customers',
            'icon' => 'mdi-account',
            'key' => 'total_customers'
        ],
        [
            'title' => 'Total Sales Agents',
            'icon' => 'mdi-account-tie-voice',
            'key' => 'total_sales_agents'
        ],
        [
            'title' => 'Total Website Users',
            'icon' => 'mdi-account-circle',
            'key' => 'total_website_users'
        ],
        [
            'title' => 'Total Products',
            'icon' => 'mdi-package-variant-closed',
            'key' => 'total_products'
        ],
        [
            'title' => 'Total Published Website',
            'icon' => 'mdi-publish',
            'key' => 'total_published_website'
        ],
        [
            'title' => 'Total Published Marketplace',
            'icon' => 'mdi-publish',
            'key' => 'total_published_marketplace'
        ],
        [
            'title' => 'Total Published Own Website',
            'icon' => 'mdi-publish',
            'key' => 'total_published_own_website'
        ],
        [
            'title' => 'Total Referral Rewards',
            'icon' => 'mdi-gift',
            'key' => 'total_referral_rewards'
        ],
        [
            'title' => 'Total Active Subscriptions',
            'icon' => 'mdi-credit-card-check',
            'key' => 'total_active_subscriptions'
        ],
        [
            'title' => 'Total Inquiries',
            'icon' => 'mdi-comment-question-outline',
            'key' => 'total_inquiries'
        ]
    ],
    '2' => [ // Dealer
        [
            'title' => 'My Products',
            'icon' => 'mdi-package-variant-closed',
            'key' => 'total_products'
        ],
        [
            'title' => 'Total Inquiries',
            'icon' => 'mdi-comment-question-outline',
            'key' => 'total_inquiries'
        ],
        [
            'title' => 'Published Products',
            'icon' => 'mdi-eye',
            'key' => 'total_published_website'
        ],
        [
            'title' => 'Published Own Website',
            'icon' => 'mdi-eye',
            'key' => 'total_published_own_website'
        ],
        [
            'title' => 'Published Marketplace',
            'icon' => 'mdi-eye',
            'key' => 'total_published_marketplace'
        ],
        [
            'title' => 'Total Referral Rewards',
            'icon' => 'mdi-cash',
            'key' => 'total_referral_rewards'
        ]
    ],
    '5' => [ // Sales Agent
        [
            'title' => 'My Products',
            'icon' => 'mdi-package-variant-closed',
            'key' => 'total_products'
        ],
        [
            'title' => 'Total Inquiries',
            'icon' => 'mdi-comment-question-outline',
            'key' => 'total_inquiries'
        ],
        [
            'title' => 'Total Product Views',
            'icon' => 'mdi-eye',
            'key' => 'total_views'
        ],
        [
            'title' => 'Total Sales',
            'icon' => 'mdi-cash',
            'key' => 'total_sales'
        ]
    ]
];
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <?php
            // Check if statistics were retrieved successfully
            if (!$statistics) {
                echo '<div class="alert alert-danger">Error retrieving statistics data</div>';
            }

            // Get the current user's role
            $userRole = $_SESSION['role'];

            // Check if role exists in configuration
            if (isset($roleCards[$userRole])) {
                // Get stats data based on role
                $statsData = ($userRole == '5') ? getAgentStatistics($_SESSION['user_id']) : $statistics;
            ?>
                <div class="row">
                    <?php foreach ($roleCards[$userRole] as $card) { ?>
                        <div class="col-xl-3 col-sm-6">
                            <div class="card card-dashboard shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex text-muted">
                                        <div class="flex-shrink-0 me-3 align-self-center">
                                            <div class="avatar-sm">
                                                <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                    <i class="mdi <?php echo $card['icon']; ?> fs-2"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="mb-1"><?php echo $card['title']; ?></p>
                                            <h5 class="mb-3"><?php echo isset($statsData[$card['key']]) ? $statsData[$card['key']] : 0; ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php
            } else {
                // Redirect to homepage if role is not valid
                header('Location: /');
                exit();
            }
            ?>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->

<?php
include 'includes/footer.php';
?>