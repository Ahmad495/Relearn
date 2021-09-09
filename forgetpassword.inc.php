<?php

require_once 'dbh.inc.php';
if (isset($_POST['submit'])) {
    $email = $_POST['userEmail'];
    $findUser = "SELECT * FROM users WHERE userEmail='$email'";
    $runFindUser = mysqli_query($conn, $findUser);
    if (mysqli_num_rows($runFindUser) > 0) {
        $to      = $email;
    $subject = 'Change Password';
    $message = '
  
Only a few steps away! Click the given link below to change your password.
    
      
    Please click this link to change your account password:
https://relearntoday.com/changePassword.php?email=' . $email . ''; // Our message above including the link
    $headers = 'From:smtp.relearntoday.com' . "\r\n";
    mail($to, $subject, $message, $headers);
    header("location: ../forgetpassword.php?message=none");
    exit();
    } else {
        header("location: ../forgetpassword.php?message=wrongemail");
        exit();
    }
} else {
    header("location: ../forgetpassword.php");
    exit();
}
