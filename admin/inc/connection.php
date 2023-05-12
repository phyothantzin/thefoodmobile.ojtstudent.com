<?php
include_once __DIR__ . '../../../env.php';
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PWD', $_ENV['DB_PWD']);
define('DB_NAME', $_ENV['DB_NAME']);
//connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);

if ($conn->connect_error) {
    die('Failed to connect ' . $conn->connect_error);
}
?>

