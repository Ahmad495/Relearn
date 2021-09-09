<?php
require_once 'include/header.php';
if (isset($_GET['videoId'])) {
    $videoId = $_GET['videoId'];
    $query = "SELECT * FROM videos WHERE videoId ='$videoId'";
    $result = mysqli_query($conn, $query) or die("Query Unsuccessful.");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $videoId = $row['videoId'];
        $oldVideoFile = $row['videoFile'];
        $videoTitle = $row['videoTitle'];
        $videoDiscription = $row['videoDiscription'];
        $videoStatus = $row['videoStatus'];
    } else {
        header("location : all-videos.php");
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
            <h1><i class="fas fa-pen"></i> Edit Videos <small> Videos</small></h1>
            <hr>
            <ol class="breadcrumb">
                <li class="mr-2"><a href="teacherdashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
                </li>
                <span> &#47; </span>
                <li class="breadcrumb-item active ml-2 "><i class="fas fa-pen"></i> Edit Videos</li>
            </ol>
            <div class="row">
                <div class="col-md-8">
                    <?php
                    $teacherUid = $_SESSION['useruid'];
                    ?>
                    <form action="include/editvideos.inc.php?videoId=<?php echo $row['videoId']; ?>&oldVideoFile=<?php echo $oldVideoFile; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-label-group pb-2">
                            <label for="videoTitle">Video Title</label>
                            <input type="text" id="videoTitle" class="form-control" placeholder="Video Title" value="<?php echo $videoTitle; ?>" name="videoTitle" required autofocus>
                        </div>

                        <div class="form-label-group pb-2">
                            <label>Video</label>
                            <br>
                            <input type="file" name="file">

                        </div>

                        <label for="option">Please select a Upload option.</label>
                        <select class="custom-select d-block w-100" type="text" name="videoStatus" id="option" required>
                            <option <?php if ($videoStatus === 'Publish') {
                                        echo "selected";
                                    } ?>>Publish</option>
                            <option <?php if ($videoStatus === 'Draft') {
                                        echo "selected";
                                    } ?>>Draft</option>
                        </select>

                        <label for="option">Please select a Service option.</label>
                        <select class="custom-select d-block w-100" type="text" name="servicesTitle" id="option" required>
                            <option>Post in</option>
                            <?php
                            $query = "SELECT * FROM services WHERE servicesStatus='Publish' AND teacherUid='$teacherUid'";
                            $run = mysqli_query($conn, $query);
                            if (mysqli_num_rows($run) > 0) {
                                while ($row = mysqli_fetch_array($run)) {
                                    $servicesTitle = $row['servicesTitle'];
                            ?>
                                    <option><?php echo $servicesTitle ?></option>
                                <?php
                                }
                            } else {
                                ?>
                                <option>No Services Yet</option>
                            <?php
                            }
                            ?>
                        </select>

                        <div class="form-label-group pt-2">
                            <label for="videoDiscription">Video Description</label>
                            <textarea class="form-control" name="videoDiscription" id="videoDiscription" cols="50" rows="5" required><?php if (isset($videoDiscription)) {
                                                                                                                                            echo $videoDiscription;
                                                                                                                                        } ?></textarea>

                        </div>
                        <hr>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Edit Videos</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video class="embed-responsive-item" src="../upload/<?= $oldVideoFile ?>" allowfullscreen controls></video>
                    </div>
                    <h4 class="font-weight-bold text-center pt-3">Current Video.</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "none") {
        echo '<script type="text/javascript">';
        echo ' alert("Video Uploaded")';  //not showing an alert box.
        echo '</script>';
    } else  if ($_GET["error"] == "videoformat") {
        echo '<script type="text/javascript">';
        echo ' alert("Please select mp4 video.")';  //not showing an alert box.
        echo '</script>';
    }
}
?>
<?php
require_once 'include/footer.php';
?>