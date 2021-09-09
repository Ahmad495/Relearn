<?php

function emptyEditInput($servicesTitle, $courseTitle, $servicesDiscription, $servicesStatus)
{
    $result = false;
    if (empty($servicesTitle) || empty($courseTitle) || empty($servicesDiscription) || empty($servicesStatus)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function editService($conn, $servicesId, $newImageName, $servicesTitle,  $courseTitle, $servicesDiscription, $servicesStatus, $oldservicesTitle)
{
    $findCourse = "SELECT * FROM services WHERE servicesId = '$servicesId'";
    $result = mysqli_query($conn, $findCourse) or die("Query Unsuccessful.");
    $row = mysqli_fetch_assoc($result);
    $createDeletePath = "../../upload_img/" . $row['servicesImg'];
    if (mysqli_num_rows($result) > 0) {
        if (unlink($createDeletePath)) {
            $editServices = "UPDATE services SET servicesTitle='$servicesTitle', servicesDiscription='$servicesDiscription', courseTitle='$courseTitle', servicesImg='$newImageName', servicesStatus='$servicesStatus' WHERE servicesId= '$servicesId'";
            $result = mysqli_query($conn, $editServices) or die("Query Unsuccessful.");
            $editServices = "UPDATE videos SET servicesTitle='$servicesTitle' WHERE servicesTitle='$oldservicesTitle'";
            $result = mysqli_query($conn, $editServices) or die("Query Unsuccessful.");
            header("location: ../service.php?error=none");
            mysqli_close($conn);
        }
    }
}
function updateService($conn, $servicesId, $servicesTitle,  $courseTitle, $servicesDiscription, $servicesStatus, $oldservicesTitle)
{
    $findCourse = "SELECT * FROM services WHERE servicesId = '$servicesId'";
    $result = mysqli_query($conn, $findCourse) or die("Query Unsuccessful.");
    if (mysqli_num_rows($result) > 0) {
        $editServices = "UPDATE services SET servicesTitle='$servicesTitle', servicesDiscription='$servicesDiscription', courseTitle='$courseTitle', servicesStatus='$servicesStatus' WHERE servicesId= '$servicesId'";
        $result = mysqli_query($conn, $editServices) or die("Query Unsuccessful.");
        $editServices = "UPDATE videos SET servicesTitle='$servicesTitle' WHERE servicesTitle='$oldservicesTitle'";
        $result = mysqli_query($conn, $editServices) or die("Query Unsuccessful.");
        header("location: ../service.php?error=none");
        mysqli_close($conn);
    }
}
