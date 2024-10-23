<?php
include 'includes/head.php';
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Manage Inquiry</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Inquiry</li>
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
                                        <th>#</th>
                                        <th>Inquiry ID</th>
                                        <th>Customer Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>INQ001</td>
                                        <td>John Doe</td>
                                        <td>john.doe@example.com</td>
                                        <td>(123) 456-7890</td>
                                        <td>2024/09/01</td>
                                        <td>10:30 AM</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>INQ002</td>
                                        <td>Jane Smith</td>
                                        <td>jane.smith@example.com</td>
                                        <td>(987) 654-3210</td>
                                        <td>2024/09/02</td>
                                        <td>11:45 AM</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>INQ003</td>
                                        <td>Robert Johnson</td>
                                        <td>robert.johnson@example.com</td>
                                        <td>(555) 123-4567</td>
                                        <td>2024/09/03</td>
                                        <td>01:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>INQ004</td>
                                        <td>Emily Davis</td>
                                        <td>emily.davis@example.com</td>
                                        <td>(555) 765-4321</td>
                                        <td>2024/09/04</td>
                                        <td>02:15 PM</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>INQ005</td>
                                        <td>Michael Brown</td>
                                        <td>michael.brown@example.com</td>
                                        <td>(555) 987-6543</td>
                                        <td>2024/09/05</td>
                                        <td>03:30 PM</td>
                                    </tr>
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
include 'includes/footer.php';
?>
