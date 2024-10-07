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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">


                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
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