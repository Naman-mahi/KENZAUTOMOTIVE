<?php include 'head.php'; ?>
<style>
    
</style>



<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
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
                                                                <input type="text" class="form-control" id="' . htmlspecialchars($spec['name']) . '" name="' . htmlspecialchars($spec['name']) . '" required>
                                                            </div>
                                                        </div>';
                                                }
                                                ?>
                                            </div>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-primary" id="add-specification">Add Another Specification</button>
                                            </div>
                                        </div>

                                        <!-- Product Features -->
                                        <div class="tab-pane" id="product-features">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="top-features">Top Features</label>
                                                        <textarea class="form-control" id="top-features" name="top_features" rows="3" required></textarea>
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
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let specCount = <?php echo count($specs); ?>; // Start from the existing count of specs

        $('#add-specification').click(function() {
            specCount++; // Increment the spec count

            // Create a new specification input field
            const newSpec = `
                <div class="col-lg-6 specification-item mb-3">
                    <div class="mb-3">
                        <label class="form-label" for="specification-${specCount}">Specification ${specCount}</label>
                        <input type="text" class="form-control" id="specification-${specCount}" name="specifications[]" required>
                    </div>
                    <button type="button" class="btn btn-danger remove-specification">Remove</button>
                </div>
            `;

            // Append the new specification field to the container
            $('#specifications-container').append(newSpec);
        });

        // Handle the remove button click
        $(document).on('click', '.remove-specification', function() {
            $(this).closest('.specification-item').remove(); // Remove the entire specification item
        });
    });

    // Functions for wizard navigation
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

            $('.pager .finish').toggle(currentIndex + 1 === $tabs.length - 1);
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

            $('.pager .finish').toggle(currentIndex - 1 === $tabs.length - 1);
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
