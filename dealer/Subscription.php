<?php
include 'head.php';
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Subscription</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Subscription</a></li>
                                <li class="breadcrumb-item active">Subscription</li>
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
                                        <th>Month</th>
                                        <th>Amount</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>January</td>
                                        <td>$320,800</td>
                                        <td>2024/01/01</td>
                                        <td>2024/01/31</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>February</td>
                                        <td>$170,750</td>
                                        <td>2024/02/01</td>
                                        <td>2024/02/29</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>March</td>
                                        <td>$86,000</td>
                                        <td>2024/03/01</td>
                                        <td>2024/03/31</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>April</td>
                                        <td>$433,060</td>
                                        <td>2024/04/01</td>
                                        <td>2024/04/30</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>May</td>
                                        <td>$162,700</td>
                                        <td>2024/05/01</td>
                                        <td>2024/05/31</td>
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
include 'footer.php';
?>