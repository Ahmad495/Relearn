<?php

require_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['userPassword'];
    $repeatPassword = $_POST['confirmPassword'];
    if ($password === $repeatPassword) {
        $findTeacher = "SELECT * FROM teacher WHERE teacherEmail='$email'";
        $findStudent = "SELECT * FROM student WHERE studentEmail='$email'";
        $runFindTeacher = mysqli_query($conn, $findTeacher);
        $runFindStudent = mysqli_query($conn, $findStudent);
        if (mysqli_num_rows($runFindTeacher) > 0) {
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $teacherPassword = "UPDATE teacher set teacherPassword='$hashPassword' WHERE teacherEmail='$email'";
            $userPassword = "UPDATE users set userPassword='$hashPassword' WHERE userEmail='$email'";
            $runTeacherPassword = mysqli_query($conn, $teacherPassword);
            $runUserPassword = mysqli_query($conn, $userPassword);
            header("location: ../sign in.php?message=passwordchanged");
            exit();
        } elseif (mysqli_num_rows($runFindStudent) > 0) {
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $teacherPassword = "UPDATE student set studentPassword='$hashPassword' WHERE studentEmail='$email'";
            $userPassword = "UPDATE users set userPassword='$hashPassword' WHERE userEmail='$email'";
            $runTeacherPassword = mysqli_query($conn, $teacherPassword);
            $runUserPassword = mysqli_query($conn, $userPassword);
            header("location: ../sign in.php?message=passwordchanged");
            exit();
        }
    } else {
        header("location: ../changePassword.php?email=" . $email . "&error=passwordnotmatch");
        exit();
    }
} else {
    header("location: ../changePassword.php?email=" . $email . "");
    exit();
}
