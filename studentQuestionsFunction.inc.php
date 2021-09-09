<?php

function sendMessages($conn, $teacherUid, $studentUid, $videoTitle, $message, $serviceTitle, $videoId)
{
    $spl = "INSERT INTO messages (senderUid, videoId, videoTitle, senderMessage) VALUES(?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $spl)) {
        header("location: ../videos.php?servicesTitle=" . $serviceTitle . "&teacherUid=" . $teacherUid . "");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssss", $studentUid, $videoId, $videoTitle, $message);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../videos.php?servicesTitle=" . $serviceTitle . "&teacherUid=" . $teacherUid . "");
    exit();
}
