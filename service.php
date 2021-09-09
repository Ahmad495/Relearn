<?php
require_once 'include/header.php';
if (isset($_POST['checkboxes'])) {
    $draft = "draft";
    $publish = "publish";
    foreach ($_POST['checkboxes'] as $id) {
        $query = "SELECT * FROM services WHERE servicesId='$id'";
        $run = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($run);
        $createDeletePath = "../upload_img/" . $row['servicesImg'];
        $bulkOption = $_POST['bulk-options'];
        if ($bulkOption == 'delete') {
            $findVideoQuery = "SELECT * FROM videos WHERE servicesId='$id'";
            $videosResult = mysqli_query($conn, $findVideoQuery);
            if (mysqli_num_rows($videosResult) > 0) {
                while ($row = mysqli_fetch_array($videosResult)) {
                    $createDeletePathVideos = "../upload/" . $row['videoFile'];
                    if (unlink($createDeletePathVideos)) {
                        $delVideosQuery =  "DELETE FROM videos WHERE servicesId='$id'";
                        $result = mysqli_query($conn, $delVideosQuery) or die("Query Unsuccessful.");
                    }
                }
                if (unlink($createDeletePath)) {
                    $delServicesQuery = "DELETE FROM services WHERE servicesId = '$id'";
                    $result = mysqli_query($conn, $delServicesQuery) or die("Query Unsuccessful.");
                } else {
                    echo "image path error";
                }
            } else {
                if (unlink($createDeletePath)) {
                    $delServicesQuery = "DELETE FROM services WHERE servicesId = '$id'";
                    $result = mysqli_query($conn, $delServicesQuery) or die("Query Unsuccessful.");
                } else {
                    echo "image path error";
                }
            }
        } elseif ($bulkOption == 'draft') {
            $editServicesQuery =  "UPDATE services SET servicesStatus ='$draft' WHERE servicesId= '$id'";
            $result = mysqli_query($conn, $editServicesQuery) or die("Query Unsuccessful.");
        } elseif ($bulkOption == 'publish') {
            $editServicesQuery =  "UPDATE services SET servicesStatus ='$publish' WHERE servicesId= '$id'";
            $result = mysqli_query($conn, $editServicesQuery) or die("Query Unsuccessful.");
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
            <h1><i class="fas fa-folder-open"></i> Services <small>Different Services</small></h1>
            <hr>
            <ol class="breadcrumb">
                <li class="mr-2"><a href="teacherdashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
                </li>
                <span> &#47; </span>
                <li class="breadcrumb-item active ml-2 "><i class="fas fa-folder-open"></i>Services</li>
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
                                    <a href="add-services.php" class="btn btn-primary">Add new</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-md-12">
                        <?php
                        $teacherUid = $_SESSION['useruid'];
                        $query = "SELECT * FROM services WHERE teacherUid='$teacherUid'";
                        $run = mysqli_query($conn, $query);
                        if (mysqli_num_rows($run) > 0) {
                        ?>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-hover table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th><input type="checkbox" id="selectallboxes"></th>
                                            <th>Sr #</th>
                                            <th>Service Name</th>
                                            <th>Service Img</th>
                                            <th>Course Title</th>
                                            <th>Discription</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($run)) {
                                            $id = $row['servicesId'];
                                            $name = ucfirst($row['servicesTitle']);
                                            $img = $row['servicesImg'];
                                            $courseTitle = $row['courseTitle'];
                                            $description = $row['servicesDiscription'];
                                            $servicesStatus = $row['servicesStatus'];
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="checkboxes[]" value="<?php echo $id; ?>" class="checkboxes"></td>
                                                <td><?php echo $id; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $img; ?></td>
                                                <td><?php echo $courseTitle; ?></td>
                                                <td><?php echo $description; ?></td>
                                                <td><?php echo $servicesStatus; ?></td>
                                                <td><a href="editservices.php?servicesId=<?php echo $row['servicesId']; ?>"><i class="fas fa-pen"></i></a></td>
                                                <td><a href='include/deleteServices.php?servicesId=<?php echo $row['servicesId']; ?>'><i class="fas fa-trash"></i></a></td>
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
        echo ' alert("Service edited")';  //not showing an alert box.
        echo '</script>';
    }
}
?>
<?php
require_once 'include/footer.php';
?>