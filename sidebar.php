<?php
require_once 'dbh.inc.php';
?>
<?php
$query = "SELECT * FROM users";
$run = mysqli_query($conn, $query);
$countUser = mysqli_num_rows($run);
?>
<?php
$teacherUid = $_SESSION['useruid'];
$query = "SELECT * FROM services WHERE teacherUid='$teacherUid'";
$run = mysqli_query($conn, $query);
$countServices = mysqli_num_rows($run);
$query2 = "SELECT * FROM videos WHERE teacherUid='$teacherUid'";
$run2 = mysqli_query($conn, $query2);
$countVideos = mysqli_num_rows($run2);
?>
<div class="list-group sticky-top sticky-offset" id="side-bar">
    <a href="teacherdashboard.php" class="list-group-item list-group-item-action active" aria-current="true">
        <i class="fas fa-tachometer-alt"></i> Dashboard
    </a>
    <a href="service.php" class="list-group-item list-group-item-action"><i class="fas fa-file"></i> All
        Services <span class="badge bg-warning text-light"><?php echo $countServices; ?></span></a>
    <a href="all-videos.php" class="list-group-item list-group-item-action"><i class="fas fa-photo-video"></i>
        Videos <span class="badge bg-warning text-light"><?php echo $countVideos; ?></span></a>
    <a href="add-videos.php" class="list-group-item list-group-item-action"><i class="fas fa-video"></i> ADD
        Videos <span class="badge bg-warning text-light"><?php echo $countVideos; ?></span></a>
    <a href="add-services.php" class="list-group-item list-group-item-action"><i class="fas fa-plus"></i> ADD
        Services <span class="badge bg-warning text-light"><?php echo $countServices; ?></span></a>
    <a href="profile.php" class="list-group-item list-group-item-action"><i class="fas fa-user"></i> Profile</a>
</div>