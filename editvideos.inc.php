<?php
$videoId = $_GET['videoId'];
$oldVideoFile = $_GET['oldVideoFile'];
if (isset($_POST["submit"])) {
    $videoTitle = $_POST["videoTitle"];
    $servicesTitle = $_POST["servicesTitle"];
    $videoStatus = $_POST["videoStatus"];
    $videoDiscription = $_POST["videoDiscription"];
    $videoFileName = $_FILES['file']['name'];
    $videoFileType = $_FILES['file']['type'];
    $videoTempName = $_FILES['file']['tmp_name'];
    $videoFileSize = $_FILES['file']['size'];
    $videoFileDestination = pathinfo($videoFileName, PATHINFO_EXTENSION);
    $videoFileDestinationLowercase = strtolower($videoFileDestination);
    $allowedVideoType = array('mp4');

    require_once 'dbh.inc.php';
    require_once 'editVideosFunctions.inc.php';

    if (!empty($videoFileName)) {
        if (in_array($videoFileDestinationLowercase, $allowedVideoType)) {
            $newVideoName = uniqid("video-", true) . '.' . $videoFileDestinationLowercase;
            $videoUploadPath = "../../upload/" . $newVideoName;
            move_uploaded_file($videoTempName, $videoUploadPath);
            editVideos($conn, $newVideoName, $servicesTitle, $videoTitle, $videoDiscription, $videoStatus, $oldVideoFile, $videoId);
        } else {
            header("location: ../add-videos.php?error=videoformat");
            exit();
        }
    } else if (empty($videoFileName)) {
        updateVideos($conn, $servicesTitle, $videoTitle, $videoDiscription, $videoStatus, $videoId);
    }
} else {
    header("location: ../all-videos.php");
    exit();
}
