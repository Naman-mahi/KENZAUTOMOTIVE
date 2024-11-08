<?php
include 'includes/head.php';
require_once '../includes/db.php'; // Ensure database connection is included

// Fetch inquiries securely
$sql = "SELECT u.*, d.* FROM `users` u JOIN `dealers` d ON u.user_id = d.user_id WHERE u.role_id = 2";
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

                                            echo "<tr data-user-id='{$row['user_id']}'>
                                            <td>{$counter}</td>
                                            <td>" . htmlspecialchars($row['company_name']) . "</td>
                                            <td>{$customer_name}</td>
                                            <td>" . htmlspecialchars($row['email']) . "</td>
                                            <td>" . htmlspecialchars($row['mobile_number']) . "</td>
                                            <td>" . htmlspecialchars($row['city']) . "</td>
                                            <td>{$formattedDateTime}</td>
                                            <td>
                                                <select class='form-select m-0 p-1 status-select' name='status' required>
                                                    <option value=''>Select Status</option>
                                                    <option value='active'" . ($current_status === 'active' ? ' selected' : '') . ">Active</option>
                                                    <option value='inactive'" . ($current_status === 'inactive' ? ' selected' : '') . ">Inactive</option>
                                                    <option value='pending'" . ($current_status === 'pending' ? ' selected' : '') . ">Pending</option>
                                                    <option value='suspended'" . ($current_status === 'suspended' ? ' selected' : '') . ">Suspend</option>
                                                </select>
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
                    // Optionally, you can add code to change the row color based on new status.
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

