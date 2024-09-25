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
                <h4 class="mb-sm-0">Dashboard</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    
    <?php
    if ($_SESSION['role'] === 'admin') {
    ?>
        <div class="row">
            <div class="col-xl-3 col-sm-6">
                <div class="card card-dashboard shadow-lg">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="mdi mdi-account fs-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total Customers</p>
                                <h5 class="mb-3">150</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-xl-3 col-sm-6">
                <div class="card card-dashboard shadow-lg">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="mdi mdi-account-group fs-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total Dealers</p>
                                <h5 class="mb-3">30</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-xl-3 col-sm-6">
                <div class="card card-dashboard shadow-lg">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="mdi mdi-comment-question-outline fs-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total Inquiries</p>
                                <h5 class="mb-3">50</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-xl-3 col-sm-6">
                <div class="card card-dashboard shadow-lg">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="mdi mdi-eye fs-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total Visits</p>
                                <h5 class="mb-3">500</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    <?php
    } elseif ($_SESSION['role'] === 'dealer') {
    ?>
        <div class="row">
            <div class="col-xl-3 col-sm-6">
                <div class="card card-dashboard shadow-lg">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="mdi mdi-package-variant-closed fs-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">My Products</p>
                                <h5 class="mb-3">120</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-xl-3 col-sm-6">
                <div class="card card-dashboard shadow-lg">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="mdi mdi-comment-question-outline fs-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total Inquiries</p>
                                <h5 class="mb-3">25</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-xl-3 col-sm-6">
                <div class="card card-dashboard shadow-lg">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="mdi mdi-eye fs-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total Product Views</p>
                                <h5 class="mb-3">40</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-xl-3 col-sm-6">
                <div class="card card-dashboard shadow-lg">
                    <div class="card-body">
                        <div class="d-flex text-muted">
                            <div class="flex-shrink-0 me-3 align-self-center">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="mdi mdi-cash fs-2"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="mb-1">Total Sales</p>
                                <h5 class="mb-3">200</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    <?php
    } else {
        // Redirect to login page if user is not admin or dealer
        header("Location: login.php");
        exit(); // Ensure no further code is executed
    }
    ?>
</div> <!-- container-fluid -->

    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->
<?php
include 'footer.php';
?>