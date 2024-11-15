<?php include_once('../includes/userheader.php'); ?>
<link rel="stylesheet" href="../assets/css/usedcars.css">
<style>
    @media (max-width: 768px) {
        #filterPanel {
            max-height: 400px;
            /* Adjust as needed */
            overflow-y: auto;
            /* Enables vertical scrolling */
        }
    }
</style>
<div class="container used-car-search-results my-5">
    <input type="hidden" name="dfp_city" id="dfp_city" />
    <input type="hidden" name="dfp_make" id="dfp_make" />
    <input type="hidden" name="dfp_model" id="dfp_model" />

    <h2 class="p-2 fw-bold" style="line-height: 20px">Used Cars For Sale In India</h2>
    <div class="search-count d-flex justify-content-between d-none d-md-flex">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= BASE_URL ?>/user/index">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= BASE_URL ?>/user/usedcars">Used Cars</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Used Cars For Sale In India</li>
            </ol>
        </nav>
        <div class="search-pagi-info">
            <strong>1&nbsp;-&nbsp;25</strong> of <strong>59,365</strong> Results
        </div>
    </div>

    <div class="container search-page-new">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <!-- Button to show filters on small screens -->
                <button class="btn btn-primary d-md-none mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#filterPanel" aria-expanded="false" aria-controls="filterPanel">
                    <i class="fa fa-filter me-2"></i> Filters
                </button>


                <!-- Sidebar Filters - Accordion -->
                <div class="collapse d-md-block" id="filterPanel">
                    <div class="accordion" id="filterAccordion">

                        <!-- Filter: Show Results By -->
                        <div class="accordion-item">
                            <h2 class="accordion-header iconhide" id="headingResultsBy">
                                <button class="accordion-button no-arrow" type="button" aria-expanded="true" aria-controls="collapseResultsBy">
                                    Show Results By
                                </button>
                            </h2>
                        </div>

                        <!-- Filter: Search by Keyword -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSearchByKeyword">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSearchByKeyword" aria-expanded="true" aria-controls="collapseSearchByKeyword">
                                    Search by Keyword
                                </button>
                            </h2>
                            <div id="collapseSearchByKeyword" class="accordion-collapse collapse show" aria-labelledby="headingSearchByKeyword">
                                <div class="accordion-body">
                                    <form id="search_key_form" action="/used-cars/search/-" method="get">
                                        <div class="input-group mb-3">
                                            <input type="text" name="search" placeholder="e.g. Honda in Mumbai" class="form-control rounded-pill" id="search-input" />
                                            <!-- <button type="submit" class="btn btn-primary">Go</button> -->
                                        </div>
                                        <input type="hidden" name="query_params" id="query_params" value="" />
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Filter: City -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingCity">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCity" aria-expanded="true" aria-controls="collapseCity">
                                    City
                                </button>
                            </h2>
                            <div id="collapseCity" class="accordion-collapse collapse show" aria-labelledby="headingCity">
                                <div class="accordion-body">
                                    <ul class="list-unstyled">
                                        <li class="p-md-1">
                                            <label class="filter-check d-flex justify-content-between">
                                                <div>
                                                    <input type="checkbox" /> Mumbai
                                                </div>
                                                <div>
                                                    <span class="bg-theme rounded-pill">15,324</span>
                                                </div>
                                            </label>
                                        </li>
                                        <li class="p-md-1">
                                            <label class="filter-check d-flex justify-content-between">
                                                <div>
                                                    <input type="checkbox" /> Delhi
                                                </div>
                                                <div>
                                                    <span class="bg-theme rounded-pill">12,876</span>
                                                </div>
                                            </label>
                                        </li>
                                        <li class="p-md-1">
                                            <label class="filter-check d-flex justify-content-between">
                                                <div>
                                                    <input type="checkbox" /> Bengaluru
                                                </div>
                                                <div>
                                                    <span class="bg-theme rounded-pill">9,652</span>
                                                </div>
                                            </label>
                                        </li>
                                        <li class="p-md-1">
                                            <label class="filter-check d-flex justify-content-between">
                                                <div>
                                                    <input type="checkbox" /> Hyderabad
                                                </div>
                                                <div>
                                                    <span class="bg-theme rounded-pill">8,112</span>
                                                </div>
                                            </label>
                                        </li>
                                        <li class="p-md-1">
                                            <label class="filter-check d-flex justify-content-between">
                                                <div>
                                                    <input type="checkbox" /> Chennai
                                                </div>
                                                <div>
                                                    <span class="bg-theme rounded-pill">7,345</span>
                                                </div>
                                            </label>
                                        </li>
                                    </ul>
                                    <a href="#" id="toggleCityChoices" class="link-style btnchoice" data-bs-toggle="collapse" data-bs-target="#collapseMoreCities" aria-expanded="false" aria-controls="collapseMoreCities">Show More</a>
                                    <div id="collapseMoreCities" class="collapse mt-2">
                                        <ul class="list-unstyled">
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Ahmedabad
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">7,345</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Kolkata
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">7,345</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Pune
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">7,345</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Jaipur
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">7,345</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Surat
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">7,345</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Kanpur
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">7,345</span>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Nagpur
                                                    </div>
                                                    <div>
                                                        <span class="bg-theme rounded-pill">7,345</span>
                                                    </div>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Filter: Brand -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingMake">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMake" aria-expanded="true" aria-controls="collapseMake">
                                    Brand
                                </button>
                            </h2>
                            <div id="collapseMake" class="accordion-collapse collapse show" aria-labelledby="headingMake">
                                <div class="accordion-body">
                                    <ul class="list-unstyled">
                                        <li class="p-md-1" title="Toyota Cars for Sale in India">
                                            <label class="filter-check d-flex justify-content-between">
                                                <div>
                                                    <input type="checkbox" /> Toyota
                                                </div>
                                                <div>
                                                    <span class="count bg-theme rounded-pill">18,472</span>
                                                </div>
                                            </label>
                                        </li>
                                        <li class="p-md-1" title="Suzuki Cars for Sale in India">
                                            <label class="filter-check d-flex justify-content-between">
                                                <div>
                                                    <input type="checkbox" /> Suzuki
                                                </div>
                                                <span class="count bg-theme rounded-pill">16,666</span>
                                            </label>
                                        </li>
                                        <li class="p-md-1" title="Honda Cars for Sale in India p-md-1">
                                            <label class="filter-check d-flex justify-content-between">
                                                <div>
                                                    <input type="checkbox" /> Honda
                                                </div>
                                                <span class="count bg-theme rounded-pill">11,931</span>
                                            </label>
                                        </li>
                                        <li class="p-md-1" title="Daihatsu Cars for Sale in India p-md-1">
                                            <label class="filter-check d-flex justify-content-between">
                                                <div>
                                                    <input type="checkbox" /> Daihatsu
                                                </div>
                                                <div>
                                                    <span class="count bg-theme rounded-pill">3,078</span>
                                                </div>
                                            </label>
                                        </li>
                                        <li class="p-md-1" title="Nissan Cars for Sale in India p-md-1">
                                            <label class="filter-check d-flex justify-content-between">
                                                <div>
                                                    <input type="checkbox" /> Nissan
                                                </div>
                                                <span class="count bg-theme rounded-pill">1,735</span>
                                            </label>
                                        </li>
                                    </ul>
                                    <a href="#" id="toggleChoices" class="link-style btnchoice" data-bs-toggle="collapse" data-bs-target="#collapseMoreMakes" aria-expanded="false" aria-controls="collapseMoreMakes">Show More</a>
                                    <div id="collapseMoreMakes" class="collapse mt-2">
                                        <ul class="list-unstyled">
                                            <li class="p-md-1" title="Mazda Cars for Sale in India p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Mazda
                                                    </div>
                                                    <span class="count bg-theme rounded-pill">2,450</span>
                                                </label>
                                            </li>
                                            <li class="p-md-1" title="Kia Cars for Sale in India p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Kia
                                                    </div>
                                                    <span class="count bg-theme rounded-pill">3,112</span>
                                                </label>
                                            </li>
                                            <li class="p-md-1" title="Ford Cars for Sale in India p-md-1">
                                                <label class="filter-check d-flex justify-content-between">
                                                    <div>
                                                        <input type="checkbox" /> Ford
                                                    </div>
                                                    <span class="count bg-theme rounded-pill">1,888</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Price Range Accordion Item -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingPriceRange">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePriceRange" aria-expanded="true" aria-controls="collapsePriceRange">
                                    Price Range
                                </button>
                            </h2>
                            <div id="collapsePriceRange" class="accordion-collapse collapse show" aria-labelledby="headingPriceRange">
                                <div class="accordion-body">
                                    <div class="d-flex align-items-center">
                                        <div class="input-group flex-grow-1">
                                            <!-- Slider for Price Range -->
                                            <input type="range" class="form-range" id="priceRange" min="0" max="10000000" step="500000" value="5000000">
                                        </div>
                                    </div>
                                    <!-- Display selected range -->
                                    <div class="d-flex justify-content-between mt-2">
                                        <span id="pr_from" class="text-muted">₹0</span> <!-- Display the "From" value -->
                                        <span id="pr_to" class="text-muted">₹1,00,00,000</span> <!-- Display the "To" value -->
                                    </div>
                                    <!-- Hint message -->
                                    <div id="pr_hint" class="mt-2"></div>
                                </div>
                            </div>
                        </div>

                        <!-- End of Price Range Accordion Item -->
                        <!-- Seller Type Accordion Item -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSellerType">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSellerType" aria-expanded="false" aria-controls="collapseSellerType">
                                    Seller Type
                                </button>
                            </h2>
                            <div id="collapseSellerType" class="accordion-collapse collapse" aria-labelledby="headingSellerType">
                                <div class="accordion-body">
                                    <ul class="list-unstyled">
                                        <li title="Individuals">
                                            <label class="filter-check d-flex justify-content-between">
                                                <div>
                                                    <input type="checkbox" /> Kenz Wheels
                                                </div>
                                                <span class="count bg-theme rounded-pill">913</span>
                                            </label>
                                        </li>
                                        <li title="Dealers">
                                            <label class="filter-check d-flex justify-content-between">
                                                <div>
                                                    <input type="checkbox" /> Dealers
                                                </div>
                                                <span class="count bg-theme rounded-pill">8,452</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End of Seller Type Accordion Item -->


                    </div>
                </div>
            </div>
            <!-- Search Results Area -->
            <div class="col-lg-9 col-md-8">
                <!-- Add search results content here -->
                <div class="search-heading mb-3 bg-white p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="flex-grow-1 me-2" data-pjax-enable>
                            <span class="form-horizontal sort-by">
                                <span class="sort-by-text">Sort By: </span>
                                <select name="sortby" id="sortby" class="form-select d-inline-block w-auto">
                                    <option selected value="bumped_at-desc">Updated Date: Recent First</option>
                                    <option value="bumped_at-asc">Updated Date: Oldest First</option>
                                    <option value="price-asc">Price: Low to High</option>
                                    <option value="price-desc">Price: High to Low</option>
                                    <option value="model_year-desc">Model Year: Latest First</option>
                                    <option value="model_year-asc">Model Year: Oldest First</option>
                                    <option value="mileage-asc">Mileage: Low to High</option>
                                    <option value="mileage-desc">Mileage: High to Low</option>
                                </select>
                            </span>
                        </div>
                        <!-- <div>
                            <div class="btn-group" role="group">
                                <button type="button" id="list" class="btn btn-sm btn-outline-secondary active">
                                    <i class="fa fa-th-list"></i> LIST
                                </button>
                                <button type="button" id="grid" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-th-large"></i> GRID
                                </button>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="row charity">

                </div>

            </div>
        </div>
    </div>
</div>
<?php require_once '../includes/userfooter.php' ?>

<script>
    document.getElementById('toggleCityChoices').addEventListener('click', function() {
        const expanded = this.getAttribute('aria-expanded') === 'true';
        this.textContent = expanded ? 'Show Less' : 'Show More';
    });
</script>

<script>
    document.getElementById('toggleChoices').addEventListener('click', function() {
        const expanded = this.getAttribute('aria-expanded') === 'true';
        this.textContent = expanded ? 'Show Less' : 'Show More';
    });
</script>
<script>
    const API_BASE_URL = '<?php echo API_BASE_URL; ?>';
    const ProductThumbnail = '<?php echo ProductThumbnail; ?>';
    const ProductImages = '<?php echo ProductImages; ?>';
    const BrandLogo = '<?php echo BrandLogo; ?>';
</script>
<script>
    $(document).ready(function() {
        // Fetch and display the products when the document is ready
        fetchProducts();
    });

    function fetchProducts() {
        $.ajax({
            url: `${API_BASE_URL}/spareparts`, // Use API_BASE_URL variable for the base URL
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

    function fetchCity(dealerId) {
        return $.ajax({
            url: `${API_BASE_URL}/profile/${dealerId}`, // Use API_BASE_URL variable
            type: 'GET',
        }).then(response => {
            if (response && response.statuscode === 200 && response.user) {
                return response.user.city; // Access city from the user object
            } else {
                console.error('Invalid city data format:', response);
                return '';
            }
        }).catch(error => {
            console.error('Error fetching city:', error);
            return '';
        });
    }

    async function displayProducts(products) {
        // Create a single row for all items
        const row = $('<div class="row"></div>');

        for (let i = 0; i < products.length; i++) {
            const product = products[i];
            const city = await fetchCity(product.dealer_id); // Fetch city using dealer_id
            const mileage = product.combined_attributes.find(attr => attr.pf_name === "Mileage (MPG)")?.value || 'N/A';
            const fuelType = product.combined_attributes.find(attr => attr.pf_name === "Fuel Type")?.value || 'N/A';
            const transmissionType = product.combined_attributes.find(attr => attr.pf_name === "Transmission Type")?.value || 'N/A';

            // Check if the product image is available, otherwise use a placeholder image
            const imageUrl = product.product_image ? `${ProductThumbnail}${product.product_image}` : 'https://placehold.co/600x400?text=KenzWheels'; // Replace with actual placeholder image URL

            const item = `
            <div class="col-12 col-md-6 col-lg-4 item pb-3 search">
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

            row.append(item); // Append the item to the single row
        }

        $('.charity').append(row); // Append the row to the charity class
    }
</script>
<script>
    $(document).ready(function() {
        $("#search-input").on("keyup", function() {
            var searchText = $(this).val().toLowerCase();
            $(".search").each(function() {
                var cardContent = $(this).text().toLowerCase();
                if (cardContent.indexOf(searchText) == -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });
    });
</script>

<!-- JavaScript to update the mileage range dynamically and show the tooltip -->
<script>
    const mileageSlider = document.getElementById('mileageRange');
    const mileageTooltip = document.getElementById('mileageTooltip');
    const mileageFrom = document.getElementById('ml_from');
    const mileageTo = document.getElementById('ml_to');
    
    // Update the tooltip position and value dynamically
    mileageSlider.addEventListener('input', function() {
        const value = this.value;
        
        // Update the tooltip value
        mileageTooltip.textContent = `${value} km`;
        
        // Update the position of the tooltip based on the slider thumb
        const percentage = (value - mileageSlider.min) / (mileageSlider.max - mileageSlider.min) * 100;
        mileageTooltip.style.left = `calc(${percentage}% + ${-percentage / 2}px)`;  // Adjust tooltip position

        // Update the displayed mileage
        mileageFrom.textContent = `${value} km`;
        mileageTo.textContent = `${value} km`;

        // Optional: Show a hint or message about the selected range
        document.getElementById('ml_hint').textContent = `Selected Mileage: ${value} km`;
    });

    // Show the tooltip when the user is interacting with the slider
    mileageSlider.addEventListener('mouseenter', function() {
        mileageTooltip.style.display = 'block';  // Make the tooltip visible
    });

    mileageSlider.addEventListener('mouseleave', function() {
        mileageTooltip.style.display = 'none';  // Hide the tooltip when the mouse leaves the slider
    });
</script>