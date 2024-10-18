<?php
include 'head.php';


if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']); // Sanitize input
    // Query to fetch car details with dealer ID condition
    $sql = "
    SELECT *
    FROM products
    WHERE product_id = ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id); // Bind both carid and dealerid
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
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch the product images
            $productImages = $result->fetch_all(MYSQLI_ASSOC); // Fetch all images for the product

            // Prepend the image path to each image URL
            foreach ($productImages as &$image) {
                $image['image_url'] = 'uploads/products/' . htmlspecialchars($image['image_url']);
            }
            unset($image); // Break the reference with the last element
        } else {
            // No images found for the given product ID
            redirectToMyProducts();
        }


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
    echo "<script>window.location.href = 'MyProducts.php';</script>";
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
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dealer Connect</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Dealer Connect</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-body p-0 m-0">
                            <!-- Inside your HTML -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <a id="mainImageLink" href="<?php echo $productImages[0]['image_url']; ?>" data-fancybox="gallery" data-caption="<?php echo htmlspecialchars($Products['product_name']); ?>">
                                                <img id="mainImage" src="<?php echo $productImages[0]['image_url']; ?>" alt="<?php echo htmlspecialchars($Products['product_name']); ?>" class="img-fluid main-image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex flex-wrap justify-content-center">
                                        <?php foreach ($productImages as $index => $image): ?>
                                            <button class="thumbnail mb-2" data-index="<?php echo $index; ?>" onclick="changeImage('<?php echo $image['image_url']; ?>')">
                                                <img src="<?php echo $image['image_url']; ?>" alt="Thumbnail <?php echo $index + 1; ?>" class="img-fluid" style="width: 100px; height: auto;">
                                            </button>
                                        <?php endforeach; ?>
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
                                                $category_id = $product_category_id; // Ensure $product_category_id is defined

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
                                                        echo '<tr><td colspan="2">No attributes found for this product.</td></tr>';
                                                    }

                                                    // Close the statement
                                                    $stmt->close();
                                                } else {
                                                    // SQL preparation error, handle accordingly
                                                    echo "<tr><td colspan='2'>Error preparing statement: " . htmlspecialchars($conn->error) . "</td></tr>";
                                                }
                                            } else {
                                                // No product ID provided, redirect to MyProducts.php
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
</div>
<script>
    function changeImage(imageSrc) {
        document.getElementById('mainImage').src = imageSrc;
        document.getElementById('mainImageLink').href = imageSrc;
    }
</script>
<?php
include 'footer.php';
?>
