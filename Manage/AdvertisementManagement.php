<?php
include 'head.php';
include '../includes/db.php'; // Include your database connection file

// Fetch advertisements from the database
$sql = "SELECT `id`, `title`, `description`, `image`, `link`, `start_date`, `end_date`, `created_at`, `updated_at` FROM advertisements WHERE 1";
$result = $conn->query($sql);
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Advertisements Management</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Advertisements Management</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End page title -->

            <div class="row">
                <div class="col-12">
                    <div class="mb-3 d-sm-flex align-items-center justify-content-end">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addAdvertisementModal">
                            Add New Advertisement
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Link</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    if ($result->num_rows > 0) {
                                        $counter = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            $status = (strtotime($row['end_date']) > time()) ? 'active' : 'inactive';
                                            $color = ($status === 'active') ? 'text-success' : 'text-danger';
                                            echo "<tr data-ad-id='{$row['id']}' data-ad-title='{$row['title']}' data-ad-description='{$row['description']}' data-ad-image='{$row['image']}' data-ad-link='{$row['link']}' data-ad-start='{$row['start_date']}' data-ad-end='{$row['end_date']}' data-status='{$status}'>";
                                            echo "<td>{$counter}</td>";
                                            echo "<td>{$row['title']}</td>";
                                            echo "<td>{$row['description']}</td>";
                                            echo "<td><img src='{$row['image']}' alt='Image' width='50'></td>";
                                            echo "<td><a href='{$row['link']}' target='_blank'>View</a></td>";
                                            echo "<td>" . date('d M, Y', strtotime($row['start_date'])) . "</td>";
                                            echo "<td>" . date('d M, Y', strtotime($row['end_date'])) . "</td>";
                                            echo "<td>
                                            <i class='mdi mdi-checkbox-blank-circle me-1 {$color}'></i> {$status}
                                            </td>";
                                            echo "<td>
                                                <a href='ViewAdvertisement.php?id={$row['id']}' class='btn rounded-0 btn-info btn-sm'>
                                                    <i class='mdi mdi-eye'></i> View
                                                </a>
                                                <button onclick='editAdvertisement({$row['id']}, this)' class='btn rounded-0 btn-warning btn-sm'>
                                                    <i class='mdi mdi-pencil'></i> Edit
                                                </button>
                                            </td>";
                                            echo "</tr>";
                                            $counter++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='9'>No advertisements found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page-content -->

        <!-- Add Advertisement Modal -->
        <div class="modal fade" id="addAdvertisementModal" tabindex="-1" role="dialog" aria-labelledby="addAdvertisementModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addAdvertisementModalLabel">Add New Advertisement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addAdvertisementForm">
                            <div class="form-group">
                                <label for="addAdTitle">Title</label>
                                <input type="text" class="form-control" id="addAdTitle" required>
                            </div>
                            <div class="form-group">
                                <label for="addAdDescription">Description</label>
                                <textarea class="form-control" id="addAdDescription" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="addAdImage">Image URL</label>
                                <input type="file" class="form-control" id="addAdImage" required>
                            </div>
                            <div class="form-group">
                                <label for="addAdLink">Link</label>
                                <input type="text" class="form-control" id="addAdLink" required>
                            </div>
                            <div class="form-group">
                                <label for="addStartDate">Start Date</label>
                                <input type="datetime-local" class="form-control" id="addStartDate" required>
                            </div>
                            <div class="form-group">
                                <label for="addEndDate">End Date</label>
                                <input type="datetime-local" class="form-control" id="addEndDate" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn rounded-0 btn-primary" id="submitAdvertisement">Add Advertisement</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Advertisement Modal -->
        <div class="modal fade" id="editAdvertisementModal" tabindex="-1" role="dialog" aria-labelledby="editAdvertisementModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAdvertisementModalLabel">Edit Advertisement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editAdvertisementForm">
                            <div class="form-group">
                                <label for="editAdTitle">Title</label>
                                <input type="text" class="form-control" id="editAdTitle" required>
                            </div>
                            <div class="form-group">
                                <label for="editAdDescription">Description</label>
                                <textarea class="form-control" id="editAdDescription" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="editAdImage">Image</label>
                                <input type="file" class="form-control" id="editAdImage" required>
                            </div>
                            <div class="form-group">
                                <label for="editAdLink">Link</label>
                                <input type="text" class="form-control" id="editAdLink" required>
                            </div>
                            <div class="form-group">
                                <label for="editStartDate">Start Date</label>
                                <input type="datetime-local" class="form-control" id="editStartDate" required>
                            </div>
                            <div class="form-group">
                                <label for="editEndDate">End Date</label>
                                <input type="datetime-local" class="form-control" id="editEndDate" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn rounded-0 btn-primary" id="updateAdvertisement">Update Advertisement</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Open Add Advertisement Modal
                const addAdvertisementButton = document.querySelector('.btn-success');
                addAdvertisementButton.addEventListener('click', function() {
                    document.getElementById('addAdvertisementForm').reset(); // Reset the entire form
                    $('#addAdvertisementModal').modal('show');
                });

                // Submit Advertisement
                document.getElementById('submitAdvertisement').addEventListener('click', function() {
                    const adTitle = document.getElementById('addAdTitle').value;
                    const adDescription = document.getElementById('addAdDescription').value;
                    const adImage = document.getElementById('addAdImage').value;
                    const adLink = document.getElementById('addAdLink').value;
                    const startDate = document.getElementById('addStartDate').value;
                    const endDate = document.getElementById('addEndDate').value;

                    Swal.fire({
                        title: 'Are you sure?',
                        text: `You are about to add the advertisement: ${adTitle}`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, add it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('add_advertisement.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    title: adTitle,
                                    description: adDescription,
                                    image: adImage,
                                    link: adLink,
                                    start_date: startDate,
                                    end_date: endDate
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    $('#addAdvertisementModal').modal('hide');
                                    Swal.fire('Added!', 'The advertisement has been added.', 'success');
                                    location.reload();
                                } else {
                                    Swal.fire('Error!', data.message || 'Something went wrong.', 'error');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Swal.fire('Error!', 'Failed to add advertisement. Please try again.', 'error');
                            });
                        }
                    });
                });
            });

            function editAdvertisement(ad_id, button) {
                const row = button.closest('tr');

                // Set the ad_id in the modal's data attribute
                const modal = document.getElementById('editAdvertisementModal');
                modal.dataset.adId = ad_id; // Set the advertisement ID

                // Populate the modal input fields with data from the row
                document.getElementById('editAdTitle').value = row.dataset.adTitle;
                document.getElementById('editAdDescription').value = row.dataset.adDescription;
                document.getElementById('editAdImage').value = row.dataset.adImage;
                document.getElementById('editAdLink').value = row.dataset.adLink;
                document.getElementById('editStartDate').value = row.dataset.adStart;
                document.getElementById('editEndDate').value = row.dataset.adEnd;

                // Show the modal
                $('#editAdvertisementModal').modal('show');
            }

            document.getElementById('updateAdvertisement').addEventListener('click', function() {
                const adTitle = document.getElementById('editAdTitle').value;
                const adDescription = document.getElementById('editAdDescription').value;
                const adImage = document.getElementById('editAdImage').value;
                const adLink = document.getElementById('editAdLink').value;
                const startDate = document.getElementById('editStartDate').value;
                const endDate = document.getElementById('editEndDate').value;
                const adId = document.getElementById('editAdvertisementModal').dataset.adId; // Ensure this is set correctly

                // Validate input fields
                if (!adId || !adTitle || !adDescription || !adImage || !adLink || !startDate || !endDate) {
                    Swal.fire('Error!', 'Please fill in all fields.', 'error');
                    return;
                }

                // Perform AJAX request to update advertisement
                fetch('update_advertisement.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        id: adId,
                        title: adTitle,
                        description: adDescription,
                        image: adImage,
                        link: adLink,
                        start_date: startDate,
                        end_date: endDate
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        $('#editAdvertisementModal').modal('hide');
                        Swal.fire('Updated!', 'The advertisement has been updated.', 'success')
                            .then(() => {
                                location.reload();
                            });
                    } else {
                        Swal.fire('Error!', data.message || 'Something went wrong.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Error!', 'Failed to update advertisement. Please try again.', 'error');
                });
            });
        </script>

        <?php include 'footer.php'; ?>
    </div>
</div>
