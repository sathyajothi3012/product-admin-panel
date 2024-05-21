<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
session_start();
include_once ("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["emailaddress"]) && isset($_POST["password"]) && !empty($_POST["emailaddress"]) && !empty($_POST["password"])) {
        $email = filter_var($_POST["emailaddress"], FILTER_VALIDATE_EMAIL);
        $password = $_POST["password"];

        if ($email) {
            // Hash the password provided during login
            $hashed_password = hash('sha256', $password);

            // Prepare SQL statement to retrieve the hashed password from the database
            $sql = "SELECT password FROM users WHERE emailaddress = ? AND password = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $email, $hashed_password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $_SESSION["loggedin"] = true;
                $_SESSION["email"] = $email;
                header("Location: index.php");
                exit;
            } else {
                $error_message = "Invalid email or password";
            }
        } else {
            $error_message = "Invalid email format";
        }
    } else {
        $error_message = "Email and password are required";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In - For Testing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                    <a href="index.html" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="http://test.com/mjFresh/images/logo.png" alt="" height="22">
                                        </span>
                                    </a>

                                    <a href="index.html" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="http://test.com/mjFresh/images/logo.png" alt="" height="70">
                                        </span>
                                    </a>
                                </div>
                                <h1>Admin Login</h1>
                                <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin
                                    panel.</p>
                            </div>

                            <?php if (isset($error_message)): ?>
                                <div class="alert alert-danger" role="alert">
                                     <?php echo $error_message; ?>
                                </div>
                          <?php endif; ?>


                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" id="emailaddress" required=""
                                        name="emailaddress" placeholder="Enter your email">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="Enter your password">
                                        <div class="input-group-append" data-password="false">
                                            <div class="input-group-text">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin"
                                            checked>
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <a href="index.php"> <button class="btn btn-primary btn-block" type="submit"> Log In
                                        </button></a>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p> <a href="#" class="text-white-50 ml-1">Forgot your password?</a></p>
                            <p class="text-white-50">Don't have an account? <a href="auth-register.html"
                                    class="text-white ml-1"><b>Sign Up</b></a></p>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer footer-alt">
        <script>document.write(new Date().getFullYear())</script> &copy; Testing <a href="#" class="text-white-50">By
            sathya</a>
    </footer>
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

</body>

</html>