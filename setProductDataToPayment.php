<?php
session_start();


$title = $_POST['title'];
$description = $_POST['description'];
$img = $_POST['img'];
$color = $_POST['color'];
$price = $_POST['price'];


$object = new stdClass();

$object->title = $title;
$object->description = $description;
$object->img = $img;
$object->color = $color;
$object->price = $price;


$_SESSION['order'] = json_encode($object);

echo "Sucess";