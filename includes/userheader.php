<?php require_once 'userhead.php' ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<?php // Start the session
// Check if the user is already logged in
if (isset($_SESSION['role'])) {

    // Get the current role
    $currentRole = $_SESSION['role'];

    // Output the current role
    echo "Current user role: " . $currentRole;

    // Redirect based on user role
    if ($_SESSION['role'] === 'admin') {
        header("Location: ../Manage/Dashboard.php"); // Redirect to admin Dashboard
    } elseif ($_SESSION['role'] === 'dealer') {
        header("Location: ../Manage/Dashboard.php"); // Redirect to dealer Dashboard
    } elseif ($_SESSION['role'] === 'website_user') {
        header("Location: test.php"); // Redirect to user page
    } else {
        header("Location: index.php"); // Redirect to mypage for unrecognized roles
    }
    exit(); // Stop script execution
}
?>


<!-- Responsive navbar -->
<nav class="navbar navbar-expand-lg py-3 navbar-light bg-white px-3 sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= BASE_URL ?>user/index">
            <img src="../assets/images/logo/logo.png" alt="KenzWheels Logo" style="height: 45px; width: 150px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"
            id="hamburger-toggle">
            <div class="menu-icon">
                <span></span>
                <span class="ms-2"></span>
                <span></span>
            </div>
        </button>
        <div class="collapse navbar-collapse overlay-menu1" id="navbarNavDropdown">
            <ul class="navbar-nav gap-3 d-flex ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Used Cars<i class="bi bi-chevron-down dropdown-icon"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="<?= BASE_URL ?>user/usedcars">
                                <i class="fas fa-search pe-2"></i> Find Used Cars for Sale
                                <small class="dropdown-item-text">Search from over 110k options</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= BASE_URL ?>user/featuredcars">
                                <i class="fas fa-star pe-2"></i> Featured Used Cars
                                <small class="dropdown-item-text">View Featured Cars by KenzWheels</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= BASE_URL ?>Manage/dashboard">
                                <i class="fas fa-car-side pe-2"></i> Sell Your Car
                                <small class="dropdown-item-text">Post Ad and Sell Your Cars Quickly</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= BASE_URL ?>Manage/dashboard">
                                <i class="fas fa-users pe-2"></i> Used Car Dealers
                                <small class="dropdown-item-text">Find Used Car Dealers Near You</small>
                            </a>
                        </li>
                        <!-- <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-calculator pe-2"></i> Price Calculator
                                <small class="dropdown-item-text">Calculate The Market Price of Cars</small>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        New Cars<i class="bi bi-chevron-down dropdown-icon"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                        <li>
                            <a class="dropdown-item" href="<?= BASE_URL ?>user/newcars">
                                <i class="fas fa-car pe-2"></i> Find New Cars
                                <small class="dropdown-item-text">See New Cars in India</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-exchange-alt pe-2"></i> Car Comparisons
                                <span class="badge bg-warning text-dark ms-2">Coming Soon</span>
                                <small class="dropdown-item-text">Compare Cars and Find their Differences</small>
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-car pe-2"></i> Cars by Make
                                <small class="dropdown-item-text">Browse cars sorted by make</small>
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="<?= BASE_URL ?>user/newcars">
                                <i class="fas fa-tag pe-2"></i> Prices
                                <small class="dropdown-item-text">See Prices Of New Cars</small>
                            </a>
                        </li>
                        <!-- <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-road pe-2"></i> On Road Price
                                <small class="dropdown-item-text">Calculate The Total Cost of New Cars</small>
                            </a>
                        </li> -->
                        <li>
                            <a class="dropdown-item" href="<?= BASE_URL ?>Manage/dashboard">
                                <i class="fas fa-users pe-2"></i> New Car Dealers
                                <small class="dropdown-item-text">Find New Car Dealers</small>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink3" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Auto Store<i class="bi bi-chevron-down dropdown-icon"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
                        <li>
                            <a class="dropdown-item" href="<?= BASE_URL ?>user/autostore">
                                <i class="fas fa-store pe-2"></i> KenzWheels Autostore
                                <small class="dropdown-item-text">Buy Auto Parts & Accessories directly</small>
                            </a>
                        </li>
                        <!-- <li>
                            <a class="dropdown-item" href="<?= BASE_URL ?>user/autostore">
                                <i class="fas fa-search pe-2"></i> Find Auto Parts
                                <small class="dropdown-item-text">Find Auto Parts For Your Car</small>
                            </a>
                        </li> -->
                        <li>
                            <a class="dropdown-item" href="<?= BASE_URL ?>Manage/dashboard">
                                <i class="fas fa-shopping-cart pe-2"></i> Sell Car Parts
                                <small class="dropdown-item-text">Post Ad and Sell Your Car Parts Quickly</small>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="nav-item"><a class="nav-link" href="#">Videos</a></li> -->
                <li class="nav-item"><a class="nav-link" href="#">Cars By Make</a></li>
            </ul>
            <div class="d-flex gap-2" id="authButtons">
                <!-- Sign In Button -->
                <a class="btn btn-outline-primary ms-3" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Sign In</a>
                <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#userRegistrationModal">Sign Up</a>
            </div>

            <!-- Profile Dropdown (hidden initially) -->
            <div class="d-flex gap-2" id="profileDropdown" style="display: none;">
                <div class="dropdown">
                    <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="default-profile.jpg" id="profilePic" alt="Profile" class="rounded-circle" style="width: 30px; height: 30px;">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="#" id="logoutButton">Logout</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</nav>



<!--Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex flex-column align-items-center">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <img src="../assets/images/logo/logo.png" alt="Kenz Wheels Logo" class="img-fluid"
                    style="max-height: 50px;">
                <h5 class="modal-title mt-3" id="loginModalLabel">Sign In to KenzWheels</h5>
            </div>
            <div class="modal-body">
                <form id="loginForm" class="form-horizontal">
                    <div class="mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"
                            required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="userpassword">Password</label>
                        <input type="password" class="form-control" id="userpassword" name="password"
                            placeholder="Enter password" required>
                    </div>
                    <div class="d-grid">
                        <button class="btn rounded-eclipse btn-primary waves-effect waves-light" type="submit">Log
                            In</button>
                    </div>
                    <div class="row mt-3 d-flex justify-content-end">
                        <div class="col-auto">
                            <a href="#" class="text-color" data-bs-toggle="modal"
                                data-bs-target="#passwordRecoverModal">
                                <i class="mdi mdi-lock"></i> Forgot your password?
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <p class="text-dark-50">
                    Don’t have an account yet?
                    <a href="#" class="text-color" data-bs-toggle="modal" data-bs-target="#userRegistrationModal">Register now</a>

                    to get started!
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Password Reset -->
<div class="modal fade" id="passwordRecoverModal" tabindex="-1" aria-labelledby="passwordRecoverModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordRecoverModalLabel">Password Reset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="resetpasswordForm" class="form-horizontal" novalidate>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="reset-email" name="email"
                            placeholder="Enter your registered email" required>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>
                    <div class="d-grid">
                        <button class="btn rounded-eclipse btn-primary waves-effect waves-light" type="submit">Send
                            OTP</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <p class="text-dark-50">
                    Remember your password? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"
                        class="text-color">Login</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Modal for User Registration -->
<div class="modal fade" id="userRegistrationModal" tabindex="-1" aria-labelledby="userRegistrationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userRegistrationModalLabel">User Registration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="registrationForm" class="form-horizontal" novalidate>
                    <div class="mb-3">
                        <label class="form-label" for="first-name">First Name</label>
                        <input type="text" class="form-control" id="first-name" name="first_name" placeholder="Enter First Name" required>
                        <div class="invalid-feedback">Please enter your first name.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="last-name">Last Name</label>
                        <input type="text" class="form-control" id="last-name" name="last_name" placeholder="Enter Last Name" required>
                        <div class="invalid-feedback">Please enter your last name.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="mobile-number">Mobile Number</label>
                        <input type="tel" class="form-control" id="mobile-number" name="mobile_number" placeholder="Enter Mobile Number" required pattern="[0-9]{10}">
                        <div class="invalid-feedback">Please enter a valid mobile number (10 digits).</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" class="form-control" id="register-email" name="email" placeholder="Enter Email" required>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required minlength="6">
                        <div class="invalid-feedback">Please enter a password (at least 6 characters).</div>
                    </div>
                    <div class="mb-3">
                        <button class="btn rounded-eclipse btn-primary waves-effect waves-light" type="submit">Register</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <p class="text-dark-50">
                    Already have an account? <a href="#" data-bs-toggle="modal"
                        data-bs-target="#loginModal" class="text-color">Login</a>
                </p>
            </div>
        </div>
    </div>
</div>