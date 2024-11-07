<?php
include 'includes/head.php';
include '../includes/db.php'; // Include your database connection file

// Fetch roles from the database
$sql = "SELECT * FROM roles"; // Assuming a 'roles' table exists
$result = $conn->query($sql);

?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Role Management</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Role Management</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End page title -->

            <div class="row">
                <div class="col-12">
                    <div class="mb-3 d-sm-flex align-items-center justify-content-end">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addRoleModal">
                            Add New Role
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info alert-dismissible fade show border-0" role="alert">
                        <strong>Note!</strong> Click the edit button to modify role details.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if ($result->num_rows > 0): ?>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Role Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $counter = 1;
                                  
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr data-role-id='{$row['role_id']}' data-role-name='{$row['role_name']}' data-description='{$row['description']}'>";
                                        echo "<td>{$counter}</td>";
                                        echo "<td>{$row['role_name']}</td>";
                                        echo "<td>{$row['description']}</td>";
                                        echo "<td>
                                            <button onclick='editRole({$row['role_id']}, this)' class='btn rounded-0 btn-warning btn-sm'>
                                                <i class='mdi mdi-pencil'></i> Edit
                                            </button>
                                        </td>";
                                        echo "</tr>";
                                        $counter++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php else: ?>
                                <p class='text-center'>No roles found</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page-content -->

        <!-- Add Role Modal -->
        <div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-labelledby="addRoleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addRoleModalLabel">Add New Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addRoleForm">
                            <div class="form-group">
                                <label for="addRoleName">Role Name</label>
                                <input type="text" class="form-control" id="addRoleName" required>
                            </div>
                            <div class="form-group">
                                <label for="addDescription">Description</label>
                                <textarea class="form-control" id="addDescription" required></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn rounded-0 btn-primary" id="submitRole">Add Role</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Role Modal -->
        <div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-labelledby="editRoleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editRoleModalLabel">Edit Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editRoleForm">
                            <div class="form-group">
                                <label for="editRoleName">Role Name</label>
                                <input type="text" class="form-control" id="editRoleName" required>
                            </div>
                            <div class="form-group">
                                <label for="editDescription">Description</label>
                                <textarea class="form-control" id="editDescription" required></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn rounded-0 btn-primary" id="updateRole">Update Role</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Open Add Role Modal
                const addRoleButton = document.querySelector('.btn-success');
                addRoleButton.addEventListener('click', function() {
                    document.getElementById('addRoleForm').reset(); // Reset the entire form
                    $('#addRoleModal').modal('show');
                });

                // Submit Role
                document.getElementById('submitRole').addEventListener('click', function() {
                    const roleName = document.getElementById('addRoleName').value;
                    const description = document.getElementById('addDescription').value;

                    if (!roleName || !description) {
                        Swal.fire('Error!', 'Please fill in all fields.', 'error');
                        return;
                    }

                    Swal.fire({
                        title: 'Are you sure?',
                        text: `You are about to add the role: ${roleName}`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, add it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('functions/add_role.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                    },
                                    body: JSON.stringify({
                                        role_name: roleName,
                                        description: description
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        $('#addRoleModal').modal('hide');
                                        Swal.fire('Added!', 'The role has been added.', 'success');
                                        location.reload();
                                    } else {
                                        Swal.fire('Error!', data.message || 'Something went wrong.', 'error');
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    Swal.fire('Error!', 'Failed to add role. Please try again.', 'error');
                                });
                        }
                    });
                });
            });

            function editRole(role_id, button) {
                const row = button.closest('tr');

                // Set the role_id in the modal's data attribute
                const modal = document.getElementById('editRoleModal');
                modal.dataset.roleId = role_id; // Set the role ID

                // Populate the modal input fields with data from the row
                document.getElementById('editRoleName').value = row.dataset.roleName;
                document.getElementById('editDescription').value = row.dataset.description;

                // Show the modal
                $('#editRoleModal').modal('show');
            }

            document.getElementById('updateRole').addEventListener('click', function() {
                const roleName = document.getElementById('editRoleName').value;
                const description = document.getElementById('editDescription').value;
                const roleId = document.getElementById('editRoleModal').dataset.roleId; // Ensure this is set correctly

                // Validate input fields
                if (!roleId || !roleName || !description) {
                    Swal.fire('Error!', 'Please fill in all fields.', 'error');
                    return;
                }

                // Perform AJAX request to update role
                fetch('functions/update_role.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            role_id: roleId,
                            role_name: roleName,
                            description: description
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            $('#editRoleModal').modal('hide');
                            Swal.fire('Updated!', 'The role has been updated.', 'success')
                                .then(() => {
                                    location.reload();
                                });
                        } else {
                            Swal.fire('Error!', data.message || 'Something went wrong.', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire('Error!', 'Failed to update role. Please try again.', 'error');
                    });
            });
        </script>

        <?php include 'includes/footer.php'; ?>
    </div>
</div>