<?php
session_start();
if ($_SESSION['sid'] == '') {
    header('location:index.php');
} else {
     ?>
<?php
error_reporting(1);
include 'inc/function.php';
include 'inc/connection.php';
$name = '';
$price = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['t1'];
    $price = $_POST['t2'];
    $type = $_POST['t3'];
    $image = $_FILES['img'] ?: null;
    $imagePath = '';
    if (!is_dir('images')) {
        mkdir('images');
    }
    if ($image && $image['tmp_name']) {
        $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'], $imagePath);
    }
    if (!$name) {
        $errors[] = 'Product name is required';
    }
    if (!$price) {
        $errors[] = 'Product price is required';
    }
    if (!$type) {
        $errors[] = 'Product type is required';
    }
    if (empty($errors)) {
        $sql = "INSERT INTO products(image,name,price,type)VALUES('$imagePath','$name','$price', '$type')";
        $result = mysqli_query($conn, $sql);
        header('location: view-product.php');
    }
}
mysqli_close($conn);
?>

<?php include 'inc/header.php'; ?>
		<?php if (!empty($errors)): ?>
			<div class="alert alert-danger">
				<?php foreach ($errors as $error): ?>
					<div><?php echo $error; ?></div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
					
				<form name="testform" method="post" enctype="multipart/form-data" >
			<table style="border-color:#000000;border-style: dotted;" width="600px" align="left">
				
						
				
				 <tr>
						<td height="20px"></td>
				</tr>	
				<tr>
				<td><span class="style3">Image:</span></td>
				<td>
					<input name="img" type="file">
				</td>
				</tr>
				 <tr>
						<td height="20px"></td>
				</tr>			
				
				<tr>
				  <td><span class="style3">product name: </span></td>
				  <td><label>
					<input name="t1" type="text" id="t1">
				  </label></td>
				</tr>
				 <tr>
						<td height="20px"></td>
				</tr>			
				
				<tr>
				  <td><span class="style3">Price:</span></td>
				  <td><label>
					<input name="t2" type="text" id="t2">
				  </label></td>
				</tr>
				 <tr>
						<td height="20px"></td>
				</tr>
				
				<tr>
				  <td><span class="style3">Type:</span></td>
				  <td><label>
					<input name="t3" type="text" id="t3">
				  </label></td>
				</tr>
				 <tr>
						<td height="20px"></td>
				</tr>
				
				
				<tr>
				<td  colspan="2" align="center">
					<input name="sub" type="submit" value="Submit">
					
				</td>
				</tr>
				
			</table>
			</form>
				<h2><?php echo $err; ?></h2>
            </div> 
       
        
        

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
<?php
}
?>

<?php include 'inc/footer.php'; ?>
