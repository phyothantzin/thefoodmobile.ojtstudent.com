<?php
include 'inc/connection.php';
$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: view-order.php');
    exit();
}

$status = $_POST['status'];
if ($status == 'pending') {
    $sql = "UPDATE orders SET status = 'Pending' WHERE id = $id";
    mysqli_query($conn, $sql);
    header('location: view-order.php');
} elseif ($status == 'ontheway') {
    $sql = "UPDATE orders SET status = 'On the way' WHERE id = $id";
    mysqli_query($conn, $sql);
    header('location: view-order.php');
} elseif ($status == 'arrived') {
    $sql = "UPDATE orders SET status = 'Arrived' WHERE id = $id";
    mysqli_query($conn, $sql);
    header('location: view-order.php');
} elseif ($status == 'cancelled') {
    $sql = "DELETE FROM orders WHERE id = $id";
    mysqli_query($conn, $sql);
    header('location: view-order.php');
}
