<?php

if (isset($_POST["submit"])) {
    $name = $_POST["userName"];
    $uId = $_POST["userId"];
    $email = $_POST["userEmail"];
    $userType = $_POST["userType"];
    $userPassword = $_POST["userPassword"];
    $userPasswordRepeat = $_POST["confirmPassword"];
    $hash = rand(1000, 5000);

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptySignupInput($name, $uId, $email, $userType, $userPassword) !== false) {
        header("location: ../sign up.php?error=emptyinput");
        exit();
    }

    if (invalidUid($uId) !== false) {
        header("location: ../sign up.php?error=invailduid");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../sign up.php?error=invaildemail");
        exit();
    }

    if (passwordMatch($userPassword, $userPasswordRepeat) !== false) {
        header("location: ../sign up.php?error=passwordsdontmatch");
        exit();
    }

    //if (uIdExist($conn, $uId, $email) !== false) {
    //    header("location: ../sign up.php?error=usernametaken");
    //    exit();
    // }

    if (teacherIdExist($conn, $uId, $email) !== false) {
        header("location: ../sign up.php?error=usernametaken");
        exit();
    }

    if (studentIdExist($conn, $uId, $email) !== false) {
        header("location: ../sign up.php?error=usernametaken");
        exit();
    }

    if (passwordStrength($userPassword) !== false) {
        header("location: ../sign up.php?error=weakpassword");
        exit();
    }

    createUser($conn, $name, $uId, $email, $userType, $userPasswordRepeat, $hash);
} else {
    header("location: ../sign up.php");
    exit();
}
