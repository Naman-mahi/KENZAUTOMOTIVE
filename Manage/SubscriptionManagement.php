<?php
include 'head.php';
#SELECT `subscription_id`, `user_id`, `subscription_start`, `subscription_end`, `status`, `coupon_id`, `discount_value`, `subscription_amount`, `created_at`, `updated_at` FROM `subscriptions` WHERE 1
// Fetch subscriptions from the database
$sql = "SELECT * FROM subscriptions JOIN users ON subscriptions.user_id = users.user_id JOIN coupons ON subscriptions.coupon_id = coupons.coupon_id";
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
                                    <tr>
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <th>Amount</th>
                                        <th>Coupon</th>
                                        <th> start date</th>
                                        <th> end date</th>
                                        <th>Subscription status</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        $count = 1;
                                        
                                        while ($row = $result->fetch_assoc()) {
                                            $status = $row['status'] === 'active' ? 'success' : 'danger';

                                            echo "<tr>";
                                            echo "<td>" . $count++ . "</td>";
                                            echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['mobile_number'] . "</td>";
                                            echo "<td>" . $row['subscription_amount'] . "</td>";
                                            echo "<td>" . $row['coupon_name'] . "</td>";
                                            echo "<td>" . $row['subscription_start'] . "</td>";
                                            echo "<td>" . $row['subscription_end'] . "</td>";
                                            echo "<td> <span class='badge p-2 fs-6 badge-soft-{$status}'>{$row['status']}</span>  </td>";

                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No subscriptions found</td></tr>";
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
