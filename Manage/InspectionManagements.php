<?php
include 'includes/head.php';

// Fetch inquiries
$sql = "SELECT users.user_id, users.first_name, users.last_name, users.email, users.mobile_number, products.product_id, products.product_name, products.dealer_id, products.inspection_status, vehicle_inspection.inspection_id FROM products join dealers on products.dealer_id = dealers.user_id join users on dealers.user_id = users.user_id join vehicle_inspection on products.product_id = vehicle_inspection.car_id WHERE inspection_request = 1";

$result = $conn->query($sql);

?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Inspection Managements</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Inspection Managements</li>
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
                            <?php
                            if ($result->num_rows > 0) { ?>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Dealer Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Inspection Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $counter = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            // var_dump($row);
                                            // exit;
                                            $inspection_status = $row['inspection_status'];
                                            $badge = '';
                                            if ($inspection_status == 'Pending') {
                                                $badge = 'badge bg-warning';
                                            } else if ($inspection_status == 'Completed') {
                                                $badge = 'badge bg-success';
                                            } else if ($inspection_status == 'Cancelled') {
                                                $badge = 'badge bg-danger';
                                            }
                                            echo "<tr>
                                                <td>{$counter}</td>
                                                <td>{$row['product_name']}</td>
                                                <td>{$row['first_name']} {$row['last_name']}</td>
                                                <td>{$row['email']}</td>
                                                <td>{$row['mobile_number']}</td>
                                                <td class='text-center'><span class='{$badge}'>{$row['inspection_status']}</span></td>
                                                <td>";
                                            if ($row['inspection_id'] == 'Null') {
                                                echo "<a href='InspectionView?inspection_id={$row['inspection_id']}' class='btn btn-sm btn-info me-2'>View</a>";
                                            } else {
                                                echo "<a href='InspectionView?inspection_id={$row['inspection_id']}' class='btn btn-sm btn-info me-2' disabled>View</a>";
                                            }
                                            echo "<a href='InspectionAdd?inspection_id={$row['inspection_id']}' class='btn btn-sm btn-success'>Add</a>
                                                </td>
                                            </tr>";
                                            $counter++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <h2 class='text-center m-5'> No Inspection Request there</h2>
                            <?php } ?>
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
include 'includes/footer.php';
?>