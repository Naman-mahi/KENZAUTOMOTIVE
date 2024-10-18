<?php
include 'head.php';
include '../includes/db.php'; // Include your database connection file

// Fetch brands from the database
$sql = "SELECT * FROM Brands LEFT JOIN Categories ON Brands.category_id = Categories.category_id";
$result = $conn->query($sql);
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
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
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
                                        <th class="text-center">#</th>
                                        <th class="text-center">Brand Name</th>
                                        <th class="text-center">Brand Logo</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Created Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    if ($result->num_rows > 0) {
                                        $counter = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr data-brand-id='{$row['brand_id']}' data-brand-name='{$row['brand_name']}' data-brand-logo='{$row['brand_logo']}' data-category-id='{$row['category_id']}' data-created-date='{$row['created_date']}'>";
                                            echo "<td>{$counter}</td>";
                                            echo "<td>{$row['brand_name']}</td>";
                                            echo "<td><img src='{$row['brand_logo']}' alt='{$row['brand_name']}' style='width:50px;'></td>";
                                            echo "<td>{$row['category_name']}</td>";
                                            echo "<td>" . date('d M, Y', strtotime($row['created_date'])) . "</td>";
                                            echo "<td>
                                                <button onclick='editBrand({$row['brand_id']}, this)' class='btn rounded-0 btn-warning btn-sm'>
                                                    <i class='mdi mdi-pencil'></i> Edit
                                                </button>
                                            </td>";
                                            echo "</tr>";
                                            $counter++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='6'>No brands found</td></tr>";
                                    }
                                    ?>
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
                        <form id="addBrandForm">
                            <div class="form-group">
                                <label for="addBrandName">Brand Name</label>
                                <input type="text" class="form-control" id="addBrandName" required>
                            </div>
                            <div class="form-group">
                                <label for="addBrandLogo">Brand Logo URL</label>
                                <input type="text" class="form-control" id="addBrandLogo" required>
                            </div>
                            <div class="form-group">
                                <label for="addCategoryId">Category ID</label>
                                <input type="number" class="form-control" id="addCategoryId" value="3" required>
                            </div>
                            <div class="form-group">
                                <label for="addCreatedDate">Created Date</label>
                                <input type="date" class="form-control" id="addCreatedDate" required>
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
                        <form id="editBrandForm">
                            <div class="form-group">
                                <label for="editBrandName">Brand Name</label>
                                <input type="text" class="form-control" id="editBrandName" required>
                            </div>
                            <div class="form-group">
                                <label for="editBrandLogo">Brand Logo URL</label>
                                <input type="text" class="form-control" id="editBrandLogo" required>
                            </div>
                            <div class="form-group">
                                <label for="editCategoryId">Category ID</label>
                                <input type="number" class="form-control" id="editCategoryId" required>
                            </div>
                            <div class="form-group">
                                <label for="editCreatedDate">Created Date</label>
                                <input type="date" class="form-control" id="editCreatedDate" required>
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
                const addBrandButton = document.querySelector('.btn-success');
                addBrandButton.addEventListener('click', function() {
                    document.getElementById('addBrandForm').reset(); // Reset the entire form
                    $('#addBrandModal').modal('show');
                });

                // Submit Brand
                document.getElementById('submitBrand').addEventListener('click', function() {
                    const brandName = document.getElementById('addBrandName').value;
                    const brandLogo = document.getElementById('addBrandLogo').value;
                    const categoryId = document.getElementById('addCategoryId').value;
                    const createdDate = document.getElementById('addCreatedDate').value;

                    Swal.fire({
                        title: 'Are you sure?',
                        text: `You are about to add the brand: ${brandName}`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, add it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('add_brand.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                    },
                                    body: JSON.stringify({
                                        brand_name: brandName,
                                        brand_logo: brandLogo,
                                        category_id: categoryId,
                                        created_date: createdDate
                                    })
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
                                .catch(error => {
                                    console.error('Error:', error);
                                    Swal.fire('Error!', 'Failed to add brand. Please try again.', 'error');
                                });
                        }
                    });
                });
            });

            function editBrand(brand_id, button) {
                const row = button.closest('tr');

                // Set the brand_id in the modal's data attribute
                const modal = document.getElementById('editBrandModal');
                modal.dataset.brandId = brand_id; // Set the brand ID

                // Populate the modal input fields with data from the row
                document.getElementById('editBrandName').value = row.dataset.brandName;
                document.getElementById('editBrandLogo').value = row.dataset.brandLogo;
                document.getElementById('editCategoryId').value = row.dataset.categoryId;
                document.getElementById('editCreatedDate').value = row.dataset.createdDate;

                // Show the modal
                $('#editBrandModal').modal('show');
            }

            document.getElementById('updateBrand').addEventListener('click', function() {
                const brandName = document.getElementById('editBrandName').value;
                const brandLogo = document.getElementById('editBrandLogo').value;
                const categoryId = document.getElementById('editCategoryId').value;
                const createdDate = document.getElementById('editCreatedDate').value;
                const brandId = document.getElementById('editBrandModal').dataset.brandId; // Ensure this is set correctly

                // Validate input fields
                if (!brandId || !brandName || !brandLogo || !categoryId || !createdDate) {
                    Swal.fire('Error!', 'Please fill in all fields.', 'error');
                    return;
                }

                // Perform AJAX request to update brand
                fetch('update_brand.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            brand_id: brandId,
                            brand_name: brandName,
                            brand_logo: brandLogo,
                            category_id: categoryId,
                            created_date: createdDate
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            $('#editBrandModal').modal('hide');
                            Swal.fire('Updated!', 'The brand has been updated.', 'success')
                                .then(() => {
                                    location.reload();
                                });
                        } else {
                            Swal.fire('Error!', data.message || 'Something went wrong.', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire('Error!', 'Failed to update brand. Please try again.', 'error');
                    });
            });
        </script>

        <?php include 'footer.php'; ?>
    </div>
</div>
