<?php
session_start();
error_reporting(1);
include 'inc/connection.php';
if ($_SESSION['sid']) {
    header('location: home.php');
}
if (isset($_POST['log'])) {
    if ($_POST['id'] == '' || $_POST['pwd'] == '') {
        $err = 'fill your id and password first';
    } else {
        // $d = mysql_query("select * from user where name='{$_POST['id']}' ");
        // $row = mysql_fetch_object($d);
        // $fid = $row->name;
        // $fpass = $row->pass;
        $sql = "select * from admins where name='{$_POST['id']}' ";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $fid = $user[0]['name'];
        $fpass = $user[0]['password'];

        if ($fid == $_POST['id'] && $fpass == $_POST['pwd']) {
            $_SESSION['sid'] = $_POST['id'];
            header('location: home.php');
        } else {
            $err = ' your password is not';
        }
    }
}
?>

<?php include 'inc/header.php'; ?>
 
            <div id="contact_form" class="col_2">
                <h2>Admin Log In</h2>
                <form method="post" name="contact" action="index.php">
                      <div class="col_4 no_margin_right">
                        <label for="phone">Username:</label>
                        <input type="text" id="id" name="id" class="required input_field" />
                    </div>
                    <div class="col_4 no_margin_right">
                        <label for="email">Password:</label>
                        <input type="password" id="pwd" name="pwd" class="validate-email required input_field" />
                    </div>
              
                     
                    <div class="clear"></div>
                    
                     <input style="cursor: pointer; transition: 0.25s;" type="submit" name="log"  id="log" value="Log in" class="submit_button" />
                </form>
            </div>    	
       
        
       <div class="col_2 no_margin_right">
                <div class="col_4">
                    <?php if ($err) {
                        echo $err;
                    } ?>
                    
                </div>
                
			</div>       

        
    </div>
</div>
</div>

<?php include 'inc/footer.php'; ?>
