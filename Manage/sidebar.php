<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu shadow-lg">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li>
                    <a href="dashboard.php" class="waves-effect">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <?php if ($_SESSION['role'] === 'admin'): ?>
                    <li>
                        <a href="CustomerManagement.php" class="waves-effect">
                            <i class="mdi mdi-account-circle-outline"></i> <!-- User Management Icon -->
                            <span>User Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="DealerManagement.php" class="waves-effect">
                            <i class="mdi mdi-account-tie-outline"></i> <!-- Dealer Management Icon -->
                            <span>Dealer Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="CategoryManagement.php" class="waves-effect">
                            <i class="mdi mdi-tag-outline"></i> <!-- Category Management Icon -->
                            <span>Category Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="SubscriptionManagement.php" class="waves-effect">
                            <i class="mdi mdi-calendar-check-outline"></i> <!-- Subscriptions Icon -->
                            <span>Subscriptions</span>
                        </a>
                    </li>
                    <li>
                        <a href="AppearanceManagement.php" class="waves-effect">
                            <i class="mdi mdi-calendar-check-outline"></i> <!-- Subscriptions Icon -->
                            <span>Appearance</span>
                        </a>
                    </li>

                <?php elseif ($_SESSION['role'] === 'dealer'): ?>
                    <li>
                        <a href="MyProducts.php" class="waves-effect">
                            <i class="mdi mdi-plus-circle-outline"></i>
                            <span>My Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="ManageInquiry.php" class="waves-effect">
                            <i class="mdi mdi-comment-question-outline"></i>
                            <span>Inquiry</span>
                        </a>
                    </li>

                    <li>
                        <a href="ManageOrders.php" class="waves-effect">
                            <i class="mdi mdi-cart-outline"></i>
                            <span>My Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="ManageProductInventry.php" class="waves-effect">
                            <i class="mdi mdi-cog"></i>
                            <span>Product Inventry</span>
                        </a>
                    </li>
                <?php endif; ?>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->