<?php include_once('../includes/userheader.php'); ?>
<link rel="stylesheet" href="../assets/css/viewproduct.css">
<link rel="stylesheet" href="../assets/lib/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="../assets/lib/owl-carousel/css/owl.carousel.css">
<link rel="stylesheet" href="../assets/lib/owl-carousel/css/owl.theme.green.css">
<!-- <link rel="stylesheet" href="../assets/css/index.css"> -->
<?php
// Get the product_id from the URL, default to null if not found
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
// echo $_GET['product_id'];
// echo $product_id;
?>
<style>
    .feature-popover-points {
        border-top: 1px solid #e6e6e6;
        padding: 12px 0
    }

    .feature-popover-points li {
        color: #6e727b;
        padding: 4px 0
    }

    .feature-popover-points .fa-tick {
        color: #3eb549;
        margin-right: 8px
    }

    .hide {
        display: none !important
    }
</style>
<div class="hide" id="featured-tooltip-content">
    <a href='/products/feature_your_ad' onclick='event.stopPropagation()' class='pull-right fs12 mt15'>Learn
        More</a>
    <h4>Why Feature your Ad?</h4>
    <ul class='feature-popover-points'>
        <li><i class='fa fa-tick'></i>Ad appears at the top</li>
        <li><i class='fa fa-tick'></i>Ad standouts with the Featured tag</li>
        <li><i class='fa fa-tick'></i>Get more calls &amp; Sell up to 10x faster</li>
    </ul>
</div>
<div class="container my-5">
    <div class="row">
        <!-- Left Side Navigation (col-2) -->
        <div class="col-md-2 d-none d-md-block">
            <ul id="scroll-sidebar" class="nav scroll-nav affix-top">
                <li><a href="#scroll_car_info"><i class="fa fa-caret-right"></i>Car Info</a></li>
                <li><a href="#scroll_car_detail"><i class="fa fa-caret-right"></i>Car Details</a></li>
                <li><a href="#scroll_carsure_report"><i class="fa fa-caret-right"></i>Inspection Report</a></li>
                <li><a href="#scroll_seller_comments"><i class="fa fa-caret-right"></i>Seller&#39;s Comments</a></li>
                <li><a href="#scroll_similar_ads"><i class="fa fa-caret-right"></i>Similar Ads</a></li>
            </ul>

        </div>

        <div class="col-md-10">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb custom-breadcrumb"> <!-- Custom class added -->
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Used Cars</a></li>
                            <li class="breadcrumb-item"><a href="#">Cars Hyderabad</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Changan Alsvin 1.5L DCT 2022</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="title p-3">
                            <div id="scroll_car_info" style="height: 0; "></div>

                            <h3 id="product-name">Changan Alsvin 1.5L DCT Lumiere 2022</h3>
                            <p id="dealer-address"><i class="fas fa-map-marker-alt"></i> Sukh Chayn Gardens, Hyderabad, Punjab</p>
                        </div>

                        <div class="position-relative">
                            <!-- Featured Ribbon (you can remove this if not needed) -->
                            <div class="featured-ribbon pointer">
                                <div class="ib lg-popover featured-popover" data-toggle="popover" data-placement="auto right" data-html="true">
                                    <div class="inner">
                                        FEATURED
                                        <i class="fa fa-exclamation-circle"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- Main Image Carousel -->
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                                <div class="swiper-wrapper" id="product-images">
                                    <!-- Images will be inserted dynamically here -->
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <div id="scroll_car_detail" style="height: 0; "></div>

                        <div class="card-body">
                            <!-- Thumbnail Carousel -->
                            <div thumbsSlider="" class="swiper mySwiper">
                                <div class="swiper-wrapper" id="product-thumbnails">
                                    <!-- Thumbnails will be inserted dynamically here -->
                                </div>
                            </div>
                        </div>

                        <!-- engine details start -->
                        <div id="ul-featured" class="row table-engine-detail my-3">
                            <div class="col-6 col-md-3 text-center border-3">
                                <span class="engine-icon year"></span>
                                <p>
                                    <a title="Year 2011 Cars for sale in India" href="/used-cars/2011/266226">2011</a>
                                </p>
                            </div>
                            <div class="col-6 col-md-3 text-center">
                                <span class="engine-icon km Driven"></span>
                                <p>167,590 km</p>
                            </div>
                            <div class="col-6 col-md-3 text-center">
                                <span class="engine-icon type"></span>
                                <p>
                                    <a title="Petrol Cars for Sale in India" href="/used-cars/petrol/57338">Petrol</a>
                                </p>
                            </div>
                            <div class="col-6 col-md-3 text-center">
                                <span class="engine-icon transmission"></span>
                                <p>
                                    <a title="Automatic Cars for Sale in India" href="/used-cars/automatic/57336">Automatic</a>
                                </p>
                            </div>
                        </div>
                        <div id="scroll_carsure_report" style="height: 0; "></div>

                        <!-- engine details End -->
                        <ul class="list-unstyled ul-featured row">
                            <li class="col-6 col-md-3 ad-data">Registered In</li>
                            <li class="col-6 col-md-3">Hyderabad</li>

                            <li class="col-6 col-md-3 ad-data">Color</li>
                            <li class="col-6 col-md-3">Green</li>

                            <li class="col-6 col-md-3 ad-data">Assembly</li>
                            <li class="col-6 col-md-3">Imported</li>

                            <li class="col-6 col-md-3 ad-data">Engine Capacity</li>
                            <li class="col-6 col-md-3">4000 cc</li>

                            <li class="col-6 col-md-3 ad-data">Body Type</li>
                            <li class="col-6 col-md-3">
                                <a title="Off-Road Vehicles for sale in India" href="/used-cars/off-road-vehicles/115010">Off-Road Vehicles</a>
                            </li>

                            <li class="col-6 col-md-3 ad-data">Last Updated:</li>
                            <li class="col-6 col-md-3">Oct 28, 2024</li>

                            <li class="col-6 col-md-3 ad-data">Ad Ref #</li>
                            <li class="col-6 col-md-3">9251457</li>
                        </ul>


                        <div class="carsure-detail mt-3 inspection-summary-widget">
                            <div class="carsure-detail-header d-flex flex-column flex-md-row justify-content-between align-items-center mb-3">
                                <h4 class="generic-gray mt-0 fw-bold mb-1">KenzWheels Inspection Report</h4>
                                <div class="generic-gray mb-2 mb-md-0">
                                    <span class="me-2 fw-bold">Inspected Date:</span> 09/27/24
                                </div>
                                <div class="fs-16 fwm text-info fw-bold">Overall Rating: 7.8/10</div>
                            </div>

                            <ul class="carsure-bar-outer carsure-bar-show list-unstyled">
                                <li class="row">
                                    <div class="col-8">
                                        <p>Exterior &amp; Body</p>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="bar-count">38%</div>
                                    </div>
                                    <div class="col-12">
                                        <div class="bar">
                                            <div class="bar-top" style='width:38%; background-color:#1877F2'></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-8">
                                        <p>Engine/Transmission/Clutch</p>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="bar-count">100%</div>
                                    </div>
                                    <div class="col-12">
                                        <div class="bar">
                                            <div class="bar-top" style='width:100%; background-color:#1877F2'></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-8">
                                        <p>Suspension/Steering</p>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="bar-count">62%</div>
                                    </div>
                                    <div class="col-12">
                                        <div class="bar">
                                            <div class="bar-top" style='width:62%; background-color:#1877F2'></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-8">
                                        <p>Interior</p>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="bar-count">98%</div>
                                    </div>
                                    <div class="col-12">
                                        <div class="bar">
                                            <div class="bar-top" style='width:98%; background-color:#1877F2'></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="row">
                                    <div class="col-8">
                                        <p>AC/Heater</p>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="bar-count">100%</div>
                                    </div>
                                    <div class="col-12">
                                        <div class="bar">
                                            <div class="bar-top" style='width:100%; background-color:#1877F2'></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="carsure-detail-footer d-flex flex-column flex-md-row justify-content-between mt-3">
                                <a class="btn btn-outline-primary mb-2 mb-md-0 me-md-2" href="/products/KenzWheels-inspection/" target="_blank">Learn More</a>
                                <a rel="nofollow" target="_blank" class="btn btn-primary fs-16" href="">View Full Inspection Report</a>
                            </div>

                        </div>

                        <h2 class="ad-detail-heading mt-4 ps-3">Car Features</h2>
                        <div id="scroll_seller_comments" style="height: 0; "></div>
                        <ul class="car-feature-list row list-unstyled ps-3">
                            <li class="col-12 col-sm-6 col-md-4 d-flex align-items-center mb-3"><i class="icon abs me-2"></i> ABS</li>
                            <li class="col-12 col-sm-6 col-md-4 d-flex align-items-center mb-3"><i class="icon am_fm_radio me-2"></i> AM/FM Radio</li>
                            <li class="col-12 col-sm-6 col-md-4 d-flex align-items-center mb-3"><i class="icon air_bags me-2"></i> Air Bags</li>
                            <li class="col-12 col-sm-6 col-md-4 d-flex align-items-center mb-3"><i class="icon air_conditioning me-2"></i> Air Conditioning</li>
                            <li class="col-12 col-sm-6 col-md-4 d-flex align-items-center mb-3"><i class="icon alloy_rims me-2"></i> Alloy Rims</li>
                            <li class="col-12 col-sm-6 col-md-4 d-flex align-items-center mb-3"><i class="icon cd_player me-2"></i> CD Player</li>
                            <li class="col-12 col-sm-6 col-md-4 d-flex align-items-center mb-3"><i class="icon cruise_control me-2"></i> Cruise Control</li>
                            <li class="col-12 col-sm-6 col-md-4 d-flex align-items-center mb-3"><i class="icon dvd_player me-2"></i> DVD Player</li>
                            <li class="col-12 col-sm-6 col-md-4 d-flex align-items-center mb-3"><i class="icon front_speakers me-2"></i> Front Speakers</li>
                            <li class="col-12 col-sm-6 col-md-4 d-flex align-items-center mb-3"><i class="icon immobilizer_key me-2"></i> Immobilizer Key</li>
                            <li class="col-12 col-sm-6 col-md-4 d-flex align-items-center mb-3"><i class="icon keyless_entry me-2"></i> Keyless Entry</li>
                            <li class="col-12 col-sm-6 col-md-4 d-flex align-items-center mb-3"><i class="icon power_locks me-2"></i> Power Locks</li>
                            <li class="col-12 col-sm-6 col-md-4 d-flex align-items-center mb-3"><i class="icon power_mirrors me-2"></i> Power Mirrors</li>
                            <li class="col-12 col-sm-6 col-md-4 d-flex align-items-center mb-3"><i class="icon power_steering me-2"></i> Power Steering</li>
                            <li class="col-12 col-sm-6 col-md-4 d-flex align-items-center mb-3"><i class="icon power_windows me-2"></i> Power Windows</li>
                            <li class="col-12 col-sm-6 col-md-4 d-flex align-items-center mb-3"><i class="icon rear_speakers me-2"></i> Rear Speakers</li>
                            <li class="col-12 col-sm-6 col-md-4 d-flex align-items-center mb-3"><i class="icon steering_switches me-2"></i> Steering Switches</li>
                            <li class="col-12 col-sm-6 col-md-4 d-flex align-items-center mb-3"><i class="icon usb_and_auxillary_cable me-2"></i> USB and Auxiliary Cable</li>
                        </ul>
                        <div class="row">
                            <h2 class="ad-detail-heading  ps-4">Seller's Comments</h2>
                            <div class="ps-4">
                                <div id="scroll_similar_ads" style="height: 0; "></div>
                                <ul class="list-unstyled">
                                    <li>- KenzWheels inspected car</li>
                                    <li>- Inspection report attached</li>
                                    <li>- Number plates available</li>
                                    <li>- 2nd Owner</li>
                                    <li>- Token Tax Paid</li>
                                    <li>- Manufacture 2011</li>
                                    <li>- Registered 2017</li>
                                    <li>- Documents available</li>
                                    <li>- 1 key available</li>
                                </ul>

                                <label class="detail-tip show d-block mt-3">
                                    Mention KenzWheels.com when calling Seller to get a good deal
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel: Similar Ads -->
                    <div class="carousel-wrap my-5">
                        <div class="text-center mb-4">
                            <h2 class="carousel-title heading-h1">Similar Ads</h2>
                        </div>
                        <div class="owl-carousel similar-ads-carousel">
                            <div class="item">
                                <a class="card show" href="/used-cars/toyota-fj-cruiser-1974-for-sale-in-hyderabad-9016356">
                                    <div class="card mb-0">
                                        <div class="featured-ribbon pointer">
                                            <div class="ib lg-popover featured-popover" data-toggle="popover" data-placement="auto right" data-html="true">
                                                <div class="inner">
                                                    FEATURED
                                                    <i class="fa fa-exclamation-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="../assets/images/logo/Hyundai.jpg" class="card-img-top img-fluid" alt="Toyota Fj Cruiser 1974">
                                        <div class="card-body">
                                            <h5 class="card-title">Toyota Fj Cruiser 1974</h5>
                                            <p class="card-price">INR 2,725,000</p>
                                            <p class="card-location">Hyderabad</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a class="card show" href="/used-cars/toyota-fj-cruiser-1974-for-sale-in-hyderabad-9016356">
                                    <div class="card mb-0">
                                        <div class="featured-ribbon pointer">
                                            <div class="ib lg-popover featured-popover" data-toggle="popover" data-placement="auto right" data-html="true">
                                                <div class="inner">
                                                    FEATURED
                                                    <i class="fa fa-exclamation-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="../assets/images/logo/Hyundai.jpg" class="card-img-top img-fluid" alt="Toyota Fj Cruiser 1974">
                                        <div class="card-body">
                                            <h5 class="card-title">Toyota Fj Cruiser 1974</h5>
                                            <p class="card-price">INR 2,725,000</p>
                                            <p class="card-location">Hyderabad</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a class="card show" href="/used-cars/toyota-fj-cruiser-1974-for-sale-in-hyderabad-9016356">
                                    <div class="card mb-0">
                                        <div class="featured-ribbon pointer">
                                            <div class="ib lg-popover featured-popover" data-toggle="popover" data-placement="auto right" data-html="true">
                                                <div class="inner">
                                                    FEATURED
                                                    <i class="fa fa-exclamation-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="../assets/images/logo/Hyundai.jpg" class="card-img-top img-fluid" alt="Toyota Fj Cruiser 1974">
                                        <div class="card-body">
                                            <h5 class="card-title">Toyota Fj Cruiser 1974</h5>
                                            <p class="card-price">INR 2,725,000</p>
                                            <p class="card-location">Hyderabad</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a class="card show" href="/used-cars/toyota-fj-cruiser-1974-for-sale-in-hyderabad-9016356">
                                    <div class="card mb-0">
                                        <div class="featured-ribbon pointer">
                                            <div class="ib lg-popover featured-popover" data-toggle="popover" data-placement="auto right" data-html="true">
                                                <div class="inner">
                                                    FEATURED
                                                    <i class="fa fa-exclamation-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="../assets/images/logo/Hyundai.jpg" class="card-img-top img-fluid" alt="Toyota Fj Cruiser 1974">
                                        <div class="card-body">
                                            <h5 class="card-title">Toyota Fj Cruiser 1974</h5>
                                            <p class="card-price">INR 2,725,000</p>
                                            <p class="card-location">Hyderabad</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a class="card show" href="/used-cars/toyota-fj-cruiser-1974-for-sale-in-hyderabad-9016356">
                                    <div class="card mb-0">
                                        <div class="featured-ribbon pointer">
                                            <div class="ib lg-popover featured-popover" data-toggle="popover" data-placement="auto right" data-html="true">
                                                <div class="inner">
                                                    FEATURED
                                                    <i class="fa fa-exclamation-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="../assets/images/logo/Hyundai.jpg" class="card-img-top img-fluid" alt="Toyota Fj Cruiser 1974">
                                        <div class="card-body">
                                            <h5 class="card-title">Toyota Fj Cruiser 1974</h5>
                                            <p class="card-price">INR 2,725,000</p>
                                            <p class="card-location">Hyderabad</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a class="card show" href="/used-cars/toyota-fj-cruiser-1974-for-sale-in-hyderabad-9016356">
                                    <div class="card mb-0">
                                        <div class="featured-ribbon pointer">
                                            <div class="ib lg-popover featured-popover" data-toggle="popover" data-placement="auto right" data-html="true">
                                                <div class="inner">
                                                    FEATURED
                                                    <i class="fa fa-exclamation-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="../assets/images/logo/Hyundai.jpg" class="card-img-top img-fluid" alt="Toyota Fj Cruiser 1974">
                                        <div class="card-body">
                                            <h5 class="card-title">Toyota Fj Cruiser 1974</h5>
                                            <p class="card-price">INR 2,725,000</p>
                                            <p class="card-location">Hyderabad</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="item">
                                <a class="card show" href="/used-cars/toyota-fj-cruiser-1974-for-sale-in-hyderabad-9016356">
                                    <div class="card mb-0">
                                        <div class="featured-ribbon pointer">
                                            <div class="ib lg-popover featured-popover" data-toggle="popover" data-placement="auto right" data-html="true">
                                                <div class="inner">
                                                    FEATURED
                                                    <i class="fa fa-exclamation-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="../assets/images/logo/Hyundai.jpg" class="card-img-top img-fluid" alt="Toyota Fj Cruiser 1974">
                                        <div class="card-body">
                                            <h5 class="card-title">Toyota Fj Cruiser 1974</h5>
                                            <p class="card-price">INR 2,725,000</p>
                                            <p class="card-location">Hyderabad</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- Add more carousel items as needed -->
                        </div>
                        <button class="btn-prev similar-ads-prev"><i class="mdi mdi-arrow-left-drop-circle-outline"></i></button>
                        <button class="btn-next similar-ads-next"><i class="mdi mdi-arrow-right-drop-circle-outline"></i></button>
                    </div>


                </div>

                <div class="col-lg-4">
                    <div class="side-bar">
                        <div class="well price-well text-center mb-3 p-3 position-relative">
                            <div class="price-box p-3 mb-3 border-bottom">
                                <strong class="text-theme">INR 1.4 <span>crore</span></strong>
                                <!-- <div class="mt-2 text-white bg-theme rounded px-2 py-1 d-inline-block" style="font-size: 13px;">
                                    Managed by KenzWheels.com
                                </div> -->
                            </div>
                            <div class="sifm-widget-ab text-center bg-light p-3 rounded">
                                <h3 class="mt-2 mb-3 fw-bold text-secondary">Managed By KenzWheels.com</h3>
                                <p class="fw-bold text-secondary">Car with Trust</p>

                                <ul class="list-unstyled mt-3">
                                    <!-- List Item for Inspected By -->
                                    <li class="d-flex align-items-center">
                                        <div class="card card-custom d-flex flex-row w-100">
                                            <div class="card-body d-flex justify-content-center align-content-center">
                                                <div>
                                                    <img src="../assets/images/productimg/inspected_by.svg" alt="Check points" class="img-fluid me-3">
                                                </div>
                                                <div>
                                                    <div class="fw-bold">Inspected By KenzWheels</div>
                                                </div>
                                            </div>
                                            <div class="ms-auto my-auto pe-3">
                                                <i class="fa fa-check-circle text-success fs-4"></i> <!-- Check icon for inspected -->
                                            </div>
                                        </div>
                                    </li>

                                    <!-- List Item for Docs Checked -->
                                    <li class="d-flex align-items-center">
                                        <div class="card card-custom d-flex flex-row w-100">
                                            <div class="card-body d-flex justify-content-center align-content-center">
                                                <div>
                                                    <img src="../assets/images/productimg/checked_by.svg" alt="Docs" class="img-fluid me-3">
                                                </div>
                                                <div>
                                                    <div class="fw-bold">Documents Checked</div>
                                                </div>
                                            </div>
                                            <div class="ms-auto my-auto pe-3">
                                                <i class="fa fa-check-circle text-success fs-4"></i> <!-- Check icon for docs -->
                                            </div>
                                        </div>
                                    </li>

                                    <!-- List Item for Secure Transaction -->
                                    <li class="d-flex align-items-center">
                                        <div class="card card-custom d-flex flex-row w-100">
                                            <div class="card-body d-flex justify-content-center align-content-center">
                                                <div>
                                                    <img src="../assets/images/productimg/secure_transaction.svg" alt="Secure" class="img-fluid me-3">
                                                </div>
                                                <div>
                                                    <div class="fw-bold">Secure Transaction</div>
                                                </div>
                                            </div>
                                            <div class="ms-auto my-auto pe-3">
                                                <!-- Secure Transaction with Check -->
                                                <!-- Secure Transaction - Wrong Tick Example -->
                                                <!-- <i class="fa fa-times-circle text-danger fs-4"></i> Show red cross for wrong or failed -->
                                                <i class="fa fa-check-circle text-success fs-4"></i> <!-- Show green check for secure -->
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <button class="btn bg-theme phone_number_btn" onclick="showSidebarNumber();">
                                <i class="fa fa-phone me-2 fs-4 rotate-icon"></i>
                                <span class="fs-5">04232560...</span><br>
                                <small>Show Phone Number</small>
                            </button>
                        </div>


                        <div class="well price-well text-center mb-3 p-3 position-relative">
                            <div class="owner-detail-head fs-5 fw-bold mb-3">Seller Details</div>

                            <div class="owner-detail-main">
                                <div class="owner-details tl nopad" itemscope itemtype="http://schema.org/AutoDealer">
                                    <div class="trusted-seller-outer text-center mb-3">
                                        <div class="trusted-seller">
                                            <i class="fa fa-certificate"></i> TRUSTED SELLER <i class="fa fa-certificate"></i>
                                        </div>
                                    </div>
                                    <meta itemprop="image" content="../assets/images/logo/logo.png">
                                    <div class="dealer-image mb-3">
                                        <a itemprop="url" href="/used-cars/dealers/KenzWheels-certified-Hyderabad-showroom-in-Hyderabad">
                                            <img alt="KenzWheels Hyderabad" class="img-fluid rounded" src="../assets/images/logo/logo.png" />
                                        </a>
                                    </div>
                                    <hr />
                                    <div class="seller-info">
                                        <div class="row">
                                            <div class="col-3 text-center fw-bold">Dealer:</div>
                                            <div class="col-9">
                                                <label itemprop="name">
                                                    <a itemprop="url" href="/used-cars/dealers/KenzWheels-certified-Hyderabad-showroom-in-Hyderabad">KenzWheels Hyderabad</a>
                                                    <i class="fa fa-check-circle varified-icon" title="Verified Dealer"></i>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3 text-center fw-bold">Address:</div>
                                            <div class="col-9">
                                                <label itemprop="address">37 Commercial Zone, Koti Market Hyderabad</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3 text-center fw-bold">Timings:</div>
                                            <div class="col-9">
                                                <label>09:00 AM to 09:00 PM</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <p class="more nomargin">
                                                    <a rel="nofollow" href="/used-cars/search/-/ds_KenzWheels-certified-Hyderabad/">more ads by KenzWheels Hyderabad »</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="user-verification text-center mt-3 list-unstyled d-flex justify-content-center">
                                    <li class="user-phone mx-3">
                                        <a href="#">
                                            <i class="fa fa-mobile-alt"></i> <!-- Changed to a more recognizable mobile icon -->
                                        </a>
                                    </li>
                                    <li class="user-email mx-3">
                                        <a href="#">
                                            <i class="fa fa-envelope"></i>
                                        </a>
                                    </li>
                                    <li class="user-fb mx-3">
                                        <a href="#">
                                            <i class="fab fa-facebook"></i> <!-- Ensure you're using the correct class for the Facebook icon -->
                                        </a>
                                    </li>
                                </ul>


                                <div class="registration-page registration-panel text-center mt-3">
                                    <div class="nomargin">See if your friends know this seller</div>
                                    <a class="connect-fb" href="/oauth/facebook?rdback=true">Connect with <strong>Facebook</strong></a>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php require_once '../includes/userfooter.php' ?>
<script src="../assets/lib/swiper/swiper-bundle.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    const API_BASE_URL = '<?php echo API_BASE_URL; ?>';
    const ProductThumbnail = '<?php echo ProductThumbnail; ?>';
    const ProductImages = '<?php echo ProductImages; ?>';
    const BrandLogo = '<?php echo BrandLogo; ?>';
</script>

<!-- Initialize Swiper -->
<script>
    $(document).ready(function() {
        // Use PHP to inject constants into JavaScript
        const PRODUCT_ID = <?php echo json_encode($product_id); ?>;
       
        // Fetch Product Details by product_id
        function fetchProductById(productId) {
            $.ajax({
                url: `${API_BASE_URL}/product/${productId}`, // Use API_BASE_URL for the API request
                type: 'GET',
                success: function(data) {
                    if (data && data.status === 200) {
                        const product = data.data[0]; // Assuming the product is in an array
                        const dealerId = product.dealer_id;

                        // Fetch dealer data
                        fetchDealerDetails(dealerId, product);

                        // Dynamically load product images
                        displayProductImages(product.images);

                    } else {
                        console.error('Invalid product data format:', data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching product:', error);
                }
            });
        }

        // Fetch Dealer Details using dealer_id
        function fetchDealerDetails(dealerId, product) {
            $.ajax({
                url: `${API_BASE_URL}/profile/${dealerId}`, // Use API_BASE_URL for the dealer request
                type: 'GET',
                success: function(data) {
                    if (data && data.statuscode === 200 && data.user) {
                        const dealer = data.user;
                        const location = `${dealer.address_line1}, ${dealer.city}, ${dealer.state}`;
                        $('#dealer-location').text(location); // Set dealer location in the page
                    } else {
                        console.error('Invalid dealer data format:', data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching dealer details:', error);
                }
            });
        }

        // Dynamically display product images in the Swiper galleries
        function displayProductImages(images) {
            const imagesUrl = `${ProductImages}`; // Use ProductImages constant for image base URL
            const productImagesWrapper = $('#product-images');
            const productThumbnailsWrapper = $('#product-thumbnails');

            images.forEach((image, index) => {
                const imageUrl = `${imagesUrl}${image.image_url}`;

                // Create the main image slide (to be added in the main gallery)
                const mainImageSlide = `
                    <div class="swiper-slide">
                        <img src="${imageUrl}" class="d-block w-100" alt="Product Image ${index + 1}" />
                    </div>
                `;
                productImagesWrapper.append(mainImageSlide);

                // Create the thumbnail image slide (for the thumbnail navigation)
                const thumbnailSlide = `
                    <div class="swiper-slide">
                        <img src="${imageUrl}" class="img-thumbnail" alt="Thumbnail ${index + 1}" />
                    </div>
                `;
                productThumbnailsWrapper.append(thumbnailSlide);
            });

            // Initialize Swipers after images are added dynamically
            initializeSwipers();
        }

        // Initialize the Swipers
        function initializeSwipers() {
            const swiper = new Swiper(".mySwiper", {
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesProgress: true,
            });

            const swiper2 = new Swiper(".mySwiper2", {
                spaceBetween: 10,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: swiper,
                },
            });
        }

        // Fetch product data on page load
        fetchProductById(PRODUCT_ID);
    });
</script>


<script>
    $(document).ready(function() {
        $('body').attr('data-spy', 'scroll');
        $("#scroll-sidebar").affix({
            offset: {
                // top: '270',
                bottom: '750',
                // top: $(".header").outerHeight(true)
            }
        });
    });

    $("#scroll-sidebar a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "20") {

            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function() {

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });

        } // End if

    });
</script>
<script>
    $('.nav-dropdown-menu').on('mouseover', function() {
        $(this).parent().addClass('open');
    });
    $('.nav-dropdown-menu').on('mouseout', function() {
        $(this).parent().removeClass('open');
    });
    $(document).ready(function() {
        $('#navbar_static_top').attr('data-offset-top', $('.advertisement').innerHeight() + $('.header').innerHeight());

        $("#user-menu,#lang-menu").click(function(e) {
            $(this).toggleClass("open");
            e.stopPropagation();
        });

    });
</script>

<script>
    $(document).ready(function() {
        // Initialize Owl Carousel for Similar Ads
        $('.similar-ads-carousel').owlCarousel({
            loop: false,
            margin: 2,
            autoplay: false,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });

        // Handle previous and next button clicks for Similar Ads Carousel
        $('.similar-ads-prev').click(function() {
            $('.similar-ads-carousel').trigger('prev.owl.carousel');
        });
        $('.similar-ads-next').click(function() {
            $('.similar-ads-carousel').trigger('next.owl.carousel');
        });

        // Update button visibility for Similar Ads Carousel
        function updateSimilarAdsButtonVisibility(event) {
            var carousel = event.relatedTarget;
            if (carousel.current() === 0) {
                $('.similar-ads-prev').addClass('disabled');
            } else {
                $('.similar-ads-prev').removeClass('disabled');
            }
            if (carousel.current() + carousel.settings.items >= carousel.items().length) {
                $('.similar-ads-next').addClass('disabled');
            } else {
                $('.similar-ads-next').removeClass('disabled');
            }
        }

        // Handle carousel change event for Similar Ads Carousel
        $('.similar-ads-carousel').on('changed.owl.carousel', updateSimilarAdsButtonVisibility);
    });
</script>