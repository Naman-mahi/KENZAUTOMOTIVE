<?php
include 'head.php';
// Fetch subscriptions from the database
$sql = "SELECT subscriptions.*, users.first_name, users.last_name, users.email, users.mobile_number, dealers.company_name, coupons.coupon_name FROM subscriptions JOIN users ON subscriptions.user_id = users.user_id LEFT JOIN coupons ON subscriptions.coupon_id = coupons.coupon_id left join dealers on users.user_id = dealers.user_id";
$result = $conn->query($sql);
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Manage Subscription</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
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
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr class="text-center text-uppercase">
                                        <th class="text-center">#</th>
                                        <th class="text-center">Company Name</th>
                                        <th class="text-center">Customer Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Mobile Number</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Coupon</th>
                                        <th class="text-center"> start date</th>
                                        <th class="text-center"> end date</th>
                                        <th class="text-center">Subscription status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        $count = 1;

                                        while ($row = $result->fetch_assoc()) {
                                            // Map for status classes
                                            $statusMap = [
                                                'active' => 'text-success',
                                                'inactive' => 'text-warning',
                                                'canceled' => 'text-danger'
                                            ];

                                            // Determine the status class, defaulting to 'default' if unknown
                                            $color = $statusMap[$row['status']] ?? 'default';

                                            echo "<tr>";
                                            echo "<td>" . $count++ . "</td>";
                                            echo "<td>" . htmlspecialchars($row['company_name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['first_name'] . " " . $row['last_name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['mobile_number']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['subscription_amount']) . "</td>";
                                            echo "<td>" . ($row['coupon_name'] ? htmlspecialchars($row['coupon_name']) : 'NA') . "</td>";
                                            echo "<td>" . date('d M, Y h:i A', strtotime($row['subscription_start'])) . "</td>";
                                            echo "<td>" . date('d M, Y h:i A', strtotime($row['subscription_end'])) . "</td>";
                                            echo "<td><i class='mdi mdi-checkbox-blank-circle me-1 {$color}'></i> {$row['status']}</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='10'>No subscriptions found</td></tr>";
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->
<?php
include 'footer.php';
?>