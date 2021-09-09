<?php
require_once 'include/header.php';
?>

<header class="about-header pt-5 mt-4" data-aos="fade-in">
    <div class="about-heading d-flex justify-content-center">
        <h1>VIDEOS:</h1>
    </div>
</header>
<section>
    <div class="container">
        <div class="row">
            <?php
            $servicesTitle = $_GET['servicesTitle'];
            $teacherUid = $_GET['teacherUid'];
            $videoApproval = "Yes";
            $query = "SELECT * FROM videos WHERE servicesTitle = '$servicesTitle' AND videoStatus='Publish' AND teacherUid='$teacherUid' AND videoApproval='$videoApproval'";
            $run = mysqli_query($conn, $query);
            if (mysqli_num_rows($run) > 0) {
                while ($row = mysqli_fetch_array($run)) {
            ?>
                     <div class="embed-responsive embed-responsive-16by9" id="<?= $row['videoId']; ?>" style="display:none;">
                        <video class="embed-responsive-item fit-video" width="880" height="480" controls preload="metadata">
                            <source src="upload/<?= $row['videoFile']; ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 pt-5">
                        <div class="services" id="purple">
                            <div class="pulse-container">
                                <div class="pulse-box d-flex justify-content-center">
                                    <a class="venobox_custom play-icon icon-center" data-gall="myGallery" data-autoplay="true" data-vbtype="inline" href="#<?= $row['videoId']; ?>"><img src="assets/img/play.png" class="img-fluid" alt=""></a>
                                </div>
                            </div>
                            <h4 class="font-weight-bold pt-4 text-center"><?php echo $row['videoTitle']; ?></h4>
                            <div class="d-flex justify-content-center py-3">
                                <button type="button" class="btn btn-primary px-3" data-toggle="modal" data-target="#exampleModal" onclick="popup('<?php echo $row['videoTitle']; ?>','<?php echo $row['videoId']; ?>');">Ask Questions</button>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<center><h2>No Videos Available</h2></center>";
            }
            ?>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">

                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="rounded-circle" id="creator-image" alt="Profile-image" style="max-width: 7%;">
                            <h5 class="my-2 font-weight-bold"><?php echo $teacherUid; ?></h5>
                            <br>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="my-2 font-weight-bold">Make sure to login your Student account:</h5>
                            <form action="include/studentQuestion.inc.php?teacherUid=<?php echo $teacherUid; ?>&servicesTitle=<?php echo  $servicesTitle; ?>" method="post">
                                <div class="form-label-group">
                                    <input type="hidden" id="videoTitle" name="videoTitle">
                                    <input type="hidden" id="videoId" name="videoId">
                                </div>
                                <div class="form-label-group pt-2">
                                    <label for="videoDiscription">Ask away any question in your mind.</label>
                                    <textarea class="form-control" name="message" id="videoDiscription" cols="50" rows="5" required></textarea>

                                </div>
                                <hr>
                                <button class="btn btn-primary text-uppercase px-4" type="submit" name="submit">Send</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function popup(title, videoId) {
        document.getElementById("videoTitle").value = title;
        document.getElementById("videoId").value = videoId;
    }
</script>
<?php
require_once 'include/footer.php';
?>