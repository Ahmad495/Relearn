<?php

if (isset($_POST["submit"]) && isset($_FILES['file'])) {
    $teacherUid = $_POST['teacherUid'];
    $teacherId = $_POST['teacherId'];
    $videoTitle = $_POST["videoTitle"];
    $videoStatus = $_POST["videoStatus"];
    $servicesTitle = $_POST['servicesTitle'];
    $videoDiscription = $_POST["videoDiscription"];
    $videoFileName = $_FILES['file']['name'];
    $videoFileType = $_FILES['file']['type'];
    $videoTempName = $_FILES['file']['tmp_name'];
    $videoFileSize = $_FILES['file']['size'];
    $videoFileDestination = pathinfo($videoFileName, PATHINFO_EXTENSION);
    $videoFileDestinationLowercase = strtolower($videoFileDestination);
    $allowedVideoType = array('mp4');

    $code = explode('-', $servicesTitle);
    $servicesId = $code[0];
    $servicesTitle = $code[1];
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (in_array($videoFileDestinationLowercase, $allowedVideoType)) {
        $newVideoName = uniqid("video-", true) . '.' . $videoFileDestinationLowercase;
        $videoUploadPath = "../../upload/" . $newVideoName;
        move_uploaded_file($videoTempName, $videoUploadPath);
        addVideos($conn, $newVideoName, $servicesTitle, $videoTitle, $videoDiscription, $videoStatus, $teacherUid, $servicesId, $teacherId);
    } else {
        header("location: ../add-videos.php?error=videoformat");
        exit();
    }
} else {
    header("location: ../add-videos.php");
    exit();
}
