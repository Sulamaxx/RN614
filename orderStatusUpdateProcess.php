<?php
require "settings.php";
$status = $_GET['key'];
$id = $_GET['id'];

$query = "UPDATE `orders` SET `order_status`='" . $status . "' WHERE `order_id`='" . $id . "' ";

if ($conn->query($query) == TRUE) {
    echo "Success";
} else {
    echo "Error inserting record: " . $conn->error;
}
