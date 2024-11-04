<?php
include 'includes/head.php';
$sql = "SELECT * FROM products WHERE is_featured = 1";
$featured_products = mysqli_query($conn, $sql);
$sql_products = "SELECT * FROM products 
WHERE category_id = 2 
  AND (is_featured IS NULL OR is_featured = 0);";
$products = mysqli_query($conn, $sql_products);
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Manage Feature Products</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Feature Products</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3 d-sm-flex align-items-center justify-content-end">
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addFeatureProductModal">
                            Add Feature Product
                        </button>
                    </div>
                </div>
            </div>

            <!-- Add Feature Product Modal -->
            <div class="modal fade" id="addFeatureProductModal" tabindex="-1" role="dialog" aria-labelledby="addFeatureProductModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addFeatureProductModalLabel">Add New Feature Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addFeatureProductForm" enctype="multipart/form-data">
                                <div class="form-group mb-3">
                                    <label for="addFeatureProductTitle">Select Product</label>
                                    <select class="form-control" id="addFeatureProductTitle" required>
                                        <option value="" disabled selected>Select Product</option>
                                        <?php while ($row = mysqli_fetch_assoc($products)) { ?>
                                            <option value="<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="submitFeatureProduct">Add Feature Product</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Inspection Date</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $count = 1;
                                    while ($row = mysqli_fetch_assoc($featured_products)) { ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $row['product_name']; ?></td>
                                            <td><?php echo $row['inspection_date'] ? $row['inspection_date'] : 'NA'; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li><a class="dropdown-item removeFeatureProduct" href="#" data-id="<?php echo $row['product_id']; ?>">Remove Feature</a></li>
                                                        <li><a class="dropdown-item" href="#">Request Inspection</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle the removal of featured products
        const removeFeatureProductButtons = document.querySelectorAll('.removeFeatureProduct');

        removeFeatureProductButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const productId = this.getAttribute('data-id');

                // SweetAlert confirmation
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to remove this feature product!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, remove it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // AJAX request to remove the product
                        fetch('functions/remove_feature_product.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: 'product_id=' + encodeURIComponent(productId)
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Removed!', 'The product has been removed.', 'success')
                                    .then(() => location.reload());
                            } else {
                                Swal.fire('Error!', data.message || 'Something went wrong.', 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire('Error!', 'Failed to remove product. Please try again.', 'error');
                        });
                    }
                });
            });
        });

        // Add Feature Product
        document.getElementById('submitFeatureProduct').addEventListener('click', function() {
            const productSelect = document.getElementById('addFeatureProductTitle');
            const productId = productSelect.value;

            if (!productId) {
                Swal.fire('Error!', 'Please select a product.', 'error');
                return;
            }

            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const productName = selectedOption ? selectedOption.text : 'Unknown Product';

            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to add the product: ${productName}`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('functions/add_feature_product.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'product_id=' + encodeURIComponent(productId)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            $('#addFeatureProductModal').modal('hide');
                            Swal.fire('Added!', 'The product has been added.', 'success')
                                .then(() => location.reload());
                        } else {
                            Swal.fire('Error!', data.message || 'Something went wrong.', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire('Error!', 'Failed to add product. Please try again.', 'error');
                    });
                }
            });
        });
    });
</script>

<?php
include 'includes/footer.php';
?>
