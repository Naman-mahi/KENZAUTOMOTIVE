<?php include_once('../includes/userheader.php'); ?>
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
    .breadcrumb {
        background-color: transparent;
    }

    .card-body p {
        margin: 0;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .list-group .list-group-item {
        background-color: #f3f3f4;
        border: none;
    }

    .card-img-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .table th,
    .table td {
        vertical-align: middle;
    }

    .number,
    .message {
        border-radius: 50px;
        padding: 12px 0;
    }

    .carousel-inner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .specs-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
        margin-bottom: 2rem;
    }

    @media (max-width: 768px) {
        .specs-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    .spec-item {
        text-align: center;
        padding: 1rem;
    }

    .spec-icon {
        color: #2962ff;
        margin-bottom: 0.5rem;
    }

    .spec-value {
        font-weight: 500;
        color: #333;
    }

    .details-table {
        border-spacing: 0 0.5rem;
        border-collapse: separate;
    }

    .details-table td {
        padding: 0.5rem 0;
    }

    .details-table td:first-child {
        color: #666;
        width: 40%;
    }

    .progress {
        height: 0.5rem;
    }

    .progress-bar {
        background-color: #2962ff;
    }

    .inspection-report {
        background-color: #f8f9ff;
        border-radius: 1rem;
        padding: 1.5rem;
        margin-top: 2rem;
    }

    .overall-rating {
        color: #2962ff;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .custom-breadcrumb {
        margin-left: 16%;
        /* Apply left margin */
    }

    @media (max-width: 576px) {
        .custom-breadcrumb {
            margin-left: 0;
            /* Remove margin on small devices */
        }
    }

    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .swiper {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-slide {
        background-size: cover;
        background-position: center;
    }

    .mySwiper2 {
        height: 80%;
        width: 100%;
    }

    .mySwiper {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
    }

    .mySwiper .swiper-slide {
        width: 25%;
        height: 100%;
        opacity: 0.4;
    }

    .mySwiper .swiper-slide-thumb-active {
        opacity: 1;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* .mySwiper2 {
    height: 35%;
    width: 82%;
} */
    /* Swiper navigation buttons */
    .swiper-button-next,
    .swiper-button-prev {
        width: 40px;
        height: 40px;
        background-color: #333;
        /* Dark background for a modern look */
        color: white;
        /* White icons for better contrast */
        border-radius: 50%;
        /* Rounded buttons for a sleek design */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        /* Soft shadow for a 3D effect */
        transition: background-color 0.3s ease, transform 0.3s ease;
        /* Smooth hover effect */
    }

    .badge {
        z-index: 10;
        /* Higher z-index to bring it in front */
    }

    /* Swiper navigation arrows */
    .swiper-button-prev:after,
    .swiper-rtl .swiper-button-next:after,
    .swiper-button-next:after {
        font-size: 20px;
        /* Larger arrow size */
        color: white;
        /* Arrow color */
    }

    /* Hover effect for the buttons */
    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        background-color: #007bff;
        /* Attractive blue color on hover */
        transform: scale(1.1);
        /* Slightly enlarge the button on hover */
        box-shadow: 0 6px 12px rgba(0, 123, 255, 0.4);
        /* Enhance shadow effect */
    }

    /* Active state for buttons */
    .swiper-button-next:active,
    .swiper-button-prev:active {
        transform: scale(1.05);
        /* Slightly reduced scaling when active */
        box-shadow: 0 3px 6px rgba(0, 123, 255, 0.6);
        /* Darker shadow effect */
    }
</style>
<div class="container my-5">
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
        <!-- Left Side Navigation (col-2) -->
        <div class="col-2 d-none d-md-block">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action border-0">
                    <i class="fas fa-caret-right"></i> Car Info
                </a>
                <a href="#" class="list-group-item list-group-item-action border-0">
                    <i class="fas fa-caret-right"></i> Car Details
                </a>
                <a href="#" class="list-group-item list-group-item-action border-0">
                    <i class="fas fa-caret-right"></i> Inspection Report
                </a>
                <a href="#" class="list-group-item list-group-item-action border-0">
                    <i class="fas fa-caret-right"></i> Seller's Comments
                </a>
                <a href="#" class="list-group-item list-group-item-action border-0">
                    <i class="fas fa-caret-right"></i> Similar Ads
                </a>
            </div>
        </div>

        <!-- Car Info and Main Image Section (col-7) -->
        <div class="col-md-7 col-10">
            <div class="card mb-3">
                <div class="title p-3">
                    <h3>Changan Alsvin 1.5L DCT Lumiere 2022</h3>
                    <p><i class="fas fa-map-marker-alt"></i> Sukh Chayn Gardens, Hyderabad, Punjab</p>
                </div>
                <div class="position-relative">
                    <span class="badge bg-danger position-absolute top-0 end-0 p-2">Featured</span>
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
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="../assets/images/logo/Hyundai.jpg" height="100px" width="140px" class="img-thumbnail" alt="Thumbnail 1" />
                            </div>
                            <div class="swiper-slide">
                                <img src="../assets/images/logo/Hyundai.jpg" height="100px" width="140px" class="img-thumbnail" alt="Thumbnail 2" />
                            </div>
                            <div class="swiper-slide">
                                <img src="../assets/images/logo/Hyundai.jpg" height="100px" width="140px" class="img-thumbnail" alt="Thumbnail 3" />
                            </div>
                            <div class="swiper-slide">
                                <img src="../assets/images/logo/Hyundai.jpg" height="100px" width="140px" class="img-thumbnail" alt="Thumbnail 4" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="container py-4">
                <!-- Key Specifications -->
                <div class="specs-grid">
                    <div class="spec-item">
                        <div class="spec-icon">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div class="spec-label">Year</div>
                        <div class="spec-value">2022</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-icon">
                            <i class="fas fa-road"></i>
                        </div>
                        <div class="spec-label">Mileage</div>
                        <div class="spec-value">127,811 km</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-icon">
                            <i class="fas fa-gas-pump"></i>
                        </div>
                        <div class="spec-label">Fuel</div>
                        <div class="spec-value text-primary">Petrol</div>
                    </div>
                    <div class="spec-item">
                        <div class="spec-icon">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div class="spec-label">Transmission</div>
                        <div class="spec-value text-primary">Automatic</div>
                    </div>
                </div>

                <!-- Vehicle Details -->
                <div class="row">
                    <div class="col-md-6">
                        <table class="details-table w-100">
                            <tr>
                                <td>Registered In</td>
                                <td>Hyderabad</td>
                            </tr>
                            <tr>
                                <td>Assembly</td>
                                <td>Local</td>
                            </tr>
                            <tr>
                                <td>Body Type</td>
                                <td class="text-primary">Sedan</td>
                            </tr>
                            <tr>
                                <td>Ad Ref #</td>
                                <td>9345084</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="details-table w-100">
                            <tr>
                                <td>Color</td>
                                <td>Space Gray</td>
                            </tr>
                            <tr>
                                <td>Engine Capacity</td>
                                <td>1500 cc</td>
                            </tr>
                            <tr>
                                <td>Last Updated</td>
                                <td>Oct 24, 2024</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Inspection Report -->
                <div class="inspection-report">
                    <h4>KenzWheels Inspection Report</h4>
                    <div class="text-muted mb-3">
                        Inspected Date: 10/22/24
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>Overall Rating</div>
                        <div class="overall-rating">7.8/10</div>
                    </div>

                    <!-- Progress Bars -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Exterior & Body</span>
                            <span>62%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width: 62%"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Engine/Transmission/Clutch</span>
                            <span>91%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width: 91%"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Suspension/Steering</span>
                            <span>95%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width: 95%"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Interior</span>
                            <span>95%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width: 95%"></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-2">
                            <span>AC/Heater</span>
                            <span>100%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="row g-2">
                        <div class="col-6">
                            <button class="btn btn-outline-primary w-100">Learn More</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-primary w-100">View Full Inspection Report</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Price and Seller Information Section (col-md-3) -->
        <div class="col-md-3 col-12 mt-4 mt-md-0">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <h4 class="text-success">INR 37.5 lacs</h4>
                    <p>Financing starts at INR 93,902/Month</p>
                    <button class="btn btn-primary number w-100 mb-3">04234509... <span class="fw-bold">Show Phone Number</span></button>
                    <button class="btn btn-outline-primary message w-100">Send Message</button>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5>Seller Details</h5>
                    <p><i class="fas fa-user"></i> Trusted Seller</p>
                    <p><strong>Dealer:</strong> KenzWheels Hyderabad</p>
                    <p><strong>Address:</strong> 37 Commercial Zone, Liberty Market Hyderabad</p>
                    <p><strong>Timings:</strong> 09:00 AM to 09:00 PM</p>
                    <button class="btn btn-primary w-100">More ads by KenzWheels Hyderabad</button>
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

<?php require_once '../includes/userfooter.php' ?>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

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