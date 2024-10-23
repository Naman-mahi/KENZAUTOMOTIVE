<?php
include 'includes/head.php';


$dealer_id = $_SESSION['user_id'];
$product_category_id = 2;

// Fetch product records from the database
$sql = "
    SELECT *
    FROM products 
    JOIN inventory ON products.product_id = inventory.product_id
    WHERE dealer_id = ? 
    ORDER BY inventory.last_updated DESC
";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $dealer_id);
$stmt->execute();
$inventory = $stmt->get_result();
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Manage Inventory</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Inventory</li>
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
                            <div class="table-responsive">
                                <?php if ($inventory->num_rows > 0): ?>
                                    <table class="table table-editable table-nowrap align-middle table-edits">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Last Updated</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = $inventory->fetch_assoc()): ?>
                                                <tr data-id="<?php echo htmlspecialchars($row['product_id']); ?>">
                                                    <td data-field="id" style="width: 80px"><?php echo htmlspecialchars($row['product_id']); ?></td>
                                                    <td data-field="name"><?php echo htmlspecialchars($row['product_name']); ?></td>
                                                    <td data-field="quantity"><?php echo htmlspecialchars($row['quantity']); ?></td>
                                                    <td data-field="unit_price">₹ <?php echo number_format($row['price'], 2); ?></td>
                                                    <td><?php echo date('d-m-Y, H:i:A', strtotime($row['last_updated'])); ?></td>
                                                    <td>
                                                        <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <div class="alert alert-info text-center" role="alert">
                                        <strong>No items in your inventory yet. Let’s get started by adding some products!</strong>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->
<?php
include 'includes/footer.php';
?>