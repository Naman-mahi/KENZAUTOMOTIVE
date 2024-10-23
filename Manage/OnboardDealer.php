<?php
include 'includes/head.php';
require_once '../includes/db.php'; // Ensure database connection is included

// Fetch inquiries securely
$sql = "SELECT u.*, d.* FROM `users` u JOIN `dealers` d ON u.user_id = d.user_id WHERE u.role = 'dealer' AND u.user_status = 'pending'";
$result = $conn->query($sql);

?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Onboard Dealer</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Onboard Dealer</li>
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
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->


<?php
include 'includes/footer.php';
?>