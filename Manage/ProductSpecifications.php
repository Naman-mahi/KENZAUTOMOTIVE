<?php
include 'includes/head.php';

// Sanitize category_id and product_id input
$categoryId = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;
$productId = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0; // Get the product ID from the request

// SQL statement to fetch attributes and custom attributes
$sql = "
    SELECT  
        pa.pf_id,
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
        NULL AS pf_id, -- No matching pf_id for custom attributes
        pca.attribute_name AS label,
        COALESCE(pca.attribute_value, 'No Custom Value') AS value
    FROM 
        product_custom_attributes pca
    WHERE 
        pca.product_id = ?";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("SQL prepare failed: " . htmlspecialchars($conn->error));
}

// Bind parameters
$stmt->bind_param("iii", $productId, $categoryId, $productId); // "iii" indicates all are integers
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Initialize the specs arrays
$specs = [];
$customSpecs = [];

// Populate the specs and custom specs arrays from the fetched results
while ($row = $result->fetch_assoc()) {
    if ($row['pf_id'] !== null) { // Standard attributes
        $specs[] = [
            'label' => $row['label'], // Using label from SQL
            'pf_id' => $row['pf_id'], // Using pf_id from SQL
            'value' => $row['value'], // Fetching existing value
            'name' => strtolower(str_replace(' ', '_', $row['label'])) // Create a name from the label
        ];
    } else { // Custom attributes
        $customSpecs[] = [
            'label' => $row['label'], // Using label from SQL
            'pf_id' => $row['pf_id'], // NULL for custom attributes
            'value' => $row['value'], // Fetching existing value
            'name' => strtolower(str_replace(' ', '_', $row['label'])) // Create a name from the label
        ];
    }
}

// Close the statement
$stmt->close();
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Product Specifications</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="MyProducts.php">My Products</a></li>
                                <li class="breadcrumb-item"><a href="javascript: history.go(-1)">Product Details</a></li>
                                <li class="breadcrumb-item active">Edit Product Specifications</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="update-specifications-form">
                                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                                <input type="hidden" name="category_id" value="<?php echo $categoryId; ?>">
                                <div class="row" id="specifications-container">
                                    <?php if (empty($specs)): ?>
                                        <p>No specifications found for this category.</p>
                                    <?php else: ?>
                                        <?php foreach ($specs as $spec): ?>
                                            <div class="col-lg-6 specification-item mb-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="<?= htmlspecialchars($spec['name']) ?>"><?= htmlspecialchars($spec['label']) ?></label>
                                                    <input type="text" class="form-control" id="<?= htmlspecialchars($spec['name']) ?>" name="specifications[<?= htmlspecialchars($spec['pf_id']) ?>]" value="<?= htmlspecialchars($spec['value']) ?>" required>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php foreach ($customSpecs as $customSpec): ?>
                                            <div class="col-lg-6 specification-item mb-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="<?= htmlspecialchars($customSpec['name']) ?>"><?= htmlspecialchars($customSpec['label']) ?></label>
                                                    <input type="text" class="form-control" id="<?= htmlspecialchars($customSpec['name']) ?>" name="specifications[<?= htmlspecialchars($customSpec['name']) ?>]" value="<?= htmlspecialchars($customSpec['value']) ?>" required>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <br>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn rounded-0 btn-primary" id="add-specification">Add Another Specification</button>
                                    <button type="submit" class="btn rounded-0 btn-success" id="update-specifications">Update Specifications</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- End main content-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#add-specification').click(function() {
            // Create a new specification input field pair
            const newSpec = `
                <div class="col-lg-6 specification-item mb-3">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="new_specification_labels[]" placeholder="Ex. Color" required>
                        <input type="text" class="form-control" name="new_specification_values[]" placeholder="Ex. Red" required>
                        <a type="button" class="btn rounded-0 text-danger btn-sm remove-specification"><i class="mdi mdi-delete-circle fs-3"></i> Remove</a>
                    </div>
                </div>`;

            // Append the new specification to the container
            $('#specifications-container').append(newSpec);
        });

        // Event delegation for removing specification items
        $('#specifications-container').on('click', '.remove-specification', function() {
            $(this).closest('.specification-item').remove(); // Remove the specification
        });

        // Form submission using AJAX
        $('#update-specifications-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'functions/update_product_specifications.php',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Specifications updated successfully.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            window.location.href = 'ProductDetails?id=<?php echo $productId; ?>&category_id=<?php echo $categoryId; ?>';
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to update specifications. Please try again.'
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An error occurred. Please try again later.'
                    });
                }
            });
        });
    });
</script>
<?php
include 'includes/footer.php';
?>