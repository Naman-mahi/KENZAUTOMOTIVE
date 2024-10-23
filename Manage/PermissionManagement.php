<?php
include 'includes/head.php';
include '../includes/db.php'; // Include your database connection file

// Fetch permissions from the database
$sqlPermissions = "SELECT `id`, `name`, `description` FROM `permissions`";
$permissions = $conn->query($sqlPermissions);
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Permission Management</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Permission Management</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End page title -->

            <div class="row mb-3">
                <div class="col-12 text-end">
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addPermissionModal">
                        Add New Permission
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="width: 100%;">
                                <thead class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Permission Name</th>
                                        <th>Permission Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($permissions->num_rows > 0): ?>
                                        <?php $counter = 1; ?>
                                        <?php while ($row = $permissions->fetch_assoc()): ?>
                                            <tr data-permission-id="<?= $row['id'] ?>" data-permission-name="<?= $row['name'] ?>" data-permission-description="<?= $row['description'] ?>">
                                                <td><?= $counter ?></td>
                                                <td><?= htmlspecialchars($row['name']) ?></td>
                                                <td><?= htmlspecialchars($row['description']) ?></td>
                                                <td>
                                                    <button onclick='editPermission(<?= $row['id'] ?>, this)' class='btn rounded-0 btn-warning btn-sm'>
                                                        <i class='mdi mdi-pencil'></i> Edit
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php $counter++; ?>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan='4'>No permissions found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page-content -->

        <!-- Add Permission Modal -->
        <div class="modal fade" id="addPermissionModal" tabindex="-1" role="dialog" aria-labelledby="addPermissionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPermissionModalLabel">Add New Permission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addPermissionForm">
                            <div class="form-group mb-3">
                                <label for="addPermissionName">Permission Name</label>
                                <input type="text" class="form-control" id="addPermissionName" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="addPermissionDescription">Permission Description</label>
                                <textarea class="form-control" id="addPermissionDescription" required></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn rounded-0 btn-primary" id="submitPermission">Add Permission</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Permission Modal -->
        <div class="modal fade" id="editPermissionModal" tabindex="-1" role="dialog" aria-labelledby="editPermissionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPermissionModalLabel">Edit Permission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editPermissionForm">
                            <input type="hidden" id="editPermissionId">
                            <div class="form-group mb-3">
                                <label for="editPermissionName">Permission Name</label>
                                <input type="text" class="form-control" id="editPermissionName" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="editPermissionDescription">Permission Description</label>
                                <textarea class="form-control" id="editPermissionDescription" required></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn rounded-0 btn-primary" id="updatePermission">Update Permission</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelector('.btn-success').addEventListener('click', function() {
                    document.getElementById('addPermissionForm').reset(); // Reset the form
                    $('#addPermissionModal').modal('show');
                });

                // Open Add Permission Modal
                document.getElementById('submitPermission').addEventListener('click', function() {
                    const permissionName = document.getElementById('addPermissionName').value;
                    const permissionDescription = document.getElementById('addPermissionDescription').value;

                    Swal.fire({
                        title: 'Are you sure?',
                        text: `You are about to add the permission: ${permissionName}`,
                        icon: 'warning',
                        showCancelButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('add_permission.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                    },
                                    body: JSON.stringify({
                                        name: permissionName,
                                        description: permissionDescription,
                                    }),
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        $('#addPermissionModal').modal('hide');
                                        Swal.fire('Added!', 'The permission has been added.', 'success');
                                        location.reload();
                                    } else {
                                        Swal.fire('Error!', data.message || 'Something went wrong.', 'error');
                                    }
                                })
                                .catch(() => {
                                    Swal.fire('Error!', 'Failed to add permission. Please try again.', 'error');
                                });
                        }
                    });
                });

                // Edit Permission Function
                window.editPermission = function(permissionId, button) {
                    const row = button.closest('tr');
                    document.getElementById('editPermissionId').value = permissionId;
                    document.getElementById('editPermissionName').value = row.dataset.permissionName;
                    document.getElementById('editPermissionDescription').value = row.dataset.permissionDescription;

                    $('#editPermissionModal').modal('show');
                }

                // Update Permission
                document.getElementById('updatePermission').addEventListener('click', function() {
                    const permissionId = document.getElementById('editPermissionId').value;
                    const permissionName = document.getElementById('editPermissionName').value;
                    const permissionDescription = document.getElementById('editPermissionDescription').value;

                    fetch('update_permission.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                id: permissionId,
                                name: permissionName,
                                description: permissionDescription,
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                $('#editPermissionModal').modal('hide');
                                Swal.fire('Updated!', 'The permission has been updated.', 'success').then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire('Error!', data.message || 'Something went wrong.', 'error');
                            }
                        })
                        .catch(() => {
                            Swal.fire('Error!', 'Failed to update permission. Please try again.', 'error');
                        });
                });
            });
        </script>

        <?php include 'includes/footer.php'; ?>
    </div>
</div>