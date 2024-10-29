<?php include_once('../includes/userheader.php'); ?>
<link rel="stylesheet" href="../assets/css/viewproduct.css">
<link rel="stylesheet" href="../assets/lib/swiper/swiper-bundle.min.css">
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
        <div class="col-2 d-none d-md-block">
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
                <div class="col-lg-7">
                    <div id="scroll_car_info" class="card mb-3">
                        <div class="title p-3">
                            <h3>Changan Alsvin 1.5L DCT Lumiere 2022</h3>
                            <p><i class="fas fa-map-marker-alt"></i> Sukh Chayn Gardens, Hyderabad, Punjab</p>
                        </div>
                        <div class="position-relative">
                            <!-- <span class="badge bg-danger position-absolute top-0 start-0 p-2 ms-2">Featured</span> -->
                            <div class="featured-ribbon pointer">
                                <div class="ib lg-popover featured-popover" data-toggle="popover"
                                    data-placement="auto right" data-html="true">
                                    <div class="inner">
                                        FEATURED
                                        <i class="fa fa-exclamation-circle"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- <span class="position-absolute top-0 end-0 p-2" style="z-index: 10;">
                                <i class="far fa-bookmark" title="Save Bookmark" style="color: red; font-size: larger;"></i>
                                <i class="far fa-heart ms-2" title="Add to Wishlist" style="color: red; font-size: larger;"></i>
                            </span> -->
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="../assets/images/logo/Hyundai.jpg" class="d-block w-100" alt="Main Car Image" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="../assets/images/logo/Hyundai.jpg" class="d-block w-100" alt="Car Image 2" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="../assets/images/logo/Hyundai.jpg" class="d-block w-100" alt="Car Image 3" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="../assets/images/logo/Hyundai.jpg" class="d-block w-100" alt="Car Image 4" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="../assets/images/logo/Hyundai.jpg" class="d-block w-100" alt="Car Image 5" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="../assets/images/logo/Hyundai.jpg" class="d-block w-100" alt="Car Image 6" />
                                    </div>
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div thumbsSlider="" class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="../assets/images/logo/Hyundai.jpg" class="img-thumbnail" alt="Thumbnail 1" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="../assets/images/logo/Hyundai.jpg" class="img-thumbnail" alt="Thumbnail 2" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="../assets/images/logo/Hyundai.jpg" class="img-thumbnail" alt="Thumbnail 3" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="../assets/images/logo/Hyundai.jpg" class="img-thumbnail" alt="Thumbnail 4" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="../assets/images/logo/Hyundai.jpg" class="img-thumbnail" alt="Thumbnail 5" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="../assets/images/logo/Hyundai.jpg" class="img-thumbnail" alt="Thumbnail 6" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- engine details start -->
                        <div id="ul-featured" class="row table-engine-detail my-3">
                            <div class="col-6 col-md-3 text-center border-3">
                                <span class="engine-icon year"></span>
                                <p>
                                    <a title="Year 2011 Cars for sale in Pakistan" href="/used-cars/2011/266226">2011</a>
                                </p>
                            </div>
                            <div class="col-6 col-md-3 text-center">
                                <span class="engine-icon millage"></span>
                                <p>167,590 km</p>
                            </div>
                            <div class="col-6 col-md-3 text-center">
                                <span class="engine-icon type"></span>
                                <p>
                                    <a title="Petrol Cars for Sale in Pakistan" href="/used-cars/petrol/57338">Petrol</a>
                                </p>
                            </div>
                            <div class="col-6 col-md-3 text-center">
                                <span class="engine-icon transmission"></span>
                                <p>
                                    <a title="Automatic Cars for Sale in Pakistan" href="/used-cars/automatic/57336">Automatic</a>
                                </p>
                            </div>
                        </div>
                        <!-- engine details End -->
                        <ul class="list-unstyled ul-featured row" id="scroll_car_detail">
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
                                <a title="Off-Road Vehicles for sale in Pakistan" href="/used-cars/off-road-vehicles/115010">Off-Road Vehicles</a>
                            </li>

                            <li class="col-6 col-md-3 ad-data">Last Updated:</li>
                            <li class="col-6 col-md-3">Oct 28, 2024</li>

                            <li class="col-6 col-md-3 ad-data">Ad Ref #</li>
                            <li class="col-6 col-md-3">9251457</li>
                        </ul>


                        <div id="scroll_carsure_report" class="carsure-detail mt-3 inspection-summary-widget">
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
                            <div class="carsure-detail-footer d-flex justify-content-between mt-3">
                                <a class="btn btn-outline-primary" href="/products/KenzWheels-inspection/" target="_blank">Learn More</a>
                                <a rel="nofollow" target="_blank" class="btn btn-primary fs-16" href="">View Full Inspection Report</a>
                            </div>
                        </div>

                        <h2 class="ad-detail-heading mt-4 ps-3">Car Features</h2>
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

                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card mb-3">
                        <div class="card-body text-center">
                            <h4 class="text-success">INR 37.5 lacs</h4>
                            <p>Financing starts at INR 93,902/Month</p>
                            <span class="phone-number fw-bold">04234509...</span>
                            <button class="btn btn-outline-primary">Show Phone Number</button>
                            <!-- <button class="btn btn-primary message w-100">Send Message</button> -->
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>Seller Details</h5>
                            <p><i class="fas fa-user"></i> Trusted Seller</p>
                            <p><strong>Dealer:</strong> KenzWheels Hyderabad</p>
                            <p><strong>Address:</strong> 37 Commercial Zone, Liberty Market Hyderabad</p>
                            <p><strong>Timings:</strong> 09:00 AM to 09:00 PM</p>
                            <button class="btn btn-primary">More ads by KenzWheels Hyderabad</button>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body text-center">
                            <p><strong>Buy Managed By KenzWheels</strong></p>
                            <p><i class="fas fa-check-circle"></i> Inspected by KenzWheels</p>
                            <p><i class="fas fa-check-circle"></i> Documents Checked</p>
                            <p><i class="fas fa-check-circle"></i> Secure Transaction</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/userfooter.php' ?>
<script src="../assets/lib/swiper/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
</script>
<script>
    $(document).ready(function() {
        $('body').attr('data-spy', 'scroll');
        $("#scroll-sidebar").affix({
            offset: {
                top: '270',
                bottom: '690'
                // top: $(".header").outerHeight(true)
            }
        });
    });
    $("#scroll-sidebar a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {

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