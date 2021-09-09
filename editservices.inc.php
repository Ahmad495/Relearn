<?php
$servicesId = $_GET['servicesId'];
$oldservicesTitle = $_GET['oldservicesTitle'];
if (isset($_POST["submit"])) {
    $servicesTitle = $_POST["servicesTitle"];
    $courseTitle = $_POST["courseTitle"];
    $servicesStatus = $_POST["servicesStatus"];
    $servicesDiscription = $_POST["servicesDiscription"];
    $imageFileName = $_FILES['file']['name'];
    $imageFileType = $_FILES['file']['type'];
    $imageTempName = $_FILES['file']['tmp_name'];
    $imageFileSize = $_FILES['file']['size'];
    $imageFileDestination = pathinfo($imageFileName, PATHINFO_EXTENSION);
    $imageFileDestinationLowercase = strtolower($imageFileDestination);
    $allowedImageType = array('jpg', 'svg', 'png');


    require_once 'dbh.inc.php';
    require_once 'editservicesfunction.inc.php';

    if (emptyEditInput($servicesTitle, $courseTitle, $servicesDiscription, $servicesStatus) !== false) {
        header("location: ../editservices.php?servicesId=$servicesId&error=emptyinput");
        exit();
    }
    if (!empty($imageFileName)) {
        if (in_array($imageFileDestinationLowercase, $allowedImageType)) {
            $newImageName = uniqid("image-", true) . '.' . $imageFileDestinationLowercase;
            $imageUploadPath = "../../upload_img/" . $newImageName;

            move_uploaded_file($imageTempName, $imageUploadPath);
            editService($conn, $servicesId, $newImageName, $servicesTitle,  $courseTitle, $servicesDiscription, $servicesStatus, $oldservicesTitle);
        } else {
            header("location: ../editservices.php?error=imageformat");
            exit();
        }
    } else if (empty($imageFileName)) {
        updateService($conn, $servicesId, $servicesTitle,  $courseTitle, $servicesDiscription, $servicesStatus, $oldservicesTitle);
    }
} else {
    header("location: ../service.php");
    exit();
}
