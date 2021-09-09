<?php
require_once 'dbh.inc.php';

$videoId = $_GET['videoId'];
$query = "SELECT * FROM videos WHERE videoId='$videoId'";
$run = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($run);
$createDeletePath = "../../upload/" . $row['videoFile'];
if (unlink($createDeletePath)) {
    $delVideosQuery = "DELETE FROM videos WHERE videoId='$videoId'";
    $run = mysqli_query($conn, $delVideosQuery);
    header("location: ../all-videos.php");
    mysqli_close($conn);
} else {
    header("location: ../all-videos.php");
    mysqli_close($conn);
}
