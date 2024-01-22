<?php
session_start();
if (isset($_SESSION['order_place'])) {
    $order = json_decode($_SESSION['order_place']);
    $errors = isset($_GET['errors']) ? unserialize(urldecode($_GET['errors'])) : [];
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fix Order</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles/bootstrap.css" />
</head>

<body style="background-color: #081b29;">

    <?php

    include 'include/header.inc';
    ?>

    <div class="container-fluid d-flex justify-content-center align-items-center" style="margin-top: 150px;">
        <div class="row">
            <h1 class="col-12 text-center fw-bold title">Fix Order</h1>
            <div class="col-12">
                <div class="row d-flex justify-content-center mt-3">
                    <h3 class="col-4 text-white-50 text-center fw-bold">Total Price :</h3>
                    <h3 class="col-4 text-white-50 text-center fw-bold" id="total_price"><?php echo $order->total_price ?></h3>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="row">
                    <?php
                    if (!empty($errors)) {
                        foreach ($errors as $error) {
                            echo '<p class="col-12 text-center" style="color: red;">' . $error . '</p>';
                        }
                    }
                    ?>
                    <div hidden  class="product-details text-white col-11 ms-4 mt-4 container">
                        <div class="row">
                            <h3 class="col-12 text-white-50" id="product_name"><?php echo $order->product_name ?></h3>
                            <p class="col-6">Price: $<span id="product_price"><?php echo number_format(doubleval($order->product_price), 2); ?></span></p>
                            <p class="col-6">Color : <span id="product_color"><?php echo $order->product_color ?></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-8">
                <div class="row">

                    <div class="col-12 col-lg-6">
                        <div>
                            <label class="text-white-50 fw-bold col-12 form-label" for="first_name">First Name :</label>
                            <input class="col-12 form-control" type="text" id="first_name" name="first_name" value="<?php echo $order->firstName; ?>" required>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                        <div>
                            <label class="text-white-50 fw-bold col-12 form-label" for="last_name">Last Name :</label>
                            <input class="col-12 form-control" type="text" value="<?php echo $order->lastName; ?>" id="last_name" name="last_name" required>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 mt-3">
                        <div>
                            <label class="text-white-50 fw-bold col-12 form-label" for="email">Email:</label>
                            <input class="col-12 form-control" type="email" id="email" value="<?php echo $order->email; ?>" name="email" required>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 mt-3">
                        <div>
                            <label class="text-white-50 fw-bold col-12 form-label" for="mobile">Mobile No :</label>
                            <input class="col-12 form-control" type="text" id="mobile" value="<?php echo $order->mobile; ?>" name="mobile" required>
                        </div>
                    </div>

                    <div class="col-12 mt-3 ">
                        <div>
                            <label class="text-white-50 fw-bold col-12 form-label" for="address">Address :</label>
                            <input class="col-12 form-control" type="text" id="address" name="address" value="<?php echo $order->address; ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mt-3 ">
                        <div>
                            <label class="text-white-50 fw-bold col-12 form-label" for="postal_code">Postal Code :</label>
                            <input class="col-12 form-control" type="text" id="postal_code" name="postal_code" value="<?php echo $order->postalCode; ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mt-3">
                        <div>
                            <label class="text-white-50 fw-bold col-12 form-label" for="state">State :</label>
                            <input class="col-12 form-control" type="text" id="state" name="state" value="<?php echo $order->state; ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mt-3">
                        <div>
                            <label class="text-white-50 fw-bold col-12 form-label" for="city">City :</label>
                            <input class="col-12 form-control" type="text" id="city" name="city" value="<?php echo $order->city; ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mt-3">
                        <div>
                            <label class="text-white-50 fw-bold col-12 form-label" for="quantity">Quantity:</label>
                            <input class="form-control col-12" type="number" id="quantity" name="quantity" onkeyup="quantityChange();" value="<?php echo $order->quantity; ?>" required>
                        </div>
                    </div>
                    <hr class="col-11 border border-2 border-white mt-3" style="margin-left: 40px;">

                    <div class="col-12 col-lg-6 mt-2">

                        <div>
                            <label class="text-white-50 fw-bold col-12 form-label" for="creditCardType">Credit Card Type:</label>
                            <select class="form-select col-12" id="creditCardType" name="creditCardType" required>
                                <option value="Visa" <?php echo ($order->creditCardType == '0') ? 'selected' : '' ?>>Select</option>
                                <option value="Visa" <?php echo ($order->creditCardType == '1') ? 'selected' : '' ?>>Visa</option>
                                <option value="Mastercard" <?php echo ($order->creditCardType == '2') ? 'selected' : '' ?>>Mastercard</option>
                                <option value="AmericanExpress" <?php echo ($order->creditCardType == '3') ? 'selected' : '' ?>>American Express</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-12 col-lg-6 mt-3">
                        <div>
                            <label class="text-white-50 fw-bold col-12 form-label" for="cardNumber">Credit Card Number:</label>
                            <input class="form-control col-12" type="text" id="cardNumber" name="cardNumber" value="<?php echo $order->cardNumber; ?>" pattern="[0-9]{15,16}" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mt-3">
                        <div>
                            <label class="text-white-50 fw-bold col-12 form-label" for="expiryDate">Expiry Date (mm-yy):</label>
                            <input class="form-control col-12" type="text" id="expiryDate" name="expiryDate" value="<?php echo $order->expiryDate; ?>" pattern="(0[1-9]|1[0-2])-[0-9]{2}" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mt-3">
                        <div>
                            <label class="text-white-50 fw-bold col-12 form-label" for="cvv">CVV:</label>
                            <input class="form-control col-12" type="text" id="cvv" name="cvv" pattern="[0-9]{3,4}" value="<?php echo $order->cvv; ?>" required>
                        </div>
                    </div>

                    <button class="col-12 btn btn-info mt-5 fw-bold fs-4" onclick="OrderProcess();">Proceed to Payment</button>

                </div>
            </div>

        </div>
    </div>

    <?php

    include 'include/footer.inc';
    ?>

    <script src="script.js"></script>
</body>

</html>