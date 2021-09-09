<header class="courses-header pt-5 mt-4" data-aos="fade-in">
    <div class="about-heading d-flex justify-content-center">
        <h1>COURSES:</h1>
    </div>
</header>
<section class="courses">
    <div class="container">
        <div class="row gy-4" data-aos="zoom-in">
            <?php
            $query = "SELECT * FROM courses WHERE courseStatus = 'publish'";
            $run = mysqli_query($conn, $query);
            if (mysqli_num_rows($run) > 0) {
                while ($row = mysqli_fetch_array($run)) {
                    $courseId = $row['courseId'];
                    $courseImg = $row['courseImg'];
                    $courseTitle = $row['courseTitle'];
                    $courseDiscription = $row['courseDiscription'];
            ?>
                    <div class="col-lg-4 col-md-6 mt-4">
                        <div class="service-box blue" id="purple">
                            <img src="upload_img/<?= $row['courseImg'] ?>" class="img-fluid mb-5" alt="course-img" id="course-img-1">
                            <h3><?php echo $courseTitle ?></h3>
                            <p><?php echo $courseDiscription ?></p>
                            <div class="hero-btn">
                                <a class="btn btn-primary px-4" href="./services.php?courseTitle=<?php echo $row['courseTitle']; ?>" role="button">Learn more</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<center><h2>No Courses Available</h2></center>";
            }
            ?>
        </div>
    </div>
</section>