<?php
include 'includes/head.php';

// Fetch inquiries securely
$dealer_id = $_GET['dealerId'];
$sql = "SELECT u.*, d.* FROM `users` u JOIN `dealers` d ON u.user_id = d.user_id WHERE u.role = 'dealer' AND d.verification_status ='Pending' AND d.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $dealer_id); // Assuming dealer_id is an integer
$stmt->execute();
$result = $stmt->get_result();

?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Onboarding</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Onboarding</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <?php
            if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'website_user') {
                // Check if any results were returned
                if ($row = $result->fetch_assoc()) {
            ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="page-title-box">
                                        <h4 class="mb-sm-0">Verification status</h4>
                                        <span class="badge p-2 mt-2 fs-6 badge-soft-primary"><?php echo htmlspecialchars($row['verification_status']); ?></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Dealer Information</h4>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Name</th>
                                                    <td><?php echo htmlspecialchars($row['first_name']) . ' ' . htmlspecialchars($row['last_name']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Phone</th>
                                                    <td><?php echo htmlspecialchars($row['mobile_number']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>status</th>
                                                    <td><?php echo htmlspecialchars($row['user_status']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>registration date</th>
                                                    <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                                                </tr>

                                            </table>
                                            <?php
                                            // Assuming $row['document_upload'] contains the filenames as a comma-separated string
                                            $documents = explode(',', $row['document_upload']); // Split the string into an array
                                            ?>
                                            <div>
                                                <?php
                                                // Create an array to hold image HTML
                                                $imageHTML = [];

                                                // Loop through each document and create an image tag
                                                foreach ($documents as $document) {
                                                    $document = trim($document); // Trim any whitespace
                                                    if (!empty($document)) { // Check if the document is not empty
                                                        $imageHTML[] = '<img src="../uploads/' . htmlspecialchars($document) . '" alt="Business Documents" class="img-fluid" style="max-width: 150px; margin: 5px;">';
                                                    }
                                                }

                                                // Join the images with a comma and display them
                                                echo implode(', ', $imageHTML);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Dealer Business Information</h4>
                                            <!-- You can add more dealer information here if needed -->
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Business Name</th>
                                                    <td><?php echo htmlspecialchars($row['company_name']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Contact Person</th>
                                                    <td><?php echo htmlspecialchars($row['contact_person']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Business Email</th>
                                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Business Phone</th>
                                                    <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Pan Number</th>
                                                    <td><?php echo htmlspecialchars($row['pan_number']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>GST Number</th>
                                                    <td><?php echo htmlspecialchars($row['gst_number']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Business Address</th>
                                                    <td><?php echo htmlspecialchars($row['address_line1']) . ' ' . htmlspecialchars($row['address_line2']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Business City</th>
                                                    <td><?php echo htmlspecialchars($row['city']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Business State</th>
                                                    <td><?php echo htmlspecialchars($row['state']); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Business Country</th>
                                                    <td><?php echo htmlspecialchars($row['country']); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <h4>Verification</h4>
                                    <form id="verificationForm">
                                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $row['user_id']; ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="note">Note (optional):</label>
                                                    <textarea id="note" name="note" class="form-control" rows="3" placeholder="Add any comments or notes here..."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <button type="button" id="approveBtn" class="btn btn-primary">Approve</button>
                                                <button type="button" id="rejectBtn" class="btn btn-danger">Reject</button>
                                            </div>
                                        </div> <!-- end row -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                } else {
                    echo "<div class='alert alert-warning'>No dealer found with this ID.</div>";
                }
            } else {
                // Redirect to login page if user is not admin or dealer
                header("Location: login.php");
                exit(); // Ensure no further code is executed
            }
            ?>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->
<script>
    $(document).ready(function() {
        // Approve button click handler
        $('#approveBtn').click(function() {
            submitForm('approve');
        });

        // Reject button click handler
        $('#rejectBtn').click(function() {
            submitForm('reject');
        });

        function submitForm(action) {
            const note = $('#note').val();
            const userId = $('#user_id').val(); // Get the user_id from the hidden input

            // SweetAlert confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to ${action} this verification.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: action === 'approve' ? '#3085d6' : '#d33',
                cancelButtonColor: '#999',
                confirmButtonText: action === 'approve' ? 'Yes, approve!' : 'Yes, reject!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // AJAX request to submit the form
                    $.ajax({
                        url: 'process_verification.php', // Your processing script
                        type: 'POST',
                        data: {
                            note: note,
                            action: action,
                            user_id: userId // Include user_id in the request
                        },
                        success: function(response) {
                            console.log(response);
                            // Show success message
                            Swal.fire(
                                'Success!',
                                response,
                                'success'
                            );
                        },
                        error: function(xhr, status, error) {
                            // Show error message
                            Swal.fire(
                                'Error!',
                                'An error occurred while processing your request.',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    });
</script>
<?php
include 'includes/footer.php';
?>