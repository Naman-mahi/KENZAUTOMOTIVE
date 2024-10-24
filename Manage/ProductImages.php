<?php
include 'includes/head.php';

// Check if product_id is set in the URL
if (!isset($_GET['product_id'])) {
    echo "Product ID is missing.";
    exit;
}

$product_id = intval($_GET['product_id']);

// Fetch existing images for this product
$sql = "SELECT * FROM product_images WHERE product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$existing_images = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Product Images</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="MyProducts.php">My Products</a></li>
                                <li class="breadcrumb-item"><a href="javascript: history.go(-1)">Product Details</a></li>
                                <li class="breadcrumb-item active">Edit Product Images</li>
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
                            <h4 class="card-title">Upload Product Images</h4>
                            <p class="card-title-desc">You can drag and drop images or click to upload them.</p>
                            <p class="card-title-desc">Maximum file size: 10MB. You can upload up to two files at once.</p>


                            <form action="upload_images.php" class="dropzone" id="productImageUpload">
                                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted mdi mdi-cloud-upload-outline"></i>
                                    </div>
                                    <h4>Drop files here or click to upload.</h4>
                                </div>
                            </form>

                            <div class="text-center mt-4">
                                <button type="button" id="submit-all" class="btn btn-primary waves-effect waves-light">Upload Images</button>
                            </div>

                            <?php if (!empty($existing_images)): ?>
                                <div class="mt-4">
                                    <h5>Existing Images</h5>
                                    <div class="row">
                                        <?php foreach ($existing_images as $image): ?>
                                            <div class="col-md-3 mb-3">
                                                <img src="uploads/ProductImages/<?php echo htmlspecialchars($image['image_url']); ?>" class="img-fluid" alt="Product Image">
                                                <button class="btn btn-danger btn-sm mt-2 delete-image" data-image-id="<?php echo $image['image_id']; ?>">Delete</button>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
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
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof Dropzone !== 'undefined') {
            Dropzone.autoDiscover = false;

            var myDropzone = new Dropzone("#productImageUpload", {
                url: "functions/product_upload_images.php",
                paramName: "file[]",
                maxFilesize: 10, // MB
                acceptedFiles: "image/*",
                addRemoveLinks: true,
                autoProcessQueue: false
            });

            document.getElementById('submit-all').addEventListener('click', function() {
                myDropzone.processQueue();
            });

            myDropzone.on("success", function(file, response) {
                console.log(response);
                // Refresh the page or update the image list
                location.reload();
            });

            document.querySelectorAll('.delete-image').forEach(function(button) {
                button.addEventListener('click', function() {
                    var imageId = this.getAttribute('data-image-id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('functions/delete_image.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded',
                                    },
                                    body: 'image_id=' + imageId
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.status === 'success') {
                                        Swal.fire(
                                            'Deleted!',
                                            'Your image has been deleted.',
                                            'success'
                                        );
                                        // Remove the image from the DOM
                                        this.closest('.col-md-3').remove();
                                    } else {
                                        Swal.fire(
                                            'Error!',
                                            'Failed to delete the image.',
                                            'error'
                                        );
                                    }
                                })
                                .catch((error) => {
                                    console.error('Error:', error);
                                    Swal.fire(
                                        'Error!',
                                        'An error occurred while deleting the image.',
                                        'error'
                                    );
                                });
                        }
                    });
                });
            });
        } else {
            console.error('Dropzone is not defined. Make sure the script is loaded correctly.');
        }
    });
</script>
<?php
include 'includes/footer.php';
?>