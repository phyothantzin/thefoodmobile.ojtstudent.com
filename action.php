<?php
include 'inc/connection.php';
$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: order.php');
    exit();
}

$status = $_POST['status'];
if ($status == 'cancelled') {
    $sql = "UPDATE orders SET status = 'Cancelled' WHERE id = $id";
    mysqli_query($conn, $sql);
    header('location: order.php');
} elseif ($status == 'arrived') {
    $sql = "UPDATE orders SET status = 'Arrived' WHERE id = $id";
    mysqli_query($conn, $sql);
    header('location: order.php');
}
