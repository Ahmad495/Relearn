<?php

session_start();
require_once 'dbh.inc.php';

if (isset($_POST["submit"])) {
    if (isset($_SESSION['useruid'])) {
        $teacherUid = $_SESSION['useruid'];
        $videoTitle = $_GET['videoTitle'];
        $videoId = $_GET['videoId'];
        $message = $_POST['message'];
        require_once 'teacherResponseFunction.inc.php';
        teacherResponseMessages($conn, $teacherUid, $videoTitle, $message, $videoId);
    } else {
        header("location: ../chatRoom.php?chatRoomName=" . $videoTitle . "");
        exit();
    }
} else {
    header("location: ../chatRoom.php?chatRoomName=" . $videoTitle . "");
    exit();
}
