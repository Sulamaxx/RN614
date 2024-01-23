
<?php
$order = new stdClass();
session_start();

require "settings.php";

$firstName = sanitizeInput($_POST["first_name"]);
$lastName = sanitizeInput($_POST["last_name"]);
$email = sanitizeInput($_POST["email"]);
$mobile = sanitizeInput($_POST["mobile"]);
$address = sanitizeInput($_POST["address"]);
$postalCode = sanitizeInput($_POST["postal_code"]);
$state = sanitizeInput($_POST["state"]);
$city = sanitizeInput($_POST["city"]);
$quantity = sanitizeInput($_POST["quantity"]);
$creditCardType = sanitizeInput($_POST["creditCardType"]);
$cardNumber = sanitizeInput($_POST["cardNumber"]);
$expiryDate = sanitizeInput($_POST["expiryDate"]);
$cvv = sanitizeInput($_POST["cvv"]);

$product_name = sanitizeInput($_POST["product_name"]);
$product_price = sanitizeInput($_POST["product_price"]);
$product_color = sanitizeInput($_POST["product_color"]);
$total_price = sanitizeInput($_POST["total_price"]);

$errors = validateOrderData($total_price, $product_name, $product_price, $product_color, $order, $firstName, $lastName, $email, $mobile, $address, $postalCode, $state, $city, $quantity, $creditCardType, $cardNumber, $expiryDate, $cvv);

if (!empty($errors)) {
    $errorString = urlencode(serialize($errors));
    header("Location: fix_order.php?errors=" . $errorString);
    exit();
} else {

    $conn->query("CREATE DATABASE IF NOT EXISTS `shop_db`");
    $conn->query("USE `shop_db`");
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

    $query = "INSERT INTO `orders`(`fname`,`lname`,`email`,`phone`,`address`,`pcode`,`city`,`state`,`qty`,`product`,`unit_price`,`order_cost`) 
VALUES('" . $firstName . "','" . $lastName . "','" . $email . "','" . $mobile . "','" . $address . "','" . $postalCode . "','" . $city . "','" . $state . "','" . $quantity . "','" . $product_name . "','" . $product_price . "','" . $total_price . "');
";

    if ($conn->query($query) === TRUE) {
        $order_id = $conn->insert_id;

        header("Location: receipt.php?id=" . $order_id);
        exit();
    } else {

        echo "Something went wrong please try again later";
    }

    $conn->close();
}

function sanitizeInput($input)
{
    return htmlspecialchars(trim($input));
}

function validateOrderData($total_price, $product_name, $product_price, $product_color, $order, $firstName, $lastName, $email, $mobile, $address, $postalCode, $state, $city, $quantity, $creditCardType, $cardNumber, $expiryDate, $cvv)
{
    $errors = array();

    if (empty($firstName)) {
        $errors[] = "First Name is required.";
    }

    if (empty($lastName)) {
        $errors[] = "Last Name is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($mobile)) {
        $errors[] = "Mobile No is required.";
    }

    if (empty($address)) {
        $errors[] = "Address is required.";
    }

    if (empty($postalCode)) {
        $errors[] = "Postal Code is required.";
    }

    if (empty($state)) {
        $errors[] = "State is required.";
    }

    if (empty($city)) {
        $errors[] = "City is required.";
    }

    if (empty($quantity) || !is_numeric($quantity) || $quantity <= 0) {
        $errors[] = "Invalid quantity.";
    }

    if ($creditCardType == 0) {
        $errors[] = "Credit Card Type is required.";
    }

    if (empty($cardNumber) || !preg_match('/^[0-9]{15,16}$/', $cardNumber)) {
        $errors[] = "Invalid Credit Card Number.";
    }

    if (empty($expiryDate) || !preg_match('/^(0[1-9]|1[0-2])-[0-9]{2}$/', $expiryDate)) {
        $errors[] = "Invalid Expiry Date format.";
    }

    if (empty($cvv) || !preg_match('/^[0-9]{3,4}$/', $cvv)) {
        $errors[] = "Invalid CVV.";
    }
    $order->product_name = $product_name;
    $order->product_price = $product_price;
    $order->product_color = $product_color;
    $order->firstName = $firstName;
    $order->lastName = $lastName;
    $order->email = $email;
    $order->mobile = $mobile;
    $order->address = $address;
    $order->postalCode = $postalCode;
    $order->state = $state;
    $order->city = $city;
    $order->quantity = $quantity;
    $order->creditCardType = $creditCardType;
    $order->cardNumber = $cardNumber;
    $order->expiryDate = $expiryDate;
    $order->cvv = $cvv;


    $order->product_name = $product_name;

    $order->product_price = $product_price;

    $order->product_color = $product_color;

    $order->total_price = $total_price;


    $_SESSION['order_place'] = json_encode($order);

    return $errors;
}

?>