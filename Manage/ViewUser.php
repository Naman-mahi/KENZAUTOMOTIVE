<?php
<<<<<<< HEAD
include 'includes/head.php';
=======
include 'head.php';
>>>>>>> 147f762 (updated code)

// Fetch and sanitize the user ID from the URL
$user_id = isset($_GET['UserId']) ? mysqli_real_escape_string($conn, $_GET['UserId']) : '';

// Validate that user_id is not empty
if (!empty($user_id)) {
    // User query
    $sql = "SELECT * FROM users WHERE user_id = '$user_id' AND role = 'website_user'";
    $user = mysqli_query($conn, $sql);

    // Permissions query
    $sql2 = "SELECT 
    p.id AS permission_id,
    p.name AS permission_name,
    p.description AS permission_description,
    up.id AS user_permission_id,
    up.user_id
FROM 
    permissions p
LEFT JOIN 
    user_permissions up ON p.id = up.permission_id AND up.user_id = '$user_id'";
    $permissions = mysqli_query($conn, $sql2);
} else {
    // Invalid User ID, redirect to Dashboard
    header("Location: Dashboard.php");
    exit();
}
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
<<<<<<< HEAD
                        <h4 class="mb-sm-0">User</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">User</li>
=======
                        <h4 class="mb-sm-0">User </h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">User </li>
>>>>>>> 147f762 (updated code)
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
<<<<<<< HEAD
                <div class="col-md-6 col-sm-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4>User Details</h4>
                            <hr>
                            <?php if ($user && mysqli_num_rows($user) > 0) {
                                $user_data = mysqli_fetch_assoc($user); ?>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($user_data['email']); ?></li>
                                    <li class="list-group-item"><strong>Role:</strong> <?php echo htmlspecialchars($user_data['role']); ?></li>
                                    <li class="list-group-item"><strong>Name:</strong> <?php echo htmlspecialchars($user_data['first_name'] . ' ' . $user_data['last_name']); ?></li>
                                    <li class="list-group-item"><strong>Mobile Number:</strong> <?php echo htmlspecialchars($user_data['mobile_number']); ?></li>
                                    <li class="list-group-item"><strong>Status:</strong> <?php echo htmlspecialchars($user_data['user_status']); ?></li>
                                    <li class="list-group-item"><strong>Created At:</strong> <?php echo htmlspecialchars($user_data['created_at']); ?></li>
                                    <li class="list-group-item"><strong>Referral Code:</strong> <?php echo htmlspecialchars($user_data['referral_code']); ?></li>
                                    <li class="list-group-item"><strong>Referred By:</strong> <?php echo htmlspecialchars($user_data['referred_by']); ?></li>
                                </ul>
                                <div class="text-end">
                                    <a href="javascript:void(0);" class="btn btn-primary mt-3">Update User</a>
                                </div>
                            <?php } else { ?>
                                <p>No user data found.</p>
                            <?php } ?>
                        </div>
                    </div>
                </div> <!-- end col -->
                
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Permissions</h4>
                            <hr>
                            <?php if ($permissions && mysqli_num_rows($permissions) > 0) { ?>
                                <form method="post" action="update_permissions.php">
                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                    <?php while ($permissions_data = mysqli_fetch_assoc($permissions)) { ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" 
                                                name="permissions[<?php echo $permissions_data['permission_id']; ?>]" 
                                                value="1" 
                                                id="permission-<?php echo $permissions_data['permission_id']; ?>"
                                                <?php echo ($permissions_data['user_permission_id'] !== null) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="permission-<?php echo $permissions_data['permission_id']; ?>">
                                                <?php echo htmlspecialchars($permissions_data['permission_name']); ?>
                                            </label>
                                            <small class="form-text text-muted">
                                                <?php echo htmlspecialchars($permissions_data['permission_description']); ?>
                                            </small>
                                        </div>
                                    <?php } ?>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary mt-3">Update Permissions</button>
                                    </div>
                                </form>
                            <?php } else { ?>
                                <p>No permissions found.</p>
                            <?php } ?>
                        </div>
=======
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <?php if ($user && mysqli_num_rows($user) > 0) {
                                    $user_data = mysqli_fetch_assoc($user); ?>
                                    <div class="col-12 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">User Details</h5>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><strong>User ID:</strong> <?php echo htmlspecialchars($user_data['user_id']); ?></li>
                                                    <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($user_data['email']); ?></li>
                                                    <li class="list-group-item"><strong>Role:</strong> <?php echo htmlspecialchars($user_data['role']); ?></li>
                                                    <li class="list-group-item"><strong>Name:</strong> <?php echo htmlspecialchars($user_data['first_name'] . ' ' . $user_data['last_name']); ?></li>
                                                    <li class="list-group-item"><strong>Mobile Number:</strong> <?php echo htmlspecialchars($user_data['mobile_number']); ?></li>
                                                    <li class="list-group-item"><strong>Status:</strong> <?php echo htmlspecialchars($user_data['user_status']); ?></li>
                                                    <li class="list-group-item"><strong>Created At:</strong> <?php echo htmlspecialchars($user_data['created_at']); ?></li>
                                                    <li class="list-group-item"><strong>Referral Code:</strong> <?php echo htmlspecialchars($user_data['referral_code']); ?></li>
                                                    <li class="list-group-item"><strong>Referred By:</strong> <?php echo htmlspecialchars($user_data['referred_by']); ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-12">
                                        <p>No user data found.</p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div> <!-- end col -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <?php if ($permissions && mysqli_num_rows($permissions) > 0) { ?>
                                    <?php while ($permissions_data = mysqli_fetch_assoc($permissions)) { ?>
                                        <?php var_dump($permissions_data);
                                        // array(5) { ["permission_id"]=> string(1) "1" ["permission_name"]=> string(15) "User Management" ["permission_description"]=> string(29) "Manage users and their roles." ["user_permission_id"]=> string(1) "7" ["user_id"]=> string(2) "23" }
                                        ?>
                                        <div class="col-12 mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        Permissions
                                                    </h5>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="permissions[<?php echo $permissions_data['permission_id']; ?>][]" value="1" id="permission1-<?php echo $permissions_data['permission_id']; ?>">
                                                        <label class="form-check-label" for="permission1-<?php echo $permissions_data['permission_id']; ?>">
                                                            <?php echo $permissions_data['permission_name']; ?>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>

>>>>>>> 147f762 (updated code)
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->
<?php
<<<<<<< HEAD
include 'includes/footer.php';
?>
=======
include 'footer.php';
?>
>>>>>>> 147f762 (updated code)
