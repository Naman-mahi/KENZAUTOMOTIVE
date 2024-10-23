<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body data-sidebar="light">

    <div class="account-pages d-flex align-items-center min-vh-100 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mb-4">
                                <a href="index.html" class="d-inline-block">
                                    <img src="assets/images/logo_new-removebg.png" alt="" height="24" class="auth-logo logo-dark mx-auto">
                                    <img src="assets/images/logo_new-removebg.png" alt="" height="24" class="auth-logo logo-light mx-auto">
                                </a>
                            </div>
                            <!-- <h4 class="font-size-18 text-muted mt-2 text-center">Welcome Back !</h4> -->
                            <p class="mb-5 text-center">Reset Your Passowrd with Kenz Automotive.</p>

                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                Enter your <b>Email</b> and instructions will be sent to you!
                            </div>
                            <form class="form-horizontal">
                                <div class="mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email">
                                </div>
                                <div class="d-grid">
                                    <button class="btn rounded-0  btn-primary waves-effect waves-light" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p class="text-dark-50">Already have an account? <a href="AuthLogin.php" class="fw-medium text-primary">Login</a></p>
                        <p class="text-dark-50">Don't have an account? <a href="AuthRegister.php" class="fw-medium text-primary">Register</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>   
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>