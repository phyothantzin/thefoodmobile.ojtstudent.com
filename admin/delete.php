<?php
include 'inc/connection.php';
$id = $_POST['id'] ?: null;
if (!$id) {
    header('Location: view-product.php');
    exit();
}
$sql = "DELETE FROM products WHERE id = $id";
mysqli_query($conn, $sql);
header('location: view-product.php');
