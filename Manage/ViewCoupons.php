<?php
include 'head.php';
include '../includes/db.php'; // Include your database connection file
// Fetch coupons from the database
$coupon_id = $_GET['coupon_id'];
$sql = "SELECT * FROM coupons JOIN subscriptions ON coupons.coupon_id = subscriptions.coupon_id JOIN dealers ON subscriptions.user_id = dealers.user_id WHERE coupons.coupon_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $coupon_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Coupons Management</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Coupons Management</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-end">
                        <a href="CouponsManagement.php" class="btn btn-sm btn-dark">
                            <i class="mdi mdi-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap align-middle text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Name</th>
                                        <th>Coupon Code</th>
                                        <th>Discount Type</th>
                                        <th>Discount Value</th>
                                        <th>Subscription Amount</th>
                                        <th>Subscription Start</th>
                                        <th>Subscription End</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        $counter = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            // status badge
                                            $status = $row['status'] === 'active' ? 'success' : 'danger';
                                            echo "<tr>";
                                            echo "<td>{$counter}</td>";
                                            echo "<td>{$row['company_name']}</td>";
                                            echo "<td>{$row['code']}</td>";
                                            echo "<td>{$row['discount_type']}</td>";
                                            echo "<td>" . ($row['discount_type'] === 'percentage' ? "{$row['discount_value']}%" : "INR " . $row['discount_value']) . "</td>";
                                            echo "<td>" . $row['subscription_amount'] . "</td>";
                                            echo "<td>" . date('d M, Y H:i A', strtotime($row['subscription_start'])) . "</td>"; // format date with time like 25 May 2024 12:00 PM
                                            echo "<td>" . date('d M, Y H:i A', strtotime($row['subscription_end'])) . "</td>"; // format date with time like 25 May 2024 12:00 PM
                                            echo "<td><span class='badge p-2 fs-6 badge-soft-{$status}'>{$row['status']}</span></td>";
                                            echo "</tr>";
                                            $counter++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='9'>No coupons found</td></tr>"; // Updated to match the number of columns
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
</div>
<!-- end main content -->
<?php
include 'footer.php';
?>