<?php
session_start();
error_reporting(1);
include 'inc/connection.php';
$sql = 'SELECT * FROM products LIMIT 9';
$result = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql2 = 'SELECT email FROM users';
    $userresult = mysqli_query($conn, $sql2);
    $users = mysqli_fetch_all($userresult, MYSQLI_ASSOC);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $address = $_POST['address'];
    $credit = $_POST['credit'];
    $errors = [];

    if (!$name) {
        $errors[] = 'Your name is required';
    }
    if (!$email) {
        $errors[] = 'Your email is required';
    }
    foreach ($users as $user) {
        if ($user['email'] === $email) {
            $errors[] = 'User already exists';
        }
    }
    if (!$phone) {
        $errors[] = 'Your phone is required';
    }
    if (!$password) {
        $errors[] = 'Your password is required';
    }
    if ($password !== $confirm_password) {
        $errors[] = 'Your passwords doesn\'t match';
    }
    if (!$address) {
        $errors[] = 'Your address is required';
    }
    if (!$credit) {
        $errors[] = 'Your credit card is required';
    }
    if (empty($errors)) {
        $sql = "INSERT INTO users(username, email, phone, password, address, creditcard)VALUES('$name','$email', '$phone', '$password', '$address', '$credit')";
        $_SESSION['id'] = $_POST['email'];
        mysqli_query($conn, $sql);
    }
}
?>

<?php
$useremail = $_SESSION['id'];
$sql3 = "SELECT username, email FROM users WHERE email = '$useremail'";
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
            <section class="hero">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-5 col-12 m-auto">
                            <div class="heroText">

                                <h1 class="text-white mb-lg-5 mb-3">Delicious Steaks</h1>

                                <div class="c-reviews my-3 d-flex flex-wrap align-items-center">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <h4 class="text-white mb-0 me-3">4.4/5</h4>

                                        <div class="reviews-stars">
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star-fill reviews-icon"></i>
                                            <i class="bi-star reviews-icon"></i>
                                        </div>
                                    </div>

                                    <p class="text-white w-100">From <strong>1,206+</strong> Customer Reviews</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7 col-12">
                            <div id="carouselExampleCaptions" class="carousel carousel-fade hero-carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php foreach ($products as $product): ?>
                                        <?php if (
                                            $product['type'] == 'location'
                                        ): ?>        
                                            <div class="carousel-item active">
                                                <div class="carousel-image-wrap">
                                                    <img src="admin/<?php echo $product[
                                                        'image'
                                                    ]; ?>" class="img-fluid carousel-image" alt="">
                                                </div>
                                                
                                                <div class="carousel-caption">
                                                    <span class="text-white">
                                                        <i class="bi-geo-alt me-2"></i>
                                                        <?php echo $product[
                                                            'price'
                                                        ]; ?>
                                                    </span>
        
                                                    <h4 class="hero-text"><?php echo $product[
                                                        'name'
                                                    ]; ?></h4>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        
                                    
                                    <div class="carousel-item">
                                        <div class="carousel-image-wrap">
                                            <img src="images/slide/jason-leung-O67LZfeyYBk-unsplash.jpg" class="img-fluid carousel-image" alt="">
                                        </div>
                                        
                                        <div class="carousel-caption">
                                            <div class="d-flex align-items-center">
                                                <h4 class="hero-text">Steak</h4>
                                            </div>

                                            <div class="d-flex flex-wrap align-items-center">
                                                <h5 class="reviews-text mb-0 me-3">3.8/5</h5>

                                                <div class="reviews-stars">
                                                    <i class="bi-star-fill reviews-icon"></i>
                                                    <i class="bi-star-fill reviews-icon"></i>
                                                    <i class="bi-star-fill reviews-icon"></i>
                                                    <i class="bi-star reviews-icon"></i>
                                                    <i class="bi-star reviews-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
  
                                    <div class="carousel-item">
                                        <div class="carousel-image-wrap">
                                            <img src="images/slide/ivan-torres-MQUqbmszGGM-unsplash.jpg" class="img-fluid carousel-image" alt="">
                                        </div>
                                        
                                        <div class="carousel-caption">
                                            <div class="d-flex align-items-center">
                                                <h4 class="hero-text">Sausage Pasta</h4>
                                            </div>

                                            <div class="d-flex flex-wrap align-items-center">
                                                <h5 class="reviews-text mb-0 me-3">4.2/5</h5>

                                                <div class="reviews-stars">
                                                    <i class="bi-star-fill reviews-icon"></i>
                                                    <i class="bi-star-fill reviews-icon"></i>
                                                    <i class="bi-star-fill reviews-icon"></i>
                                                    <i class="bi-star-fill reviews-icon"></i>
                                                    <i class="bi-star reviews-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>

                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="video-wrap">
                    <video autoplay="" loop="" muted="" class="custom-video" poster="">
                        <source src="video/production_ID_3769033.mp4" type="video/mp4">
                        	Your browser does not support the video tag.
                    	</video>
                </div>

                <div class="overlay"></div>
            </section>

            <section class="menu section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="text-center mb-lg-5 mb-4">Special Menus</h2>
                        </div>

                        <?php foreach ($products as $product): ?> 
                            <?php if (
                                $product['type'] !== 'feature' &&
                                $product['type'] !== 'location'
                            ): ?>
                            <div class="col-lg-4 col-md-6 col-12">
                            <div class="menu-thumb">
                                <div class="menu-image-wrap">
                                    <img src="admin/<?php echo $product[
                                        'image'
                                    ]; ?>" class="img-fluid menu-image" alt="">

                                    <span class="menu-tag bg-warning"><?php echo $product[
                                        'type'
                                    ]; ?></span>
                                </div>

                                <div class="menu-info d-flex flex-wrap align-items-center">
                                    <h4 class="mb-0"><?php echo $product[
                                        'name'
                                    ]; ?></h4>
                                        
                                <form method="post" action="insert_order.php" style="display: inline-block;">
                                    <input type="hidden" name="email" value="<?php echo $user[
                                        'email'
                                    ]; ?>"/>
                                    <input type="hidden" name="id" value="<?php echo $product[
                                        'id'
                                    ]; ?>"/>
                                    <button style="border: none !important;" <?php echo $_SESSION[
                                        'id'
                                    ] ?:
                                        'disabled'; ?>  type="submit" class="btn"><span class="price-tag bg-white shadow-lg ms-4">
                                                        <small>Kyats&nbsp;</small><?php echo $product[
                                                            'price'
                                                        ]; ?>
                                        </span>
                                    </button>
                                </form>
                                    

                                    <div class="d-flex flex-wrap align-items-center w-100 mt-2">
                                        <h6 class="reviews-text mb-0 me-3">4.3/5</h6>

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

            <section class="BgImage"></section>

            <section class="news section-padding">
                <div class="container">
                    <div class="row">

                        <h2 class="text-center mb-lg-5 mb-4">News &amp; Events</h2>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="news-thumb mb-4">
                                <a href="news-detail.php">
                                    <img src="images/news/pablo-merchan-montes-Orz90t6o0e4-unsplash.jpg" class="img-fluid news-image" alt="">
                                </a>
                                
                                <div class="news-text-info news-text-info-large">
                                    <span class="category-tag bg-danger">Featured</span>

                                    <h5 class="news-title mt-2">
                                        <a href="news-detail.php" class="news-title-link">Healthy Lifestyle and happy living tips</a>
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
                                        <a href="news-detail.php" class="news-title-link">How to make a healthy meal</a>
                                    </h5>
                                </div>
                            </div> 
                        </div>

                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="news-thumb mb-lg-0 mb-lg-4 mb-0">
                                <a href="news-detail.php">
                                    <img src="images/news/gilles-lambert-S_LhjpfIdm4-unsplash.jpg" class="img-fluid news-image" alt="">
                                </a>
                                
                                <div class="news-text-info">
                                    <span class="category-tag me-3 bg-info">Promotions</span>

                                    <strong>8 April 2023</strong>

                                    <h5 class="news-title mt-2">
                                        <a href="news-detail.php" class="news-title-link">Is Coconut good for you?</a>
                                    </h5>
                                </div>
                            </div> 
                        </div>

                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="news-thumb mb-lg-0 mb-lg-4 mb-2">
                                <a href="news-detail.php">
                                    <img src="images/news/caroline-attwood-bpPTlXWTOvg-unsplash.jpg" class="img-fluid news-image" alt="">
                                </a>
                                
                                <div class="news-text-info">
                                    <span class="category-tag">News</span>

                                    <h5 class="news-title mt-2">
                                        <a href="news-detail.php" class="news-title-link">Salmon Steak Noodle</a>
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
                                        <a href="news-detail.php" class="news-title-link">Making a healthy salad</a>
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
