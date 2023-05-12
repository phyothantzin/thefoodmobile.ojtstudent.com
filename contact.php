<?php
include_once 'inc/header.php';
include 'inc/connection.php';
session_start();
?>
<?php
$useremail = $_SESSION['id'];
$sql3 = "SELECT * FROM users WHERE email = '$useremail'";
$nameresult = mysqli_query($conn, $sql3);
$user = mysqli_fetch_array($nameresult, MYSQLI_ASSOC);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['contact-name'];
    $phone = $_POST['contact-phone'];
    $email = $_POST['contact-email'];
    $message = $_POST['contact-message'];
    $errors = [];
    if (!$name) {
        $errors[] = 'Your name is required';
    }
    if (!$phone) {
        $errors[] = 'Your phone is required';
    }
    if (!$email) {
        $errors[] = 'Your email is required';
    }
    if ($useremail && $useremail !== $email) {
        $errors[] = 'You can\'t use different email while logged in.';
    }
    if (!$message) {
        $errors[] = 'Your message is required';
    }
    if (empty($errors)) {
        $sql = "INSERT INTO feedbacks(name, phone, email, message)VALUES('$name','$phone', '$email', '$message')";
        mysqli_query($conn, $sql);
    }
}
?>
<nav class="navbar navbar-expand-lg bg-white shadow-lg">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <a class="navbar-brand" href="index.php">Food Mobile</a>


                <div class="d-lg-none">
                    <?php if ($_SESSION['id'] == null) {
                        echo '<button type="button" class="custom-btn btn btn-danger" data-bs-toggle="modal" data-bs-target="#BookingModal">Register</button>';
                    } else {
                        echo '<a href="logout.php" type="button" class="custom-btn btn btn-danger">Logout</a>';
                    } ?>
                </div>

                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="about.php">Story</a>
                        </li> -->

                        <li class="nav-item">
                            <a class="nav-link" href="menu.php">Menu</a>
                        </li>

                        <?php if ($_SESSION['id'] != null) {
                            echo '<li class="nav-item"><a class="nav-link" href="order.php">Orders</a></li>';
                        } ?>
                    
                        

                        <li class="nav-item">
                            <a class="nav-link" href="news.php">Our Updates</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>

                        <li class="nav-item">
                            <a style="display: inline-block;" class="nav-link" href="index.php"><?php echo $user[
                                'username'
                            ]; ?></a>
                        </li>
                    </ul>
                </div>

                <div class="d-none d-lg-block">
                    <?php if ($_SESSION['id'] == null) {
                        echo '<button type="button" class="custom-btn btn btn-danger" data-bs-toggle="modal" data-bs-target="#BookingModal">Register</button>';
                    } else {
                        echo '<a href="logout.php" type="button" class="custom-btn btn btn-danger">Logout</a>';
                    } ?> 
                </div>

            </div>
        </nav>

        <main>

            <header class="site-header site-contact-header">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12 mx-auto">
                            <h1 class="text-white">Say Hi</h1>

                            <strong class="text-white">We are happy to get in touch with you</strong>
                        </div>

                    </div>
                </div>
                
                <div class="overlay"></div>
            </header>

            <section class="contact section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="mb-4">Leave a message</h2>
                        </div>

                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger m-2">
                                <?php foreach ($errors as $error): ?>
                                    <div><?php echo $error; ?></div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <div class="col-lg-6 col-12">
                            <form class="custom-form contact-form row" action="contact.php" method="post" role="form">
                                <div class="col-lg-6 col-6">
                                    <label for="contact-name" class="form-label">Full Name</label>

                                    <input type="text" name="contact-name" id="contact-name" class="form-control" placeholder="Your Name" required value="<?php echo $user[
                                        'username'
                                    ]; ?>">
                                </div>

                                <div class="col-lg-6 col-6">
                                    <label for="contact-phone" class="form-label">Phone Number</label>

                                    <input type="telephone" name="contact-phone" id="contact-phone" class="form-control" placeholder="123-456-7890" value="<?php echo $user[
                                        'phone'
                                    ]; ?>">
                                    <!-- pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" -->
                                </div>

                                <div class="col-12">
                                    <label for="contact-email" class="form-label">Email</label>

                                    <input type="email" name="contact-email" id="contact-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Your Email" required="" value="<?php echo $user[
                                        'email'
                                    ]; ?>">

                                    <label for="contact-message" class="form-label">Message</label>

                                    <textarea style="resize: none;" class="form-control" rows="5" id="contact-message" name="contact-message" placeholder="Your Message"></textarea>
                                </div>

                                <div class="col-lg-5 col-12 ms-auto">
                                    <button type="submit" class="form-control">Send</button>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-4 col-12 mx-auto mt-lg-5 mt-4">

                            <h5>Weekdays</h5>

                            <div class="d-flex mb-lg-3">
                                <p>Monday to Friday</p>

                                <p class="ms-5">10:00 AM - 08:00 PM</p>
                            </div>

                            <h5>Weekends</h5>

                            <div class="d-flex">
                                <p>Saturday and Sunday</p>

                                <p class="ms-5">11:00 AM - 11:00 PM</p>
                            </div>
                        </div>

                        <div class="col-12">
                            <h4 class="mt-5 mb-4">121 Einstein Loop N, Bronx, NY 10475, United States</h4>

                            <div class="google-map pt-3">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14920.891757756479!2d-73.83496372506556!3d40.8623107607295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c28cbc17f4a0c3%3A0x9ae0f1e804a817d!2s121%20Einstein%20Loop%20N%2C%20Bronx%2C%20NY%2010475%2C%20USA!5e0!3m2!1sen!2sth!4v1650470337727!5m2!1sen!2sth" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </main>

        <footer class="site-footer section-padding">
            
            <div class="container">
                
                <div class="row">

                    <div class="col-12">
                        <h4 class="text-white mb-4 me-5">The Food Mobile <i class="bi bi-cart4"></i></h4>
                    </div>

                    <div class="col-lg-4 col-md-7 col-xs-12 tooplate-mt30">
                        <h6 class="text-white mb-lg-4 mb-3">Location</h6>

                        <p>121 Einstein Loop N, Bronx, NY 10475, United States</p>

                        <a href="https://goo.gl/maps/wZVGLA7q64uC1s886" class="custom-btn btn btn-dark mt-2">Directions</a>
                    </div>

                    <div class="col-lg-4 col-md-5 col-xs-12 tooplate-mt30">
                        <h6 class="text-white mb-lg-4 mb-3">Opening Hours</h6>

                        <p class="mb-2">Monday - Friday</p>

                        <p>10:00 AM - 08:00 PM</p>

                        <p>Tel: <a href="tel: 010-02-0340" class="tel-link">010-02-0340</a></p>
                    </div>

                    <div class="col-lg-4 col-md-6 col-xs-12 tooplate-mt30">
                        <h6 class="text-white mb-lg-4 mb-3">Social</h6>

                        <ul class="social-icon">
                            <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                            <li><a href="https://twitter.com" target="_blank"
                            	 class="social-icon-link bi-twitter"></a></li>

                            <li><a href="#" class="social-icon-link bi-youtube"></a></li>
                        </ul>
                    
                        <p class="copyright-text tooplate-mt60">Copyright © 2023 Food Mobile Co., Ltd.                        
                    </div>

                </div><!-- row ending -->
                
             </div><!-- container ending -->
             
        </footer>

        <!-- Modal -->
        <?php include_once 'inc/modal.php'; ?>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>
