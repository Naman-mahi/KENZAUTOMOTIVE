<?php
include 'head.php';
// Fetch Referral from the database
$sql = "SELECT referral_rewards.*, referradedUser.first_name AS Rfirstname, referradedUser.last_name AS Rlastname, referradedUser.email AS Remail, referrerUser.first_name AS referrerfirstname, referrerUser.last_name AS referrerlastname, referrerUser.email AS referreremail FROM referral_rewards JOIN users AS referrerUser ON referral_rewards.referrer_id = referrerUser.user_id JOIN users AS referradedUser ON referral_rewards.referred_id = referradedUser.user_id WHERE referral_rewards.referrer_id = " . $_SESSION['user_id'] . " ORDER BY referral_rewards.created_at DESC;";
$result = $conn->query($sql);
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">My Referral</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Referral</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <?php
                                if ($result->num_rows > 0) {
                                    $count = 1;
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                            <div class="card h-100 shadow-lg border-0 rounded-3">
                                                <div class="card-body">
                                                    <h5 class="card-title text-danger fw-bold">Referral #<?php echo $count++; ?></h5>
                                                    <div class="d-flex justify-content-between">
                                                        <span class="card-text"><span class="text-dark fw-semibold"><?php echo htmlspecialchars($row['Rfirstname'] . " " . $row['Rlastname']); ?></span></span>
                                                        <span class="card-text"><span class="text-secondary"><?php echo htmlspecialchars($row['Remail']); ?></span></span>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <span class="card-text"><span class="text-success fw-bold me-3">$<?php echo htmlspecialchars(number_format($row['reward_amount'], 2)); ?></span></span>
                                                        <span class="card-text"><span class="text-muted"><?php echo htmlspecialchars(date('F j, Y, g:i a', strtotime($row['created_at']))); ?></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <div class="col-12">
                                        <div class="alert alert-info text-center" role="alert">
                                            <strong>No referrals found</strong>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->
<?php
include 'footer.php';
?>