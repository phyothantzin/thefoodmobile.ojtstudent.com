<?php
session_start();
include 'inc/connection.php';
include_once 'inc/header.php';
?>
<?php
$useremail = $_SESSION['id'];
$sql3 = "SELECT username FROM users WHERE email = '$useremail'";
$nameresult = mysqli_query($conn, $sql3);
$user = mysqli_fetch_array($nameresult, MYSQLI_ASSOC);
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
            <header class="site-header site-news-header">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12 mx-auto">
                            <h1 class="text-white">News &amp; Events</h1>

                            <strong class="text-white">our latest updates, news, events and special promotions</strong>
                        </div>

                    </div>
                </div>

                <div class="overlay"></div>
            </header>

            <section class="news section-padding bg-white">
                <div class="container">
                    <div class="row">

                        <h2 class="mb-lg-5 mb-4">Latest Updates</h2>
                        
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="news-thumb mb-4">
                                <a href="news-detail.php">
                                    <img src="images/news/pablo-merchan-montes-Orz90t6o0e4-unsplash.jpg" class="img-fluid news-image" alt="">
                                </a>
                                
                                <div class="news-text-info news-text-info-large">
                                    <span class="category-tag bg-danger">Featured</span>

                                    <h5 class="news-title mt-2">
                                        <a href="news-detail.php" class="news-title-link">How to make a healthy diet?</a>
                                    </h5>
                                </div>
                            </div> 
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="news-thumb mb-4">
                                <a href="news-detail.php">
                                    <img src="images/news/stefan-johnson-xIFbDeGcy44-unsplash.jpg" class="img-fluid news-image" alt="">
                                </a>
                                
                                <div class="news-text-info news-text-info-large">
                                    <span class="category-tag bg-danger">Featured</span>

                                    <h5 class="news-title mt-2">
                                        <a href="news-detail.php" class="news-title-link">Happy Living and happy eating tips</a>
                                    </h5>
                                </div>
                            </div> 
                        </div>

                    </div>
                </div>
            </section>

            <section class="news section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="mb-lg-5 mb-4">News &amp; Events</h2>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="news-thumb mb-4">
                                <a href="news-detail.php">
                                    <img src="images/news/gilles-lambert-S_LhjpfIdm4-unsplash.jpg" class="img-fluid news-image" alt="">
                                </a>
                                
                                <div class="news-text-info">
                                    <span class="category-tag me-3 bg-info">Promotions</span>

                                    <strong>12 April 2023</strong>

                                    <h5 class="news-title mt-2">
                                        <a href="news-detail.php" class="news-title-link">Is Coconut good for your health?</a>
                                    </h5>
                                </div>
                            </div> 
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="news-thumb mb-4">
                                <a href="news-detail.php">
                                    <img src="images/news/ella-olsson-mmnKI8kMxpc-unsplash.jpg" class="img-fluid news-image" alt="">
                                </a>
                                
                                <div class="news-text-info">
                                    <span class="category-tag me-3 bg-info">Career</span>

                                    <strong>18 April 2023</strong>

                                    <h5 class="news-title mt-2">
                                        <a href="news-detail.php" class="news-title-link">How to run a sushi business?</a>
                                    </h5>
                                </div>
                            </div> 
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="news-thumb mb-4">
                                <a href="news-detail.php">
                                    <img src="images/news/louis-hansel-GiIiRV0FjwU-unsplash.jpg" class="img-fluid news-image" alt="">
                                </a>
                                
                                <div class="news-text-info">
                                    <span class="category-tag me-3 bg-info">Meeting</span>

                                    <strong>30 April 2023</strong>

                                    <h5 class="news-title mt-2">
                                        <a href="news-detail.php" class="news-title-link">Learning a fine dining experience</a>
                                    </h5>
                                </div>
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

                            <li><a href="#" class="social-icon-link bi-twitter"></a></li>

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
