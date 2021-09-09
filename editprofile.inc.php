<?php
$userUid = $_GET['userUid'];
if (isset($_POST["submit"])) {
    $oldPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];
    $repeatNewPassword = $_POST["repeatNewPassword"];

    require_once 'dbh.inc.php';
    require_once 'editProfileFunctions.inc.php';

    if (emptySignupInput($oldPassword, $newPassword, $repeatNewPassword) !== false) {
        header("location: ../profile.php?error=emptyinput");
        exit();
    }
    if (passwordStrength($newPassword) !== false) {
        header("location: ../profile.php?error=weakpassword");
        exit();
    }
    if (passwordMatch($newPassword, $repeatNewPassword) !== false) {
        header("location: ../profile.php?error=newpasswordsdontmatch");
        exit();
    }
    editUserProfile($conn, $newPassword, $oldPassword, $userUid);
} else {
    header("location: ../profile.php");
    exit();
}
