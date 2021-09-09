<?php
session_start();
require_once 'dbh.inc.php';
if (!isset($_SESSION["useruid"])) {
    header("location: ../index.php");
    exit();
}
$userUid = $_SESSION['useruid'];
$query = "SELECT * FROM teacher WHERE teacherUid='$userUid'";
$run = mysqli_query($conn, $query);
if (mysqli_num_rows($run) === 0) {
    header("location: ../index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="assets/js/aos.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="shortcut icon" href="assets/img/favicon-16x16.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="assets/css/app.css">-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <title>RELEARN</title>
    <style>
        .sticky-offset {
            top: 55px;
        }
    </style>
</head>

<body>
    <!--header section-->
    <div id="wrapper">
        <header>
            <nav id="main-nav" class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand brand" href="../index.php" id="brand">
                        <img src="assets/img/logo.png" alt="logo" width="30" height="24" class="d-inline-block align-top" id="brandlogo">
                        RELEARN
                    </a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="nav">
                        <ul class="navbar-nav ml-auto mr-4" id="nav-links">
                            <li class="nav-item">
                                <a href="add-services.php" class="nav-link"><i class="fas fa-plus-square"></i> Add Services</a>
                            </li>
                            <li class="nav-item">
                                <a href="add-videos.php" class="nav-link"><i class="fas fa-user-plus"></i> Add Videos</a>
                            </li>
                            <li class="nav-item">
                                <a href="profile.php" class="nav-link"><i class="fas fa-users"></i> Profile</a>
                            </li>
                            <?php
                            if (isset($_SESSION["useruid"])) {
                                echo " <li class='nav-item'><a href='logout.inc.php' class='nav-link'><i class='fas fa-power-off'></i> Logout</a>
                            </li>";
                            } else {
                                header("location: ./index.php");
                                exit();
                            }
                            ?>

                        </ul>
                    </div>

                </div>
            </nav>

        </header>
        <main>