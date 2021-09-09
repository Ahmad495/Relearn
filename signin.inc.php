<?php

if (isset($_POST["submit"])) {
    $uId = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    loginUser($conn, $uId, $userPassword);
} else {
    header("location: ../sign in.php");
    exit();
}
