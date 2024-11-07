<?php
include 'includes/head.php';
?>
<style>
    /* Style for the dot */
    .dot {
        position: absolute;
        width: 10px;
        height: 10px;
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
<?php
// SQL query to fetch all points
$inspection_id = $_GET['inspection_id'];
$sql = "SELECT * FROM inspection_car_points where inspection_id = $inspection_id";
$result = $conn->query($sql);

// Store points in an array
$points = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $points[] = $row;
    }
} else {
    echo "No points found.";
}
?>


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Payments</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Payments</a></li>
                                <li class="breadcrumb-item active">Payments</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="image-wrapper">
                                        <img src="assets/images/test.jpg" alt="Car Inspection Image" class="img-fluid">

                                        <!-- Dots with their positions -->
                                        <div class="dot-container">
                                            <?php foreach ($points as $point): ?>
                                                <div class="dot" data-point="<?= $point['point_id']; ?>"
                                                    style="top: <?= $point['position_y']; ?>%; left: <?= $point['position_x']; ?>%;"></div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Content for each point -->
                                    <?php foreach ($points as $point): ?>
                                        <div id="point<?= $point['point_id']; ?>" class="point-content">
                                            <h3><?= htmlspecialchars($point['title']); ?></h3>
                                            <img src="<?= htmlspecialchars($point['image_url']); ?>" alt="<?= htmlspecialchars($point['title']); ?>">
                                            <p><?= htmlspecialchars($point['description']); ?></p>
                                        </div>
                                    <?php endforeach; ?>
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