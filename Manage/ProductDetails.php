<?php
include 'includes/head.php';

if (isset($_GET['id']) && isset($_GET['category_id'])) {
    $product_id = intval($_GET['id']); // Sanitize input
    $dealerid = $_SESSION['user_id']; // Sanitize dealer ID
    $category_id = $_GET['category_id']; // Sanitize dealer ID
    // Query to fetch car details with dealer ID condition
    $sql = "
    SELECT *
    FROM products
    WHERE product_id = ? AND dealer_id = ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $product_id, $dealerid); // Bind both carid and dealerid
    $stmt->execute();
    $result = $stmt->get_result();
    // Check if a car was found
    if ($result->num_rows > 0) {
        $Products = $result->fetch_assoc();
        // Proceed with displaying car details...
    } else {
        // Car ID not found or dealer ID mismatch, redirect to MyCars.php using JavaScript
        echo "<script>window.location.href = 'MyProducts.php';</script>";
        exit;
    }
} else {
    // No car ID or dealer ID provided, redirect to MyCars.php using JavaScript
    echo "<script>window.location.href = 'MyProducts.php';</script>";
    exit;
}

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    // Sanitize input
    $product_id = intval($_GET['id']);

    // Prepare SQL statement to fetch product images
    $sql = "SELECT * FROM product_images WHERE product_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $productImages = $stmt->get_result();



        // Close the statement
        $stmt->close();
    } else {
        // SQL preparation error, handle accordingly
        echo "Error preparing statement: " . $conn->error;
        exit;
    }
} else {
    // No product ID provided, redirect to MyProducts.php
    redirectToMyProducts();
}

// Function to handle redirection
function redirectToMyProducts()
{
    echo "<script>window.location.href = 'MyProducts';</script>";
    exit;
}


if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']); // Sanitize input
    // Query to fetch car publish details
    $sql = "SELECT * FROM product_publish WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id); // Bind carid
    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();
    // Check if a record was found
    if ($result->num_rows > 0) {
        $Products_publish = $result->fetch_assoc();
        // Proceed with displaying the car publish details...
        // Example: echo $car_publish['marketplace'];
    } else {
        // No record found for the given car_id, redirect to MyCars.php
        echo "<script>window.location.href = 'MyProducts.php';</script>";
        exit;
    }
} else {
    // No car ID provided, redirect to MyCars.php
    echo "<script>window.location.href = 'MyProducts.php';</script>";
    exit;
}

$product_id = $_GET['id'];
$category_id = $_GET['category_id'];
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Product Details</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="MyProducts.php">My Products</a></li>
                                <li class="breadcrumb-item active">Product Details</li>
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
                            <h4 class="card-title">You Can Publish Your Product On:</h4>
                            <p>Choose where you'd like your product to be visible to potential buyers and other dealers:</p>
                            <form method="POST" action="functions/ProductPublish.php" class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                                <input type="hidden" name="product_id" value="<?= $Products_publish['product_id'] ?>">
                                <div class="d-flex flex-column flex-md-row align-items-center mb-3">
                                    <div class="me-md-3 d-flex align-items-center mb-2 mb-md-0">
                                        <span class="me-2 fw-bold">On Dealer Connect <a class="waves-effect" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Visible to a wide audience including other dealers.">
                                                <i class="ri-question-line"></i>
                                            </a></span>
                                        <input class="form-check form-switch" type="checkbox" name="marketplace" id="switch1" switch="success" <?php echo $Products_publish['marketplace'] ? 'checked' : ''; ?>>
                                        <label class="form-label" for="switch1" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    <div class="me-md-3 d-flex align-items-center mb-2 mb-md-0">
                                        <span class="me-2 fw-bold">On Kenz Wheels <a class="waves-effect" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Displayed on our official site for increased visibility.">
                                                <i class="ri-question-line"></i>
                                            </a></span>
                                        <input class="form-check form-switch" type="checkbox" name="website" id="switch2" switch="success" <?php echo $Products_publish['website'] ? 'checked' : ''; ?>>
                                        <label class="form-label" for="switch2" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="me-2 fw-bold">On Your Own Website <a class="waves-effect" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Promote your listing directly on your personal website.">
                                                <i class="ri-question-line"></i>
                                            </a></span>
                                        <input class="form-check form-switch" type="checkbox" name="own_website" id="switch3" switch="success" <?php echo $Products_publish['own_website'] ? 'checked' : ''; ?>>
                                        <label class="form-label" for="switch3" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                </div>
                                <button type="submit" class="btn rounded-0  btn-sm btn-primary">Update Publish</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="mb-3 d-flex align-items-end justify-content-end">
                        <a href="ProductImages?product_id=<?php echo $product_id; ?>" type="button" class="btn rounded-0  btn-dark btn-sm waves-effect waves-light me-2">Add & Update Product Images</a>
                        <a href="ProductSpecifications?product_id=<?php echo $product_id; ?>&category_id=<?php echo $category_id; ?>" type="button" class="btn rounded-0  btn-dark btn-sm waves-effect waves-light me-2">Add & Update Specifications</a>
                        <a href="ProductInfo?product_id=<?php echo $product_id; ?>" type="button" class="btn rounded-0  btn-dark btn-sm waves-effect waves-light">Update Product Info</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-body p-0 m-0">
                            <!-- Inside your HTML -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        
                                        <div class="card-body text-center">
                                            <h5>Product Thumbnail</h5>
                                            <img id="mainImage" src="uploads/ProductThumbnail/<?php echo $Products['product_image']; ?>" alt="<?php echo htmlspecialchars($Products['product_name']); ?>" class="img-fluid main-image">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h5 class="p-2">Product Images</h5>
                                    <div class="d-flex flex-wrap justify-content-center mb-3">
                                        <?php if (!empty($productImages)): ?>
                                            <?php foreach ($productImages as $index => $image): 
                                                $imagePath = 'uploads/ProductImages/' . htmlspecialchars($image['image_url']);
                                            ?>
                                                <button class="thumbnail mb-2 me-2" data-index="<?php echo $index; ?>" onclick="changeImage('<?php echo $imagePath; ?>')">
                                                    <img src="<?php echo $imagePath; ?>" alt="Product Image <?php echo $index + 1; ?>" class="img-fluid" style="width: 100px; height: 100px; object-fit: cover;">
                                                </button>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p class="text-muted">No additional product images available.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo htmlspecialchars($Products['product_name']); ?></h4>
                            <p class="card-title-desc">Product details overview.</p>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-justified nav-tabs-custom" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#product-info" role="tab" aria-selected="true">
                                        <i class=" ri-product-hunt-line align-middle"></i> <span class="d-none d-md-inline-block fw-bold text-warning">Product Info</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#product-specifications" role="tab" aria-selected="false" tabindex="-1">
                                        <i class=" ri-clipboard-fill align-middle"></i> <span class="d-none d-md-inline-block fw-bold text-warning">Specifications</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#other-details" role="tab" aria-selected="false" tabindex="-1">
                                        <i class="ri-settings-line align-middle"></i> <span class="d-none d-md-inline-block fw-bold text-warning">Other Details</span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content p-3">
                                <div class="tab-pane active show" id="product-info" role="tabpanel">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Description:</th>
                                                <td><?php echo htmlspecialchars($Products['product_description']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Price:</th>
                                                <td>$<?php echo number_format($Products['price'], 2); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Color:</th>
                                                <td><?php echo htmlspecialchars($Products['color']); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="product-specifications" role="tabpanel">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <?php
                                            // Check if 'id' is set in the URL
                                            if (isset($_GET['id'])) {
                                                // Sanitize input
                                                $product_id = intval($_GET['id']);
                                                $category_id = $category_id; // Ensure $product_category_id is defined

                                                // SQL statement to fetch attributes and custom attributes
                                                $sql = "
                                                SELECT  
                                                        pa.pf_name AS label,
                                                        COALESCE(pav.value, 'No Value') AS value
                                                    FROM 
                                                        product_attributes pa
                                                    LEFT JOIN 
                                                        product_attributes_value pav ON pa.pf_id = pav.attribute_id AND pav.product_id = ?
                                                    WHERE 
                                                        pa.category_id = ?  

                                                    UNION ALL

                                                    SELECT 
                                                        pca.attribute_name AS label,
                                                        COALESCE(pca.attribute_value, 'No Custom Value') AS value
                                                    FROM 
                                                        product_custom_attributes pca
                                                    WHERE 
                                                        pca.product_id = ?";

                                                $stmt = $conn->prepare($sql);

                                                if ($stmt) {
                                                    // Bind parameters
                                                    $stmt->bind_param("iii", $product_id, $category_id, $product_id);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();

                                                    if ($result->num_rows > 0) {
                                                        // Fetch and display attributes
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '<tr>';
                                                            echo '<th>' . htmlspecialchars($row['label']) . ':</th>';
                                                            echo '<td>' . htmlspecialchars($row['value']) . '</td>';
                                                            echo '</tr>';
                                                        }
                                                    } else {
                                                        // No attributes found for the given product ID
                                                        echo '<tr><td colspan="2">';
                                                        echo 'No attributes found for this product.';
                                                        echo '<br><a href="add_specifications.php?id=' . htmlspecialchars($product_id) . '" class="btn btn-primary">Add Specifications</a>';
                                                        echo '</td></tr>';
                                                    }

                                                    // Close the statement
                                                    $stmt->close();
                                                } else {
                                                    // SQL preparation error, handle accordingly
                                                    echo "<tr><td colspan='2'>Error preparing statement: " . htmlspecialchars($conn->error) . "</td></tr>";
                                                }
                                            } else {
                                                // No product ID provided
                                                echo "<tr><td colspan='2'>No product ID provided.</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                </div>

                                <div class="tab-pane" id="other-details" role="tabpanel">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Top Features:</th>
                                                <td><?php echo htmlspecialchars($Products['top_features']); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Stand Out Features:</th>
                                                <td><?php echo htmlspecialchars($Products['stand_out_features']); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content -->
<!-- HTML and JavaScript for Cloudinary Gallery -->


<?php
include 'includes/footer.php';
?>