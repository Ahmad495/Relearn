<?php

session_start();
require_once 'dbh.inc.php';

if (isset($_POST["submit"])) {
    if (isset($_SESSION['useruid'])) {
        $studentUid = $_SESSION['useruid'];
        $sql = "SELECT userId FROM users WHERE userUid='$studentUid'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $userId = $row['userId'];
        $query = "SELECT * FROM student WHERE studentUid='$studentUid'";
        $run = mysqli_query($conn, $query);
        if (mysqli_num_rows($run) > 0) {
            $teacherUid = $_GET['teacherUid'];
            $videoId = $_POST['videoId'];
            $videoTitle = $_POST['videoTitle'];
            $serviceTitle = $_GET['servicesTitle'];
            $message = $_POST['message'];
            require_once 'studentQuestionsFunction.inc.php';
            sendMessages($conn, $teacherUid, $studentUid, $videoTitle, $message, $serviceTitle, $videoId);
        } else {
            header("location: ../sign in.php");
            exit();
        }
    } else {
        header("location: ../sign in.php");
        exit();
    }
} else {
    header("location: ../videos.php");
    exit();
}
