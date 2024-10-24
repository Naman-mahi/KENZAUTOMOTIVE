<?php
include 'includes/head.php';

// Fetch product details
if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);
}
$sql_select = "SELECT * FROM products WHERE product_id = ?";
$stmt_select = $conn->prepare($sql_select);
$stmt_select->bind_param("i", $product_id);
$stmt_select->execute();
$result = $stmt_select->get_result();
$product = $result->fetch_assoc();
$categoryId = $product['category_id'];
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Product Info</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="MyProducts.php">My Products</a></li>
                                <li class="breadcrumb-item"><a href="javascript: history.go(-1)">Product Details</a></li>
                                <li class="breadcrumb-item active">Edit Product Info</li>
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
                            <?php
                            if ($product) {
                            ?>
                                <form id="updateProductForm" enctype="multipart/form-data">
                                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                <label for="product_name" class="form-label">Product Name</label>
                                                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo htmlspecialchars($product['product_name']); ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                <label for="product_condition" class="form-label">Condition</label>
                                                <select class="form-select" id="product_condition" name="product_condition" required>
                                                    <option value="New" <?php echo ($product['product_condition'] == 'New') ? 'selected' : ''; ?>>New</option>
                                                    <option value="Used" <?php echo ($product['product_condition'] == 'Used') ? 'selected' : ''; ?>>Used</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Price</label>
                                                <input type="number" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                <label for="color" class="form-label">Color</label>
                                                <input type="text" class="form-control" id="color" name="color" value="<?php echo htmlspecialchars($product['color']); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                <label for="product_description" class="form-label">Product Description</label>
                                                <textarea class="form-control" id="product_description" name="product_description" rows="3" required><?php echo htmlspecialchars($product['product_description']); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                <label for="product_image" class="form-label">Product Image</label>
                                                <input type="file" class="form-control" id="product_image" name="product_image">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                <label for="top_features" class="form-label">Top Features</label>
                                                <textarea class="form-control" id="top_features" name="top_features" rows="3"><?php echo htmlspecialchars($product['top_features']); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="mb-3">
                                                <label for="stand_out_features" class="form-label">Stand Out Features</label>
                                                <textarea class="form-control" id="stand_out_features" name="stand_out_features" rows="3"><?php echo htmlspecialchars($product['stand_out_features']); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-end">
                                        <button type="submit" class="btn btn-primary">Update Product</button>
                                    </div>
                                </form>
                            <?php
                            } else {
                                echo "<p>Product not found.</p>";
                                echo "<script>window.location.href = '404.php';</script>";
                                exit();
                            }
                            ?>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
document.getElementById('updateProductForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    let formData = new FormData(this);

    fetch('functions/update_product.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: data.message,
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                window.location.href = 'ProductDetails?id=<?php echo $product_id; ?>&category_id=<?php echo $categoryId; ?>';
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message || 'Something went wrong!',
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'An unexpected error occurred!',
        });
    });
});
</script>

<?php
include 'includes/footer.php';
?>