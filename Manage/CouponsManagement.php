<?php
include 'head.php';
include '../includes/db.php'; // Include your database connection file

// Fetch coupons from the database
$sql = "SELECT * FROM coupons";
$result = $conn->query($sql);
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Coupons Management</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Coupons Management</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-end">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addCouponModal">
                            Add New Coupon
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
                                        <th>Coupon Name</th>
                                        <th>Coupon Code</th>
                                        <th>Discount Type</th>
                                        <th>Discount Value</th>
                                        <th>Expiration Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <!-- SELECT coupon_id, code, discount_type, discount_value, expiration_date, status, created_at FROM coupons WHERE 1 -->
                                    <?php
                                    if ($result->num_rows > 0) {
                                        $counter = 1; 
                                        while ($row = $result->fetch_assoc()) {
                                            // status badge
                                            $status = $row['status'] === 'active' ? 'success' : 'danger';
                                            echo "<tr>";
                                            echo "<td>{$counter}</td>";
                                            echo "<td>{$row['coupon_name']}</td>";
                                            echo "<td>{$row['code']}</td>";
                                            echo "<td>{$row['discount_type']}</td>";
                                            echo "<td>" . ($row['discount_type'] === 'percentage' ? "{$row['discount_value']}%" : "$" . $row['discount_value']) . "</td>";
                                            echo "<td>" . date('d M, Y H:i A', strtotime($row['expiration_date'])) . "</td>"; // format date with time like 25 May 2024 12:00 PM
                                            echo "<td><span class='badge p-2 fs-6 badge-soft-{$status}'>{$row['status']}</span></td>";
                                            echo "<td>
                                                <button class='btn rounded-0 btn-info btn-sm' onclick='viewCoupon({$row['coupon_id']})'>
                                                    <i class='mdi mdi-eye'></i> View
                                                </button>
                                                <button class='btn rounded-0 btn-danger btn-sm' onclick='deleteCoupon({$row['coupon_id']})'>
                                                    <i class='mdi mdi-delete'></i> Delete
                                                </button>
                                            </td>";
                                            echo "</tr>";
                                            $counter++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>No coupons found</td></tr>"; // Ensure this matches the number of columns
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <!-- Add Coupon Modal -->
            <div class="modal fade" id="addCouponModal" tabindex="-1" role="dialog" aria-labelledby="addCouponModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addCouponModalLabel">Add New Coupon</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="addCouponForm">
                                <div class="form-group">
                                    <label for="couponName">Coupon Name</label>
                                    <input type="text" class="form-control" id="couponName" required>
                                </div>
                                <div class="form-group">
                                    <label for="couponCode">Coupon Code</label>
                                    <input type="text" class="form-control" id="couponCode" required>
                                </div>
                                <div class="form-group">
                                    <label for="discountType">Discount Type</label>
                                    <select class="form-control" id="discountType" required>
                                        <option value="percentage">Percentage</option>
                                        <option value="fixed">Fixed Amount</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="discountValue">Discount Value</label>
                                    <input type="number" class="form-control" id="discountValue" required>
                                </div>
                                <div class="form-group">
                                    <label for="expirationDate">Expiration Date</label>
                                    <input type="date" class="form-control" id="expirationDate" required>
                                </div>
                                <div class="form-group">
                                    <label for="couponStatus">Status</label>
                                    <select class="form-control" id="couponStatus" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn rounded-0 btn-primary" id="submitCoupon">Add Coupon</button>
                            <button type="button" class="btn rounded-0 btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>



            <script>
                document.getElementById('submitCoupon').addEventListener('click', function() {
                    const couponName = document.getElementById('couponName').value;
                    const couponCode = document.getElementById('couponCode').value;
                    const discountType = document.getElementById('discountType').value;
                    const discountValue = document.getElementById('discountValue').value;
                    const expirationDate = document.getElementById('expirationDate').value;
                    const couponStatus = document.getElementById('couponStatus').value;

                    // Show SweetAlert for confirmation
                    Swal.fire({
                        title: 'Are you sure?',
                        text: `You are about to add the coupon: ${couponName}`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, add it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Perform AJAX request to add the coupon
                            fetch('add_coupon.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                    },
                                    body: JSON.stringify({
                                        coupon_name: couponName,
                                        coupon_code: couponCode,
                                        discount_type: discountType,
                                        discount_value: discountValue,
                                        expiration_date: expirationDate,
                                        status: couponStatus
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        $('#addCouponModal').modal('hide'); // Close the modal
                                        Swal.fire(
                                            'Added!',
                                            'The coupon has been added.',
                                            'success'
                                        );
                                        // Optionally, refresh the coupon list here
                                        location.reload(); // Reload the page to refresh the coupon list
                                    } else {
                                        Swal.fire('Error!', data.message, 'error');
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                        }
                    });
                });
            </script>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content -->
<?php
include 'footer.php';
?>