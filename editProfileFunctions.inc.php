<?php

function emptySignupInput($oldPassword, $newPassword, $repeatNewPassword)
{
    $result = false;
    if (empty($oldPassword) || empty($newPassword) || empty($repeatNewPassword)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passwordMatch($newPassword, $repeatNewPassword)
{
    $result = false;
    if ($newPassword !== $repeatNewPassword) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passwordStrength($newPassword)
{
    $result = false;
    $uppercase = preg_match('@[A-Z]@', $newPassword);
    $lowercase = preg_match('@[a-z]@', $newPassword);
    $number    = preg_match('@[0-9]@', $newPassword);
    if (!$uppercase || !$lowercase || !$number || strlen($newPassword) < 8) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function editUserProfile($conn, $newPassword, $oldPassword, $userUid)
{
    $query = "SELECT * FROM teacher WHERE teacherUid='$userUid' OR teacherEmail='$userUid'";
    $teacherExist = mysqli_query($conn, $query);
    if (mysqli_num_rows($teacherExist) > 0) {
        $row = mysqli_fetch_array($teacherExist);
        $passwordHashed = $row["teacherPassword"];
        $checkPassword = password_verify($oldPassword, $passwordHashed);
        if ($checkPassword === false) {
            header("location: ../profile.php?error=wrongloginpassword");
            exit();
        } elseif ($checkPassword === true) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateTeacherPassword = "UPDATE teacher SET teacherPassword='$hashedPassword' WHERE teacherUid='$userUid'";
            $run = mysqli_query($conn, $updateTeacherPassword) or die("Query Unsuccessful.");
            $updateUserPassword = "UPDATE users SET userPassword='$hashedPassword' WHERE userUid='$userUid'";
            $run = mysqli_query($conn, $updateUserPassword) or die("Query Unsuccessful.");
            header("location: ../profile.php?error=none");
            mysqli_close($conn);
        }
    } else {
        echo "query not working";
    }
}

function editStudentProfile($conn, $newPassword, $oldPassword, $userUid)
{
    $query = "SELECT * FROM student WHERE studentUid='$userUid' OR studentEmail='$userUid'";
    $studentExist = mysqli_query($conn, $query);
    if (mysqli_num_rows($studentExist) > 0) {
        $row = mysqli_fetch_array($studentExist);
        $passwordHashed = $row["studentPassword"];
        $checkPassword = password_verify($oldPassword, $passwordHashed);
        if ($checkPassword === false) {
            header("location: ../studentdashboard.php?error=wrongloginpassword");
            exit();
        } elseif ($checkPassword === true) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateStudentPassword = "UPDATE student SET studentPassword='$hashedPassword' WHERE studentUid='$userUid'";
            $run = mysqli_query($conn, $updateStudentPassword) or die("Query Unsuccessful.");
            $updateUserPassword = "UPDATE users SET userPassword='$hashedPassword' WHERE userUid='$userUid'";
            $run = mysqli_query($conn, $updateUserPassword) or die("Query Unsuccessful.");
            header("location: ../studentdashboard.php?error=none");
            mysqli_close($conn);
        }
    } else {
        echo "query not working";
    }
}
