<?php

session_start();
require_once 'dbh.inc.php';

if (isset($_POST["submit"])) {
    if (isset($_SESSION['useruid'])) {
        $studentUid = $_SESSION['useruid'];
        $videoTitle = $_GET['videoTitle'];
        $videoId = $_GET['videoId'];
        $message = $_POST['message'];
        require_once 'studentResponseFunction.inc.php';
        studentResponseMessages($conn, $studentUid, $videoTitle, $message, $videoId);
    } else {
        header("location: ../studentChatRoom.php?chatRoomName=" . $videoTitle . "");
        exit();
    }
} else {
    header("location: ../studentChatRoom.php?chatRoomName=" . $videoTitle . "");
    exit();
}
