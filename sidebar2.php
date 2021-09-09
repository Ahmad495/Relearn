<?php
$query = "SELECT * FROM users";
$run = mysqli_query($conn, $query);
$countUser = mysqli_num_rows($run);
?>
<div class="list-group sticky-top sticky-offset" id="side-bar">
    <a href="studentdashboard.php" class="list-group-item list-group-item-action active" aria-current="true">
        <i class="fas fa-tachometer-alt"></i> Dashboard
    </a>
    <a href="studentMessages.php" class="list-group-item list-group-item-action"><i class="fas fa-file"></i> All
        Chat Room <span class="badge bg-warning text-light"></span></a>
    <a href="studentdashboard.php" class="list-group-item list-group-item-action"><i class="fas fa-photo-video"></i>
        Profile <span class="badge bg-warning text-light"></span></a>
    <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-users"></i> All
        Settings <span class="badge bg-warning text-light"></span></a>
</div>