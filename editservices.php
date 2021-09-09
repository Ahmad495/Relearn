<?php
require_once 'include/header.php';
if (isset($_GET['servicesId'])) {
    $servicesId = $_GET['servicesId'];
    $query = "SELECT * FROM services WHERE servicesId ='$servicesId'";
    $result = mysqli_query($conn, $query) or die("Query Unsuccessful.");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $servicesId = $row['servicesId'];
        $servicesImg = $row['servicesImg'];
        $servicesTitle = $row['servicesTitle'];
        $servicesDiscription = $row['servicesDiscription'];
        $servicesStatus = $row['servicesStatus'];
    } else {
        header("location : service.php");
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
            <h1><i class="fas fa-pen"></i> Edit Services <small>Services</small></h1>
            <hr>
            <ol class="breadcrumb">
                <li class="mr-2"><a href="teacherdashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
                </li>
                <span> &#47; </span>
                <li class="breadcrumb-item active ml-2 "><i class="fas fa-pen"></i> Edit Services</li>
            </ol>
            <div class="row">
                <div class="col-md-8">
                    <form action="include/editservices.inc.php?servicesId=<?php echo $row['servicesId']; ?>&oldservicesTitle=<?php echo $row['servicesTitle']; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-label-group pb-2">
                            <label for="servicesTitle">Service Title</label>
                            <input type="text" id="servicesTitle" class="form-control" placeholder="Course Title" value="<?php echo $servicesTitle; ?>" name="servicesTitle" required autofocus>
                        </div>

                        <div class="form-label-group pb-2">
                            <label for="servicesImg">Service Image</label>
                            <br>
                            <input type="file" id="servicesImg" name="file">

                        </div>

                        <label for="option">Please select a valid uplaod status.</label>
                        <select class="custom-select d-block w-100" type="text" name="servicesStatus" id="option" required>
                            <option <?php if ($servicesStatus === 'Publish') {
                                        echo "selected";
                                    } ?>>Publish</option>
                            <option <?php if ($servicesStatus === 'Draft') {
                                        echo "selected";
                                    } ?>>Draft</option>
                        </select>

                        <label for="option">Please select a valid Course.</label>
                        <select class="custom-select d-block w-100" type="text" name="courseTitle" id="option" required>
                            <option>Upload as</option>
                            <?php
                            $query = "SELECT * FROM courses WHERE courseStatus='Publish'";
                            $run = mysqli_query($conn, $query);
                            if (mysqli_num_rows($run) > 0) {
                                while ($row = mysqli_fetch_array($run)) {
                                    $courseTitle = $row['courseTitle'];
                            ?>
                                    <option><?php echo $courseTitle ?></option>
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
                            <label for="servicesDiscription">Service Description</label>
                            <textarea class="form-control" name="servicesDiscription" id="servicesDiscription" cols="50" rows="5" required><?php if (isset($servicesDiscription)) {
                                                                                                                                                echo $servicesDiscription;
                                                                                                                                            } ?></textarea>

                        </div>
                        <hr>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Edit Services</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <img src="../upload_img/<?php echo $servicesImg ?>" class="img-fluid" alt="services-img">
                    <h4 class="font-weight-bold text-center pt-3">Current Image.</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo '<script type="text/javascript">';
        echo ' alert("Field empty")';  //not showing an alert box.
        echo '</script>';
    } elseif ($_GET["error"] == "imageformat") {
        echo '<script type="text/javascript">';
        echo ' alert("Please choose jpg, svg, png image format")';  //not showing an alert box.
        echo '</script>';
    }
}
?>
<?php
require_once 'include/footer.php';
?>