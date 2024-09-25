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
                        <h4 class="mb-sm-0">Manage Inventory</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Inventory</li>
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
                            <div class="table-responsive">
                                <table class="table table-editable table-nowrap align-middle table-edits">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Last Updated</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-id="1">
                                            <td data-field="id" style="width: 80px">1</td>
                                               <td data-field="name">Updated Product A</td>
                                            <td data-field="quantity">24</td>
                                            <td data-field="unit_price">$10.00</td>
                                            <td>2024-09-24 10:30 AM</td>
                                            <td style="width: 100px">
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr data-id="2">
                                            <td data-field="id">2</td>
                                            <td data-field="name">Updated Product B</td>
                                            <td data-field="quantity">22</td>
                                            <td data-field="unit_price">$15.00</td>
                                            <td>2024-09-24 11:00 AM</td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr data-id="3">
                                            <td data-field="id">3</td>
                                            <td data-field="name">Updated Product C</td>
                                            <td data-field="quantity">26</td>
                                            <td data-field="unit_price">$20.00</td>
                                            <td>2024-09-24 11:30 AM</td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr data-id="4">
                                            <td data-field="id">4</td>
                                            <td data-field="name">Updated Product D</td>
                                            <td data-field="quantity">32</td>
                                            <td data-field="unit_price">$25.00</td>
                                            <td>2024-09-24 12:00 PM</td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr data-id="5">
                                            <td data-field="id">5</td>
                                            <td data-field="name">Updated Product E</td>
                                            <td data-field="quantity">27</td>
                                            <td data-field="unit_price">$30.00</td>
                                            <td>2024-09-24 12:30 PM</td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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