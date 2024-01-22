<?php

$host = "localhost";
$user = "root";
$password = "sulochana123";
$database = "shop_db";
$port = "3306";

$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

