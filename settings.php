<?php

$host = "localhost";
$user = "root";
$password = "sulochana123";
$database = "shop_db";
$port = "3306";

$conn = new mysqli($host, $user, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS `$database`");

$conn->close();

$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("CREATE TABLE IF NOT EXISTS `orders` (
    `order_id` int NOT NULL AUTO_INCREMENT,
    `fname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
    `lname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
    `email` varchar(255) DEFAULT NULL,
    `phone` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
    `address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
    `pcode` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
    `city` varchar(50) DEFAULT NULL,
    `state` varchar(50) DEFAULT NULL,
    `qty` int DEFAULT NULL,
    `product` varchar(255) DEFAULT NULL,
    `unit_price` double DEFAULT NULL,
    `order_cost` double DEFAULT NULL,
    `order_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `order_status` varchar(50) DEFAULT 'PENDING',
    PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3");
