<?php
require_once 'include/header2.php';
$userUid = $_SESSION['useruid'];
$query = "SELECT * FROM student WHERE studentUid ='$userUid'";
$result = mysqli_query($conn, $query) or die("Query Unsuccessful.");
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $studentId = $row['studentId'];
    $studentName = $row['studentName'];
    $studentUid = $row['studentUid'];
    $studentEmail = $row['studentEmail'];
} else {
    header("location : ../index.php");
}
?>

<div class="container-fluid body-section mt-5 pt-5">
    <div class="row">
        <div class="col-md-3">
            <?php
            require_once 'include/sidebar2.php';
            ?>
        </div>
        <div class="col-md-9">
            <h1><i class="fas fa-users"></i> Student <small>Profile Overview</small></h1>
            <hr>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><i class="fas fa-tachometer-alt"></i> Profile</li>
            </ol>
            <hr>
            <div class="container" id="account-body">
                <div class="row gutters">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile">
                                        <div class="user-avatar">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                                        </div>
                                        <h5 class="user-name"><?php echo $studentName ?></h5>
                                        <h6 class="user-email"><?php echo $studentEmail ?></h6>
                                    </div>
                                    <div class="about">
                                        <h5>About</h5>
                                        <p>I'm <?php echo $studentName ?>. I enjoy creating user-centric, delightful and human experiences.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mb-2 text-primary">Personal Details</h6>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="fullName">Full Name</label>
                                            <input type="text" class="form-control" id="fullName" value="<?php echo $studentName ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="eMail">Email</label>
                                            <input type="email" class="form-control" id="eMail" value="<?php echo $studentEmail ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="phone">User Name</label>
                                            <input type="text" class="form-control" id="phone" value="<?php echo $studentUid ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="website">Password</label>
                                            <input type="url" class="form-control" id="website" value="*********" readonly>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $userUid = $_SESSION['useruid'];
                                ?>
                                <form action="include/editStudentProfile.inc.php?userUid=<?php echo $userUid; ?>" method="post">
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="mt-3 mb-2 text-primary">Change Password</h6>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="Street">Old Password</label>
                                                <input type="password" class="form-control" id="Street" placeholder="Enter Old Password" name="oldPassword" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="ciTy">New Password</label>
                                                <input type="password" class="form-control" id="ciTy" placeholder="Enter New Password" name="newPassword" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="sTate">Repeat Password</label>
                                                <input type="password" class="form-control" id="sTate" placeholder="Repeat New Password" name="repeatNewPassword" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right">
                                                <a class="btn btn-danger" href="include/deletestudentAccount.php?userUid=<?php echo $userUid; ?>" role="button">Deactivate</a>
                                                <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo '<script type="text/javascript">';
        echo ' alert("Input empty")';  //not showing an alert box.
        echo '</script>';
    } elseif ($_GET["error"] == "newpasswordsdontmatch") {
        echo '<script type="text/javascript">';
        echo ' alert("New Password does not match")';  //not showing an alert box.
        echo '</script>';
    } elseif ($_GET["error"] == "weakpassword") {
        echo '<script type="text/javascript">';
        echo ' alert("Password sholud be 8 character long and should have at one small and one capital Letter")';  //not showing an alert box.
        echo '</script>';
    } elseif ($_GET["error"] == "stmtfailed") {
        echo '<script type="text/javascript">';
        echo ' alert("Something went wrong")';  //not showing an alert box.
        echo '</script>';
    } elseif ($_GET["error"] == "wrongloginpassword") {
        echo '<script type="text/javascript">';
        echo ' alert("Entered Password Does not match")';  //not showing an alert box.
        echo '</script>';
    } elseif ($_GET["error"] == "none") {
        echo '<script type="text/javascript">';
        echo ' alert("Your Password has been Changed")';  //not showing an alert box.
        echo '</script>';
    }
}
?>
<?php
require_once 'include/footer.php';
?>