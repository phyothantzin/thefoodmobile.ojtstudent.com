<?php
include 'inc/connection.php';
$sql = 'SELECT * FROM orders';
$result = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
session_start();
?>
<?php
$useremail = $_SESSION['id'];
$sql3 = "SELECT username,email FROM users WHERE email = '$useremail'";
$nameresult = mysqli_query($conn, $sql3);
$user = mysqli_fetch_array($nameresult, MYSQLI_ASSOC);
?>
<?php include 'inc/header.php'; ?>
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
	        <h2 class="my-4" align="center"> View Orders </h2>
            <table style='border-color:#000000;border-style: solid;position:relative; margin-bottom: 30px;' width='355px' align="center" >
                <tr>
                    <td align="center">Order</td>
                    <td align="center">Status</td>
                    <td align="center">Action</td>
                </tr>
        
            <?php foreach ($products as $product): ?>
                <?php if (
                    $product['status'] !== 'Cancelled' &&
                    $product['status'] !== 'Arrived' &&
                    $product['orderby'] == $_SESSION['id']
                ): ?> 
                <tr>
                <td height='150' align='center'>
                    <img src='admin/<?php echo $product[
                        'image'
                    ]; ?>' height='100' width='100'>
                    <p><?php echo $product['name']; ?></p>
                </td><b> 

                <td align='center'>
                <p class="fs-6">price: <?php echo $product['price']; ?></p>
                <?php echo $product['status']; ?>
                </td>

                <td align='center'>
                    <form method="post" action="action.php" style="display: block">
                        <input type="hidden" name="id" value="<?php echo $product[
                            'id'
                        ]; ?>"/>
                        <input  type="hidden" name="status" value="arrived"/>
                        <button type="submit" class="btn-sm rounded btn-outline-success my-2">Arrived</button>
                    </form>
                    
                    <form method="post" action="action.php" style="display: block">
                        <input type="hidden" name="id" value="<?php echo $product[
                            'id'
                        ]; ?>"/>
                        <input  type="hidden" name="status" value="cancelled"/>
                        <button type="submit" class="btn-sm rounded btn-outline-danger">Cancel</button>
                    </form>
                </td>
                <?php endif; ?>
            <?php endforeach; ?>
                </tr>
            </table>
            
        <div class="clear"></div>
    </div>
    <div style="display:none;" class="nav_up" id="nav_up"></div>
</div>

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
<?php include 'inc/modal.php'; ?>

<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
