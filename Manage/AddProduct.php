<?php include 'head.php'; ?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Start Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Product</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="MyProducts.php">My Products</a></li>
                                <li class="breadcrumb-item active">Add Product</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add New Product</h4>

                            <form id="product-form" enctype="multipart/form-data">
                                <!-- Product Details -->
                                <div class="row mb-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product_name">Product Name</label>
                                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                                            <input type="hidden" class="form-control" id="category_id" name="category_id" value="<?php echo $_GET['category_id']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="price">Price</label>
                                            <div class="input-group">
                                                <span class="input-group-text">₹</span>
                                                <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="color">Color</label>
                                            <input type="text" class="form-control" id="color" name="color">
                                            <small class="text-muted">Enter multiple colors separated by commas</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Product Condition</label>
                                            <div class="d-flex">
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="radio" name="new_or_old" id="new" value="new" required>
                                                    <label class="form-check-label" for="new">New</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="new_or_old" id="old" value="old" required>
                                                    <label class="form-check-label" for="old">Used</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="product_description">Description</label>
                                            <textarea class="form-control" id="product_description" name="product_description" rows="4" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="imagesthumbnail">Product Images</label>
                                            <input type="file" class="form-control" id="imagesthumbnail" name="imagesthumbnail[]" accept="image/*" multiple required>
                                        </div>
                                    </div>
                                </div>
                                <!-- Features -->
                                <div class="row mb-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="top-features">Top Features</label>
                                            <textarea class="form-control" id="top-features" name="top_features" rows="4" required></textarea>
                                            <small class="text-muted">Enter each feature on a new line</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="stand-out-features">Stand Out Features</label>
                                            <textarea class="form-control" id="stand-out-features" name="stand_out_features" rows="4" required></textarea>
                                            <small class="text-muted">Enter each feature on a new line</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#product-form").submit(function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: 'functions/submit_product.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response); // Log the response
                    response = JSON.parse(response); // Parse the JSON response

                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Product added successfully!',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'ProductDetails?product_id=' + response.product_id;
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message || 'Something went wrong!',
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    });
                }
            });
        });
    });
</script>

<?php include 'footer.php'; ?>