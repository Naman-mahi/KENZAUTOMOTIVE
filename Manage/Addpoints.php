<?php include 'includes/head.php'; ?>

<style>
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

    .image-wrapper {
        position: relative;
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
    }

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
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Inspection Points</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inspection</a></li>
                                <li class="breadcrumb-item active">Add Inspection Points</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="d-sm-flex align-items-center justify-content-end">
                        <button type="button" onclick="window.history.back();" class="btn btn-sm btn-dark me-2">Back</button>
                        <button type="button" onclick="window.location.href='InspectionAdd?product_id=<?php echo $product_id; ?>'" class="btn btn-sm btn-primary">Add Inspection</button>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="image-wrapper">
                                        <img src="assets/images/test.jpg" alt="Car Inspection Image" id="inspectionImage">
                                        <div class="dot-container" id="dotContainer"></div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button class="btn btn-danger btn-sm" id="page" onclick="location.reload()">Reset</button>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h4>Select a point to add a new inspection point</h4>
                                    <hr>
                                    <div id="pointsContent"></div>

                                    <div id="addPointForm" style="display: none;">
                                        <h3>Add New Inspection Point</h3>
                                        <form id="inspectionPointForm" enctype="multipart/form-data">
    <div class="form-group mb-3">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group mb-3">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
    </div>
    <input type="hidden" id="inspection_id" name="inspection_id" value="<?= $_GET['inspection_id'] ?? '' ?>">
    <input type="hidden" name="position_x" id="position_x">
    <input type="hidden" name="position_y" id="position_y">
    
    <!-- File upload or take picture option -->
    <div class="form-group mb-3">
        <label for="image_url">Take a Picture or Upload an Image</label>
        <input type="file" name="image_url" id="image_url" accept="image/*;capture=camera">
        <small class="text-muted">This image will help identify the inspection point. This image is optional.</small>
    </div>
    
    <input type="hidden" name="product_id" id="product_id" value="<?= $_GET['product_id'] ?? '' ?>">
    
    <div class="text-end mt-3">
        <button type="submit" class="btn btn-primary btn-sm">Add Point</button>
    </div>
</form>

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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const inspectionImage = document.getElementById('inspectionImage');
        const dotContainer = document.getElementById('dotContainer');
        const addPointForm = document.getElementById('addPointForm');
        const positionXInput = document.getElementById('position_x');
        const positionYInput = document.getElementById('position_y');
        const pointsContent = document.getElementById('pointsContent');
        const form = document.getElementById('inspectionPointForm');

        let activeDot = null;
        let dotPlaced = false;

        inspectionImage.addEventListener('click', function(event) {
            if (dotPlaced) return;

            const rect = inspectionImage.getBoundingClientRect();
            const x = (event.clientX - rect.left) / rect.width * 100;
            const y = (event.clientY - rect.top) / rect.height * 100;

            positionXInput.value = x.toFixed(2);
            positionYInput.value = y.toFixed(2);

            if (activeDot) {
                dotContainer.removeChild(activeDot);
            }

            addDot(x, y);
            dotPlaced = true;
            addPointForm.style.display = 'block';
        });

        function addDot(x, y) {
            const dot = document.createElement('div');
            dot.classList.add('dot');
            dot.style.left = `${x}%`;
            dot.style.top = `${y}%`;

            dot.addEventListener('click', function() {
                if (activeDot !== dot) {
                    if (activeDot) {
                        activeDot.classList.remove('active');
                    }
                    activeDot = dot;
                    dot.classList.add('active');
                }
            });

            dotContainer.appendChild(dot);
            activeDot = dot;
            dot.classList.add('active');
        }

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(form); // FormData automatically handles file uploads

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to add this inspection point?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('functions/add_point.php', {
                            method: 'POST',
                            body: formData // FormData automatically sends both text fields and the file
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire(
                                    'Success!',
                                    'Inspection point added successfully.',
                                    'success'
                                ).then(() => {
                                    form.reset();
                                    addPointForm.style.display = 'none';
                                    dotPlaced = false;
                                    if (activeDot) {
                                        dotContainer.removeChild(activeDot);
                                        activeDot = null;
                                    }
                                });
                            } else {
                                throw new Error(data.error || 'Failed to add inspection point');
                            }
                        })
                        .catch(error => {
                            Swal.fire(
                                'Error!',
                                error.message,
                                'error'
                            );
                        });
                }
            });
        });



    });
</script>

<?php include 'includes/footer.php'; ?>