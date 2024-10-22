<?php
include 'head.php';

$sql = "SELECT user_permissions.*, users.first_name, users.last_name FROM user_permissions left join users on user_permissions.user_id = users.user_id where users.role = 'website_user'";
$permissions = mysqli_query($conn, $sql);
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">User Permissions</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">User Permissions</li>
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
                                    <tr>
                                        <th>Name</th>
                                        <th>Permissions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($permission = mysqli_fetch_assoc($permissions)){ ?>
                                    <tr>
                                        <td><?php echo $permission['first_name'] . ' ' . $permission['last_name']; ?></td>
                                        <!-- <td>give me all permissions in checkbox with a label</td> -->
                                        <td>
                                            <label class="checkbox-inline me-2">
                                                <input type="checkbox" name="permissions" value="1"> View User Data
                                            </label>
                                            <label class="checkbox-inline me-2  ">
                                                <input type="checkbox" name="permissions" value="2"> Edit User Data
                                            </label>
                                            <label class="checkbox-inline me-2  ">
                                                <input type="checkbox" name="permissions" value="3"> Delete User Data
                                            </label>
                                            <label class="checkbox-inline me-2  ">
                                                <input type="checkbox" name="permissions" value="4"> Manage Roles
                                            </label>
                                            <label class="checkbox-inline me-2  ">
                                                <input type="checkbox" name="permissions" value="5"> Access Reports
                                            </label>
                                            <label class="checkbox-inline me-2  ">
                                                <input type="checkbox" name="permissions" value="6"> Change Settings
                                            </label>
                                            <label class="checkbox-inline me-2  ">
                                                <input type="checkbox" name="permissions" value="7"> View Audit Logs
                                            </label>
                                            <label class="checkbox-inline me-2  ">
                                                <input type="checkbox" name="permissions" value="8"> Export Data
                                            </label>
                                        </td>
                                    </tr>
                                    <?php } ?>
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