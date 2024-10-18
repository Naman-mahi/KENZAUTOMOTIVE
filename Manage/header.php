<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box text-center">
                <a href="Dashboard" class="logo logo-dark">
                    <span class="logo-sm">
                        <div class="fs-5 fw-bold"> KENZ</div>
                    </span>
                    <span class="logo-lg">
                        <div class="fs-4 fw-bold"> KENZ WHEELS</div>
                    </span>
                </a>
            </div>
            <button type="button" class="btn rounded-0  btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn rounded-0  header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-search-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">
                    <form class="p-3">
                        <div class="mb-3 m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <div class="input-group-append">
                                    <button class="btn rounded-0  btn-primary" type="submit"><i
                                            class="ri-search-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <a class="rounded-0 fs-6" href="DealerConnect"> <i class="mdi mdi-handshake"></i> Dealer Connect</a>

                <button type="button" class="btn rounded-0 header-item noti-icon waves-effect" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                    <i class="ri-wallet-3-line"></i>
                </button>
                <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false"
                    tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel"> My Wallet 

                        <i class="ri-wallet-3-line"></i>

                        </h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <p>Wallet Balance: ₹ 0</p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                        <button type="button" class="btn btn-primary rounded-0">
                            <i class="ri-add-line me-1"></i>Add Money
                        </button>

                    </div>
                    </div>
                </div>
                <button type="button" class="btn rounded-0  header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn rounded-0  header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="assets/profilepics/<?= htmlspecialchars($_SESSION['profile_pic']) ?>"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1"><?= htmlspecialchars($_SESSION['first_name']) ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- Profile option for all users -->
                    <a class="dropdown-item" href="Profile"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="MyReferral"><i class="ri-user-add-line align-middle me-1"></i> My Referral</a>

                    <!-- Role-based options -->
                    <?php if ($_SESSION['role'] === 'admin'): ?>
                        <!-- <a class="dropdown-item" href="UserManagement"><i class="ri-admin-line align-middle me-1"></i> User Management</a>
                        <a class="dropdown-item" href="ProductManagement"><i class="ri-settings-2-line align-middle me-1"></i> Product Management</a> -->
                    <?php elseif ($_SESSION['role'] === 'dealer'): ?>
                        <a class="dropdown-item" href="MySubscription"><i class="ri-car-line align-middle me-1"></i> Subscription</a>
                    <?php endif; ?>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="logout"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>