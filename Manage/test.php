<?php
include 'includes/head.php';
?>
<?php
// SQL query to fetch all points
$sql = "SELECT * FROM roles";
$roleResult = $conn->query($sql);

?>


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Payments</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Payments</a></li>
                                <li class="breadcrumb-item active">Payments</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <?php
                                if ($roleResult && $roleResult->num_rows > 0) {
                                    while ($row = $roleResult->fetch_assoc()) {
                                        echo "<ol class='list-group'>";
                                        echo "<li class='list-group-item'>" . $row['role_id'] . "</li>";
                                        echo "<li class='list-group-item'>" . $row['role_name'] . "</li>";
                                        echo "</ol>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include 'includes/footer.php';
        ?>