<?php
include 'includes/head.php';
// Fetch Referral from the database
$sql = "SELECT referral_rewards.*, referradedUser.first_name AS Rfirstname, referradedUser.last_name AS Rlastname, referradedUser.email AS Remail, referrerUser.first_name AS referrerfirstname, referrerUser.last_name AS referrerlastname, referrerUser.email AS referreremail FROM referral_rewards JOIN users AS referrerUser ON referral_rewards.referrer_id = referrerUser.user_id JOIN users AS referradedUser ON referral_rewards.referred_id = referradedUser.user_id WHERE referral_rewards.referrer_id = " . $_SESSION['user_id'] . " ORDER BY referral_rewards.created_at DESC;";
$result = $conn->query($sql);

// Fetch Referral Code from the database
$sql = "SELECT referral_code FROM users WHERE user_id = " . $_SESSION['user_id'] . ";";
$referralCode = $conn->query($sql);

$YourreferralCode = $referralCode->fetch_assoc()['referral_code'];
$referralLink = "https://kenzwheels.com/index.php?ref=" . $YourreferralCode;
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
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="assets/images/referral.png" alt="Referral" class="img-fluid mb-3">
                            <h5 class="text-muted">Share the Love!</h5>
                            <p class="text-muted">Your unique referral link is ready to be shared!</p>
                            <p class="text-success fw-bold">Your referral code: <span><?php echo $YourreferralCode; ?></span></p>
                            
                            <!-- Referral link -->
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="referralLink" value="<?php echo $referralLink; ?>" readonly>
                            </div>
                            
                            <button type="button" class="btn btn-outline-primary" onclick="copyReferralLink()"><i class="mdi mdi-content-copy me-1"></i> Copy Link</button>
                            <script>
                                function copyReferralLink() {
                                    var copyText = document.getElementById("referralLink");
                                    copyText.select();
                                    copyText.setSelectionRange(0, 99999); // For mobile devices
                                    document.execCommand("copy");
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Link Copied!',
                                        text: 'Your referral link has been copied to your clipboard. Share it with friends!',
                                        timer: 2000,
                                        showConfirmButton: false
                                    });
                                }
                            </script>
                        </div>
                    </div>
                </div> <!-- end col -->
                
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-3">Your Referrals</h5>
                            <div class="row">
                                <?php if ($result->num_rows > 0): ?>
                                    <?php $count = 1; ?>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                        <div class="col-12 mb-3">
                                            <div class="card h-100 shadow-lg border-0 rounded-3">
                                                <div class="card-body">
                                                    <h5 class="card-title text-danger fw-bold">Referral #<?php echo $count++; ?></h5>
                                                    <div class="d-flex justify-content-between">
                                                        <span class="card-text fw-semibold"><?php echo htmlspecialchars($row['Rfirstname'] . " " . $row['Rlastname']); ?></span>
                                                        <span class="card-text text-secondary"><?php echo htmlspecialchars($row['Remail']); ?></span>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <span class="card-text text-success fw-bold me-3">$<?php echo htmlspecialchars(number_format($row['reward_amount'], 2)); ?></span>
                                                        <span class="card-text text-muted"><?php echo htmlspecialchars(date('F j, Y, g:i a', strtotime($row['created_at']))); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <div class="col-12">
                                        <div class="card shadow-sm border-0 rounded-3">
                                            <div class="card-body text-center py-5">
                                                <i class="mdi mdi-account-group-outline text-primary" style="font-size: 4rem;"></i>
                                                <h4 class="mt-4 mb-3">No Referrals Yet</h4>
                                                <p class="text-muted mb-4">Start referring friends to earn exciting rewards!</p>
                                                <div class="d-flex justify-content-center align-items-center mb-4">
                                                    <span class="me-3">Your Referral Code:</span>
                                                    <span class="badge bg-primary p-2 fs-6"><?php echo htmlspecialchars($YourreferralCode); ?></span>
                                                </div>
                                                <button class="btn btn-outline-primary" onclick="copyReferralCode()">
                                                    <i class="mdi mdi-content-copy me-1"></i> Copy Code
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function copyReferralCode() {
                                            var code = '<?php echo htmlspecialchars($YourreferralCode); ?>';
                                            navigator.clipboard.writeText(code).then(function() {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Referral Code Copied!',
                                                    text: 'Your referral code has been copied to your clipboard.',
                                                    timer: 2000,
                                                    showConfirmButton: false
                                                });
                                            });
                                        }
                                    </script>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content -->
<?php
include 'includes/footer.php';
?>
