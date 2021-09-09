<?php
require_once 'include/header.php';
?>

<div class="container-fluid body-section mt-5 pt-5">
    <div class="row">
        <div class="col-md-3">
            <?php
            require_once 'include/sidebar.php';
            ?>
        </div>
        <div class="col-md-9">
            <h1><i class="fas fa-tachometer-alt"></i> Dashboard <small>Statistic Overview</small></h1>
            <hr>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><i class="fas fa-tachometer-alt"></i> Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <i class="fas fa-comments fa-5x"></i> Chat Rooms <span class="badge bg-secondary bg-dark"></span>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body"><i class="fas fa-copy fa-5x"></i> Services <span class="badge bg-secondary bg-dark"><?php echo $countServices; ?></span></div>
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
            <h1 class="pb-3">Video Chat Rooms:</h1>
            <?php
            $teacherUid = $_SESSION['useruid'];
            $query = "SELECT * FROM videos WHERE teacherUid ='$teacherUid'";
            $run = mysqli_query($conn, $query);
            if (mysqli_num_rows($run) > 0) {
            ?>
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>Sr #</th>
                                <th>Chat Room Name</th>
                                <th>Chat Room Owner</th>
                                <th>Open Chat Room</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($run)) {
                                $id = $row['videoId'];
                                $videoTitle = ucfirst($row['videoTitle']);
                            ?>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $videoTitle; ?></td>
                                    <td><?php echo $teacherUid; ?></td>
                                    <td class="d-flex justify-content-center"><a class="btn btn-sm btn-primary px-1" href="chatRoom.php?chatRoomName=<?php echo $videoTitle; ?>" role="button">Open Chat room</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            } else {
                echo "<center><h2>No chat room right now</h2></center>";
            }
            ?>
            </table>


        </div>
    </div>
</div>
<?php
require_once 'include/footer.php';
?>