<?php
include 'includes/head.php';
?>
<style>
    /* Style for the dot */
    .dot {
        position: absolute;
        width: 15px;
        height: 15px;
        background-color: red;
        border-radius: 50%;
        cursor: pointer;
        z-index: 100;
    }

    .dot.active {
        background-color: #007bff;
    }

    .point-content {
        display: none;
    }

    .point-content.active {
        display: block;
    }

    .point-content img {
        max-width: 100%;
        height: auto;
        margin-bottom: 15px;
    }

    /* Container for image and dots */
    .image-wrapper {
        position: relative;
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
    }

    /* Make image responsive */
    .image-wrapper img {
        width: 100%;
        height: auto;
        display: block;
    }
</style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="image-wrapper">
                                        <img src="assets/images/test.jpg" alt="test" class="img-fluid">

                                        <!-- Dots with their tooltips -->
                                        <div class="dot-container">
                                            <div class="dot" data-point="1" style="top: 20%; left: 30%;"></div>
                                            <div class="dot" data-point="2" style="top: 40%; left: 50%;"></div>
                                            <div class="dot" data-point="3" style="top: 60%; left: 70%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Content for each point -->
                                    <div id="point1" class="point-content">
                                        <h3>Point 1</h3>
                                        <img src="assets/images/point-1.jpeg" alt="Point 1 illustration">
                                        <p>Detailed information about point 1 goes here.</p>
                                    </div>

                                    <div id="point2" class="point-content">
                                        <h3>Point 2</h3>
                                        <img src="assets/images/point-2.jpeg" alt="Point 2 illustration">
                                        <p>Detailed information about point 2 goes here.</p>
                                    </div>

                                    <div id="point3" class="point-content">
                                        <h3>Point 3</h3>
                                        <img src="assets/images/point-3.jpeg" alt="Point 3 illustration">
                                        <p>Detailed information about point 3 goes here.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include 'includes/footer.php';
        ?>

        <script>
            document.querySelectorAll('.dot').forEach(dot => {
                // Show content on hover
                dot.addEventListener('mouseenter', function() {
                    showPoint(this.dataset.point);
                });

                // Handle click for mobile devices
                dot.addEventListener('click', function(e) {
                    e.stopPropagation();
                    showPoint(this.dataset.point);
                });
            });

            function showPoint(pointNumber) {
                // Remove active class from all dots and contents
                document.querySelectorAll('.dot').forEach(d => d.classList.remove('active'));
                document.querySelectorAll('.point-content').forEach(content => content.classList.remove('active'));

                // Add active class to clicked dot and its content
                document.querySelector(`.dot[data-point="${pointNumber}"]`).classList.add('active');
                document.querySelector(`#point${pointNumber}`).classList.add('active');
            }

            // Hide content when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.dot')) {
                    document.querySelectorAll('.dot').forEach(d => d.classList.remove('active'));
                    document.querySelectorAll('.point-content').forEach(content => content.classList.remove('active'));
                }
            });
        </script>