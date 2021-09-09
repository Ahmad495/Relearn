<?php
require_once 'dbh.inc.php';
if (isset($_GET['userUid'])) {
    $delUser = $_GET['userUid'];
    $delUserQuery = "DELETE FROM users WHERE userUid = '$delUser'";
    $delStudentQuery = "DELETE FROM student WHERE studentUid = '$delUser'";
    $result = mysqli_query($conn, $delUserQuery) or die("Query Unsuccessful.");
    $result3 = mysqli_query($conn, $delStudentQuery) or die("Query Unsuccessful.");
    session_start();
    session_unset();
    session_destroy();
    header("location: ../../index.php");
    exit();
} else {
    header("location: ../studentdashboard.php");
}
