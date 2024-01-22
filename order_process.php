
<?php
$order = new stdClass();
session_start();

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

$errors = validateOrderData($order, $firstName, $lastName, $email, $mobile, $address, $postalCode, $state, $city, $quantity, $creditCardType, $cardNumber, $expiryDate, $cvv);

if (!empty($errors)) {
    $errorString = urlencode(serialize($errors));
    header("Location: fix_order.php?errors=" . $errorString);
    exit();
} else {
    // should add data to database in here
    header("Location: receipt.php");
    exit();
}

function sanitizeInput($input)
{
    return htmlspecialchars(trim($input));
}

function validateOrderData($order, $firstName, $lastName, $email, $mobile, $address, $postalCode, $state, $city, $quantity, $creditCardType, $cardNumber, $expiryDate, $cvv)
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

    $_SESSION['order_place'] = json_encode($order);

    return $errors;
}

?>