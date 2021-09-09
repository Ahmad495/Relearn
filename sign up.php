<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/064bd45e56.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="assets/js/aos.css">
    <link rel="shortcut icon" href="assets/img/favicon-16x16.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <title>RELEARN</title>
</head>

<body>

    <main>
        <div class="container" data-aos="zoom-in">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card card-signin flex-row my-5">
                        <div class="card-img-left d-none d-md-flex" id="form-img">
                            <img src="assets/img/sign-up 1.svg" alt="form-img" class="img-fluid">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Register:</h5>
                            <form class="form-signin" action="include/signup.inc.php" method="post">
                                <div class="form-label-group">
                                    <input type="text" id="inputUserame" class="form-control" placeholder="Username" name="userName" required autofocus>
                                    <label for="inputUserame">Username</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" id="inputUserId" class="form-control" placeholder="UserId" name="userId" required>
                                    <label for="inputUserId">UserId</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="userEmail" required>
                                    <label for="inputEmail">Email address</label>
                                </div>

                                <div class=" col-lg-12 col-md-12" id="option">
                                    <select class="custom-select d-block w-100" type="text" name="userType" required>
                                        <option value="">Sign Up As</option>
                                        <option>Teacher</option>
                                        <option>Student</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid Option.
                                    </div>

                                </div>

                                <hr>

                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="userPassword" required>
                                    <label for="inputPassword">Password</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" name="confirmPassword" required>
                                    <label for="inputConfirmPassword">Confirm password</label>
                                </div>
                                <a class="d-block text-center mt-2 small" href="sign in.php">Sign In</a>
                                <a class="d-block text-center mt-2 small" href="index.php">Home Page</a>
                                <hr>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo '<script type="text/javascript">';
            echo ' alert("Input empty")';  //not showing an alert box.
            echo '</script>';
        } elseif ($_GET["error"] == "invailduid") {
            echo '<script type="text/javascript">';
            echo ' alert("Invalid User name")';  //not showing an alert box.
            echo '</script>';
        } elseif ($_GET["error"] == "invaildemail") {
            echo '<script type="text/javascript">';
            echo ' alert("Invalid Email")';  //not showing an alert box.
            echo '</script>';
        } elseif ($_GET["error"] == "passwordsdontmatch") {
            echo '<script type="text/javascript">';
            echo ' alert("Password does not match")';  //not showing an alert box.
            echo '</script>';
        } elseif ($_GET["error"] == "usernametaken") {
            echo '<script type="text/javascript">';
            echo ' alert("User name taken")';  //not showing an alert box.
            echo '</script>';
        } elseif ($_GET["error"] == "weakpassword") {
            echo '<script type="text/javascript">';
            echo ' alert("Password sholud be 8 character long and should have at one small and one capital Letter")';  //not showing an alert box.
            echo '</script>';
        } elseif ($_GET["error"] == "stmtfailed") {
            echo '<script type="text/javascript">';
            echo ' alert("Something went wrong")';  //not showing an alert box.
            echo '</script>';
        } elseif ($_GET["error"] == "none") {
            echo '<script type="text/javascript">';
            echo ' alert("You have Signed up")';  //not showing an alert box.
            echo '</script>';
        }
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="assets/vendor/bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
    <script src="assets/js/aos.js"></script>
    <script>
        AOS.init({
            offset: 300,
            duration: 1000
        });
    </script>
</body>

</html>