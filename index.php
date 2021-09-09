<?php
require_once 'include/header.php';
?>
<?php
require_once 'include/post.php';
?>


<!--FEATURES SECTION-->
<header class="about-header pt-5 mt-4" data-aos="fade-in">
    <div class="about-heading d-flex justify-content-center">
        <h1>FEATURES:</h1>
    </div>
</header>

<section class="feature-area fix">
    <div class="container-fluid">
        <div class="row">
            <div class="right-content col-lg-6" data-aos="fade-right">
                <img src="assets/img/blog/about3.png" alt="feature-image" class="img-fluid feature-img">
            </div>
            <div class="left-content col-lg-6 text-left" data-aos="zoom-in">
                <h2 class="feature-heading mb-4">Learner outcomes on courses you will take:</h2>
                <div class="container-fluid ">
                    <div class="row">
                        <div class="features col-lg-10 text-left mb-4">
                            <p><span>&check;</span> To provide knowledge with ease.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="features col-lg-10 text-left mb-4">
                            <p><span>&check;</span> To provide content which is pertinent to the course they wish to learn about.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="features col-lg-10 text-left mb-4">
                            <p><span>&check;</span> New approaches to tackle different tasks effectively.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="features col-lg-10 text-left mb-4">
                            <p><span>&check;</span> To prepare our students for the professional aspect of life.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="features col-lg-10 text-left mb-4">
                            <p><span>&check;</span> Techniques to engage effectively with vulnerable children and young people.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--About section-->
<header class="about-header pt-5 mt-4" data-aos="fade-in">
    <div class="about-heading d-flex justify-content-center">
        <h1>ABOUT US:</h1>
    </div>
</header>

<section class="about" id="about-us" data-aos="zoom-in">
    <div class="container mb-5">
        <div class="row gx-0">
            <div class=" who col-lg-6 d-flex flex-column justify-content-center" id="who">
                <h3>Who We Are</h3>
                <h2>Two individuals with a goal in mind to provide free education to those who need it.</h2>
                <p>
                    During this pandemic, we wish to provide a means of relief in these hard times to students,
                    as we have realised that the education system has not migrated to online systems properly.
                    Relearn comes to play in this situation. We wish to assist the education system to go online
                    as the pandemic has proved that in these times our previous system are not that sustainable.
                </p>
                <div class="hero-btn">
                    <a class="btn btn-primary px-4" href="about.php" role="button">Learn more</a>
                </div>
            </div>
            <div class="about-img col-lg-6 px-0">
                <img src="assets/img/about.jpg" class="img-fluid" alt="about-img">
            </div>
        </div>
    </div>
</section>
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "none") {
        echo '<script type="text/javascript">';
        echo ' alert("Account Deleted.")';  //not showing an alert box.
        echo '</script>';
    }
}
?>
<?php
require_once 'include/footer.php';
?>