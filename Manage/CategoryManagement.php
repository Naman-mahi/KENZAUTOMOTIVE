<?php
include 'head.php';
include '../includes/db.php'; // Include your database connection file

// Fetch categories from the database
$sql = "SELECT `category_id`, `category_name` FROM `categories`";
$result = $conn->query($sql);
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Manage Categories</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Product Categories</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="mb-3 d-flex align-items-end">
                        <button type="button" class="btn rounded-0  btn-dark btn-sm waves-effect waves-light ms-auto" data-toggle="modal" data-target="#addCategoryModal">Add Category</button>
                    </div>
                </div>
            </div>
            <!-- Add Category Modal -->
            <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Add New Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addCategoryForm">
                                <div class="form-group">
                                    <label for="categoryName">Category Name</label>
                                    <input type="text" class="form-control" id="categoryName" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn rounded-0  btn-primary" id="submitCategory">Add Category</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    if ($result->num_rows > 0) {
                                        $counter = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>{$counter}</td>";
                                            echo "<td>{$row['category_name']}</td>";
                                            echo "<td>
                                                    <button class='btn rounded-0  btn-info btn-sm' onclick='viewCategory({$row['category_id']})'>
                                                        <i class='mdi mdi-eye'></i> View
                                                    </button>
                                                </td>";
                                            echo "</tr>";
                                            $counter++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>No categories found</td></tr>";
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body" id="category-details">
                            <h5 class="card-title">Product Category Details</h5>
                            <p id="details">Select a category to see the details.</p>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
            <script>
                document.getElementById('submitCategory').addEventListener('click', function() {
                    const categoryName = document.getElementById('categoryName').value;

                    // Show SweetAlert for confirmation
                    Swal.fire({
                        title: 'Are you sure?',
                        text: `You are about to add the category: ${categoryName}`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, add it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Perform AJAX request to add the category
                            fetch('functions/add_category.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                    },
                                    body: JSON.stringify({
                                        category_name: categoryName
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        $('#addCategoryModal').modal('hide'); // Close the modal
                                        Swal.fire(
                                            'Added!',
                                            'The category has been added.',
                                            'success'
                                        );
                                        // Optionally, refresh the category list here
                                    } else {
                                        Swal.fire('Error!', data.message, 'error');
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                        }
                    });
                });
            </script>
            <script>
                function viewCategory(categoryId) {
                    fetch(`functions/get_category_details.php?id=${categoryId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.category) {
                                const category = data.category;
                                const attributes = data.attributes;
                                const customAttributes = data.custom_attributes;

                                // Format attributes as badges
                                const attributeBadges = attributes.length > 0 ?
                                    attributes.map(attr => `<span class="badge fs-6 badge-soft-primary p-2 m-1">${attr}</span>`).join(' ') :
                                    'None';

                                // Format custom attributes with add button
                                const customAttributeList = customAttributes.length > 0 ?
                                    customAttributes.map(attr => `
                             <div class="d-flex align-items-center">
                                <span class="badge fs-6 badge-soft-warning p-2 m-1">${attr.attribute_name}</span>
                                <input type="hidden" id="customAttribute_${attr.product_id}" class="form-control" placeholder="" value="${attr.attribute_name}" />
                                <button class="btn rounded-0  btn-sm btn-success rounded-4 ms-2" onclick="addCustomAttribute(${categoryId}, '${attr.product_id}', document.getElementById('customAttribute_${attr.product_id}').value)">Add</button>
                            </div>
                        `).join(' ') :
                                    'None';

                                document.getElementById('details').innerHTML = `
                        <h2 class="mt-2"> ${category.category_name}</h2>
                        <strong>Product Attributes:</strong><br>
                        ${attributeBadges}<br>
                        <strong>Custom Attributes:</strong><br>
                        ${customAttributeList}
                        <br>
                        <input type="text" id="newAttributeName" class="form-control" placeholder="New Attribute" />
                        <button class="btn rounded-0  btn-primary mt-2" onclick="addCustomAttribute(${categoryId}, null, document.getElementById('newAttributeName').value)">Add Custom Attribute</button>
                    `;
                            } else {
                                document.getElementById('details').innerHTML = 'Category not found.';
                            }
                        })
                        .catch(error => console.error('Error fetching category details:', error));
                }

                function addCustomAttribute(categoryId, productId, attributeName) {
                    if (!attributeName) {
                        alert('Please enter a custom attribute name.');
                        return;
                    }

                    fetch('functions/add_custom_attribute.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `category_id=${categoryId}&attribute_name=${encodeURIComponent(attributeName)}`
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert(data.message);
                                // Refresh the category details to show the new attribute
                                viewCategory(categoryId);
                                if (productId) {
                                    document.getElementById(`customAttribute_${productId}`).value = ''; // Clear the input field next to the custom attribute
                                } else {
                                    document.getElementById('newAttributeName').value = ''; // Clear the main input field
                                }
                            } else {
                                alert(data.message);
                            }
                        })
                        .catch(error => console.error('Error adding custom attribute:', error));
                }
            </script>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<script>
    // Open Add Category Modal
    document.addEventListener('DOMContentLoaded', function() {
        const addCategoryButton = document.querySelector('.btn-dark'); // Button to open modal

        addCategoryButton.addEventListener('click', function() {
            // Reset the form fields
            document.getElementById('categoryName').value = '';
            // Show the modal
            $('#addCategoryModal').modal('show');
        });
    });
</script>
<!-- end main content-->
<?php
include 'footer.php';
?>