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
                            <h5 class="card-title text-center">Change Password</h5>
                            <?php
                            $email = $_GET['email'];
                            ?>
                            <form class="form-signin" action="include/changePassword.inc.php" method="post">
                                <input type="hidden" name="email" value="<?php echo $email; ?>">
                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="userPassword" required>
                                    <label for="inputPassword">Password</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" name="confirmPassword" required>
                                    <label for="inputConfirmPassword">Confirm password</label>
                                </div>
                                <hr>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    if (isset($_GET["error"])) {
        if($_GET["error"] == "passwordnotmatch") {
            echo '<script type="text/javascript">';
            echo ' alert("Entered password does not match")';  //not showing an alert box.
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