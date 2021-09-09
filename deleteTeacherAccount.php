<?php
require_once 'dbh.inc.php';
if (isset($_GET['userUid'])) {
    $userUid = $_GET['userUid'];
    $findVideosQuery = "SELECT * FROM videos WHERE teacherUid='$userUid'";
    $videosResult = mysqli_query($conn, $findVideosQuery);
    $findServicesQuery = "SELECT * FROM services WHERE teacherUid='$userUid'";
    $servicesResult = mysqli_query($conn, $findServicesQuery);
    if (mysqli_num_rows($videosResult) > 0) {
        while ($row = mysqli_fetch_array($videosResult)) {
            $createDeletePathVideos = "../../upload/" . $row['videoFile'];
            if (unlink($createDeletePathVideos)) {
                $delVideosQuery =  "DELETE FROM videos WHERE teacherUid='$userUid'";
                $result = mysqli_query($conn, $delVideosQuery) or die("Query Unsuccessful.");
            }
        }
        if (mysqli_num_rows($servicesResult) > 0) {
            while ($row = mysqli_fetch_array($servicesResult)) {
                $createDeletePathImages = "../../upload_img/" . $row['servicesImg'];
                if (unlink($createDeletePathImages)) {
                    $delServicesQuery = "DELETE FROM services WHERE teacherUid = '$userUid'";
                    $result = mysqli_query($conn, $delServicesQuery) or die("Query Unsuccessful.");
                }
            }
            $delTeacherAccountQuery = "DELETE FROM teacher WHERE teacherUid='$userUid'";
            $delUserAccountQuery = "DELETE FROM users WHERE userUid='$userUid'";
            $run = mysqli_query($conn, $delTeacherAccountQuery);
            $run = mysqli_query($conn, $delUserAccountQuery);
            session_start();
            session_unset();
            session_destroy();
            header("location: ../../index.php?error=none");
            exit();
        }
    } elseif (mysqli_num_rows($servicesResult) > 0) {
        while ($row = mysqli_fetch_array($servicesResult)) {
            $createDeletePathImages = "../../upload_img/" . $row['servicesImg'];
            if (unlink($createDeletePathImages)) {
                $delServicesQuery = "DELETE FROM services WHERE teacherUid = '$userUid'";
                $result = mysqli_query($conn, $delServicesQuery) or die("Query Unsuccessful.");
            }
        }
        $delTeacherAccountQuery = "DELETE FROM teacher WHERE teacherUid='$userUid'";
        $delUserAccountQuery = "DELETE FROM users WHERE userUid='$userUid'";
        $run = mysqli_query($conn, $delTeacherAccountQuery);
        $run = mysqli_query($conn, $delUserAccountQuery);
        session_start();
        session_unset();
        session_destroy();
        header("location: ../../index.php?error=none");
        exit();
    }else {
        $delTeacherAccountQuery = "DELETE FROM teacher WHERE teacherUid='$userUid'";
        $delUserAccountQuery = "DELETE FROM users WHERE userUid='$userUid'";
        $run = mysqli_query($conn, $delTeacherAccountQuery);
        $run = mysqli_query($conn, $delUserAccountQuery);
        session_start();
        session_unset();
        session_destroy();
        header("location: ../../index.php?error=none");
        exit();
    }
} else {
    header("location: ../profile.php");
}
