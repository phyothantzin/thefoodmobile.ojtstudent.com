<?php
include_once 'inc/header.php';
include_once 'inc/connection.php';
session_start();
error_reporting(1);
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

            <header class="site-header site-news-detail-header">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2>Learning a fine dining experience</h2>
                        </div>

                    </div>
                </div>
            </header>

            <section class="news-detail section-padding pt-0">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <img src="images/news/news-detail-header.jpg" class="img-fluid news-detail-image" alt="fine dining experience">

                            <div class="col-lg-10 col-10 mx-auto mt-5">
                                
                                <h4 class="mb-3">The best fine-dining experience at The Food Mobile</h4>

                                <p>Phasellus in augue at quam ornare malesuada. Sed magna lorem, dapibus nec lorem sed, pretium vulputate ante. In porttitor sapien urna, eu vulputate arcu pharetra non. Vivamus nec nulla quis leo sodales semper. Quisque sed ultricies tortor. Fusce porta pretium tellus, sit amet vulputate orci.</p>

                                <ul class="list">
                                    <li class="list-item">Pasta stats published in the International</li>

                                    <li class="list-item">Rice flour, or legumes such as beans</li>

                                    <li class="list-item">Belgian family developed major food poisoning symptoms</li>
                                </ul>

                                <p>Pasta is a type of food typically made from an unleavened dough of wheat flour mixed with water or eggs, and formed into sheets or other shapes, then cooked by boiling or baking. Rice flour, or legumes such as beans or lentils, are sometimes used in place of wheat flour to yield a different taste</p>

                                <div class="ratio ratio-16x9 my-5">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/6vebbDZxoKE?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>

                                <h5 class="mt-4 mb-3">Pasta with Cream Sauce Recipe</h5>

                                <p>Pasta is a type of food typically made from an unleavened dough of wheat flour mixed with water or eggs, and formed into sheets or other shapes, then cooked by boiling or baking. Rice flour, or legumes such as beans or lentils, are sometimes used in place of wheat flour to yield a different taste</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- <section class="comments section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h4 class="text-center mb-4">Comment Box</h4>
                        </div>

                        <div class="col-lg-7 col-12 mx-auto">
                            <form class="custom-form comment-form" action="#" method="get" role="form">
                            	
                                <input type="text" name="comment-name" id="comment-name" class="form-control" placeholder="Your Name" required>
                                
                                <input type="email" name="comment-email" id="comment-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Your Email" required="">
                            
                                <textarea class="form-control" rows="5" id="comment" name="comment" placeholder="Write a comment" required></textarea>

                                <div class="col-lg-3 col-4 mx-auto">
                                    <button type="submit" class="form-control" id="subscribe">Submit</button>
                                </div>
                            </form>

                            <div class="news-author d-flex flex-wrap align-items-center">
                                <img src="images/author/alexander-hipp-iEEBWgY_6lA-unsplash.jpg" class="img-fluid news-author-image" alt="">

                                <div class="ms-4 w-50">
                                    <p class="mb-2">Donec pharetra tellus nulla, aliquam elementum lorem hendrerit non.</p>
                                    
                                    <a href="#">David Martin</a>
                                </div>

                                <span class="ms-auto">14 hours ago</span>
                            </div>

                            <div class="news-author d-flex flex-wrap align-items-center">
                                <img src="images/author/shoeib-abolhassani-ojl7T2Ah93U-unsplash.jpg" class="img-fluid news-author-image" alt="">

                                <div class="ms-4 w-50">
                                    <p class="mb-2">Quisque non libero ut mauris fermentum efficitur ac ut nibh.</p>
                                    
                                    <a href="#">Jessica Noel</a>
                                </div>

                                <span class="ms-auto">3 days ago</span>
                            </div>
                        </div>

                    </div>
                </div>
            </section> -->

            <section class="related-news section-padding bg-white">
                <div class="container">
                    <div class="row">

                        <h2 class="text-center mb-lg-5 mb-4">Related News</h2>

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

            <section class="newsletter section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <img src="images/charles-deluvio-FdDkfYFHqe4-unsplash.jpg" class="img-fluid newsletter-image" alt="">
                        </div>

                        <div class="col-lg-6 col-12 d-flex align-items-center mt-5 mt-lg-0 mx-auto">
                            <div class="subscribe-form-wrap">
                                <h4 class="mb-0">Our Newsletter</h4>

                                <p>The food news every day</p>

                                <form class="custom-form subscribe-form mt-4" role="form">
                                    <input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Your email address" required="">

                                    <button type="submit" class="form-control mb-3" id="subscribe">Subscribe</button>

                                    <small>By signing up, you agree to our Privacy Notice and the data policy</small>
                                    </div>
                                </form>
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
