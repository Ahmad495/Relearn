<?php

if (isset($_POST["submit"]) && isset($_FILES['file'])) {
    $teacherUid = $_POST['teacherUid'];
    $teacherId = $_POST['teacherId'];
    $servicesTitle = $_POST["servicesTitle"];
    $servicesStatus = $_POST["servicesStatus"];
    $servicesDiscription = $_POST["servicesDiscription"];
    $courseTitle = $_POST["courseTitle"];
    $imageFileName = $_FILES['file']['name'];
    $imageFileType = $_FILES['file']['type'];
    $imageTempName = $_FILES['file']['tmp_name'];
    $imageFileSize = $_FILES['file']['size'];
    $imageFileDestination = pathinfo($imageFileName, PATHINFO_EXTENSION);
    $imageFileDestinationLowercase = strtolower($imageFileDestination);
    $allowedImageType = array('jpg', 'svg', 'png');

    $code = explode('-', $courseTitle);
    $courseId = $code[0];
    $courseTitle = $code[1];
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (titleExist($conn, $courseTitle) !== false) {
        header("location: ../add-courses.php?error=titletaken");
        exit();
    }
    if (in_array($imageFileDestinationLowercase, $allowedImageType)) {
        $newImageName = uniqid("image-", true) . '.' . $imageFileDestinationLowercase;
        $imageUploadPath = "../../upload_img/" . $newImageName;
        move_uploaded_file($imageTempName, $imageUploadPath);
        addServices($conn, $newImageName, $servicesTitle, $servicesDiscription, $servicesStatus, $courseTitle, $teacherUid, $teacherId, $courseId);
    }
} else {
    header("location: ../add-services.php");
    exit();
}
