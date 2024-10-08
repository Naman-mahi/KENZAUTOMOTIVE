<?php
include 'head.php';
require_once '../includes/db.php'; // Ensure database connection is included
// Fetch inquiries securely
$sql = "SELECT * FROM `users` WHERE role = 'website_user'";
$result = $conn->query($sql);
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Website Users Management</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Website Users</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-end">
                        <a href="AddNewUser.php" class="btn btn-sm btn-primary">Add New User</a>
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
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Registration Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Define status to color mapping
                                    $statusColors = [
                                        'active' => 'badge-soft-success', // Greenish background
                                        'inactive' => 'badge-soft-secondary', // Grey background
                                        'pending' => 'badge-soft-warning', // Yellowish background
                                        'suspended' => 'badge-soft-danger', // Red background
                                    ];
                                    if ($result && $result->num_rows > 0) {
                                        $counter = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            $agent_name = htmlspecialchars($row['first_name'] . ' ' . $row['last_name']);
                                            $dateTime = new DateTime($row['created_at']);
                                            $formattedDateTime = $dateTime->format('d F, Y h:i A');
                                            $current_status = $row['user_status'];
                                            $badgeColor = isset($statusColors[$current_status]) ? $statusColors[$current_status] : 'bg-soft-primary';
                                            echo "<tr data-user-id='{$row['user_id']}'>
                                            <td>{$counter}</td>
                                            <td>{$agent_name}</td>
                                            <td>" . htmlspecialchars($row['email']) . "</td>
                                            <td>" . htmlspecialchars($row['mobile_number']) . "</td>
                                            <td>{$formattedDateTime}</td>
                                            <td class='text-center'><span class=' p-2 fs-6 badge {$badgeColor}'>{$current_status}</span></td>
                                            <td>
                                                <select class='form-select m-0 p-1 status-select' name='status' required>
                                                    <option value=''>Select Status</option>
                                                    <option value='active'" . ($current_status === 'active' ? ' selected' : '') . ">Active</option>
                                                    <option value='inactive'" . ($current_status === 'inactive' ? ' selected' : '') . ">Inactive</option>
                                                    <option value='pending'" . ($current_status === 'pending' ? ' selected' : '') . ">Pending</option>
                                                    <option value='suspended'" . ($current_status === 'suspended' ? ' selected' : '') . ">Suspended</option>
                                                </select>
                                            </td>
                                            <td>
                                                <a href='EditSalesAgent.php?id={$row['user_id']}' class='btn btn-primary btn-sm'>Edit</a>
                                                <button class='btn btn-danger btn-sm delete-agent' data-id='{$row['user_id']}'>Delete</button>
                                            </td>
                                        </tr>";
                                            $counter++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='7' style='text-align: center;'>No sales agents found</td></tr>";
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
                        location.reload();
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
include 'footer.php';
?>