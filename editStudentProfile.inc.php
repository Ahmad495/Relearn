<?php
$userUid = $_GET['userUid'];
if (isset($_POST["submit"])) {
    $oldPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];
    $repeatNewPassword = $_POST["repeatNewPassword"];

    require_once 'dbh.inc.php';
    require_once 'editProfileFunctions.inc.php';

    if (emptySignupInput($oldPassword, $newPassword, $repeatNewPassword) !== false) {
        header("location: ../studentdashboard.php?error=emptyinput");
        exit();
    }
    if (passwordStrength($newPassword) !== false) {
        header("location: ../studentdashboard.php?error=weakpassword");
        exit();
    }
    if (passwordMatch($newPassword, $repeatNewPassword) !== false) {
        header("location: ../studentdashboard.php?error=newpasswordsdontmatch");
        exit();
    }
    editStudentProfile($conn, $newPassword, $oldPassword, $userUid);
} else {
    header("location: ../studentdashboard.php.php");
    exit();
}
