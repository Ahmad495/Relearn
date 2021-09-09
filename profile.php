<?php
require_once 'include/header.php';
if (isset($_SESSION['useruid'])) {
    $userUid = $_SESSION['useruid'];
    $query = "SELECT * FROM teacher WHERE teacherUid ='$userUid'";
    $result = mysqli_query($conn, $query) or die("Query Unsuccessful.");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $teacherId = $row['teacherId'];
        $teacherName = $row['teacherName'];
        $teacherUid = $row['teacherUid'];
        $teacherEmail = $row['teacherEmail'];
    } else {
        header("location : ../index.php");
    }
}
?>

<div class="container-fluid body-section mt-5 pt-5">
    <div class="row">
        <div class="col-md-3">
            <?php
            require_once 'include/sidebar.php';
            ?>
        </div>
        <div class="col-md-9">
            <h1><i class="fas fa-tachometer-alt"></i> Profile <small>Profile Overview</small></h1>
            <hr>
            <ol class="breadcrumb">
                <li class="mr-2"><a href="teacherdashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
                </li>
                <span> &#47; </span>
                <li class="breadcrumb-item active ml-2 "><i class="fas fa-user-circle"></i> Profile</li>
            </ol>
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <i class="fas fa-comments fa-5x"></i>Chat Rooms <span class="badge bg-secondary bg-dark"></span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body"><i class="fas fa-file fa-5x"></i> Services <span class="badge bg-secondary bg-dark"><?php echo $countServices; ?></span></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="service.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body"><i class="fas fa-photo-video fa-5x"></i> Videos <span class="badge bg-secondary bg-dark"><?php echo $countVideos; ?></span></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="all-videos.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h1>Account:</h1>
            <div class="container" id="account-body">
                <div class="row gutters">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile">
                                        <div class="user-avatar">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Profile-image">
                                        </div>
                                        <h5 class="user-name"><?php echo $teacherName ?></h5>
                                        <h6 class="user-email"><?php echo $teacherEmail ?></h6>
                                    </div>
                                    <div class="about">
                                        <h5>About</h5>
                                        <p>I'm <?php echo $teacherName ?>. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
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
                                            <input type="text" class="form-control" id="fullName" value="<?php echo $teacherName ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="eMail">Email</label>
                                            <input type="email" class="form-control" id="eMail" value="<?php echo $teacherEmail ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="phone">User Name</label>
                                            <input type="text" class="form-control" id="phone" value="<?php echo $teacherUid ?>" readonly>
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
                                <form action="include/editprofile.inc.php?userUid=<?php echo $userUid; ?>" method="post">
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
                                                <a class="btn btn-danger" href="include/deleteTeacherAccount.php?userUid=<?php echo $userUid; ?>" role="button">Deactivate</a>
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