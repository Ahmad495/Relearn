<?php
require_once 'dbh.inc.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mailTo = "admin@relearntoday.com";
    $header = "From:" . $email;
    $txt = "You have recieved and email from " . $name . "\n\n" . $message;
    mail($mailTo, $subject, $txt, $header);
    header("location: ../contact.php?message=messagesend");
    exit();
} else {
    header("location: ../contact.php");
    exit();
}
