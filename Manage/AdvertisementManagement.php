<?php
include 'head.php';
include '../includes/db.php'; // Include your database connection file

// Fetch advertisements from the database
$sql = "SELECT * FROM advertisements WHERE 1";
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
                                        <th class="text-center">#</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Link</th>
                                        <th class="text-center">Start Date</th>
                                        <th class="text-center">End Date</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        $counter = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            $status = (strtotime($row['end_datetime']) > time()) ? 'active' : 'inactive';
                                            $color = ($status === 'active') ? 'text-success' : 'text-danger';
                                            echo "<tr data-ad-id='{$row['id']}' data-ad-title='{$row['title']}' data-ad-description='{$row['description']}' data-ad-image='{$row['image']}' data-ad-link='{$row['link']}' data-ad-start='{$row['start_datetime']}' data-ad-end='{$row['end_datetime']}' data-status='{$status}'>";
                                            echo "<td>{$counter}</td>";
                                            echo "<td>{$row['title']}</td>";
                                            echo "<td>{$row['description']}</td>";
                                            echo "<td><a href='uploads/advertisements/{$row['image']}' target='_blank'>View Image</a></td>";
                                            echo "<td><a href='{$row['link']}' target='_blank'>Open Link</a></td>";
                                            echo "<td>" . date('d M, Y h:i A', strtotime($row['start_datetime'])) . "</td>";
                                            echo "<td>" . date('d M, Y h:i A', strtotime($row['end_datetime'])) . "</td>";
                                            echo "<td><i class='mdi mdi-checkbox-blank-circle me-1 {$color}'></i> {$status}</td>";
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
                        <form id="addAdvertisementForm" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="addAdTitle">Title</label>
                                <input type="text" class="form-control" id="addAdTitle" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="addAdDescription">Description</label>
                                <textarea class="form-control" id="addAdDescription" name="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="addAdImage">Image</label>
                                <input type="file" class="form-control" id="addAdImage" name="image" accept="image/*" required>
                            </div>
                            <div class="form-group">
                                <label for="addAdLink">Link</label>
                                <input type="text" class="form-control" id="addAdLink" name="link" required>
                            </div>
                            <div class="form-group">
                                <label for="addStartDate">Start Date & Time</label>
                                <input type="text" class="form-control" id="addStartDate" name="start_date" required>
                            </div>
                            <div class="form-group">
                                <label for="addEndDate">End Date & Time</label>
                                <input type="text" class="form-control" id="addEndDate" name="end_date" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn rounded-0 btn-primary" id="submitAdvertisement">Add Advertisement</button>
                    </div>
                </div>
            </div>
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', async function() {
                const today = new Date();
                const thirtyDaysFromNow = new Date();
                thirtyDaysFromNow.setDate(today.getDate() + 30);

                // Fetch booked dates
                async function fetchBookedDates() {
                    try {
                        const response = await fetch('check_overlap.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({})
                        });
                        if (!response.ok) throw new Error('Network response was not ok');
                        const data = await response.json();
                        return data.bookedDates || [];
                    } catch (error) {
                        console.error('Failed to fetch booked dates:', error);
                        return [];
                    }
                }

                const bookedDates = await fetchBookedDates();
                const disabledDates = bookedDates.flatMap(dateRange => {
                    const start = new Date(dateRange.start);
                    const end = new Date(dateRange.end);
                    const dates = [];
                    while (start <= end) {
                        dates.push(start.toISOString().split('T')[0]); // Get date in YYYY-MM-DD format
                        start.setHours(start.getHours() + 1); // Increment by an hour for hourly blocking
                    }
                    return dates;
                });

                // Initialize Flatpickr for Start Date
                flatpickr("#addStartDate", {
                    minDate: today,
                    maxDate: thirtyDaysFromNow,
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    disable: disabledDates,
                });

                // Initialize Flatpickr for End Date
                flatpickr("#addEndDate", {
                    minDate: today,
                    maxDate: thirtyDaysFromNow,
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                    disable: disabledDates,
                });

                // Submit Advertisement
                document.getElementById('submitAdvertisement').addEventListener('click', async function() {
                    const formData = new FormData(document.getElementById('addAdvertisementForm'));

                    // Check for overlap
                    const isOverlap = await checkForOverlap(formData.get('start_date'), formData.get('end_date'));
                    if (isOverlap) {
                        Swal.fire('Error!', 'The selected time slot is already booked.', 'error');
                        return;
                    }

                    Swal.fire({
                        title: 'Are you sure?',
                        text: `You are about to add the advertisement: ${formData.get('title')}`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, add it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('add_advertisement.php', {
                                    method: 'POST',
                                    body: formData
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

                async function checkForOverlap(startDate, endDate) {
                    try {
                        const response = await fetch('check_overlap.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                start_date: startDate,
                                end_date: endDate
                            })
                        });
                        if (!response.ok) throw new Error('Network response was not ok');
                        const data = await response.json();
                        return data.isOverlap;
                    } catch (error) {
                        console.error('Error checking for overlap:', error);
                        return false; // Assume no overlap on error
                    }
                }

                function editAdvertisement(ad_id, button) {
                    const row = button.closest('tr');

                    const modal = document.getElementById('editAdvertisementModal');
                    modal.dataset.adId = ad_id;

                    document.getElementById('editAdTitle').value = row.dataset.adTitle;
                    document.getElementById('editAdDescription').value = row.dataset.adDescription;
                    document.getElementById('editAdImage').value = row.dataset.adImage;
                    document.getElementById('editAdLink').value = row.dataset.adLink;
                    document.getElementById('editStartDate').value = row.dataset.adStart;
                    document.getElementById('editEndDate').value = row.dataset.adEnd;

                    $('#editAdvertisementModal').modal('show');
                }

                const updateButton = document.getElementById('updateAdvertisement');
                if (updateButton) {
                    updateButton.addEventListener('click', function() {
                        const adTitle = document.getElementById('editAdTitle').value;
                        const adDescription = document.getElementById('editAdDescription').value;
                        const adImage = document.getElementById('editAdImage').value;
                        const adLink = document.getElementById('editAdLink').value;
                        const startDate = document.getElementById('editStartDate').value;
                        const endDate = document.getElementById('editEndDate').value;
                        const adId = document.getElementById('editAdvertisementModal').dataset.adId;

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
                }
            });
            const addAdvertisementButton = document.querySelector('.btn-success');
            addAdvertisementButton.addEventListener('click', function() {
                document.getElementById('addAdvertisementForm').reset(); // Reset the entire form
                $('#addAdvertisementModal').modal('show');
            });
        </script>


        <?php include 'footer.php'; ?>
    </div>
</div>