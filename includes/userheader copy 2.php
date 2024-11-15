<?php require_once 'userhead.php' ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<nav class="navbar navbar-expand-lg py-3">
    <div class="container">
        <a class="navbar-brand" href="<?= BASE_URL ?>user/index.php">
            <img src="../assets/images/logo/logo.png" alt="KenzWheels Logo" style="height: 45px; width: 150px;"> <!-- Adjust height as needed -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <div class="menu-toggle">
                <span></span>
                <span class="move"></span>
                <span></span>
            </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto gap-3">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Used Cars<i class="bi bi-chevron-down dropdown-icon"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="<?= BASE_URL ?>/user/usedcars">
                                <i class="fas fa-search pe-2"></i> Find Used Cars for Sale
                                <small class="dropdown-item-text">Search from over 110k options</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-star pe-2"></i> Featured Used Cars
                                <small class="dropdown-item-text">View Featured Cars by KenzWheels</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-car-side pe-2"></i> Sell Your Car
                                <small class="dropdown-item-text">Post Ad and Sell Your Cars Quickly</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-users pe-2"></i> Used Car Dealers
                                <small class="dropdown-item-text">Find Used Car Dealers Near You</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-calculator pe-2"></i> Price Calculator
                                <small class="dropdown-item-text">Calculate The Market Price of Cars</small>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        New Cars<i class="bi bi-chevron-down dropdown-icon"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-car pe-2"></i> Find New Cars
                                <small class="dropdown-item-text">See New Cars in India</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-exchange-alt pe-2"></i> Car Comparisons
                                <small class="dropdown-item-text">Compare Cars and Find their Differences</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-star pe-2"></i> Reviews
                                <small class="dropdown-item-text">Read Reviews Of All Cars</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-tag pe-2"></i> Prices
                                <small class="dropdown-item-text">See Prices Of New Cars</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-road pe-2"></i> On Road Price
                                <small class="dropdown-item-text">Calculate The Total Cost of New Cars</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-users pe-2"></i> New Car Dealers
                                <small class="dropdown-item-text">Find New Car Dealers</small>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Auto Store<i class="bi bi-chevron-down dropdown-icon"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-store pe-2"></i> KenzWheels Autostore
                                <small class="dropdown-item-text">Buy Auto Parts & Accessories directly</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-search pe-2"></i> Find Auto Parts
                                <small class="dropdown-item-text">Find Auto Parts For Your Car</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-shopping-cart pe-2"></i> Sell Car Parts
                                <small class="dropdown-item-text">Post Ad and Sell Your Car Parts Quickly</small>
                            </a>
                        </li>
                    </ul>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">More
                        <!-- <i class="bi bi-chevron-down dropdown-icon"></i> -->
                    </a>
                </li>
            </ul>
            <div class="d-flex gap-2">
                <a class="btn btn-outline-primary" href="#">Sign In</a>
                <a class="btn btn-primary" href="#">Sign Up</a>
            </div>
        </div>
    </div>
</nav>
<script>
    document.querySelectorAll('.nav-item.dropdown').forEach(item => {
        item.addEventListener('click', () => {
            item.classList.toggle('active'); // Toggle the active class
        });
    });
</script>