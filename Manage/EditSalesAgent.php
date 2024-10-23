<?php
include 'includes/head.php';
require_once '../includes/db.php'; // Ensure database connection is included
$id = $_GET['id'];
// Fetch inquiries securely
$sql = "SELECT * FROM `users` WHERE role = 'sales_agent' AND user_id = '$id'";
$result = $conn->query($sql);

?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Sales Agent</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Sales Agent</li>
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
                           if ($result && $result->num_rows > 0) {
                               $row = $result->fetch_assoc();
                               echo "<form action='UpdateSalesAgent.php' method='post'>";
                               echo "<input type='hidden' name='id' value='{$row['user_id']}'>";
                               echo "<div class='form-group'>";
                               echo "<label for='first_name'>First Name</label>";
                               echo "<input type='text' class='form-control' id='first_name' name='first_name' value='{$row['first_name']}' required>";
                               echo "</div>";
                               echo "<div class='form-group'>";
                               echo "<label for='last_name'>Last Name</label>";
                               echo "<input type='text' class='form-control' id='last_name' name='last_name' value='{$row['last_name']}' required>";
                               echo "</div>";
                               echo "<div class='form-group'>";
                               echo "<label for='email'>Email</label>";
                               echo "<input type='email' class='form-control' id='email' name='email' value='{$row['email']}' required>";
                               echo "</div>";
                               echo "<div class='form-group'>";
                               echo "<label for='mobile_number'>Mobile Number</label>";
                               echo "<input type='text' class='form-control' id='mobile_number' name='mobile_number' value='{$row['mobile_number']}' required>";
                               echo "</div>";
                               echo "<div class='form-group'>";
                               echo "<label for='password'>Password</label>";
                               echo "<input type='password' class='form-control' id='password' name='password' required>";
                               echo "</div>";
                               echo "<button type='submit' class='btn btn-primary'>Update</button>";
                               echo "</form>";
                           } else {
                               echo "<p>No sales agent found with the specified ID.</p>";
                           }
                           ?>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->
<script>
    $(document).ready(function() {
        $('.status-select').change(function() {
            const status = $(this).val();
            const userId = $(this).closest('tr').data('user-id');
            if (status) {
                $.ajax({
                    url: 'UpdateStatus.php',
                    type: 'POST',
                    data: {
                        status: status,
                        dealer_id: userId
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Status Updated!',
                            text: 'The status has been updated successfully.',
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Update Failed!',
                            text: 'There was an error updating the status. Please try again.',
                        });
                    }
                });
            }
        });
    });
</script>

<?php
include 'includes/footer.php';
?>