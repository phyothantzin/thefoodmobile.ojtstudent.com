<?php
include 'inc/connection.php';
$sql = 'SELECT * FROM products';
$result = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
session_start();
error_reporting(1);
?>
<?php
$useremail = $_SESSION['id'];
$sql3 = "SELECT username FROM users WHERE email = '$useremail'";
$nameresult = mysqli_query($conn, $sql3);
$user = mysqli_fetch_array($nameresult, MYSQLI_ASSOC);
?>
<?php include_once 'inc/header.php'; ?>
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
            <header class="site-header site-menu-header">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12 mx-auto">
                            <h1 class="text-white">Our Menus</h1>

                            <strong class="text-white">Perfect for all Breakfast, Lunch and Dinner</strong>
                        </div>

                    </div>
                </div>

                <div class="overlay"></div>
            </header>

            <section class="menu section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="mb-lg-5 mb-4">Breakfast Menu</h2>
                        </div>

                        <?php foreach ($products as $product): ?>
                            <?php if ($product['type'] == 'breakfast'): ?>
                            <div class="col-lg-4 col-md-6 col-12">
                            <div class="menu-thumb">
                                <img src="admin/<?php echo $product[
                                    'image'
                                ]; ?>" class="img-fluid menu-image" alt="">

                                <div class="menu-info d-flex flex-wrap align-items-center">
                                    <h4 class="mb-0"><?php echo $product[
                                        'name'
                                    ]; ?></h4>

                    <form method="post" action="insert_order.php" style="display: inline-block">
                    <input  type="hidden" name="id" value="<?php echo $product[
                        'id'
                    ]; ?>"/>
                    <input  type="hidden" name="email" value="<?php echo $useremail; ?>"/>
                    <button style="border: none !important;" <?php echo $_SESSION[
                        'id'
                    ] ?:
                        'disabled'; ?> type="submit" class="btn"><span class="price-tag bg-white shadow-lg ms-4">
                                        <small>Kyats&nbsp;</small><?php echo $product[
                                            'price'
                                        ]; ?>
                                    </span></button>
                </form>

                                    <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                                        <h6 class="reviews-text mb-0 me-3">4.4/5</h6>

                                        <div class="reviews-stars">
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star reviews-icon"></i>
                                        </div>

                                        <p class="reviews-text mb-0 ms-4"><?php echo rand(
                                            20,
                                            150
                                        ); ?> Reviews</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <section class="menu section-padding bg-white">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="mb-lg-5 mb-4">Lunch Menu</h2>
                        </div>

                        <?php foreach ($products as $product): ?>
                            <?php if ($product['type'] == 'lunch'): ?>
                                <div class="col-lg-4 col-md-6 col-12">
                            <div class="menu-thumb">
                                <img src="admin/<?php echo $product[
                                    'image'
                                ]; ?>" class="img-fluid menu-image" alt="">

                                <div class="menu-info d-flex flex-wrap align-items-center">
                                    <h4 class="mb-0"><?php echo $product[
                                        'name'
                                    ]; ?></h4>

<form method="post" action="insert_order.php" style="display: inline-block">
                    <input  type="hidden" name="id" value="<?php echo $product[
                        'id'
                    ]; ?>"/>
                    <input  type="hidden" name="email" value="<?php echo $useremail; ?>"/>

                    <button  style="border: none !important;" <?php echo $_SESSION[
                        'id'
                    ] ?:
                        'disabled'; ?> type="submit" class="btn"><span class="price-tag bg-white shadow-lg ms-4">
                                        <small>Kyats&nbsp;</small><?php echo $product[
                                            'price'
                                        ]; ?>
                                    </span></button>
                </form>

                                    <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                                        <h6 class="reviews-text mb-0 me-3">4.4/5</h6>

                                        <div class="reviews-stars">
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star reviews-icon"></i>
                                        </div>

                                        <p class="reviews-text mb-0 ms-4"><?php echo rand(
                                            20,
                                            150
                                        ); ?> Reviews</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <section class="menu section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="mb-lg-5 mb-4">Dinner Menu</h2>
                        </div>

                       
                        <?php foreach ($products as $product): ?>
                            <?php if ($product['type'] == 'dinner'): ?>
                                <div class="col-lg-4 col-md-6 col-12">
                            <div class="menu-thumb">
                                <img src="admin/<?php echo $product[
                                    'image'
                                ]; ?>" class="img-fluid menu-image" alt="">

                                <div class="menu-info d-flex flex-wrap align-items-center">
                                    <h4 class="mb-0"><?php echo $product[
                                        'name'
                                    ]; ?></h4>

                            <form method="post" action="insert_order.php" style="display: inline-block">
                            <input  type="hidden" name="id" value="<?php echo $product[
                                'id'
                            ]; ?>"/>
                    <input  type="hidden" name="email" value="<?php echo $useremail; ?>"/>

                            <button style="border: none !important;" <?php echo $_SESSION[
                                'id'
                            ] ?:
                                'disabled'; ?> type="submit" class="btn"><span class="price-tag bg-white shadow-lg ms-4">
                                                <small>Kyats&nbsp;</small><?php echo $product[
                                                    'price'
                                                ]; ?>
                                            </span></button>
                                </form>

                                    <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                                        <h6 class="reviews-text mb-0 me-3">4.4/5</h6>

                                        <div class="reviews-stars">
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star reviews-icon"></i>
                                        </div>

                                        <p class="reviews-text mb-0 ms-4"><?php echo rand(
                                            20,
                                            150
                                        ); ?> Reviews</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>
                </div>
            </section>

            <section class="menu section-padding bg-white">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="mb-lg-5 mb-4">Dessert Menu</h2>
                        </div>

                        <?php foreach ($products as $product): ?>
                            <?php if ($product['type'] == 'dessert'): ?>
                                <div class="col-lg-4 col-md-6 col-12">
                            <div class="menu-thumb">
                                <img src="admin/<?php echo $product[
                                    'image'
                                ]; ?>" class="img-fluid menu-image" alt="">

                                <div class="menu-info d-flex flex-wrap align-items-center">
                                    <h4 class="mb-0"><?php echo $product[
                                        'name'
                                    ]; ?></h4>

<form method="post" action="insert_order.php" style="display: inline-block">
                    <input  type="hidden" name="id" value="<?php echo $product[
                        'id'
                    ]; ?>"/>
                    <input  type="hidden" name="email" value="<?php echo $useremail; ?>"/>
                    <button  style="border: none !important;" <?php echo $_SESSION[
                        'id'
                    ] ?:
                        'disabled'; ?> type="submit" class="btn"><span class="price-tag bg-white shadow-lg ms-4">
                                        <small>Kyats&nbsp;</small><?php echo $product[
                                            'price'
                                        ]; ?>
                                    </span></button>
                </form>

                                    <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                                        <h6 class="reviews-text mb-0 me-3">4.4/5</h6>

                                        <div class="reviews-stars">
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star reviews-icon"></i>
                                        </div>

                                        <p class="reviews-text mb-0 ms-4"><?php echo rand(
                                            20,
                                            150
                                        ); ?> Reviews</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <section class="menu section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="mb-lg-5 mb-4">Drinks Menu</h2>
                        </div>

                        <?php foreach ($products as $product): ?>
                            <?php if ($product['type'] == 'drink'): ?>
                                <div class="col-lg-4 col-md-6 col-12">
                            <div class="menu-thumb">
                                <img src="admin/<?php echo $product[
                                    'image'
                                ]; ?>" class="img-fluid menu-image" alt="">

                                <div class="menu-info d-flex flex-wrap align-items-center">
                                    <h4 class="mb-0"><?php echo $product[
                                        'name'
                                    ]; ?></h4>

<form method="post" action="insert_order.php" style="display: inline-block">
                    <input  type="hidden" name="id" value="<?php echo $product[
                        'id'
                    ]; ?>"/>
                    <input  type="hidden" name="email" value="<?php echo $useremail; ?>"/>
                    <button  style="border: none !important;" <?php echo $_SESSION[
                        'id'
                    ] ?:
                        'disabled'; ?> type="submit" class="btn"><span class="price-tag bg-white shadow-lg ms-4">
                                        <small>Kyats&nbsp;</small><?php echo $product[
                                            'price'
                                        ]; ?>
                                    </span></button>
                </form>

                                    <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                                        <h6 class="reviews-text mb-0 me-3">4.4/5</h6>

                                        <div class="reviews-stars">
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star reviews-icon"></i>
                                        </div>

                                        <p class="reviews-text mb-0 ms-4"><?php echo rand(
                                            20,
                                            150
                                        ); ?> Reviews</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
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
                    
                        <p class="copyright-text tooplate-mt60">Copyright © 2023 The Food Mobile Co., Ltd.                        
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
