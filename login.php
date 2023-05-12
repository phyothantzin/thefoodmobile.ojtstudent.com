<?php
session_start();
error_reporting(1);
include 'inc/connection.php';
if ($_SESSION['id']) {
    header('location: index.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    if ($_POST['email'] == '' || $_POST['password'] == '') {
        $errors[] = 'Fill your email and password';
    } else {
        $sql = "select * from users where email='{$_POST['email']}' ";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $femail = $user['email'];
        $fpass = $user['password'];

        if ($femail == $_POST['email'] && $fpass == $_POST['password']) {
            $_SESSION['id'] = $_POST['email'];
            header('location: index.php');
        } else {
            $errors[] = 'Incorrect password';
        }
    }
}
?>
<?php include 'inc/header.php'; ?>
<form class="booking-form my-4" role="form" action="login.php" method="post">
<a href="index.php" class="mx-4 fs-5">Go back</a>
<h2 class="mx-4">Login Form</h2>
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger col-8 mx-4">
            <?php foreach ($errors as $error): ?>
                <div><?php echo $error; ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="col-8 mx-4">
        <label for="email" class="form-label">Email Address</label>

        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="your@email.com" required>
    </div>


    <div class="col-8 mx-4">
        <label for="password" class="form-label">Password</label>

        <input type="password" name="password" id="password" class="form-control" placeholder="Your password to login">
    </div>

    <div class="col-lg-4 col-8 mx-4" >
        <button type="submit" class="form-control-md p-2 rounded">Login</button>
    </div>
</form>  
</body>
</html>
