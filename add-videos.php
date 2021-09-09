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
            <h1><i class="fas fa-plus-square"></i> Add Videos <small>New Videos</small></h1>
            <hr>
            <ol class="breadcrumb">
                <li class="mr-2"><a href="teacherdashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
                </li>
                <span> &#47; </span>
                <li class="breadcrumb-item active ml-2 "><i class="fas fa-plus-square"></i> Add Videos</li>
            </ol>
            <div class="row">
                <div class="col-md-8">
                    <?php
                    $teacherUid = $_SESSION['useruid'];
                    $sql = "SELECT teacherId FROM teacher WHERE teacherUid='$teacherUid'";
                    $run1 = mysqli_query($conn, $sql);
                    $row1 = mysqli_fetch_assoc($run1);
                    $teacherId = $row1['teacherId'];
                    ?>
                    <form action="include/add-videos.inc.php?" method="post" enctype="multipart/form-data">
                        <div class="form-label-group pb-2">
                            <input type="hidden" name="teacherUid" value="<?php echo $teacherUid; ?>">
                            <input type="hidden" name="teacherId" value="<?php echo $teacherId; ?>">
                            <label for="videoTitle">Video Title</label>
                            <input type="text" id="videoTitle" class="form-control" placeholder="Video Title" name="videoTitle" required autofocus>
                        </div>

                        <div class="form-label-group pb-2">
                            <label class="form-label" for="customFile">Video File</label>
                            <br>
                            <input type="file" name="file" class="form-control" id="customFile" required>

                        </div>

                        <label for="option">Please select a Upload option.</label>
                        <select class="custom-select d-block w-100" type="text" name="videoStatus" id="option" required>
                            <option value="">Upload as</option>
                            <option>Publish</option>
                            <option>Draft</option>
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
                                    <option value="<?php echo $row['servicesId'] . '-' . $servicesTitle ?>"><?php echo $servicesTitle; ?></option>
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
                            <textarea class="form-control" name="videoDiscription" id="videoDiscription" cols="50" rows="5" required></textarea>

                        </div>
                        <hr>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Add Videos</button>
                    </form>
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