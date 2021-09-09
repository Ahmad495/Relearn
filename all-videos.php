<?php
require_once 'include/header.php';
if (isset($_POST['checkboxes'])) {
    $draft = "draft";
    $publish = "publish";
    foreach ($_POST['checkboxes'] as $id) {
        $query = "SELECT * FROM videos WHERE videoId='$id'";
        $run = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($run);
        $createDeletePath = "../upload/" . $row['videoFile'];
        $bulkOption = $_POST['bulk-options'];
        if ($bulkOption == 'delete') {
            if (unlink($createDeletePath)) {
                $editVideosQuery =  "DELETE FROM videos WHERE videoId='$id'";
                $result = mysqli_query($conn, $editVideosQuery) or die("Query Unsuccessful.");
            } else {
                echo "video path error";
            }
        } elseif ($bulkOption == 'draft') {
            $editVideosQuery =  "UPDATE videos SET videoStatus ='$draft' WHERE videoId= '$id'";
            $result = mysqli_query($conn, $editVideosQuery) or die("Query Unsuccessful.");
        } elseif ($bulkOption == 'publish') {
            $editVideosQuery =  "UPDATE videos SET videoStatus ='$publish' WHERE videoId= '$id'";
            $result = mysqli_query($conn, $editVideosQuery) or die("Query Unsuccessful.");
        }
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
            <h1><i class="fas fa-folder-open"></i> Videos <small>Different Videos</small></h1>
            <hr>
            <ol class="breadcrumb">
                <li class="mr-2"><a href="teacherdashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
                </li>
                <span> &#47; </span>
                <li class="breadcrumb-item active ml-2 "><i class="fas fa-folder-open"></i>Videos</li>
            </ol>
            <form action="" method="post">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group pr-3">
                                        <select name="bulk-options" id="" class="form-control">
                                            <option value="delete">Delete</option>
                                            <option value="publish">Publish</option>
                                            <option value="draft">Draft</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <input type="submit" class="btn btn-success" value="Apply">
                                    <a href="add-videos.php" class="btn btn-primary">Add new</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-md-12">
                        <?php
                        $teacherUid = $_SESSION['useruid'];
                        $videoapproval = 'Yes';
                        $query = "SELECT * FROM videos WHERE teacherUid='$teacherUid' AND videoApproval='$videoapproval'";
                        $run = mysqli_query($conn, $query);
                        if (mysqli_num_rows($run) > 0) {
                        ?>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-hover table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th><input type="checkbox" id="selectallboxes"></th>
                                            <th>Sr #</th>
                                            <th>Video Name</th>
                                            <th>Discription</th>
                                            <th>Video File</th>
                                            <th>Service Title</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
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
                                                <td><input type="checkbox" name="checkboxes[]" value="<?php echo $id; ?>" class="checkboxes"></td>
                                                <td><?php echo $id; ?></td>
                                                <td><?php echo $videoTitle; ?></td>
                                                <td><?php echo $videoDiscription; ?></td>
                                                <td><?php echo $videoFile; ?></td>
                                                <td><?php echo $servicesTitle; ?></td>
                                                <td><?php echo $videoStatus; ?></td>
                                                <td><a href="editvideos.php?videoId=<?php echo $row['videoId']; ?>"><i class="fas fa-pen"></i></a></td>
                                                <td><a href='include/deleteVideos.php?videoId=<?php echo $row['videoId']; ?>'><i class="fas fa-trash"></i></a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        } else {
                            echo "<center><h2>No Videos right now</h2></center>";
                        }
                        ?>
                        <hr>
                        <h1>Unapproved Videos:</h1>
                        <div class="row pt-4">
                            <div class="col-md-12">
                                <?php
                                $teacherUid = $_SESSION['useruid'];
                                $videoDisapproval = 'No';
                                $query = "SELECT * FROM videos WHERE teacherUid='$teacherUid' AND videoapproval='$videoDisapproval'";
                                $run = mysqli_query($conn, $query);
                                if (mysqli_num_rows($run) > 0) {
                                ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped table-hover table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th><input type="checkbox" id="selectallboxes"></th>
                                                    <th>Sr #</th>
                                                    <th>Video Name</th>
                                                    <th>Discription</th>
                                                    <th>Video File</th>
                                                    <th>Service Title</th>
                                                    <th>Admin Comments</th>
                                                    <th>Status</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
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
                                                    $adminComment = $row['adminComment'];
                                                ?>
                                                    <tr>
                                                        <td><input type="checkbox" name="checkboxes[]" value="<?php echo $id; ?>" class="checkboxes"></td>
                                                        <td><?php echo $id; ?></td>
                                                        <td><?php echo $videoTitle; ?></td>
                                                        <td><?php echo $videoDiscription; ?></td>
                                                        <td><?php echo $videoFile; ?></td>
                                                        <td><?php echo $servicesTitle; ?></td>
                                                        <td><?php echo $adminComment; ?></td>
                                                        <td><?php echo $videoStatus; ?></td>
                                                        <td><a href="editvideos.php?videoId=<?php echo $row['videoId']; ?>"><i class="fas fa-pen"></i></a></td>
                                                        <td><a href='include/deleteVideos.php?videoId=<?php echo $row['videoId']; ?>'><i class="fas fa-trash"></i></a></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php
                                } else {
                                    echo "<center><h2>No Unapproved videos right now</h2></center>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "none") {
        echo '<script type="text/javascript">';
        echo ' alert("Video edited")';  //not showing an alert box.
        echo '</script>';
    }
}
?>
<?php
require_once 'include/footer.php';
?>