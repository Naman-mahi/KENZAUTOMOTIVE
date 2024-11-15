<link rel="stylesheet" href="../assets/css/index.css">
<link rel="stylesheet" href="../assets/lib/owl-carousel/css/owl.carousel.css">
<link rel="stylesheet" href="../assets/lib/owl-carousel/css/owl.theme.green.css">

<style>
    @keyframes float1 {
        0% {
            transform: translate(0, 0);
        }

        50% {
            transform: translate(-10px, 0);
        }

        100% {
            transform: translate(0, 0);
        }
    }

    .triangle-float1 {
        animation: float1 3s infinite;
    }

    @keyframes float2 {
        0% {
            transform: translate(0, 0);
        }

        50% {
            transform: translate(-5px, -5px);
        }

        100% {
            transform: translate(0, 0);
        }
    }

    .triangle-float2 {
        animation: float2 4s infinite;
    }

    @keyframes float3 {
        0% {
            transform: translate(0, 0);
        }

        50% {
            transform: translate(0, -10px);
        }

        100% {
            transform: translate(0, 0);
        }
    }

    .triangle-float3 {
        animation: float3 6s infinite;
    }

    /* Style the numeric indicators */
    /* Set carousel height to 60vh */
    .carousel.banner-carousel {
        height: 65vh;
    }

    .carousel-item img {
        object-fit:cover;
        /* Ensures the image covers the entire carousel */
   
    }
</style>

<body>

    <?php include_once('../includes/userheader.php'); ?>

    <div class="container-fluid" style="padding: 0px !important;">
        <!-- Carousel 1 -->
        <div id="carouselExampleIndicators1" class="carousel slide banner-carousel" data-bs-ride="carousel">
            <!-- Numeric indicators -->
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="carousel-image-wrapper">
                        <img class="d-block w-100" src="../assets/images/bannertemp/2.png" alt="First slide">
                     
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="carousel-image-wrapper">
                        <img class="d-block w-100" src="../assets/images/bannertemp/3.png" alt="Second slide">
                       
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="carousel-image-wrapper">
                        <img class="d-block w-100" src="../assets/images/bannertemp/4.png" alt="Third slide">
                     
                    </div>
                </div>
            </div>

            <!-- Left and Right Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            // Initialize all carousels on the page
            $('.banner-carousel').each(function() {
                var carousel = new bootstrap.Carousel(this, {
                    interval: 3000, // Set the interval time (in ms) for auto sliding
                    ride: 'carousel' // Enable the carousel auto sliding
                });
            });

            // Update the indicators text and active state on slide change
            $('#carouselExampleIndicators1').on('slide.bs.carousel', function(event) {
                var index = $(event.relatedTarget).index(); // Get the index of the next slide
                var indicators = $(this).find('.carousel-indicators li');

                // Reset all indicators
                indicators.removeClass('active');
                $(indicators[index]).addClass('active'); // Add active class to the current indicator
            });
        });
    </script>
    <!-- SVG Background Section -->
    <!-- <div class="container-fluid d-flex align-items-center justify-content-center position-relative">
        <div class="svg-background position-absolute w-100 h-100">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                xmlns:svgjs="http://svgjs.dev/svgjs" preserveAspectRatio="none" viewBox="0 0 1940 560">
                <g mask="url(#SvgjsMask1193)" fill="none">
                    <rect x="0" y="0" fill="url(#SvgjsLinearGradient1194)"></rect>
                    <path
                        d="M1882.697,295.102C1914.356,293.795,1940.099,273.843,1957.4,247.297C1976.922,217.343,1993.39,181.443,1977.722,149.305C1960.514,114.009,1921.961,94.515,1882.697,94.071C1842.63,93.617,1802.891,111.842,1783.873,147.111C1765.632,180.937,1775.148,221.979,1796.49,253.939C1815.444,282.322,1848.596,296.51,1882.697,295.102"
                        fill="rgba(183, 52, 56, 0.56)" class="triangle-float3"></path>
                    <path
                        d="M1649.778,529.692C1693.889,532.429,1732.414,501.568,1753.952,462.975C1774.924,425.397,1775.039,380.193,1754.236,342.521C1732.692,303.506,1694.345,274.001,1649.778,274.325C1605.685,274.646,1566.818,304.183,1547.919,344.021C1531.264,379.129,1547.13,417.235,1565.82,451.303C1585.558,487.282,1608.82,527.151,1649.778,529.692"
                        fill="rgba(183, 52, 56, 0.56)" class="triangle-float3"></path>
                    <path
                        d="M1286.98,454.614C1338.25,457.219,1390.855,434.189,1414.664,388.708C1437.222,345.616,1418.953,294.82,1391.731,254.512C1368.087,219.502,1329.19,201.404,1286.98,199.649C1240.837,197.731,1189.858,205.599,1165.975,245.127C1141.514,285.611,1156.296,335.823,1179.954,376.781C1203.602,417.721,1239.762,452.214,1286.98,454.614"
                        fill="rgba(183, 52, 56, 0.56)" class="triangle-float2"></path>
                    <path
                        d="M413.992,325.451C439.443,324.841,462.819,312.281,476.135,290.583C490.127,267.784,494.026,239.375,481.234,215.882C467.917,191.424,441.832,175.747,413.992,176.451C387.226,177.128,365.757,195.939,352.394,219.141C339.059,242.293,333.071,270.572,346.466,293.69C359.832,316.758,387.34,326.09,413.992,325.451"
                        fill="rgba(183, 52, 56, 0.56)" class="triangle-float1"></path>
                    <path
                        d="M120.235,432.155C157.086,430.583,181.834,397.642,198.371,364.672C212.949,335.606,214.452,302.657,199.727,273.665C183.334,241.389,156.434,210.452,120.235,210.832C84.453,211.208,61.13,244.118,43.583,275.305C26.491,305.685,14.325,340.553,29.63,371.871C46.701,406.803,81.39,433.812,120.235,432.155"
                        fill="rgba(183, 52, 56, 0.56)" class="triangle-float1"></path>
                    <path
                        d="M1321.444,182.706C1339.977,182.863,1357.43,174.648,1367.701,159.22C1379.302,141.794,1386.263,119.263,1375.72,101.177C1365.229,83.18,1342.233,78.523,1321.444,79.868C1303.122,81.054,1287.221,91.555,1278.11,107.495C1269.072,123.306,1267.437,142.665,1276.529,158.445C1285.634,174.248,1303.207,182.551,1321.444,182.706"
                        fill="rgba(183, 52, 56, 0.56)" class="triangle-float1"></path>
                </g>
                <defs>
                    <mask id="SvgjsMask1193">
                        <rect width="1940" height="560" fill="#ffffff"></rect>
                    </mask>
                    <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" gradientUnits="userSpaceOnUse"
                        id="SvgjsLinearGradient1194">
                        <stop stop-color="#0e2a47" offset="0"></stop>
                        <stop stop-color="rgba(183, 52, 58, 1)" offset="1"></stop>
                    </linearGradient>
                </defs>
            </svg>
        </div>

    </div>

    <div class="container-fluid banner-container d-flex align-items-center justify-content-center">
        <div class="account-pages text-center">
            <div class="row">
       
                <div class="col-12">
                    <h1 class="bannertitle mt-md-5 pt-md-5">Discover Your Perfect Ride</h1>
                    <p class="banner-subheading lead mt-3 mb-5">Thousands of quality used cars waiting for you!</p>
                    <a href="usedcars" class="advanced-filter-btn">Explore Filters</a>
                </div>
            </div>
        </div>
    </div> -->

    <div class="carousel-wrap">
        <div class="text-center mb-4">
            <h1 class="carousel-title fw-bold heading-h1">
                <i class="mdi mdi-car"></i> Featured Used Cars for Sale
            </h1>
        </div>
        <button class="btn-prev featured-prev"><i class="mdi mdi-arrow-left-drop-circle-outline"></i></button>
        <div class="owl-carousel featured-carousel">
            <!-- Dynamic content will be injected here -->
        </div>
        <button class="btn-next featured-next"><i class="mdi mdi-arrow-right-drop-circle-outline"></i></button>
    </div>

    <!-- New Carousel: Recommended Used Cars For You -->
    <div class="carousel-wrap">
        <div class="text-center mb-4">
            <h1 class="carousel-title heading-h1"><i class="mdi mdi-car"></i> Used Cars For You</h1>
        </div>
        <div class="owl-carousel recommended-carousel">

            <!-- Dynamic content will be injected here -->

        </div>
        <button class="btn-prev recommended-prev"><i class="mdi mdi-arrow-left-drop-circle-outline"></i></button>
        <button class="btn-next recommended-next"><i class="mdi mdi-arrow-right-drop-circle-outline"></i></button>
    </div>

    <div class="carousel-wrap">
        <div class="text-center mb-4">
            <h1 class="carousel-title heading-h1"><i class="mdi mdi-car"></i> New Cars For You</h1>
        </div>
        <div class="owl-carousel recommendednew-carousel">
            <!-- Change the class name here -->
            <!-- Dynamic items will be inserted here by JavaScript -->
        </div>
        <button class="btn-prev recommended-prev"><i class="mdi mdi-arrow-left-drop-circle-outline"></i></button>
        <button class="btn-next recommended-next"><i class="mdi mdi-arrow-right-drop-circle-outline"></i></button>
    </div>

    <div class="carousel-wrap">
        <div class="text-center mb-4">
            <h1 class="carousel-title heading-h1"><i class="mdi mdi-car"></i> Auto Store Car Parts & Accessories</h1>
        </div>
        <div class="owl-carousel spareparts-carousel">
            <!-- Change the class name here to spareparts-carousel -->
            <!-- Dynamic items will be inserted here by JavaScript -->
        </div>
        <button class="btn-prev spareparts-prev"><i class="mdi mdi-arrow-left-drop-circle-outline"></i></button>
        <button class="btn-next spareparts-next"><i class="mdi mdi-arrow-right-drop-circle-outline"></i></button>
    </div>

    <!-- Services Section  Started-->
    <section id="services" class="we-offer-area text-center bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-heading text-center">
                        <h2>What We <span>Offer</span></h2>
                        <h4>Your comprehensive automotive solutions</h4>
                    </div>
                </div>
            </div>
            <div class="row our-offer-items less-carousel">
                <!-- Single Item -->
                <div class="col-md-4 col-sm-6 equal-height">
                    <div class="item">
                        <img class="rounded-circle" src="../assets/images/home/rent.gif" alt="" height="80px"
                            width="80px">
                        <h4>Rentals</h4>
                        <p>
                            Choose from a wide range of vehicles for short-term or long-term rentals.
                        </p>
                    </div>
                </div>
                <!-- End Single Item -->

                <!-- Single Item -->
                <div class="col-md-4 col-sm-6 equal-height">
                    <div class="item">
                        <img class="rounded-circle" src="../assets/images/home/sale.gif" alt="" height="80px"
                            width="80px">
                        <!-- <i class="fas fa-car-side fa-3x"></i> -->
                        <h4>Sales</h4>
                        <p>
                            Discover our diverse selection of high-quality vehicles available for purchase.
                        </p>
                    </div>
                </div>
                <!-- End Single Item -->

                <!-- Single Item -->
                <div class="col-md-4 col-sm-6 equal-height">
                    <div class="item">
                        <img class="rounded-circle" src="../assets/images/home/buy.gif" alt="" height="80px"
                            width="80px">
                        <!-- <i class="fas fa-shopping-cart fa-3x"></i> -->
                        <h4>Buy</h4>
                        <p>
                            Special deals and offers for buying your next vehicle with ease.
                        </p>
                    </div>
                </div>
                <!-- End Single Item -->

                <!-- Single Item -->
                <div class="col-md-4 col-sm-6 equal-height">
                    <div class="item">
                        <img class="rounded-circle" src="../assets/images/home/phone.gif" alt="" height="80px"
                            width="80px">
                        <h4>24/7 Support</h4>
                        <p>
                            Get assistance anytime with our dedicated customer support team.
                        </p>
                    </div>
                </div>
                <!-- End Single Item -->

                <!-- Single Item -->
                <div class="col-md-4 col-sm-6 equal-height">
                    <div class="item">
                        <img class="rounded-circle" src="../assets/images/home/maintenance.gif" alt="" height="80px"
                            width="80px">
                        <h4>Auto Spare Parts</h4>
                        <p>
                            Explore a wide range of auto spare parts available for direct purchase from Kenz Wheel.
                        </p>
                    </div>
                </div>

                <!-- End Single Item -->

                <!-- Single Item -->
                <div class="col-md-4 col-sm-6 equal-height">
                    <div class="item">
                        <img class="rounded-circle" src="../assets/images/home/satisfaction.gif" alt="" height="80px"
                            width="80px">
                        <h4>Customer Satisfaction</h4>
                        <p>
                            We are committed to ensuring the highest level of satisfaction with every service.
                        </p>
                    </div>
                </div>
                <!-- End Single Item -->
            </div>
        </div>
    </section>
    <!-- Services Section  Started-->
    <div class="container my-5">
        <h1 class="text-center fw-bold mb-4">New Cars by Make</h1>
        <div class="row row-cols-2 row-cols-sm-4 row-cols-md-6 g-3 Brand" id="brand-list">
            <!-- The dynamic list of brands will be inserted here -->
        </div>
    </div>

    <!-- Call to Action Section -->
    <section id="cta" class="bg-light">
        <div class="container text-center">
            <h2>Explore Our Selection of Used Cars and Spare Parts!</h2>
            <p>Discover unbeatable deals and find exactly what you need. Start your journey with us today!</p>
            <a href="usedcars" class="button-action button-pulse">Explore More</a>
        </div>
    </section>

    <!-- Call to Action Section End-->

    <?php require_once '../includes/userfooter.php' ?>
    <script>
        // Pass the PHP constants into JavaScript
        const API_BASE_URL = '<?php echo API_BASE_URL; ?>';
        const ProductThumbnail = '<?php echo ProductThumbnail; ?>';
        const ProductImages = '<?php echo ProductImages; ?>';
        const BrandLogo = '<?php echo BrandLogo; ?>';
        // console.log(API_BASE_URL); // Should log: https://api.intencode.com
        // console.log(ProductThumbnail); // Should log: https://kenzwheels.com/marketplace/Manage/uploads/ProductThumbnail/
        // console.log(ProductImages); // Should log: https://kenzwheels.com/marketplace/Manage/uploads/ProductImages
        // console.log(BrandLogo); // Should log: https://kenzwheels.com/marketplace/Manage/uploads/BrandLogo
        fetchProducts();

        function fetchProducts() {
            $.ajax({
                url: `${API_BASE_URL}/featured-products`, // Use API_BASE_URL
                type: 'GET',
                success: function(data) {
                    if (data && data.status === 200 && Array.isArray(data.data)) {
                        // console.log(data);
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
            // console.log(`${API_BASE_URL}/profile/${dealerId}`);
            return $.ajax({
                url: `${API_BASE_URL}/profile/${dealerId}`,
                type: 'GET',
            }).then(response => {
                // console.log(response)
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
            $('.featured-carousel').empty();
            // console.log(products);
            for (const product of products) {
                // console.log(product)
                const city = await fetchCity(product.dealer_id); // Fetch city using dealer_id
                const item = `
                <div class="item">
                    <a href="viewproduct.php?product_id=${product.product_id}"
                       class="car-card bg-light rounded text-decoration-none">
                        <div class="car-img">
                            <img src="${ProductThumbnail}${product.product_image}" alt="${product.product_name}"
                                 class="img-fluid w-100 rounded-top">
                        </div>
                        <div class="car-content text-start">
                            <div class="car-content-inner">
                                <h5 class="car-title">${product.product_name}</h5>
                                <p class="car-price pb-0">
    INR ${new Intl.NumberFormat('en-IN').format(product.price)}
</p>

                                <p class="car-city pb-0">${city}</p> <!-- Display city -->
                                <p class="car-reviews"><span class="rating">★★★★☆</span> 120 Reviews</p>
                            </div>
                        </div>
                    </a>
                </div>
            `;
                $('.featured-carousel').append(item);
            }
            // Initialize the Owl Carousel
            const $featuredCarousel = $('.featured-carousel').owlCarousel({
                loop: false,
                margin: 10,
                autoplay: false,
                autoplayHoverPause: true,
                nav: false,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 4
                    }
                }
            });
            // Update button visibility
            function updateButtonVisibility(event) {
                var carousel = event.relatedTarget;
                if (carousel.current() === 0) {
                    $('.featured-prev').addClass('disabled');
                } else {
                    $('.featured-prev').removeClass('disabled');
                }
                if (carousel.current() + carousel.settings.items >= carousel.items().length) {
                    $('.featured-next').addClass('disabled');
                } else {
                    $('.featured-next').removeClass('disabled');
                }
            }
            // Initial check for button visibility
            $featuredCarousel.on('initialized.owl.carousel', updateButtonVisibility);
            $featuredCarousel.on('changed.owl.carousel', updateButtonVisibility);
            // Custom navigation buttons
            $('.featured-prev').click(function() {
                $featuredCarousel.trigger('prev.owl.carousel');
            });
            $('.featured-next').click(function() {
                $featuredCarousel.trigger('next.owl.carousel');
            });
        }
    </script>
    <!-- Separate Script for Recommended Carousel -->

    <script>
        $(document).ready(function() {
            // Fetch recommended used cars from the /oldcars endpoint
            fetchRecommendedCars(); // Call to fetch data and display it

            function fetchRecommendedCars() {
                $.ajax({
                    url: `${API_BASE_URL}/oldcars`, // Use the provided API_BASE_URL for the endpoint
                    type: 'GET',
                    success: function(data) {
                        if (data && data.status === 200 && Array.isArray(data.data)) {
                            // Pass the fetched data to displayRecommendedCars function
                            displayRecommendedCars(data.data);
                        } else {
                            console.error('Invalid data format for recommended cars:', data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching recommended cars:', error);
                    }
                });
            }

            // Function to fetch the city using the dealer's ID
            function fetchCity(dealerId) {
                return $.ajax({
                    url: `${API_BASE_URL}/profile/${dealerId}`, // Fetch profile data using dealer_id
                    type: 'GET',
                }).then(response => {
                    if (response && response.statuscode === 200 && response.user) {
                        return response.user.city; // Return the city from the user profile
                    } else {
                        console.error('Invalid city data format:', response);
                        return ''; // Return an empty string if city is not available
                    }
                }).catch(error => {
                    console.error('Error fetching city:', error);
                    return ''; // Return an empty string in case of error
                });
            }

            // Function to display the recommended cars with city and other details
            async function displayRecommendedCars(cars) {
                $('.recommended-carousel').empty(); // Clear the existing carousel items

                // Iterate over the cars and append the items dynamically
                for (const car of cars) {
                    const city = await fetchCity(car.dealer_id); // Fetch city using dealer_id

                    // Check if the product_image is available, otherwise use a placeholder image
                    const imageUrl = car.product_image ? `${ProductThumbnail}${car.product_image}` : 'https://placehold.co/600x400?text=KenzWheels'; // Placeholder image if product_image is missing

                    const item = `
                <div class="item">
                    <a href="viewproduct.php?product_id=${car.product_id}"
                       class="car-card bg-light rounded text-decoration-none">
                        <div class="car-img">
                            <img src="${imageUrl}" alt="${car.product_name}"
                                 class="img-fluid w-100 rounded-top">
                        </div>
                        <div class="car-content text-start">
                            <div class="car-content-inner">
                                <h5 class="car-title">${car.product_name}</h5>
                                <p class="car-price pb-0">
                                    INR ${new Intl.NumberFormat('en-IN').format(car.price)}
                                </p>

                                <p class="car-city pb-0">${city}</p> <!-- Display city -->
                                <p class="car-reviews"><span class="rating">★★★★☆</span> 120 Reviews</p>
                            </div>
                        </div>
                    </a>
                </div>
                `;
                    $('.recommended-carousel').append(item); // Add each car item to the carousel
                }

                // Initialize the Owl Carousel for recommended cars
                const $recommendedCarousel = $('.recommended-carousel').owlCarousel({
                    loop: false,
                    margin: 10,
                    autoplay: true,
                    autoplayHoverPause: true,
                    nav: false,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 4
                        }
                    }
                });

                // Update button visibility for the recommended carousel
                function updateRecommendedButtonVisibility(event) {
                    var carousel = event.relatedTarget;
                    if (carousel.current() === 0) {
                        $('.recommended-prev').addClass('disabled');
                    } else {
                        $('.recommended-prev').removeClass('disabled');
                    }
                    if (carousel.current() + carousel.settings.items >= carousel.items().length) {
                        $('.recommended-next').addClass('disabled');
                    } else {
                        $('.recommended-next').removeClass('disabled');
                    }
                }

                // Bind visibility update to carousel change
                $recommendedCarousel.on('initialized.owl.carousel', updateRecommendedButtonVisibility);
                $recommendedCarousel.on('changed.owl.carousel', updateRecommendedButtonVisibility);

                // Custom navigation buttons for recommended carousel
                $('.recommended-prev').click(function() {
                    $recommendedCarousel.trigger('prev.owl.carousel');
                });
                $('.recommended-next').click(function() {
                    $recommendedCarousel.trigger('next.owl.carousel');
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            // Fetch new cars from the /newcars endpoint
            fetchNewCars(); // Call to fetch data and display it
            function fetchNewCars() {
                $.ajax({
                    url: `${API_BASE_URL}/newcars`, // Use the provided API_BASE_URL for the new cars endpoint
                    type: 'GET',
                    success: function(data) {
                        if (data && data.status === 200 && Array.isArray(data.data)) {
                            // Pass the fetched data to displayNewCars function
                            displayNewCars(data.data);
                        } else {
                            console.error('Invalid data format for new cars:', data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching new cars:', error);
                    }
                });
            }
            // Function to fetch the city using the dealer's ID (same as in fetchNewCars)
            function fetchCity(dealerId) {
                return $.ajax({
                    url: `${API_BASE_URL}/profile/${dealerId}`, // Fetch profile data using dealer_id
                    type: 'GET',
                }).then(response => {
                    if (response && response.statuscode === 200 && response.user) {
                        return response.user.city; // Return the city from the user profile
                    } else {
                        console.error('Invalid city data format:', response);
                        return ''; // Return an empty string if city is not available
                    }
                }).catch(error => {
                    console.error('Error fetching city:', error);
                    return ''; // Return an empty string in case of error
                });
            }
            // Function to display the new cars with city and other details
            async function displayNewCars(cars) {
                $('.recommendednew-carousel').empty(); // Clear the existing carousel items
                // Iterate over the cars and append the items dynamically
                for (const car of cars) {
                    const city = await fetchCity(car.dealer_id); // Fetch city using dealer_id
                    // Check if the product image is available, otherwise use a placeholder
                    const imageUrl = car.product_image && car.product_image.trim() !== '' ?
                        `${ProductThumbnail}${car.product_image}` :
                        'https://placehold.co/600x400?text=KenzWheels';
                    const item = `
  <div class="item">
      <a href="viewproduct.php?product_id=${car.product_id}" class="car-card bg-light rounded text-decoration-none">
          <div class="car-img">
              <img src="${imageUrl}" alt="${car.product_name}" class="img-fluid w-100 rounded-top">
          </div>
          <div class="car-content text-start">
              <div class="car-content-inner">
                  <h5 class="car-title">${car.product_name}</h5>
                  <p class="car-price pb-0">
    INR ${new Intl.NumberFormat('en-IN').format(car.price)}
</p>
                  <p class="car-city pb-0">${city || 'City Not Available'}</p> <!-- Display city -->
                  <p class="car-reviews"><span class="rating">★★★★☆</span> 120 Reviews</p>
              </div>
          </div>
      </a>
  </div>
  `;
                    // Add the item to the carousel
                    $('.recommendednew-carousel').append(item);
                }
                // Initialize the Owl Carousel for new cars
                const $newCarsCarousel = $('.recommendednew-carousel').owlCarousel({
                    loop: false,
                    margin: 10,
                    autoplay: true,
                    autoplayHoverPause: true,
                    nav: false,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 4
                        }
                    }
                });
                // Update button visibility for the new cars carousel
                function updateNewCarsButtonVisibility(event) {
                    var carousel = event.relatedTarget;
                    if (carousel.current() === 0) {
                        $('.recommended-prev').addClass('disabled');
                    } else {
                        $('.recommended-prev').removeClass('disabled');
                    }
                    if (carousel.current() + carousel.settings.items >= carousel.items().length) {
                        $('.recommended-next').addClass('disabled');
                    } else {
                        $('.recommended-next').removeClass('disabled');
                    }
                }
                // Bind visibility update to carousel change
                $newCarsCarousel.on('initialized.owl.carousel', updateNewCarsButtonVisibility);
                $newCarsCarousel.on('changed.owl.carousel', updateNewCarsButtonVisibility);
                // Custom navigation buttons for new cars carousel
                $('.recommended-prev').click(function() {
                    $newCarsCarousel.trigger('prev.owl.carousel');
                });
                $('.recommended-next').click(function() {
                    $newCarsCarousel.trigger('next.owl.carousel');
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            // Fetch spare parts from the /spareparts endpoint
            fetchSpareParts(); // Call to fetch data and display it
            function fetchSpareParts() {
                $.ajax({
                    url: `${API_BASE_URL}/spareparts`, // Use the provided API_BASE_URL for the endpoint
                    type: 'GET',
                    success: function(data) {
                        if (data && data.status === 200 && Array.isArray(data.data)) {
                            // Pass the fetched data to displaySpareParts function
                            displaySpareParts(data.data);
                        } else {
                            console.error('Invalid data format for spare parts:', data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching spare parts:', error);
                    }
                });
            }
            // Function to fetch the city using the dealer's ID (same as in fetchNewCars)
            function fetchCity(dealerId) {
                return $.ajax({
                    url: `${API_BASE_URL}/profile/${dealerId}`, // Fetch profile data using dealer_id
                    type: 'GET',
                }).then(response => {
                    if (response && response.statuscode === 200 && response.user) {
                        return response.user.city; // Return the city from the user profile
                    } else {
                        console.error('Invalid city data format:', response);
                        return ''; // Return an empty string if city is not available
                    }
                }).catch(error => {
                    console.error('Error fetching city:', error);
                    return ''; // Return an empty string in case of error
                });
            }
            // Function to display the spare parts with city and other details
            async function displaySpareParts(parts) {
                $('.spareparts-carousel').empty(); // Clear the existing carousel items
                // Iterate over the parts and append the items dynamically
                for (const part of parts) {
                    const city = await fetchCity(part.dealer_id); // Fetch city using dealer_id
                    // const imageUrl = part.product_image ? `${ProductThumbnail}${part.product_image}` : ''; // Use PHP constant for image URL
                    const imageUrl = part.product_image ? `${ProductThumbnail}${part.product_image}` :
                        'https://placehold.co/600x400?text=KenzWheels';
                    const item = `
                <div class="item">
                    <a href="viewproduct.php?product_id=${part.part_id}" class="car-card bg-light rounded text-decoration-none">
                        <div class="car-img">
                            <img src="${imageUrl}" alt="${part.product_name}" class="img-fluid w-100 rounded-top">
                        </div>
                        <div class="car-content text-start">
                            <div class="car-content-inner">
                                <h5 class="car-title">${part.product_name}</h5>
                                <p class="car-price pb-0">
           INR ${new Intl.NumberFormat('en-IN').format(part.price)}
       </p>
                                <p class="car-city pb-0">${city || 'City Not Available'}</p> <!-- Display city -->
                                <p class="car-reviews"><span class="rating">★★★★☆</span> 120 Reviews</p>
                            </div>
                        </div>
                    </a>
                </div>
            `;
                    $('.spareparts-carousel').append(item); // Add each spare part item to the carousel
                }
                // Initialize the Owl Carousel for spare parts
                const $sparePartsCarousel = $('.spareparts-carousel').owlCarousel({
                    loop: false,
                    margin: 10,
                    autoplay: true,
                    autoplayHoverPause: true,
                    nav: false,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 4
                        }
                    }
                });
                // Update button visibility for the spare parts carousel
                function updateSparePartsButtonVisibility(event) {
                    var carousel = event.relatedTarget;
                    if (carousel.current() === 0) {
                        $('.spareparts-prev').addClass('disabled');
                    } else {
                        $('.spareparts-prev').removeClass('disabled');
                    }
                    if (carousel.current() + carousel.settings.items >= carousel.items().length) {
                        $('.spareparts-next').addClass('disabled');
                    } else {
                        $('.spareparts-next').removeClass('disabled');
                    }
                }
                // Bind visibility update to carousel change
                $sparePartsCarousel.on('initialized.owl.carousel', updateSparePartsButtonVisibility);
                $sparePartsCarousel.on('changed.owl.carousel', updateSparePartsButtonVisibility);
                // Custom navigation buttons for spare parts carousel
                $('.spareparts-prev').click(function() {
                    $sparePartsCarousel.trigger('prev.owl.carousel');
                });
                $('.spareparts-next').click(function() {
                    $sparePartsCarousel.trigger('next.owl.carousel');
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            // Fetch the brand data from the API
            fetchBrands(); // Function to fetch and display brands
            function fetchBrands() {
                $.ajax({
                    url: `${API_BASE_URL}/brands`, // Fetch brands from API
                    type: 'GET',
                    success: function(response) {
                        if (response && response.status === 200 && Array.isArray(response.data)) {
                            // Call the function to display brands
                            displayBrands(response.data);
                        } else {
                            console.error('No brands data found or invalid response:', response);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching brands:', error);
                    }
                });
            }
            // Function to display the fetched brands dynamically
            function displayBrands(brands) {
                const brandListContainer = $('#brand-list'); // The container where brands will be displayed
                brandListContainer.empty(); // Clear any existing content
                // Loop through the brand data and create the HTML
                brands.forEach(brand => {
                    const brandItem = `
                    <ul class="make-list col-sm-2 list-unstyled new-car-list">
                        <li class="heading">
                            <a href="/new-cars/${brand.brand_name.toLowerCase()}/" title="${brand.brand_name} Cars">
                                <img alt="${brand.brand_name}" loading="lazy" src="${BrandLogo}${brand.brand_logo}">
                                <h3 class="nomargin">${brand.brand_name}</h3>
                            </a>
                        </li>
                    </ul>
                `;
                    brandListContainer.append(brandItem); // Add the brand item to the container
                });
            }
        });
    </script>

</body>

</html>