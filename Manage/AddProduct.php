<?php include 'head.php'; ?>
<style>
    .pager .finish {
        display: none;
        /* Initially hide the finish button */
    }

    .specification-item-custom {
        display: flex;
        margin-bottom: 1rem;
    }

    .specification-item-custom .form-control {
        flex: 1;
        /* Allow inputs to fill the space */
        margin-right: 0.5rem;
        /* Spacing between inputs */
    }
</style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Start Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Product</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="MyProducts.php">My Products</a></li>
                                <li class="breadcrumb-item active">Add Product</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add New Product</h4>

                            <form id="Product-form" action="submit_Product.php" method="post" enctype="multipart/form-data">
                                <div id="basic-pills-wizard" class="twitter-bs-wizard">
                                    <ul class="twitter-bs-wizard-nav">
                                        <?php
                                        $tabs = [
                                            'Product Details',
                                            'Product Specifications',
                                            'Product Features',
                                            'Upload Images'
                                        ];
                                        foreach ($tabs as $index => $tab) {
                                            echo '<li class="nav-item">
                                                    <a href="#' . strtolower(str_replace(' ', '-', $tab)) . '" class="nav-link' . ($index === 0 ? ' active' : '') . '" data-toggle="tab">
                                                        <span class="step-number">' . sprintf('%02d', $index + 1) . '</span>
                                                        <span class="step-title">' . $tab . '</span>
                                                    </a>
                                                  </li>';
                                        }
                                        ?>
                                    </ul>

                                    <div class="tab-content twitter-bs-wizard-tab-content">
                                        <!-- Product Details -->
                                        <div class="tab-pane active" id="product-details">
                                            <div class="row">
                                                <?php
                                                $fields = [
                                                    ['label' => 'Product Name', 'name' => 'product_name', 'type' => 'text', 'required' => true],
                                                    ['label' => 'Price', 'name' => 'price', 'type' => 'number', 'required' => true, 'step' => '0.01'],
                                                    ['label' => 'Color', 'name' => 'color', 'type' => 'text'],
                                                    ['label' => 'Description', 'name' => 'product_description', 'type' => 'textarea', 'required' => true]
                                                ];

                                                foreach ($fields as $field) {
                                                    echo '<div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="' . $field['name'] . '">' . $field['label'] . '</label>';
                                                    if ($field['type'] === 'textarea') {
                                                        echo '<textarea class="form-control" id="' . $field['name'] . '" name="' . $field['name'] . '" rows="3" required></textarea>';
                                                    } else {
                                                        echo '<input type="' . $field['type'] . '" class="form-control" id="' . $field['name'] . '" name="' . $field['name'] . '"' . (isset($field['step']) ? ' step="' . $field['step'] . '"' : '') . ' required>';
                                                    }
                                                    echo '</div>
                                                        </div>';
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <!-- Specifications -->
                                        <div class="tab-pane" id="product-specifications">
                                            <div class="row" id="specifications-container">
                                                <?php
                                                // HTML to display the existing specs
                                                foreach ($specs as $spec) {
                                                    echo '<div class="col-lg-6 specification-item mb-3">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="' . htmlspecialchars($spec['name']) . '">' . htmlspecialchars($spec['label']) . '</label>
                                                                <input type="text" class="form-control" id="' . htmlspecialchars($spec['name']) . '" name="' . htmlspecialchars($spec['id']) . '" required>
                                                            </div>
                                                        </div>';
                                                }
                                                ?>
                                                <br>

                                            </div>
                                            <div class="text-end">
                                                <button type="button" class="btn rounded-0  btn-primary" id="add-specification">Add Another Specification</button>
                                            </div>
                                        </div>

                                        <!-- Features -->
                                        <div class="tab-pane" id="product-features">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="top-features">Top Features</label>
                                                        <textarea class="form-control" id="top-features" name="top_features" rows="3" required></textarea>
                                                        <input type="hidden" name="category_id" value="<?= $categoryId ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="stand-out-features">Stand Out Features</label>
                                                        <textarea class="form-control" id="stand-out-features" name="stand_out_features" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Upload Images -->
                                        <div class="tab-pane" id="upload-images">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="images">Images</label>
                                                        <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple>
                                                        <small class="text-muted">You can upload multiple images.</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                        <li class="previous"><a href="javascript:void(0);" onclick="prevStep()">Previous</a></li>
                                        <li class="next"><a href="javascript:void(0);" onclick="nextStep()">Next</a></li>
                                        <li class="finish"><a href="javascript:void(0);" onclick="submitForm()">Finish</a></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#add-specification').click(function() {
            // Create a new specification input field pair
            const newSpec = `
                <div class="col-lg-6 specification-item-custom">
                    <input type="text" class="form-control" name="specification_labels[]" placeholder="Ex. Color" required>
                    <input type="text" class="form-control" name="specification_values[]" placeholder="Ex. Red" required>
                    <a type="button" class="btn rounded-0  text-danger btn-sm remove-specification"><i class="mdi mdi-delete-circle fs-3"></i> </a>
                </div>`;

            // Append the new specification to the container
            $('#specifications-container').append(newSpec);
        });

        // Event delegation for removing specification items
        $('#specifications-container').on('click', '.remove-specification', function() {
            $(this).closest('.specification-item').remove(); // Remove the specification
        });
    });

    function nextStep() {
        var $wizard = $('#basic-pills-wizard');
        var $tabs = $wizard.find('.twitter-bs-wizard-nav li');
        var $tabContent = $wizard.find('.tab-content');

        var currentIndex = $tabs.filter('.active').index();
        if (currentIndex < $tabs.length - 1) {
            $tabs.removeClass('active');
            $tabs.eq(currentIndex + 1).addClass('active');
            $tabContent.find('.tab-pane').removeClass('active');
            $tabContent.find('.tab-pane').eq(currentIndex + 1).addClass('active');
        }
    }

    function prevStep() {
        var $wizard = $('#basic-pills-wizard');
        var $tabs = $wizard.find('.twitter-bs-wizard-nav li');
        var $tabContent = $wizard.find('.tab-content');

        var currentIndex = $tabs.filter('.active').index();
        if (currentIndex > 0) {
            $tabs.removeClass('active');
            $tabs.eq(currentIndex - 1).addClass('active');
            $tabContent.find('.tab-pane').removeClass('active');
            $tabContent.find('.tab-pane').eq(currentIndex - 1).addClass('active');
        }
    }

    function submitForm() {
        if ($('#Product-form')[0].checkValidity()) {
            $('#Product-form').submit();
        } else {
            $('#Product-form')[0].reportValidity();
        }
    }
</script>

<?php include 'footer.php'; ?>