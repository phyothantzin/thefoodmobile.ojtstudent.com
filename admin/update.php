<?php
session_start();
if ($_SESSION['sid'] == '') {
    header('location:index.php');
}

error_reporting(1);
include 'inc/connection.php';
include 'inc/function.php';
$id = $_GET['id'] ?: null;

if (!$id) {
    header('location: view-product.php');
    exit();
}

$sql = "SELECT * FROM products WHERE id = $id";
$prepare = mysqli_query($conn, $sql);
$product = mysqli_fetch_array($prepare, MYSQLI_ASSOC);

$name = $product['name'];
$price = $product['price'];
$type = $product['type'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $image = $_FILES['img'] ?? null;

    $imagePath = $product['image'];

    if (!is_dir('images')) {
        mkdir('images');
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
        if ($image && $image['tmp_name']) {
            if ($product['image']) {
                unlink($product['image']);
            }
            $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
            mkdir(dirname($imagePath));
            move_uploaded_file($image['tmp_name'], $imagePath);
        }
        // "select * from user where name='{$_POST['id']}' "
        $sql = "UPDATE products SET image = '$imagePath', name = '$name', price = '$price', type = '$type' WHERE id = $id";
        mysqli_query($conn, $sql);
        header('location: view-product.php');
    }
    mysqli_close($conn);
}
?>

<?php include 'inc/header.php'; ?>
			 <div id="contact_form" class="col_2">
                <h2>Update Product <br><b><?php echo $product[
                    'name'
                ]; ?></b></h2>
                <?php if (!empty($errors)): ?>
					<div class="alert alert-danger">
						<?php foreach ($errors as $error): ?>
							<div><?php echo $error; ?></div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
				<img style="width: 15rem" src='<?php echo $product['image']; ?>'>
				<form name="testform" method="POST" enctype="multipart/form-data" class='my-4'>
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
				  <input name="name" type="text" id="name" value="<?php echo $name; ?>">
				  </label></td>
				</tr>
				 <tr>
						<td height="20px"></td>
				</tr>			
				
				<tr>
				  <td><span class="style3">Price:</span></td>
				  <td><label>
				  <input name="price" type="text" id="price" value="<?php echo $price; ?>">
				  </label></td>
				</tr>
				 <tr>
						<td height="20px"></td>
				</tr>
				
				<tr>
				  <td><span class="style3">Type:</span></td>
				  <td><label>
				  <input name="type" type="text" id="type" value="<?php echo $type; ?>">
				  </label></td>
				</tr>
				 <tr>
						<td height="20px"></td>
				</tr>
				
				
				<tr>
				<td  colspan="2" align="center">
				<input name="submit" type="submit" value="Update">
					
				</td>
				</tr>
				
			</table>
			</form>
			
            </div> 
        <div class="clear"></div>
    </div>
    <div style="display:none;" class="nav_up" id="nav_up"></div>
</div>

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
<?php include 'inc/footer.php'; ?>
