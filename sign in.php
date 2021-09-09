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
    <link rel="stylesheet" href="assets/css/signin.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <title>RELEARN</title>
</head>

<body>

    <main>
        <div class="container mt-5" data-aos="zoom-in">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Sign In</h5>
                            <form class="form-signin" action="include/signin.inc.php" method="post">
                                <div class="form-label-group">
                                    <input type="text" id="inputEmail" class="form-control" placeholder="Email/User id" name="userEmail" required autofocus>
                                    <label for="inputEmail">Email address</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="userPassword" required>
                                    <label for="inputPassword">Password</label>
                                </div>
                                <a class="d-block text-center mt-2 small" href="forgetpassword.php">Forgot Password</a>
                                <a class="d-block text-center mt-2 small" href="sign up.php">Sign up</a>
                                <a class="d-block text-center mt-2 small" href="index.php">Home Page</a>
                                <hr>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Sign
                                    in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    if (isset($_GET["error"])) {
        if($_GET["error"] == "none") {
            echo '<script type="text/javascript">';
            echo ' alert("verification email is send to your account")';  //not showing an alert box.
            echo '</script>';
        }
        else if ($_GET["error"] == "wrongloginpassword") {
            echo '<script type="text/javascript">';
            echo ' alert("Wrong Login password")';  //not showing an alert box.
            echo '</script>';
        } elseif ($_GET["error"] == "wrongloginemail") {
            echo '<script type="text/javascript">';
            echo ' alert("Wrong Login email/username")';  //not showing an alert box.
            echo '</script>';
        }
    }
    ?>
    <?php
    if (isset($_GET["message"])) {
        if ($_GET["message"] == "emailnotverified") {
            echo '<script type="text/javascript">';
            echo ' alert("Your email cannot be verified")';  //not showing an alert box.
            echo '</script>';
        } elseif ($_GET["message"] == "emailverified") {
            echo '<script type="text/javascript">';
            echo ' alert("You can login now")';  //not showing an alert box.
            echo '</script>';
        }elseif ($_GET["message"] == "passwordchanged") {
            echo '<script type="text/javascript">';
            echo ' alert("Your password is changed now")';  //not showing an alert box.
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