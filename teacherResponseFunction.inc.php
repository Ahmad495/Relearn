<?php

function  teacherResponseMessages($conn, $teacherUid, $videoTitle, $message, $videoId)
{
    $spl = "INSERT INTO messages (senderUid, videoId, videoTitle, senderMessage) VALUES(?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $spl)) {
        header("location: ../chatRoom.php?chatRoomName=" . $videoTitle . "");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssss", $teacherUid, $videoId, $videoTitle, $message);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../chatRoom.php?chatRoomName=" . $videoTitle . "");
    exit();
}
