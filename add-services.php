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
            <h1><i class="fas fa-plus-square"></i> Add Services <small>New Services</small></h1>
            <hr>
            <ol class="breadcrumb">
                <li class="mr-2"><a href="teacherdashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
                </li>
                <span> &#47; </span>
                <li class="breadcrumb-item active ml-2 "><i class="fas fa-plus-square"></i> Add Services</li>
            </ol>
            <div class="row">
                <div class="col-md-8">
                    <?php
                    $teacherUid = $_SESSION['useruid'];
                    $sql = "SELECT teacherId FROM teacher WHERE teacherUid='$teacherUid'";
                    $run = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($run);
                    $teacherId = $row['teacherId'];
                    ?>
                    <form action="include/add-services.inc.php" method="post" enctype="multipart/form-data">
                        <div class="form-label-group pb-2">
                            <input type="hidden" name="teacherUid" value="<?php echo $teacherUid; ?>">
                            <input type="hidden" name="teacherId" value="<?php echo $teacherId; ?>">
                            <label for="inputServiceTitle">Service Title</label>
                            <input type="text" id="inputServiceTitle" class="form-control" placeholder="Course Title" name="servicesTitle" required autofocus>
                        </div>

                        <div class="form-label-group pb-2">
                            <label class="form-label" for="customFile">Service Image</label>
                            <br>
                            <input type="file" name="file" class="form-control" id="customFile" required>

                        </div>

                        <label for="option">Please select a valid Option.</label>
                        <select class="custom-select d-block w-100" type="text" name="servicesStatus" id="option" required>
                            <option value="">Upload as</option>
                            <option>Publish</option>
                            <option>Draft</option>
                        </select>

                        <label for="option">Please select a valid Option.</label>
                        <select class="custom-select d-block w-100" type="text" name="courseTitle" id="option" required>
                            <option>Upload as</option>
                            <?php
                            $query = "SELECT * FROM courses WHERE courseStatus='Publish'";
                            $run = mysqli_query($conn, $query);
                            if (mysqli_num_rows($run) > 0) {
                                while ($row = mysqli_fetch_array($run)) {
                                    $courseTitle = $row['courseTitle'];
                            ?>
                                    <option value="<?php echo $row['courseId'] . '-' . $courseTitle ?>"><?php echo $courseTitle ?></option>
                                <?php
                                }
                            } else {
                                ?>
                                <option>No Courses Yet</option>
                            <?php
                            }
                            ?>
                        </select>

                        <div class="form-label-group pt-2">
                            <label for="inputEmail">Service Description</label>
                            <textarea class="form-control" name="servicesDiscription" id="" cols="50" rows="5" required></textarea>

                        </div>
                        <hr>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Add Course</button>
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
        echo ' alert("Services Uploaded")';  //not showing an alert box.
        echo '</script>';
    } elseif ($_GET["error"] == "titletaken") {
        echo '<script type="text/javascript">';
        echo ' alert("Service Title already exist")';  //not showing an alert box.
        echo '</script>';
    }
}
?>
<?php
require_once 'include/footer.php';
?>