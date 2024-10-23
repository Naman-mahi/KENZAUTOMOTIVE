<?php
include 'head.php';

// Fetch inquiries
$sql = "SELECT * FROM `users` WHERE `role` = 'customer'";

$result = $conn->query($sql);


?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Manage Customer</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Customer</li>
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
                                        <th>Phone</th>
                                        <th>Date Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        $counter = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            $customer_name = $row['first_name'] . ' ' . $row['last_name'];

                                            // Format the created_at date
                                            $dateTime = new DateTime($row['created_at']);
                                            $formattedDateTime = $dateTime->format('d F, Y h:i A'); // Example: 24 May, 2024 10:20 PM

                                            echo "<tr>
                    <td>{$counter}</td>
                    <td>{$customer_name}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['mobile_number']}</td>
                    <td>{$formattedDateTime}</td>
                </tr>";
                                            $counter++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>No inquiries found</td></tr>";
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