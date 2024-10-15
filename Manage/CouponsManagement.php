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
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Note!</strong> The coupon will be applied on the subscription amount.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Note!</strong> On clicking the coupon status will be changed.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                    <?php
                                    if ($result->num_rows > 0) {
                                        $counter = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            $status = $row['status'] === 'active' ? 'success' : 'danger';
                                            echo "<tr data-coupon-id='{$row['coupon_id']}' data-coupon-name='{$row['coupon_name']}' data-coupon-code='{$row['code']}' data-discount-type='{$row['discount_type']}' data-discount-value='{$row['discount_value']}' data-expiration-date='{$row['expiration_date']}' data-status='{$row['status']}'>";
                                            echo "<td>{$counter}</td>";
                                            echo "<td>{$row['coupon_name']}</td>";
                                            echo "<td>{$row['code']}</td>";
                                            echo "<td>{$row['discount_type']}</td>";
                                            echo "<td>" . ($row['discount_type'] === 'percentage' ? "{$row['discount_value']}%" : "$" . number_format($row['discount_value'], 2)) . "</td>";
                                            echo "<td>" . date('d M, Y h:i A', strtotime($row['expiration_date'])) . "</td>";
                                            echo "<td>
                                                <a onclick='changeStatus({$row['coupon_id']})' class='badge p-2 fs-6 badge-soft-{$status}'>{$row['status']}</a>
                                            </td>";
                                            echo "<td>
                                                <a href='ViewCoupons.php?coupon_id={$row['coupon_id']}' class='btn rounded-0 btn-info btn-sm'>
                                                    <i class='mdi mdi-eye'></i> View
                                                </a>
                                                <button onclick='editCoupon({$row['coupon_id']}, this)' class='btn rounded-0 btn-warning btn-sm'>
                                                    <i class='mdi mdi-pencil'></i> Edit
                                                </button>
                                            </td>";
                                            echo "</tr>";
                                            $counter++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>No coupons found</td></tr>";
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

        <!-- Add Coupon Modal -->
        <div class="modal fade" id="addCouponModal" tabindex="-1" role="dialog" aria-labelledby="addCouponModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCouponModalLabel">Add New Coupon</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addCouponForm">
                            <div class="form-group">
                                <label for="addCouponName">Coupon Name</label>
                                <input type="text" class="form-control" id="addCouponName" required>
                            </div>
                            <div class="form-group">
                                <label for="addCouponCode">Coupon Code</label>
                                <input type="text" class="form-control" id="addCouponCode" required>
                            </div>
                            <div class="form-group">
                                <label for="addDiscountType">Discount Type</label>
                                <select class="form-control" id="addDiscountType" required>
                                    <option value="" disabled selected>Select Discount Type</option>
                                    <option value="percentage">Percentage</option>
                                    <option value="fixed">Fixed Amount</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="addDiscountValue">Discount Value</label>
                                <input type="number" class="form-control" id="addDiscountValue" required>
                            </div>
                            <div class="form-group">
                                <label for="addExpirationDate">Expiration Date</label>
                                <input type="datetime-local" class="form-control" id="addExpirationDate" required>
                            </div>
                            <div class="form-group">
                                <label for="addCouponStatus">Status</label>
                                <select class="form-control" id="addCouponStatus" required>
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn rounded-0 btn-primary" id="submitCoupon">Add Coupon</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Coupon Modal -->
        <div class="modal fade" id="editCouponModal" tabindex="-1" role="dialog" aria-labelledby="editCouponModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCouponModalLabel">Edit Coupon</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editCouponForm">
                            <div class="form-group">
                                <label for="editCouponName">Coupon Name</label>
                                <input type="text" class="form-control" id="editCouponName" required>
                            </div>
                            <div class="form-group">
                                <label for="editCouponCode">Coupon Code</label>
                                <input type="text" class="form-control" id="editCouponCode" required>
                            </div>
                            <div class="form-group">
                                <label for="editDiscountType">Discount Type</label>
                                <select class="form-control" id="editDiscountType" required>
                                    <option value="" disabled selected>Select Discount Type</option>
                                    <option value="percentage">Percentage</option>
                                    <option value="fixed">Fixed Amount</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editDiscountValue">Discount Value</label>
                                <input type="number" class="form-control" id="editDiscountValue" required>
                            </div>
                            <div class="form-group">
                                <label for="editExpirationDate">Expiration Date</label>
                                <input type="datetime-local" class="form-control" id="editExpirationDate" required>
                            </div>
                            <div class="form-group">
                                <label for="editCouponStatus">Status</label>
                                <select class="form-control" id="editCouponStatus" required>
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn rounded-0 btn-primary" id="updateCoupon">Update Coupon</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Open Add Coupon Modal
                const addCouponButton = document.querySelector('.btn-success');
                addCouponButton.addEventListener('click', function() {
                    document.getElementById('addCouponForm').reset(); // Reset the entire form
                    $('#addCouponModal').modal('show');
                });

                // Submit Coupon
                document.getElementById('submitCoupon').addEventListener('click', function() {
                    const couponName = document.getElementById('addCouponName').value;
                    const couponCode = document.getElementById('addCouponCode').value;
                    const discountType = document.getElementById('addDiscountType').value;
                    const discountValue = document.getElementById('addDiscountValue').value;
                    const expirationDate = document.getElementById('addExpirationDate').value;
                    const couponStatus = document.getElementById('addCouponStatus').value;

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
                                    $('#addCouponModal').modal('hide');
                                    Swal.fire('Added!', 'The coupon has been added.', 'success');
                                    location.reload();
                                } else {
                                    Swal.fire('Error!', data.message || 'Something went wrong.', 'error');
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Swal.fire('Error!', 'Failed to add coupon. Please try again.', 'error');
                            });
                        }
                    });
                });
            });

            function changeStatus(coupon_id) {
                fetch('change_status.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ coupon_id })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire('Success!', 'The coupon status has been changed.', 'success');
                        location.reload();
                    } else {
                        Swal.fire('Error!', 'Failed to change the coupon status.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Error!', 'Failed to change status. Please try again.', 'error');
                });
            }

            function editCoupon(coupon_id, button) {
                const row = button.closest('tr');
                document.getElementById('editCouponName').value = row.dataset.couponName;
                document.getElementById('editCouponCode').value = row.dataset.couponCode;
                document.getElementById('editDiscountType').value = row.dataset.discountType;
                document.getElementById('editDiscountValue').value = row.dataset.discountValue;
                document.getElementById('editExpirationDate').value = row.dataset.expirationDate;
                document.getElementById('editCouponStatus').value = row.dataset.status;

                $('#editCouponModal').modal('show');
            }

            document.getElementById('updateCoupon').addEventListener('click', function() {
                const couponName = document.getElementById('editCouponName').value;
                const couponCode = document.getElementById('editCouponCode').value;
                const discountType = document.getElementById('editDiscountType').value;
                const discountValue = document.getElementById('editDiscountValue').value;
                const expirationDate = document.getElementById('editExpirationDate').value;
                const couponStatus = document.getElementById('editCouponStatus').value;
                const couponId = document.querySelector('.modal.show').dataset.couponId;

                // Perform AJAX request to update coupon
                fetch('update_coupon.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        coupon_id: couponId,
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
                        $('#editCouponModal').modal('hide');
                        Swal.fire('Updated!', 'The coupon has been updated.', 'success');
                        location.reload();
                    } else {
                        Swal.fire('Error!', data.message || 'Something went wrong.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Error!', 'Failed to update coupon. Please try again.', 'error');
                });
            });
        </script>

        <?php include 'footer.php'; ?>
    </div>
</div>
