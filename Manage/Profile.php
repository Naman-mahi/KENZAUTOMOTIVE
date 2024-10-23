<?php
include 'includes/head.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    if ($_SESSION['role'] == 'admin') {
        $sql = "SELECT * FROM users WHERE user_id = ?";
    } elseif ($_SESSION['role'] == 'dealer') {
        $sql = "SELECT users.*, dealers.* 
                FROM users 
                LEFT JOIN dealers ON users.user_id = dealers.user_id 
                WHERE users.user_id = ?";
    } else {
        echo "<script>window.location.href = '../index';</script>";
        exit();
    }

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Now $user will contain both Users and dealers data if role is Dealer
        } else {
            echo "<script>alert('User not found.'); window.location.href='index';</script>";
            exit();
        }
        $stmt->close();
    } else {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        exit();
    }
} else {
    echo "<script>window.location.href = '../index.php';</script>";
    exit();
}

$conn->close();
?>


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?php #htmlspecialchars($user['role']) 
                                            ?> Profile</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card mb-3 shadow-sm">
                    <div class="row py-5">
                        <div class="col-md-3">
                            <div class="card mb-2 shadow-none">
                                <div class="card-body">
                                    <img src="assets/profilepics/<?= htmlspecialchars($user['profile_pic']) ?>" alt="Profile Picture" class="rounded-circle mb-3" style="width: 120px; height: 120px;">
                                    <h4 class="mt-2"><?= htmlspecialchars($user['first_name']) ?> <?= htmlspecialchars($user['last_name']) ?></h4>
                                    <p class="text-muted"><?= htmlspecialchars($user['email']) ?></p>
                                    <p class="text-muted"><strong>Joined:</strong> <?= date("F j, Y", strtotime($user['created_at'])) ?></p>
                                    <div class="d-flex justify-content-start mt-3">
                                        <a href="functions/logout.php" class="btn rounded-0  text-danger me-2"><i class="mdi mdi-logout-variant"></i> Logout</a>
                                        <a class="btn rounded-0  text-primary" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Change Password</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if ($_SESSION['role'] == 'dealer') { ?>
                            <div class="col-md-9">
                                <!-- Personal Information Form -->
                                <form action="update_personal.php" method="POST">
                                    <div class="card mb-3 shadow-lg">
                                        <div class="card-body">
                                            <h5 class="mb-4">Profile Details</h5>
                                            <h6 class="card-title">Personal Information</h6>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="first_name" class="form-label">First Name</label>
                                                    <input type="text" id="first_name" name="first_name" class="form-control" value="<?= htmlspecialchars($user['first_name']) ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="last_name" class="form-label">Last Name</label>
                                                    <input type="text" id="last_name" name="last_name" class="form-control" value="<?= htmlspecialchars($user['last_name']) ?>" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="phone_number" class="form-label">Phone Number</label>
                                                    <input type="tel" id="phone_number" name="phone_number" class="form-control" value="<?= htmlspecialchars($user['phone_number']) ?>" required>
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn rounded-0  btn-sm btn-primary">Update Personal Info</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <!-- Address Details Form -->
                                <form action="update_address.php" method="POST">
                                    <div class="card mb-3 shadow-lg">
                                        <div class="card-body">
                                            <h5 class="mb-4">Address Details</h5>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="address_line1" class="form-label">Address</label>
                                                    <input type="text" id="address_line1" name="address_line1" class="form-control" value="<?= htmlspecialchars($user['address_line1']) ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="city" class="form-label">City</label>
                                                    <input type="text" id="city" name="city" class="form-control" value="<?= htmlspecialchars($user['city']) ?>" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="state" class="form-label">State</label>
                                                    <input type="text" id="state" name="state" class="form-control" value="<?= htmlspecialchars($user['state']) ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="postal_code" class="form-label">Postal Code</label>
                                                    <input type="text" id="postal_code" name="postal_code" class="form-control" value="<?= htmlspecialchars($user['postal_code']) ?>" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="country" class="form-label">Country</label>
                                                    <input type="text" id="country" name="country" class="form-control" value="<?= htmlspecialchars($user['country']) ?>" required>
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn rounded-0  btn-sm btn-primary">Update Address</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <!-- Company Information Form -->
                                <form action="update_company.php" method="POST">
                                    <div class="card mb-3 shadow-lg">
                                        <div class="card-body">
                                            <h5 class="mb-4">Company Information</h5>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="company_name" class="form-label">Company Name</label>
                                                    <input type="text" id="company_name" name="company_name" class="form-control" value="<?= isset($user['company_name']) ? htmlspecialchars($user['company_name']) : '' ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="contact_person" class="form-label">Contact Person</label>
                                                    <input type="text" id="contact_person" name="contact_person" class="form-control" value="<?= isset($user['contact_person']) ? htmlspecialchars($user['contact_person']) : '' ?>">
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn rounded-0  btn-sm btn-primary">Update Company Info</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php } else { ?>
                            <div class="col-md-9">
                                <!-- Personal Information Form -->
                                <form action="update_personal.php" method="POST">
                                    <div class="card mb-3 shadow-lg">
                                        <div class="card-body">
                                            <h5 class="mb-4">Profile Details</h5>
                                            <h6 class="card-title">Personal Information</h6>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="first_name" class="form-label">First Name</label>
                                                    <input type="text" id="first_name" name="first_name" class="form-control" value="<?= htmlspecialchars($user['first_name']) ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="last_name" class="form-label">Last Name</label>
                                                    <input type="text" id="last_name" name="last_name" class="form-control" value="<?= htmlspecialchars($user['last_name']) ?>" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="phone_number" class="form-label">Phone Number</label>
                                                    <input type="tel" id="phone_number" name="phone_number" class="form-control" value="<?= htmlspecialchars($user['mobile_number']) ?>" required>
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn rounded-0  btn-sm btn-primary">Update Personal Info</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Change Password Modal -->
            <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="changePasswordForm" action="change_password.php" method="POST">
                                <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['user_id']) ?>">
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                                </div>
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm New Password</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn rounded-0  btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" form="changePasswordForm" class="btn rounded-0  btn-primary">Change Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
</div>
<!-- end main content -->

<script>
    // Change Password Modal
    var changePasswordModal = document.getElementById("changePasswordModal");
    changePasswordModal.addEventListener("show.bs.modal", function() {
        changePasswordModal.querySelector("#current_password").value = '';
        changePasswordModal.querySelector("#new_password").value = '';
        changePasswordModal.querySelector("#confirm_password").value = '';
    });
</script>

<?php include 'includes/footer.php'; ?>