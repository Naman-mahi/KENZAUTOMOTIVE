<?php require_once 'userhead.php' ?>
<header id="main-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <!-- First Row: Centered Logo and Toggler Button for Small Screens -->
            <div class="row w-100 rightmar">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <!-- Align Logo to the Left on Small Devices, Center on Large Devices -->
                    <a class="navbar-brand mx-lg-auto" href="<?php echo BASE_URL; ?>index">
                        <img src="<?php echo BASE_URL; ?>assets/images/logo/logo_new-removebg.png" alt="Kenz AUTOMOTIVE Logo - Global Leadership with Trust" class="logo">
                    </a>
                    <!-- Toggler Button for Small Screens: Align to Right -->
                    <div class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                        <div class="menu-toggle">
                            <span></span>
                            <span class="move"></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Second Row: Nav Links for Large Screens -->
            <div class="row w-100">
                <div class="col-12">
                    <div class="collapse navbar-collapse justify-content-around">
                        <ul class="navbar-nav d-flex justify-content-evenly w-100">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>aboutus">Used Cars</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>New Cars">New Cars</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>multimedia">Auto Store</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>investor">Videos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>contactus">More</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Offcanvas Menu -->
            <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
            <div class="row w-100 rightmar">
                <div class="offcanvas-header">
                    <div class="offcanvas-title">
                        <a class="navbar-brand" href="<?php echo BASE_URL; ?>index">
                            <img src="<?php echo BASE_URL; ?>assets/images/logo/logo.png" alt="Kenz AUTOMOTIVE Logo" class="logo">
                        </a>
                    </div>
                    <!-- Custom Close Button Styled as menu-toggle -->
                    <div class="menu-toggle-close" data-bs-dismiss="offcanvas" aria-label="Close">
                        <div class="menu-toggle active">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav">
                        <div class="row">
                            <!-- <div class="col-2"></div> -->
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>aboutus">Used Cars</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>New Cars">New Cars</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>multimedia">Auto Store</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>investor">Videos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>contactus">More</a>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
            </div>
        </div>
    </nav>
</header>
<script>
    // Toggle the hamburger icon and offcanvas menu
    document.querySelectorAll('.menu-toggle, .menu-toggle-close').forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            // Toggle 'active' class to change the icon from burger to close and vice versa
            document.querySelector('.menu-toggle').classList.toggle('active');
        });
    });

    // Automatically remove the 'active' class from the menu toggle when the offcanvas is closed
    document.getElementById('offcanvasMenu').addEventListener('hidden.bs.offcanvas', function() {
        document.querySelector('.menu-toggle').classList.remove('active');
    });
</script>
<?php require_once 'userfooter.php' ?>
