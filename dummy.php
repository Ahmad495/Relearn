<?php
require_once 'dbh.inc.php';

$delCourse = $_GET['courseId'];
$query = "SELECT * FROM courses WHERE courseId='$delCourse'";
$run = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($run);
$createDeletePath = "../../upload_img/" . $row['courseImg'];
if (unlink($createDeletePath)) {
    $delCourseQuery = "DELETE FROM courses WHERE courseId = '$delCourse'";
    $result = mysqli_query($conn, $delCourseQuery) or die("Query Unsuccessful.");
    header("location: ../Courses.php");
    mysqli_close($conn);
} else {
    header("location: ../Courses.php");
    mysqli_close($conn);
}
