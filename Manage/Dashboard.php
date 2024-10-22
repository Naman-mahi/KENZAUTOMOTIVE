<?php
include 'head.php';
require_once '../includes/db.php'; // Ensure database connection is included
require_once 'statistics.php'; // Ensure database connection is included

// Fetch inquiries securely
$sql = "SELECT u.*, d.* FROM `users` u JOIN `dealers` d ON u.user_id = d.user_id WHERE u.role = 'dealer' AND d.verification_status ='Pending'";
$result = $conn->query($sql);

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
            // var_dump($statistics);
            ?>

            <?php
            if ($_SESSION['role'] === 'admin') {
            ?>
                <div class="row">
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-account-multiple fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Users</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_users']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-account-tie fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Dealers</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_dealers']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-shield-account fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Admins</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_admins']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-account fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Customers</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_customers']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-account-tie-voice fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Sales Agents</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_sales_agents']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-account-circle fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Website Users</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_website_users']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-package-variant-closed fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Products</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_products']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-publish fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Published Website</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_published_website']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-publish fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Published Marketplace</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_published_marketplace']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-publish fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Published Own Website</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_published_own_website']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-gift fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Referral Rewards</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_referral_rewards']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-credit-card-check fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Active Subscriptions</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_active_subscriptions']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-comment-question-outline fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Inquiries</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_inquiries']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pt-0">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Dealer Onboarding</h4>
                                </div>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Company Name</th>
                                            <th>Person Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Location</th>
                                            <th>Date Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result && $result->num_rows > 0) {
                                            $counter = 1;
                                            while ($row = $result->fetch_assoc()) {
                                                $customer_name = htmlspecialchars($row['first_name'] . ' ' . $row['last_name']);
                                                $dateTime = new DateTime($row['created_at']);
                                                $formattedDateTime = $dateTime->format('d F, Y h:i A');
                                                $current_status = $row['user_status'];
                                                $DealerId = $row['user_id'];

                                                echo "<tr data-user-id='{$row['user_id']}'>
                                                    <td>{$counter}</td>
                                                    <td>" . htmlspecialchars($row['company_name']) . "</td>
                                                    <td>{$customer_name}</td>
                                                    <td>" . htmlspecialchars($row['email']) . "</td>
                                                    <td>" . htmlspecialchars($row['mobile_number']) . "</td>
                                                    <td>" . htmlspecialchars($row['city']) . "</td>
                                                    <td>{$formattedDateTime}</td>
                                                    <td>
                                                        <div class='d-flex align-items-center'>
                                                            <a class='btn btn-link p-0 me-2' href='Onbording.php?dealerId=$DealerId' role='button'>
                                                                <i class='fas fa-eye'></i> View
                                                            </a>
                                                        
                                                        
                                                        </div>
                                                    </td>
                                                </tr>";
                                                $counter++;
                                            }
                                        } else {
                                            echo "<tr><td colspan='8'>No dealers found</td></tr>";
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <!-- end row -->

            <?php
            } elseif ($_SESSION['role'] === 'dealer') {
            ?>
                <div class="row">
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-package-variant-closed fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">My Products</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_products']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-comment-question-outline fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Inquiries</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_inquiries']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-eye fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Published Products</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_published_website']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-eye fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Published Own Website</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_published_own_website']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-eye fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Published Marketplace</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_published_marketplace']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->


                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-cash fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Referral Rewards</p>
                                        <h5 class="mb-3"><?php echo $statistics['total_referral_rewards']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->

            <?php
            } elseif ($_SESSION['role'] === 'website_user') {
            ?>
                <div class="row">
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-package-variant-closed fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">My Products</p>
                                        <h5 class="mb-3">120</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-comment-question-outline fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Inquiries</p>
                                        <h5 class="mb-3">25</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-eye fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Product Views</p>
                                        <h5 class="mb-3">40</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-dashboard shadow-lg">
                            <div class="card-body">
                                <div class="d-flex text-muted">
                                    <div class="flex-shrink-0 me-3 align-self-center">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="mdi mdi-cash fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Sales</p>
                                        <h5 class="mb-3">200</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            <?php
            } else {
                // Redirect to login page if user is not admin or dealer
                header("Location: login.php");
                exit(); // Ensure no further code is executed
            }
            ?>
        </div> <!-- container-fluid -->

    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->
<?php
include 'footer.php';
?>