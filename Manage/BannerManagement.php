<?php
include 'includes/head.php';
include '../includes/db.php'; // Include your database connection file

// Fetch banners from the database
$sql = "SELECT * FROM banners"; // Added ORDER BY to show newest first
$result = $conn->query($sql);
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Banners Management</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Banners Management</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End page title -->

            <div class="row">
                <div class="col-12">
                    <div class="mb-3 d-sm-flex align-items-center justify-content-end">
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addBannerModal">
                            Add New Banner
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php if ($result && $result->num_rows > 0): ?>
                                        <?php $counter = 1; ?>
                                        <?php while ($row = $result->fetch_assoc()): ?>
                                            <tr data-banner-id="<?= htmlspecialchars($row['id']) ?>" 
                                                data-title="<?= htmlspecialchars($row['title']) ?>"
                                                data-image="<?= htmlspecialchars($row['image']) ?>"
                                                data-link="<?= htmlspecialchars($row['link']) ?>"
                                                data-status="<?= htmlspecialchars($row['status']) ?>">
                                                <td><?= $counter ?></td>
                                                <td><?= htmlspecialchars($row['title']) ?></td>
                                                <td><a href="uploads/Banners/<?= htmlspecialchars($row['image']) ?>" target="_blank"> <i class="mdi mdi-eye"></i> View Banner</a></td>
                                                <td><a href="<?= htmlspecialchars($row['link']) ?>" target="_blank" rel="noopener noreferrer"><i class="ri-share-box-line"></i> Link</a></td>
                                                <td>
                                                    <a href="javascript:void(0)" 
                                                       onclick="changeStatus(<?= htmlspecialchars($row['id']) ?>)" 
                                                       class="badge p-2 fs-6 badge-soft-<?= $row['status'] === 'active' ? 'success' : 'danger' ?>">
                                                        <?= htmlspecialchars($row['status']) ?>
                                                    </a>
                                                </td>
                                                <td><?= date('d M, Y', strtotime($row['created_at'])) ?></td>
                                                <td>
                                                    <button onclick="editBanner(<?= htmlspecialchars($row['id']) ?>, this)" 
                                                            class="btn rounded-0 btn-warning btn-sm">
                                                        <i class="mdi mdi-pencil"></i> Edit
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php $counter++; ?>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr><td colspan="7">No banners found</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page-content -->

        <!-- Add Banner Modal -->
        <div class="modal fade" id="addBannerModal" tabindex="-1" role="dialog" aria-labelledby="addBannerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBannerModalLabel">Add New Banner</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addBannerForm" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="addBannerTitle">Title</label>
                                <input type="text" class="form-control" id="addBannerTitle" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="addBannerImage">Image</label>
                                <input type="file" class="form-control" id="addBannerImage" accept="image/*" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="addBannerLink">Link</label>
                                <input type="url" class="form-control" id="addBannerLink" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="addBannerStatus">Status</label>
                                <select class="form-control" id="addBannerStatus" required>
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submitBanner">Add Banner</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Banner Modal -->
        <div class="modal fade" id="editBannerModal" tabindex="-1" role="dialog" aria-labelledby="editBannerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editBannerModalLabel">Edit Banner</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editBannerForm" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="editBannerTitle">Title</label>
                                <input type="text" class="form-control" id="editBannerTitle" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="editBannerImage">Image</label>
                                <input type="file" class="form-control" id="editBannerImage" accept="image/*">
                                <small class="text-muted">Leave empty to keep current image</small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="editBannerLink">Link</label>
                                <input type="url" class="form-control" id="editBannerLink" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="editBannerStatus">Status</label>
                                <select class="form-control" id="editBannerStatus" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updateBanner">Update Banner</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize DataTable
                $('#datatable').DataTable({
                    responsive: true,
                    order: [[5, 'desc']] // Sort by Created At column by default
                });

                // Open Add Banner Modal
                const addBannerButton = document.querySelector('.btn-success');
                addBannerButton.addEventListener('click', function() {
                    document.getElementById('addBannerForm').reset();
                });

                // Submit Banner
                document.getElementById('submitBanner').addEventListener('click', function() {
                    const formData = new FormData();
                    const imageFile = document.getElementById('addBannerImage').files[0];

                    formData.append('title', document.getElementById('addBannerTitle').value);
                    formData.append('image', imageFile);
                    formData.append('link', document.getElementById('addBannerLink').value);
                    formData.append('status', document.getElementById('addBannerStatus').value);

                    // Validate form data
                    if (!formData.get('title') || !imageFile || !formData.get('link') || !formData.get('status')) {
                        Swal.fire('Error!', 'Please fill in all fields.', 'error');
                        return;
                    }

                    Swal.fire({
                        title: 'Are you sure?',
                        text: `You are about to add the banner: ${formData.get('title')}`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, add it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('functions/add_banner.php', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    $('#addBannerModal').modal('hide');
                                    Swal.fire('Added!', 'The banner has been added.', 'success')
                                        .then(() => location.reload());
                                } else {
                                    Swal.fire('Error!', data.message || 'Something went wrong.', 'error');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Swal.fire('Error!', 'Failed to add banner. Please try again.', 'error');
                            });
                        }
                    });
                });
            });

            function changeStatus(banner_id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to change the status of this banner?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('functions/banner_change_status.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({ banner_id })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Success!', 'The banner status has been changed.', 'success')
                                    .then(() => location.reload());
                            } else {
                                Swal.fire('Error!', 'Failed to change the banner status.', 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire('Error!', 'Failed to change status. Please try again.', 'error');
                        });
                    }
                });
            }

            function editBanner(banner_id, button) {
                const row = button.closest('tr');
                const modal = document.getElementById('editBannerModal');
                modal.dataset.bannerId = banner_id;

                document.getElementById('editBannerTitle').value = row.dataset.title;
                document.getElementById('editBannerLink').value = row.dataset.link;
                document.getElementById('editBannerStatus').value = row.dataset.status;

                $('#editBannerModal').modal('show');
            }

            document.getElementById('updateBanner').addEventListener('click', function() {
                const formData = new FormData();
                const imageFile = document.getElementById('editBannerImage').files[0];
                const bannerId = document.getElementById('editBannerModal').dataset.bannerId;

                formData.append('banner_id', bannerId);
                formData.append('title', document.getElementById('editBannerTitle').value);
                if (imageFile) {
                    formData.append('image', imageFile);
                }
                formData.append('link', document.getElementById('editBannerLink').value);
                formData.append('status', document.getElementById('editBannerStatus').value);

                // Validate form data
                if (!bannerId || !formData.get('title') || !formData.get('link') || !formData.get('status')) {
                    Swal.fire('Error!', 'Please fill in all required fields.', 'error');
                    return;
                }

                fetch('functions/update_banner.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        $('#editBannerModal').modal('hide');
                        Swal.fire('Updated!', 'The banner has been updated.', 'success')
                            .then(() => location.reload());
                    } else {
                        Swal.fire('Error!', data.message || 'Something went wrong.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Error!', 'Failed to update banner. Please try again.', 'error');
                });
            });
        </script>

        <?php include 'includes/footer.php'; ?>
    </div>
</div>
