<?php
include 'includes/head.php';
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
                            text: 'Product added successfully!',
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
                            text: 'There was an error adding the Product. Please try again.',
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
                        <h4 class="mb-sm-0">My Spare Parts</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">My Spare Parts</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-3 d-flex align-items-end">
                        <a href="AddProduct?category_id=4" type="button" class="btn rounded-0  btn-dark btn-sm waves-effect waves-light ms-auto">Add Spare Parts</a>
                    </div>
                </div>
            </div>

            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card  bg-light">
                        <div class="card-body">

                            <div class="row">
                                <?php
                                $dealer_id = $_SESSION['user_id'];
                                $product_category_id = 4;
                                // Fetch product records from the database
                                $sql = "
    SELECT *
    FROM products 
    WHERE dealer_id = ? And category_id = ?
";

                                // Prepare and execute the statement
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("ii", $dealer_id, $product_category_id); // Assuming dealer_id is an integer
                                $stmt->execute();
                                $result = $stmt->get_result();


                                // Check if there are results
                                if ($result->num_rows > 0) {
                                    // Output data for each row
                                    while ($row = $result->fetch_assoc()) {
                                        // Extract data
                                        $id = $row['product_id'];
                                        $category_id = $row['category_id'];
                                        $product_name = htmlspecialchars($row['product_name']);
                                        $product_description = htmlspecialchars($row['product_description']);
                                        $image = htmlspecialchars($row['product_image']);
                                        $image_path = 'uploads/ProductThumbnail/' . $image; // Updated path for products

                                        // Generate HTML for each product
                                        echo '
            <div class="col-md-6 mb-4 col-lg-4 col-xl-3">
                <a href="ProductDetails.php?id=' . $id . '&category_id=' . $category_id . '" class="card-link">
                    <div class="card card-car h-100"> <!-- Changed class name to card-product -->
                        <div class="card-img-wrapper">
                            <img class="card-img-top car img-fluid" src="' . $image_path . '" alt="' . $product_name . '">
                            <div class="tooltip">View Product</div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title">' . $product_name . '</h4>
                        </div>
                    </div>
                </a>
            </div>';
                                    }
                                } else {

                                ?>
                                    <div class="text-center py-5">

                                        <h3 class="text-center">No Spare Parts found</h3>
                                        <br>
                                        <a href="AddProduct?category_id=4" type="button" class="btn rounded-0  btn-dark btn-sm waves-effect waves-light ms-auto">Add Spare Parts</a>
                                    </div>
                                <?php

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
include 'includes/footer.php';
?>