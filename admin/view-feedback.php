<?php
session_start();

if ($_SESSION['sid'] == '') {
    header('location:index.php');
}

error_reporting(1);
include 'inc/connection.php';
$sql = 'SELECT * FROM feedbacks';
$result = mysqli_query($conn, $sql);
$feedbacks = mysqli_fetch_all($result, MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    if (!$id) {
        header('Location: view-feedback.php');
        exit();
    }
    $sql2 = "DELETE FROM feedbacks WHERE id = $id";
    mysqli_query($conn, $sql2);
    header('location: view-feedback.php');
}
?>
<?php include 'inc/header.php'; ?>
    	<h2 align="center"> View Feedback Message</h2>
       <table align="center"  style="border-color:#000000;border-style: solid;margin-left:-150px;" width="1200px" align="left" >
					
					<tr align="center">
						<th width="100px" height="50px">Name:</th>
						<th width="100px" height="50px">Phone:</th>	
						<th width="100px" height="50px">Email:</th>
						<th width="100px" height="50px">Message:</th>						
						<th width="100px" height="50px">Action:</th>						
					 </tr>	
					 
					 <?php foreach ($feedbacks as $feedback): ?>
					 <tr align="center">
						<td width="20px" ><?php echo $feedback['name']; ?></td>
						<td width="150px" ><?php echo $feedback['phone']; ?></td>
						<td width="150px" ><?php echo $feedback['email']; ?></td>
						<td width="1300px" height="150px"><?php echo $feedback['message']; ?></td>
						<td width="120px">
							<form method="POST" style="display: inline-block">
								<input  type="hidden" name="id" value="<?php echo $feedback['id']; ?>"/>
								<button type="submit" class="btn btn-outline-danger">Cancelled</button>
							</form>
						</td>												
					  </tr>
					  <?php endforeach; ?>
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
    </div>
</div>

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
