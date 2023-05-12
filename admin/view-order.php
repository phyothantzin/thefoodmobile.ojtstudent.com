<?php
session_start();

if ($_SESSION['sid'] == '') {
    header('location:index.php');
}

error_reporting(1);
include 'inc/connection.php';
$sql = 'SELECT * FROM orders';
$result = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php include 'inc/header.php'; ?>
	<h2 align="center"> View Orders </h2>
            <table align="center" style='border-color:#000000;border-style: solid;' width='850px' >
                <tr>
                    <td>Image</td>
                    <td>Price</td>
                    <td>Ordered By</td>
                    <td>Ordered At</td>
			        <td>Status</td>
                    <td>Actions</td>
                </tr>
        
            <?php foreach ($products as $product): ?> 
                <tr>
                <td height='280' width='240' align='center' class='px-4'>
                	<?php echo $product['name']; ?>
                    <img src='<?php echo $product[
                        'image'
                    ]; ?>' height='200' width='200'>
                </td><b> 

                <td width='280'>
                <?php echo $product['price']; ?>
                    kyats 
                </td>
                <td>
                    <?php echo $product['orderby']; ?>
                </td>
                <td width='200'>
                    <?php echo $product['time']; ?>
                </td> 
		<td width='200'>
                    <?php echo $product['status']; ?>
                </td> 
                <td width='240' class='px-4'>
                    <!-- <a href="update.php?id=" class="btn btn-outline-primary">Update</a> -->
					<form class="py-1" method="post" action="status.php" style="display: inline-block">
                        <input type="hidden" name="id" value="<?php echo $product[
                            'id'
                        ]; ?>"/>
                        <input  type="hidden" name="status" value="pending"/>
                        <button type="submit" class="btn btn-outline-primary">Pending</button>
                    </form>

					<form class="py-1" method="post" action="status.php" style="display: inline-block">
                        <input  type="hidden" name="id" value="<?php echo $product[
                            'id'
                        ]; ?>"/>
                        <input type="hidden" name="status" value="ontheway"/>
                        <button type="submit" class="btn btn-outline-primary">On the way</button>
                    </form>

				    <form class="py-1" method="post" action="status.php" style="display: inline-block">
                        <input type="hidden" name="id" value="<?php echo $product[
                            'id'
                        ]; ?>"/>
                        <input  type="hidden" name="status" value="arrived"/>
                        <button type="submit" class="btn btn-outline-success">Arrived</button>
                    </form>

                    <form method="post" action="status.php" style="display: inline-block">
                        <input type="hidden" name="id" value="<?php echo $product[
                            'id'
                        ]; ?>"/>
                        <input  type="hidden" name="status" value="cancelled"/>
                        <button type="submit" class="btn btn-outline-danger">Cancelled</button>
                    </form></td>

            <?php endforeach; ?>
                </tr>
            </table>
            
        <div class="clear"></div>
    </div>
    <div style="display:none;" class="nav_up" id="nav_up"></div>
</div> <!-- END of tooplate_wrapper -->

<div id="tooplate_footer_wrapper">
	<div id="tooplate_footer">
    	<div class="col_4">
        	
           <ul class="nobullet bottom_list">
            	<li><a href="home.php">Home</a></li>
                <li><a href="insert.php">Insert</a></li>
                <li><a href="view-product.php">Product</a></li>
                <li><a href="view-order.php.">Order</a></li>
				 <li><a href="view-feedback.php">Feedback</a></li>
				  <li><a href="logout.php">Log out</a></li>
            </ul>
        </div>     
        
        <div class="clear"></div>
        <div id="tooplate_copyright">
			Copyright © 2023 The Food Mobile
		</div>
    </div> <!-- END of tooplate_footer -->
</div> <!-- END of tooplate_footer_wrapper -->

<script src="js/scroll-startstop.events.jquery.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function() {
		var $elem = $('#content');
		
		$('#nav_up').fadeIn('slow');
		
		$(window).bind('scrollstart', function(){
			$('#nav_up,#nav_down').stop().animate({'opacity':'0.2'});
		});
		$(window).bind('scrollstop', function(){
			$('#nav_up,#nav_down').stop().animate({'opacity':'1'});
		});
		
		$('#nav_up').click(
			function (e) {
				$('html, body').animate({scrollTop: '0px'}, 800);
			}
		);
	});
</script>
<?php include 'inc/footer.php'; ?>
