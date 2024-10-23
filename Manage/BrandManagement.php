<?php
include 'head.php';
include '../includes/db.php'; // Include your database connection file

// Fetch brands and categories from the database
$sqlBrands = "SELECT Brands.*, Categories.category_name FROM Brands 
              LEFT JOIN Categories ON Brands.category_id = Categories.category_id";
$resultBrands = $conn->query($sqlBrands);

$sqlCategories = "SELECT * FROM Categories";
$resultCategories = $conn->query($sqlCategories);
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Brands Management</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Brands Management</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End page title -->

            <div class="row">
                <div class="col-12">
                    <div class="mb-3 d-sm-flex align-items-center justify-content-end">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addBrandModal">
                            Add New Brand
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
                                        <th>Brand Name</th>
                                        <th>Brand Logo</th>
                                        <th>Category</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php if ($resultBrands->num_rows > 0): ?>
                                        <?php $counter = 1; ?>
                                        <?php while ($row = $resultBrands->fetch_assoc()): ?>
                                            <tr data-brand-id="<?= $row['brand_id'] ?>" data-brand-name="<?= $row['brand_name'] ?>" data-brand-logo="<?= $row['brand_logo'] ?>" data-category-id="<?= $row['category_id'] ?>" data-created-date="<?= $row['created_date'] ?>">
                                                <td><?= $counter ?></td>
                                                <td><?= $row['brand_name'] ?></td>
                                                <td><img src='uploads/BrandLogo/<?= $row['brand_logo'] ?>' alt='<?= $row['brand_name'] ?>' style='width:50px;'></td>
                                                <td><?= $row['category_name'] ?></td>
                                                <td><?= date('d M, Y', strtotime($row['created_date'])) ?></td>
                                                <td>
                                                    <button onclick='editBrand(<?= $row['brand_id'] ?>, this)' class='btn rounded-0 btn-warning btn-sm'>
                                                        <i class='mdi mdi-pencil'></i> Edit
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php $counter++; ?>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan='6'>No brands found</td>
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

        <!-- Add Brand Modal -->
        <div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="addBrandModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBrandModalLabel">Add New Brand</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addBrandForm" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="addBrandName">Brand Name</label>
                                <input type="text" class="form-control" id="addBrandName" required>
                            </div>
                            <div class="form-group">
                                <label for="addBrandLogo">Brand Logo</label>
                                <input type="file" class="form-control" id="addBrandLogo" required accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="addCategoryId">Category</label>
                                <select class="form-control" id="addCategoryId" required>
                                    <option value="" disabled selected>Select Category</option>
                                    <?php while ($category = $resultCategories->fetch_assoc()): ?>
                                        <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn rounded-0 btn-primary" id="submitBrand">Add Brand</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Brand Modal -->
        <div class="modal fade" id="editBrandModal" tabindex="-1" role="dialog" aria-labelledby="editBrandModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editBrandModalLabel">Edit Brand</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editBrandForm" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="editBrandName">Brand Name</label>
                                <input type="text" class="form-control" id="editBrandName" required>
                            </div>
                            <div class="form-group">
                                <label for="editBrandLogo">Brand Logo</label>
                                <input type="file" class="form-control" id="editBrandLogo" accept="image/*">
                                <small class="form-text text-muted">Leave empty to keep the current logo.</small>
                            </div>
                            <div class="form-group">
                                <label for="editCategoryId">Category</label>
                                <select class="form-control" id="editCategoryId" required>
                                    <?php
                                    // Resetting the categories cursor to the beginning
                                    $resultCategories->data_seek(0);
                                    while ($category = $resultCategories->fetch_assoc()): ?>
                                        <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn rounded-0 btn-primary" id="updateBrand">Update Brand</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Open Add Brand Modal
                document.querySelector('.btn-success').addEventListener('click', function() {
                    document.getElementById('addBrandForm').reset(); // Reset the form
                    $('#addBrandModal').modal('show');
                });

                // Submit Brand
                document.getElementById('submitBrand').addEventListener('click', function() {
                    const formData = new FormData();
                    formData.append('brand_name', document.getElementById('addBrandName').value);
                    formData.append('brand_logo', document.getElementById('addBrandLogo').files[0]);
                    formData.append('category_id', document.getElementById('addCategoryId').value);

                    Swal.fire({
                        title: 'Are you sure?',
                        text: `You are about to add the brand: ${formData.get('brand_name')}`,
                        icon: 'warning',
                        showCancelButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('add_brand.php', {
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        $('#addBrandModal').modal('hide');
                                        Swal.fire('Added!', 'The brand has been added.', 'success');
                                        location.reload();
                                    } else {
                                        Swal.fire('Error!', data.message || 'Something went wrong.', 'error');
                                    }
                                })
                                .catch(() => {
                                    Swal.fire('Error!', 'Failed to add brand. Please try again.', 'error');
                                });
                        }
                    });
                });
            });

            function editBrand(brand_id, button) {
                const row = button.closest('tr');
                const modal = document.getElementById('editBrandModal');
                modal.dataset.brandId = brand_id; // Set the brand ID

                // Populate the modal input fields with data from the row
                document.getElementById('editBrandName').value = row.dataset.brandName;
                document.getElementById('editCategoryId').value = row.dataset.categoryId; // Set selected category

                // Show the modal
                $('#editBrandModal').modal('show');
            }

            document.getElementById('updateBrand').addEventListener('click', function() {
                const modal = document.getElementById('editBrandModal');
                const brandId = modal.dataset.brandId;
                const brandName = document.getElementById('editBrandName').value;
                const categoryId = document.getElementById('editCategoryId').value;
                const brandLogo = document.getElementById('editBrandLogo').files[0];

                const formData = new FormData();
                formData.append('brand_id', brandId);
                formData.append('brand_name', brandName);
                formData.append('category_id', categoryId);
                if (brandLogo) {
                    formData.append('brand_logo', brandLogo);
                }

                fetch('update_brand.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            $('#editBrandModal').modal('hide');
                            Swal.fire('Updated!', 'The brand has been updated.', 'success').then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire('Error!', data.message || 'Something went wrong.', 'error');
                        }
                    })
                    .catch(() => {
                        Swal.fire('Error!', 'Failed to update brand. Please try again.', 'error');
                    });
            });
        </script>

        <?php include 'footer.php'; ?>
    </div>
</div>