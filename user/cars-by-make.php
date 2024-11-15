<?php
// Include user header
include_once('../includes/userheader.php');

// Sanitize query parameters to prevent XSS and other attacks
$brand_id = isset($_GET['id']) ? filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) : null;
$brand_name = isset($_GET['name']) ? filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING) : null;
?>
<link rel="stylesheet" href="../assets/lib/owl-carousel/css/owl.carousel.css">
<link rel="stylesheet" href="../assets/lib/owl-carousel/css/owl.theme.green.css">
<script src="<?= BASE_URL ?>assets/lib/owl-carousel/js/jquery.min.js"></script>

<!-- Link to the page-specific CSS -->
<link rel="stylesheet" href="../assets/css/carsbymake.css">

<body>
    <?php
    ?>
    <!-- Main container for the content -->
    <div class="container my-5">
        <h2 class="p-2 fw-bold" style="line-height: 20px"><?= htmlspecialchars($brand_name) ?> Car Models</h2>

        <!-- Breadcrumb Navigation -->
        <div class="search-count d-flex justify-content-between d-none d-md-flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= BASE_URL ?>/user/index">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?= BASE_URL ?>/user/usedcars">Used Cars</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($brand_name) ?> Car Models</li>
                </ol>
            </nav>
        </div>

        <!-- Placeholder for dynamically loaded content -->
        <div class="row charity d-flex justify-content-center align-items-center">
            <!-- Products will be dynamically loaded here -->
        </div>
    </div>

    <!-- Footer inclusion -->
    

    <script>
         const API_BASE_URL = '<?php echo API_BASE_URL; ?>'; // API base URL
        const ProductThumbnail = '<?php echo ProductThumbnail; ?>'; // Product image URL
        const ProductImages = '<?php echo ProductImages; ?>'; // Product image URL (if needed)
        const BrandLogo = '<?php echo BrandLogo; ?>'; // Brand logo URL (if needed)
        const brandId = <?php echo json_encode($brand_id); ?>; // Inject brand_id from PHP
        const brandName = <?php echo json_encode($brand_name); ?>; // Inject brand_name from PHP
    $(document).ready(function() {
        // Pass PHP constants into JavaScript
       
        

        console.log(API_BASE_URL);
        // Fetch and display the products when the document is ready
        if (brandId) {
            fetchProducts(brandId); // Fetch products for the given brand_id
        } else {
            console.error('Brand ID is missing');
        }
    });

    function fetchProducts(brandId) {
        $.ajax({
            url: API_BASE_URL + "/cars-by-make/" + brandId, // Correctly concatenate the URL
            type: 'GET',
            success: function(data) {
                if (data && data.status === 200 && Array.isArray(data.data)) {
                    // Display all the fetched products without any filtering
                    displayProducts(data.data);
                } else {
                    console.error('Invalid data format:', data);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching products:', error);
            }
        });
    }

    // Fetch the city of the dealer
    async function fetchCity(dealerId) {
        try {
            const response = await $.ajax({
                url: `${API_BASE_URL}/profile/${dealerId}`,
                type: 'GET',
            });

            if (response && response.statuscode === 200 && response.user) {
                return response.user.city; // Access city from the user object
            } else {
                console.error('Invalid city data format:', response);
                return '';
            }
        } catch (error) {
            console.error('Error fetching city:', error);
            return '';
        }
    }

    // Display the products on the page
    async function displayProducts(products) {
        const row = $('<div class="row"></div>'); // Create a row for all items

        for (let i = 0; i < products.length; i++) {
            const product = products[i];
            const city = await fetchCity(product.dealer_id); // Fetch city using dealer_id

            const mileage = product.combined_attributes.find(attr => attr.pf_name === "Mileage (MPG)")?.value || 'N/A';
            const fuelType = product.combined_attributes.find(attr => attr.pf_name === "Fuel Type")?.value || 'N/A';
            const transmissionType = product.combined_attributes.find(attr => attr.pf_name === "Transmission Type")?.value || 'N/A';

            // Check if the product image is available, otherwise use a placeholder image
            const imageUrl = product.product_image ? `${product.product_image}` : 'https://placehold.co/600x400?text=KenzWheels'; // Placeholder image if no image available

            const item = `
                <div class="col-12 col-md-6 col-lg-3 item pb-3 search">
                    <a href="viewproduct.php?product_id=${product.product_id}" class="text-decoration-none">
                        <div class="car-card">
                            <div class="car-img">
                                <img src="${imageUrl}" alt="${product.product_name}" class="img-fluid">
                            </div>
                            <div class="car-content">
                                <div class="car-content-inner">
                                    <h5 class="car-title">${product.product_name}</h5>
                                    <span class="small fw-bold" style="font-size: 0.8rem;">
                                        ${mileage} kms - ${fuelType} - ${transmissionType}
                                    </span><br>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="car-price mb-0">
                                            INR ${new Intl.NumberFormat('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(product.price)}
                                        </p>
                                        <button class="btn p-0" title="Add to Wishlist">
                                            <i class="far fa-heart" style="font-size: 1.2rem;" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <p class="car-city pb-0">
                                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i> ${city}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            `;

            row.append(item); // Append the item to the row
        }

        $('.charity').append(row); // Append the row to the charity class
    }
</script>


<?php require_once '../includes/userfooter.php' ?>

</body>