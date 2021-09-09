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
                            <a class="small text-white stretched-link" href="messages.php">View Details</a>
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
            <h1>Services:</h1>
            <?php
            $teacherUid = $_SESSION['useruid'];
            $query = "SELECT * FROM services WHERE teacherUid ='$teacherUid'";
            $run = mysqli_query($conn, $query);
            if (mysqli_num_rows($run) > 0) {
            ?>
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>Sr #</th>
                                <th>Sevrice Title</th>
                                <th>Service Description</th>
                                <th>Service Image</th>
                                <th>Course Title</th>
                                <th>Service Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($run)) {
                                $id = $row['servicesId'];
                                $servicesTitle = ucfirst($row['servicesTitle']);
                                $servicesDiscription = $row['servicesDiscription'];
                                $servicesImg = $row['servicesImg'];
                                $servicesStatus = $row['servicesStatus'];
                                $courseTitle = $row['courseTitle'];
                            ?>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $servicesTitle ?></td>
                                    <td><?php echo $servicesDiscription ?></td>
                                    <td><?php echo $servicesImg ?></td>
                                    <td><?php echo $courseTitle ?></td>
                                    <td><?php echo $servicesStatus ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            } else {
                echo "<center><h2>No Services right now</h2></center>";
            }
            ?>
            <a href="service.php" class="btn btn-primary">View all services</a>
            <hr>
            <h1>Videos:</h1>
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
                                <th>Video Name</th>
                                <th>Discription</th>
                                <th>Video File</th>
                                <th>Service Title</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($run)) {
                                $id = $row['videoId'];
                                $videoTitle = ucfirst($row['videoTitle']);
                                $videoDiscription = $row['videoDiscription'];
                                $videoFile = $row['videoFile'];
                                $servicesTitle = $row['servicesTitle'];
                                $videoStatus = $row['videoStatus'];
                            ?>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $videoTitle ?></td>
                                    <td><?php echo $videoDiscription ?></td>
                                    <td><?php echo $videoFile ?></td>
                                    <td><?php echo $servicesTitle ?></td>
                                    <td><?php echo $videoStatus ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            } else {
                echo "<center><h2>No videos right now</h2></center>";
            }
            ?>
            </table>
            <a href="all-videos.php" class="btn btn-primary">View all videos</a>
        </div>
    </div>
</div>
<?php
require_once 'include/footer.php';
?>