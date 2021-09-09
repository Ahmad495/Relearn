<main>
    <header class="about-header pt-5 mt-4" data-aos="fade-in">
        <div class="about-heading d-flex justify-content-center">
            <h1>SERVICES:</h1>
        </div>
    </header>
    <section>
        <div class="container-fluid" data-aos="zoom-in">
            <div class="row">
                <?php
                $courseTitle = $_GET['courseTitle'];
                $query = "SELECT * FROM services WHERE courseTitle = '$courseTitle' AND servicesStatus='Publish'";
                $run = mysqli_query($conn, $query);
                if (mysqli_num_rows($run) > 0) {
                    while ($row = mysqli_fetch_array($run)) {
                        $servicesId = $row['servicesId'];
                        $servicesTitle = $row['servicesTitle'];
                        $servicesDiscription = $row['servicesDiscription'];
                        $teacherUid = $row['teacherUid'];
                        $courseTitle = $row['courseTitle'];
                        $servicesImg = $row['servicesImg'];
                ?>
                        <div class="col-lg-6 mt-5">
                            <div class="services mb-5" id="purple">
                                <div class="container-fluid">
                                    <div class="row">

                                        <div class="col-lg-5"><img src="upload_img/<?= $row['servicesImg'] ?>" class="img-fluid" alt="service img"></div>
                                        <div class="col-lg-7 d-flex flex-column justify-content-center">
                                            <h4 class="font-weight-bold"><?php echo $servicesTitle ?></h4>
                                            <p><?php echo $servicesDiscription; ?></p>
                                            <p>Creator: <?php echo $teacherUid; ?></p>
                                            <div class="star-rating">
                                                <span class="fa fa-star-o" data-rating="1"></span>
                                                <span class="fa fa-star-o" data-rating="2"></span>
                                                <span class="fa fa-star-o" data-rating="3"></span>
                                                <span class="fa fa-star-o" data-rating="4"></span>
                                                <span class="fa fa-star-o" data-rating="5"></span>
                                                <input type="hidden" name="whatever1" class="rating-value" value="2.56">
                                            </div>
                                            <div class="hero-btn pt-3">
                                                <a class="btn btn-primary px-4" href="./videos.php?servicesTitle=<?php echo $servicesTitle ?>&teacherUid=<?php echo $teacherUid ?>" role="button">Start Watching</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<center><h2>No Services Available</h2></center>";
                }
                ?>
    </section>
</main>