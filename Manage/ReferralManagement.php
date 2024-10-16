<?php
include 'head.php';
// Fetch Referral from the database
$sql = "SELECT 
    referral_rewards.*, 
    users.*, 
    referred_user.first_name AS reFirstName, 
    referred_user.last_name AS reLastName, 
    referred_user.email AS reEmail
FROM 
    referral_rewards 
JOIN 
    users ON referral_rewards.referrer_id = users.user_id 
JOIN 
    users AS referred_user ON referral_rewards.referred_id = referred_user.user_id;
";
$result = $conn->query($sql);
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Manage Referral</h4>
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
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr class="text-center text-uppercase">
            <th>#</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>Referred User Name</th>
            <th>Referred User Email</th>
            <th>Reward Amount</th>
            <th>Referred At</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            $count = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td class='text-center'>" . $count++ . "</td>";
                echo "<td>" . htmlspecialchars($row['first_name'] . " " . $row['last_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['reFirstName'] . " " . $row['reLastName']) . "</td>";
                echo "<td>" . htmlspecialchars($row['reEmail']) . "</td>";
                echo "<td class='text-center'>" . htmlspecialchars($row['reward_amount']) . "</td>";
                echo "<td class='text-center'>" . htmlspecialchars($row['created_at']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7' class='text-center'>No referrals found</td></tr>"; // Adjusted colspan to 7
        }
        ?>
    </tbody>
</table>

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
