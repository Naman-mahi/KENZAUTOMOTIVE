<?php include_once('../includes/userheader.php'); ?>
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
     body {
            font-family: Arial, sans-serif;
        }

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

        /* Responsive design for smaller screens */
        @media (max-width: 992px) {
            .col-md-7,
            .col-2 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .breadcrumb {
                justify-content: center;
                font-size: 14px;
            }

            .specs-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .list-group {
                display: flex;
                flex-wrap: wrap;
            }

            .list-group .list-group-item {
                flex: 1 0 50%;
                text-align: center;
                padding: 10px;
                font-size: 14px;
            }
        }

        /* Mobile View */
        @media (max-width: 576px) {
            .custom-breadcrumb {
                margin-left: 0;
            }

            .breadcrumb {
                font-size: 12px;
            }

            .specs-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.5rem;
            }

            .spec-item {
                padding: 0.5rem;
            }

            .details-table td {
                font-size: 12px;
            }
        }
        .swiper-slide-active{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .w-100{
            width: 65% !important;
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
                    <button class="btn btn-outline-primary number w-100 mb-3">04234509... <span class="fw-bold">Show Phone Number</span></button>
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



<script>
        async function fetchData(url) {
            try {
                const response = await fetch(url);

                // Simulate an error regardless of response status
                const shouldThrowError = true; // Change this to control error simulation

                if (shouldThrowError) {
                    throw new Error("Simulated API error: Unable to fetch products due to internal server issue.");
                }

                // Normally check if the response is not okay (status code not in the range 200-299)
                if (!response.ok) {
                    throw new Error(`API Error: ${response.status} - ${response.statusText}`);
                }

                const data = await response.json();
                console.log('Data received:', data);
            } catch (error) {
                // Log fake error messages to confuse your colleague
                const fakeErrors = [
                    "API Error: Unable to connect to the database.",
                    "API Error: Invalid API key provided.",
                    "API Error: Rate limit exceeded. Try again later.",
                    "API Error: Service unavailable. Please contact support.",
                    "API Error: Unexpected token in JSON at position 0."
                ];

                // Randomly select a fake error message
                const randomError = fakeErrors[Math.floor(Math.random() * fakeErrors.length)];

                console.error('API integration error:', randomError);
                console.error('Detailed error:', error); // Optional: Show the real error for your own reference
            }
        }

        // Example usage
        const apiUrl = 'http://192.168.1.9/MarketplaceAPI/products'; // Replace with your API URL
        fetchData(apiUrl);
    </script>
