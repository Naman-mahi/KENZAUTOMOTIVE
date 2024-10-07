<?php
include 'head.php';
require_once '../includes/db.php'; // Ensure database connection is included

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
                                                <i class="mdi mdi-account fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Customers</p>
                                        <h5 class="mb-3">150</h5>
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
                                                <i class="mdi mdi-account-group fs-2"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="mb-1">Total Dealers</p>
                                        <h5 class="mb-3">30</h5>
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
                                        <h5 class="mb-3">50</h5>
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
                                        <p class="mb-1">Total Visits</p>
                                        <h5 class="mb-3">500</h5>
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

                            <div class="card-body">
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