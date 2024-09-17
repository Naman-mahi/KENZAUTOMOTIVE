<?php
include 'head.php';
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Check if there's a status query parameter
                    const urlParams = new URLSearchParams(window.location.search);
                    const status = urlParams.get('status');

                    if (status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Car added successfully!',
                            timer: 3000, // Auto close after 3 seconds
                            showConfirmButton: false
                        }).then(() => {
                            // Remove the 'status' query parameter from the URL
                            urlParams.delete('status');
                            window.history.replaceState({}, document.title, window.location.pathname + '?' + urlParams.toString());
                        });
                    } else if (status === 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'There was an error adding the car. Please try again.',
                            timer: 3000, // Auto close after 3 seconds
                            showConfirmButton: false
                        }).then(() => {
                            // Remove the 'status' query parameter from the URL
                            urlParams.delete('status');
                            window.history.replaceState({}, document.title, window.location.pathname + '?' + urlParams.toString());
                        });
                    }
                });
            </script>

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">My Cars</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">My Cars</a></li>
                                <li class="breadcrumb-item active">My Cars</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-end">
                        <a href="NewCar.php" type="button" class="btn btn-dark btn-sm waves-effect waves-light ms-auto">Add Car</a>
                    </div>
                </div>
            </div>

            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!-- Car 1 -->
                                <div class="col-md-6 mb-3 col-lg-4 col-xl-3">
                                    <a href="CarDetails.php?id=1" class="card-link">
                                        <div class="card card-car">
                                            <div class="card-img-wrapper">
                                                <img class="card-img-top car img-fluid" src="assets/images/car/car-1.jpg" alt="Car 1">
                                                <div class="tooltip">View Car</div>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Tesla Model S</h4>
                                                <p class="card-text">Electric sedan with high performance and long range.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <!-- Car 2 -->
                                <div class="col-md-6 mb-3 col-lg-4 col-xl-3">
                                    <a href="CarDetails.php?id=2" class="card-link">
                                        <div class="card card-car">
                                            <div class="card-img-wrapper">
                                                <img class="card-img-top car img-fluid" src="assets/images/car/car-2.webp" alt="Car 2">
                                                <div class="tooltip">View Car</div>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">BMW 3 Series</h4>
                                                <p class="card-text">Luxury sedan known for its driving dynamics.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <!-- Car 3 -->
                                <div class="col-md-6 mb-3 col-lg-4 col-xl-3">
                                    <a href="CarDetails.php?id=3" class="card-link">
                                        <div class="card card-car">
                                            <div class="card-img-wrapper">
                                                <img class="card-img-top car img-fluid" src="assets/images/car/car-3.webp" alt="Car 3">
                                                <div class="tooltip">View Car</div>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Audi A4</h4>
                                                <p class="card-text">Stylish and comfortable with advanced tech features.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <!-- Car 4 -->
                                <div class="col-md-6 mb-3 col-lg-4 col-xl-3">
                                    <a href="CarDetails.php?id=4" class="card-link">
                                        <div class="card card-car">
                                            <div class="card-img-wrapper">
                                                <img class="card-img-top car img-fluid" src="assets/images/car/car-4.jpg" alt="Car 4">
                                                <div class="tooltip">View Car</div>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Mercedes-Benz C-Class</h4>
                                                <p class="card-text">Elegant sedan with a refined interior and smooth ride.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <!-- Car 5 -->
                                <div class="col-md-6 mb-3 col-lg-4 col-xl-3">
                                    <a href="CarDetails.php?id=5" class="card-link">
                                        <div class="card card-car">
                                            <div class="card-img-wrapper">
                                                <img class="card-img-top car img-fluid" src="assets/images/car/car-5.webp" alt="Car 5">
                                                <div class="tooltip">View Car</div>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Ford Mustang</h4>
                                                <p class="card-text">Iconic muscle car with powerful performance.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <!-- Car 6 -->
                                <div class="col-md-6 mb-3 col-lg-4 col-xl-3">
                                    <a href="CarDetails.php?id=6" class="card-link">
                                        <div class="card card-car">
                                            <div class="card-img-wrapper">
                                                <img class="card-img-top car img-fluid" src="assets/images/car/car-6.jpg" alt="Car 6">
                                                <div class="tooltip">View Car</div>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Honda Civic</h4>
                                                <p class="card-text">Compact car known for its reliability and fuel efficiency.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <!-- Car 7 -->
                                <div class="col-md-6 mb-3 col-lg-4 col-xl-3">
                                    <a href="CarDetails.php?id=7" class="card-link">
                                        <div class="card card-car">
                                            <div class="card-img-wrapper">
                                                <img class="card-img-top car img-fluid" src="assets/images/car/car-7.jpg" alt="Car 7">
                                                <div class="tooltip">View Car</div>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Chevrolet Camaro</h4>
                                                <p class="card-text">Muscle car with aggressive styling and strong performance.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <!-- Car 8 -->
                                <div class="col-md-6 mb-3 col-lg-4 col-xl-3">
                                    <a href="CarDetails.php?id=8" class="card-link">
                                        <div class="card card-car">
                                            <div class="card-img-wrapper">
                                                <img class="card-img-top car img-fluid" src="assets/images/car/car-8.jpg" alt="Car 8">
                                                <div class="tooltip">View Car</div>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Porsche 911</h4>
                                                <p class="card-text">High-performance sports car with iconic design.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <!-- Car 9 -->
                                <div class="col-md-6 mb-3 col-lg-4 col-xl-3">
                                    <a href="CarDetails.php?id=9" class="card-link">
                                        <div class="card card-car">
                                            <div class="card-img-wrapper">
                                                <img class="card-img-top car img-fluid" src="assets/images/car/car-9.jpg" alt="Car 9">
                                                <div class="tooltip">View Car</div>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Subaru WRX</h4>
                                                <p class="card-text">Rally-inspired car with all-wheel drive and turbocharged engine.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <!-- Car 10 -->
                                <div class="col-md-6 mb-3 col-lg-4 col-xl-3">
                                    <a href="CarDetails.php?id=10" class="card-link">
                                        <div class="card card-car">
                                            <div class="card-img-wrapper">
                                                <img class="card-img-top car img-fluid" src="assets/images/car/car-10.webp" alt="Car 10">
                                                <div class="tooltip">View Car</div>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Toyota Supra</h4>
                                                <p class="card-text">Sports car with a powerful engine and sharp handling.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>


                            </div>
                            <br><br><br>
                            <div class="row">
                                <?php
                                include '../includes/db.php'; // Adjust to your database connection file

                                // Fetch car records from the database
                                $sql = "SELECT * FROM cars";
                                $result = $conn->query($sql);

                                // Check if there are results
                                if ($result->num_rows > 0) {
                                    // Output data for each row
                                    while ($row = $result->fetch_assoc()) {
                                        // Extract data
                                        $id = $row['carid']; // Assuming you have an 'id' field
                                        $car_name = htmlspecialchars($row['car_name']);
                                        $car_description = htmlspecialchars($row['car_description']);
                                        $desktop_image = htmlspecialchars($row['desktop_image']); // Assuming desktop image filename is stored here
                                        $mobile_image = htmlspecialchars($row['mobile_image']); // Assuming mobile image filename is stored here
                                        $image_path = 'assets/images/car/' . $desktop_image; // Update this path as needed

                                        // Generate HTML for each car
                                        echo '
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
            <a href="CarDetails.php?id=' . $id . '" class="text-decoration-none">
                <div class="card">
                    <picture>
                        <source srcset="' . $image_path . '" media="(min-width: 768px)">
                        <img src="' . $image_path . '" class="card-img-top img-fluid" alt="' . $car_name . '">
                    </picture>
                    <div class="card-body">
                        <h5 class="card-title">' . $car_name . '</h5>
                        <p class="card-text">' . $car_description . '</p>
                    </div>
                </div>
            </a>
        </div>';
                                    }
                                } else {
                                    echo "<p>No cars found</p>";
                                }

                                $conn->close();
                                ?>

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
include 'footer.php';
?>