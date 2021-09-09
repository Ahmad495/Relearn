<?php
require_once 'dbh.inc.php';

$delServices = $_GET['servicesId'];
$delVideosQuery = "SELECT * FROM videos WHERE servicesId='$delServices'";
$videosResult = mysqli_query($conn, $delVideosQuery);
if (mysqli_num_rows($videosResult) > 0) {
    while ($row = mysqli_fetch_array($videosResult)) {
        $createDeletePathVideos = "../../upload/" . $row['videoFile'];
        if (unlink($createDeletePathVideos)) {
            $delVideosQuery =  "DELETE FROM videos WHERE servicesId='$delServices'";
            $result = mysqli_query($conn, $delVideosQuery) or die("Query Unsuccessful.");
        }
    }
    $query = "SELECT * FROM services WHERE servicesId='$delServices'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($run);
    $createDeletePath = "../../upload_img/" . $row['servicesImg'];
    if (unlink($createDeletePath)) {
        $delServicesQuery = "DELETE FROM services WHERE servicesId = '$delServices'";
        $result = mysqli_query($conn, $delServicesQuery) or die("Query Unsuccessful.");
        header("location: ../service.php");
        mysqli_close($conn);
    }
} else {
    $query = "SELECT * FROM services WHERE servicesId='$delServices'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($run);
    $createDeletePath = "../../upload_img/" . $row['servicesImg'];
    if (unlink($createDeletePath)) {
        $delServicesQuery = "DELETE FROM services WHERE servicesId = '$delServices'";
        $result = mysqli_query($conn, $delServicesQuery) or die("Query Unsuccessful.");
        header("location: ../service.php");
        mysqli_close($conn);
    } else {
        header("location: ../service.php");
        mysqli_close($conn);
    }
}
