<?php
require_once 'include/header.php';
?>
<header class="about-header pt-5 mt-4" data-aos="fade-in">
    <div class="about-heading d-flex justify-content-center">
        <h1>CONTACT US:</h1>
    </div>
</header>
<section class="contact-form" id="contact-form">
    <div class="container">
        <div class="row gy-4">

            <div class="col-lg-6">

                <div class="row gy-4 gx-4">
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="fas fa-map-marker-alt fa-2x"></i>
                            <h3>Address</h3>
                            <p>ABC xyz Street XABC Country</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="fas fa-phone-alt fa-2x"></i>
                            <h3>Call Us</h3>
                            <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                        </div>
                    </div>
                    <div class="col-md-6 pt-3">
                        <div class="info-box">
                            <i class="fas fa-envelope fa-2x"></i>
                            <h3>Email Us</h3>
                            <p>info@example.com<br>contact@example.com</p>
                        </div>
                    </div>
                    <div class="col-md-6 pt-3">
                        <div class="info-box">
                            <i class="far fa-clock fa-2x"></i>
                            <h3>Open Hours</h3>
                            <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <form action="include/contact.inc.php" method="post" class="php-email-form">
                    <div class="row">

                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                        </div>

                        <div class="col-md-12 pt-3">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                        </div>

                        <div class="col-md-12 pt-3">
                            <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                            <div class="contact-btn pt-4 text-center">
                                <button class="btn btn-primary text-uppercase px-4" type="submit" name="submit">Send</button>
                            </div>
                        </div>


                    </div>
                </form>

            </div>

        </div>
    </div>
</section>
<?php
    if (isset($_GET["message"])) {
        if ($_GET["message"] == "messagesend") {
            echo '<script type="text/javascript">';
            echo ' alert("Your message has been sent to admin")';  //not showing an alert box.
            echo '</script>';
        }
    }
    ?>
<?php
require_once 'include/footer.php';
?>