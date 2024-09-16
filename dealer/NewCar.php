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
                        <h4 class="mb-sm-0">Add Car</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Add Car</a></li>
                                <li class="breadcrumb-item active">Add Car</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add New Car</h4>

                            <div id="basic-pills-wizard" class="twitter-bs-wizard">
                                <ul class="twitter-bs-wizard-nav">
                                    <li class="nav-item">
                                        <a href="#seller-details" class="nav-link active" data-toggle="tab">
                                            <span class="step-number">01</span>
                                            <span class="step-title">Seller Details</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#company-document" class="nav-link" data-toggle="tab">
                                            <span class="step-number">02</span>
                                            <span class="step-title">Company Document</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#bank-detail" class="nav-link" data-toggle="tab">
                                            <span class="step-number">03</span>
                                            <span class="step-title">Bank Details</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#confirm-detail" class="nav-link" data-toggle="tab">
                                            <span class="step-number">04</span>
                                            <span class="step-title">Confirm Detail</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content twitter-bs-wizard-tab-content">
                                    <div class="tab-pane active" id="seller-details">
                                        <form>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basicpill-firstname-input">First Name</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-firstname-input"
                                                            placeholder="Enter your First Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basicpill-lastname-input">Last Name</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-lastname-input"
                                                            placeholder="Enter your Last Name">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basicpill-phoneno-input">Phone</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-phoneno-input"
                                                            placeholder="Enter your Phone No.">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basicpill-email-input">Email</label>
                                                        <input type="email" class="form-control"
                                                            id="basicpill-email-input"
                                                            placeholder="Enter your Email Id">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="basicpill-address-input">Address</label>
                                                        <textarea id="basicpill-address-input" class="form-control"
                                                            rows="2" placeholder="Enter your Address"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="company-document">
                                        <div>
                                            <form>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="basicpill-pancard-input">PAN Card</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-pancard-input"
                                                                placeholder="Enter your PAN Card No.">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="basicpill-vatno-input">VAT/TIN No.</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-vatno-input"
                                                                placeholder="Enter your VAT/TIN No.">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="basicpill-cstno-input">CST No.</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-cstno-input"
                                                                placeholder="Enter your CST No.">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="basicpill-servicetax-input">Service Tax
                                                                No.</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-servicetax-input"
                                                                placeholder="Enter your Service Tax No.">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="basicpill-companyuin-input">Company UIN</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-companyuin-input"
                                                                placeholder="Enter your Company UIN No.">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="basicpill-declaration-input">Declaration</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-declaration-input"
                                                                placeholder="Enter your Declaration">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="bank-detail">
                                        <div>
                                            <form>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="basicpill-namecard-input">Name on Card</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-namecard-input"
                                                                placeholder="Enter your Name on Card">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label>Credit Card Type</label>
                                                            <select class="form-select">
                                                                <option selected>Select Card Type</option>
                                                                <option value="AE">American Express</option>
                                                                <option value="VI">Visa</option>
                                                                <option value="MC">MasterCard</option>
                                                                <option value="DI">Discover</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="basicpill-cardno-input">Credit Card
                                                                Number</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-cardno-input"
                                                                placeholder="Enter your  Credit Card Number">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="basicpill-card-verification-input">Card
                                                                Verification Number</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-card-verification-input"
                                                                placeholder="Enter your Card Verification Number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="basicpill-expiration-input">Expiration
                                                                Date</label>
                                                            <input type="text" class="form-control"
                                                                id="basicpill-expiration-input"
                                                                placeholder="Enter your Expiration Date">
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="confirm-detail">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-6">
                                                <div class="text-center">
                                                    <div class="mb-4">
                                                        <i
                                                            class="mdi mdi-check-circle-outline text-success display-4"></i>
                                                    </div>
                                                    <div>
                                                        <h5>Confirm Detail</h5>
                                                        <p class="text-muted">If several languages coalesce, the
                                                            grammar of the resulting</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                    <li class="previous"><a href="javascript: void(0);">Previous</a></li>
                                    <li class="next"><a href="javascript: void(0);">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->
<?php
include 'footer.php';
?>