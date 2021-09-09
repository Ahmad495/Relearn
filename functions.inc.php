<?php
function titleExist($conn, $servicesTitle)
{
    $spl = "SELECT * FROM services WHERE servicesTitle = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $spl)) {
        header("location: ../add-services.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $servicesTitle);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function addServices($conn, $newImageName, $servicesTitle, $servicesDiscription, $servicesStatus, $courseTitle, $teacherUid, $teacherId, $courseId)
{
    $spl = "INSERT INTO services (servicesTitle, servicesDiscription, teacherId, teacherUid, courseId, courseTitle, servicesImg, servicesStatus) VALUES(?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $spl)) {
        header("location: ../add-services.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssssss", $servicesTitle, $servicesDiscription, $teacherId, $teacherUid, $courseId, $courseTitle, $newImageName, $servicesStatus);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../add-services.php?error=none");
    exit();
}

function addVideos($conn, $newVideoName, $servicesTitle, $videoTitle, $videoDiscription, $videoStatus, $teacherUid, $servicesId, $teacherId)
{
    $spl = "INSERT INTO videos (videoTitle, videoDiscription, videoFile, servicesId, servicesTitle, teacherId, teacherUid, videoStatus) VALUES(?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $spl)) {
        header("location: ../add-videos.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssssss", $videoTitle, $videoDiscription, $newVideoName, $servicesId, $servicesTitle, $teacherId, $teacherUid, $videoStatus);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../add-videos.php?error=none");
    exit();
}
