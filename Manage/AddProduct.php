<?php include 'includes/head.php'; ?>

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
                                <?php $category_id = $_GET['category_id'];
                                if ($category_id == 2 || $category_id == 19) { ?>
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
                                            <label class="form-label" for="brand">Brand Name</label>
                                            <select class="form-control" id="brand" name="brand" required>
                                                <option value="">Select Brand</option>
                                                <?php
                                                $sql = "SELECT brand_id, brand_name FROM brands";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    while($row = $result->fetch_assoc()) {
                                                        echo '<option value="'.$row['brand_id'].'">'.$row['brand_name'].'</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <small class="text-muted">Select brand from the list</small>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
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

                                <?php $category_id = $_GET['category_id'];
                                if ($category_id == 2 || $category_id == 19) { ?>
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
                                    <div class="row mb-4">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Car Features</label>
                                                <div class="row">
                                                    <?php
                                                    $features = [
                                                        'ABS',
                                                        'AM/FM Radio',
                                                        'Air Bags',
                                                        'Air Conditioning',
                                                        'Alloy Rims',
                                                        'CD Player',
                                                        'Cruise Control',
                                                        'DVD Player',
                                                        'Immobilizer Key',
                                                        'Keyless Entry',
                                                        'Navigation System',
                                                        'Power Locks',
                                                        'Power Mirrors',
                                                        'Power Steering',
                                                        'Power Windows'
                                                    ];
                                                    foreach ($features as $feature): ?>
                                                        <div class="col-md-4"> <!-- Change the column width as needed -->
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="product_features[]" value="<?php echo $feature; ?>" id="<?php echo strtolower(str_replace(' ', '_', $feature)); ?>">
                                                                <label class="form-check-label" for="<?php echo strtolower(str_replace(' ', '_', $feature)); ?>">
                                                                    <?php echo $feature; ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <small class="text-muted">Select all applicable features for this vehicle</small>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>


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
                                window.location.href = 'ProductDetails?id=' + response.product_id + '&category_id=' + response.category_id;
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

<?php include 'includes/footer.php'; ?>