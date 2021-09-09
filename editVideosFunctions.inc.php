<?php
function editVideos($conn, $newVideoName, $servicesTitle, $videoTitle, $videoDiscription, $videoStatus, $oldVideoFile, $videoId)
{
    $query = "SELECT * FROM videos WHERE videoId='$videoId'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($run);
    $createDeletePath = "../../upload/" . $row['videoFile'];
    if (mysqli_num_rows($run) > 0) {
        if (unlink($createDeletePath)) {
            $updateVideosQuery = "UPDATE videos SET videoTitle='$videoTitle', videoDiscription='$videoDiscription', videoFile='$newVideoName', servicesTitle='$servicesTitle', videoStatus='$videoStatus' WHERE videoId='$videoId'";
            $run = mysqli_query($conn, $updateVideosQuery);
            header("location: ../all-videos.php?error=none");
            mysqli_close($conn);
        }
    }
}
function updateVideos($conn, $servicesTitle, $videoTitle, $videoDiscription, $videoStatus, $videoId)
{
    $findCourse = "SELECT * FROM videos WHERE videoId = '$videoId'";
    $result = mysqli_query($conn, $findCourse) or die("Query Unsuccessful.");
    if (mysqli_num_rows($result) > 0) {
        $updateVideosQuery = "UPDATE videos SET videoTitle='$videoTitle', videoDiscription='$videoDiscription', servicesTitle='$servicesTitle', videoStatus='$videoStatus' WHERE videoId='$videoId'";
        $result = mysqli_query($conn, $updateVideosQuery);
        header("location: ../all-videos.php?error=none");
        mysqli_close($conn);
    }
}
