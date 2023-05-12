<?php
include 'inc/connection.php';
$id = $_POST['id'] ?? null;
$email = $_POST['email'];

if (!$id) {
    header('Location: index.php');
    exit();
}

$sql = "SELECT * FROM products where id = $id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_array($result, MYSQLI_ASSOC);

$image = $product['image'];
$name = $product['name'];
$price = $product['price'];

$sql = "INSERT INTO orders(image,name,price,orderby)VALUES('$image','$name','$price', '$email')";
$result = mysqli_query($conn, $sql);
header('Location: order.php');
