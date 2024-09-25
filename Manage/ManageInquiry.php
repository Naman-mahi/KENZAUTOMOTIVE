<?php
include 'head.php';

// Fetch inquiries
$sql = "SELECT pi.inquiry_id, u.first_name, u.last_name, u.email, u.mobile_number, pi.inquiry_date, pi.status, pi.notes 
        FROM product_inquiries pi 
        JOIN users u ON pi.user_id = u.user_id";

$result = $conn->query($sql);


?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Manage Inquiry</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Inquiry</li>
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
                                        <th>Inquiry ID</th>
                                        <th>Customer Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Notes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        $counter = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            $customer_name = $row['first_name'] . ' ' . $row['last_name'];
                                            $inquiry_id = "INQ" . str_pad($row['inquiry_id'], 3, '0', STR_PAD_LEFT);
                                            $dateTime = new DateTime($row['inquiry_date']);
                                            echo "<tr>
                                                <td>{$counter}</td>
                                                <td>{$inquiry_id}</td>
                                                <td>{$customer_name}</td>
                                                <td>{$row['email']}</td>
                                                <td>{$row['mobile_number']}</td>
                                                <td>" . $dateTime->format('Y/m/d') . "</td>
                                                <td>" . $dateTime->format('h:i A') . "</td>
                                                <td>{$row['status']}</td>
                                                <td>{$row['notes']}</td>
                                            </tr>";
                                            $counter++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='9'>No inquiries found</td></tr>";
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