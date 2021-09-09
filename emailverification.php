<?php
require_once 'dbh.inc.php';
if (isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['hash']) && !empty($_GET['hash'])) {
    $email = $_GET['email'];
    $hash = $_GET['hash'];
    $active = 1;
    $verifyTeacher = "SELECT * FROM teacher WHERE teacherEmail='$email' AND emailhash='$hash'";
    $runVerifyTeacher = mysqli_query($conn, $verifyTeacher);
    $verifyStudent = "SELECT * FROM student WHERE studentEmail='$email' AND emailhash='$hash'";
    $runVerifystudent = mysqli_query($conn, $verifyStudent);
    if (mysqli_num_rows($runVerifyTeacher) > 0) {
        $updateTeacher = "UPDATE teacher SET active='$active' WHERE teacherEmail='$email' AND emailHash='$hash'";
        $updateuser = "UPDATE users SET active='$active' WHERE userEmail='$email' AND emailHash='$hash'";
        $runUpdateUser = mysqli_query($conn, $updateuser) or die("Query unsuccessfull");
        $runUpdateTeacher = mysqli_query($conn, $updateTeacher) or die("Query unsuccessfull");
        header("location: ../sign in.php?message=emailverified");
        exit();
    } elseif (mysqli_num_rows($runVerifystudent) > 0) {
        $updateStudent = "UPDATE student SET active='$active' WHERE studentEmail='$email' AND emailHash='$hash'";
        $updateuser = "UPDATE users SET active='$active' WHERE userEmail='$email' AND emailHash='$hash'";
        $runUpdateUser = mysqli_query($conn, $updateuser) or die("Query unsuccessfull");
        $runUpdateStudent = mysqli_query($conn, $updateStudent) or die("Query unsuccessfull");
        header("location: ../sign in.php?message=emailverified");
        exit();
    } else {
        header("location: ../sign in.php?message=emailnotverified");
        exit();
    }
} else {
    header("location: ../sign up.php");
    exit();
}
