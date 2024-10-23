<?php
include 'includes/head.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
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
            <div class="row mb-4">
                <div class="col-12">
                    <input type="text" class="form-control" placeholder="Search for products..." aria-label="Search for products" id="productSearch">
                </div>
            </div>
            <div class="row" id="productList">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-md-3 mb-4 product-item">';
                        echo '<div class="card h-100 d-flex flex-column">';
                        echo '<div class="image-wrapper" style="height: 200px; overflow: hidden;">';
                        echo '<img src="uploads/ProductThumbnail/' . $row['product_image'] . '" class="card-img-top h-100 w-100" alt="Product Image" style="object-fit: cover;">';
                        echo '</div>';
                        echo '<div class="card-body d-flex flex-column">';
                        echo '<h5 class="card-title product-name">' . $row['product_name'] . '</h5>';
                        echo '<h5 class="product-price text-muted">' . $row['price'] . '</h5>';
                        echo '<a href="DealerConnectDetails?id=' . $row['product_id'] . '" class="btn btn-primary mt-auto">View Details</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="col-12">';
                    echo '<p>No products found.</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div> <!-- container-fluid -->
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('productSearch');
        const productItems = document.querySelectorAll('.product-item');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();

            productItems.forEach(item => {
                const productName = item.querySelector('.product-name').textContent.toLowerCase();
                if (productName.includes(searchTerm)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>

<?php
include 'includes/footer.php';
?>