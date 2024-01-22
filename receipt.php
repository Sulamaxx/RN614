<?php
session_start();

if (isset($_SESSION['order_place'])) {

    $order = json_decode($_SESSION['order_place']);

    unset($_SESSION['order_place']);
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
    <title>Receipt</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="styles/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js" integrity="sha512-1g3IT1FdbHZKcBVZzlk4a4m5zLRuBjMFMxub1FeIRvR+rhfqHFld9VFXXBYe66ldBWf+syHHxoZEbZyunH6Idg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body style="background-color: #081b29;">

    <?php include 'include/header.inc'; ?>

    <div class="container-fluid d-flex justify-content-center align-items-center" style="margin-top: 150px;">
        <div class="row d-flex justify-content-center">
            <h1 class="col-12 text-center fw-bold title">Order Receipt - Order Id <?php echo $_GET['id'] ?></h1>

            <div class="col-lg-8 col-10 mt-0 mt-lg-4">
                <div class="row ">

                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-white-50 fw-bold">Product Details</h2>
                                <p class="col-12 text-white fs-4"><strong>Name:</strong> <?php echo $order->product_name; ?></p>
                                <p class="col-12 text-white fs-4"><strong>Price:</strong> $<?php echo number_format(doubleval($order->product_price), 2); ?></p>
                                <p class="col-12 text-white fs-4"><strong>Color:</strong> <?php echo $order->product_color; ?></p>
                            </div>

                            <div class="col-12 mt-4">
                                <h2 class="text-white-50 fw-bold">Customer Details</h2>
                                <p class="col-12 text-white fs-4"><strong>Name:</strong> <?php echo $order->firstName . ' ' . $order->lastName; ?></p>
                                <p class="col-12 text-white fs-4"><strong>Email:</strong> <?php echo $order->email; ?></p>
                                <p class="col-12 text-white fs-4"><strong>Mobile:</strong> <?php echo $order->mobile; ?></p>
                                <p class="col-12 text-white fs-4"><strong>Address:</strong> <?php echo $order->address; ?></p>
                                <p class="col-12 text-white fs-4"><strong>Postal Code:</strong> <?php echo $order->postalCode; ?></p>
                                <p class="col-12 text-white fs-4"><strong>State:</strong> <?php echo $order->state; ?></p>
                                <p class="col-12 text-white fs-4"><strong>City:</strong> <?php echo $order->city; ?></p>
                                <p class="col-12 text-white fs-4"><strong>Quantity:</strong> <?php echo $order->quantity; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12 mt-4 mt-lg-0">
                                <h2 class="text-white-50 fw-bold">Payment Details</h2>
                                <p class="col-12 text-white fs-4"><strong>Credit Card Type:</strong> <?php
                                                                                                        if ($order->creditCardType == 1) {
                                                                                                            echo "Visa";
                                                                                                        } else if ($order->creditCardType == 2) {
                                                                                                            echo "Mastercard";
                                                                                                        } else if ($order->creditCardType == 3) {
                                                                                                            echo "American Express";
                                                                                                        }
                                                                                                        ?></p>
                                <p class="col-12 text-white fs-4"><strong>Card Number:</strong> **** **** **** <?php echo substr($order->cardNumber, -4); ?></p>
                                <p class="col-12 text-white fs-4"><strong>Expiry Date:</strong> <?php echo $order->expiryDate; ?></p>
                                <p class="col-12 text-white fs-4"><strong>CVV:</strong> ***</p>
                            </div>

                            <div class="col-12 mt-4">
                                <hr class="col-12 text-white-50">
                                <h2 class="text-white-50 fw-bold">Order Summary</h2>
                                <p class="col-12 text-white fs-4"><strong>Total Price:</strong> $<?php echo number_format(doubleval($order->total_price), 2); ?></p>
                                <hr class="col-12 text-white-50">
                                <hr class="col-12 text-white-50">
                            </div>

                            <div class="col-12 mt-4">
                                <div class="row d-flex justify-content-center">
                                    <button class="btn btn-primary col-10" onclick="generatePDF();">Download</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!-- pdf content -->
            <div class="col-lg-8 col-10 mt-0 mt-lg-4" hidden>
                <div class="row " id="pdfContent">

                    <h1 class="col-12 mt-4 text-center fw-bold">Order Receipt - Order Id <?php echo $_GET['id'] ?></h1>

                    <div class="col-12 mt-5">
                        <h2 class="text-black-50 fw-bold">Product Details</h2>
                        <p class="col-12 text-black fs-4"><strong>Name:</strong> <?php echo $order->product_name; ?></p>
                        <p class="col-12 text-black fs-4"><strong>Price:</strong> $<?php echo number_format(doubleval($order->product_price), 2); ?></p>
                        <p class="col-12 text-black fs-4"><strong>Color:</strong> <?php echo $order->product_color; ?></p>
                    </div>

                    <div class="col-12 mt-5">
                        <h2 class="text-black-50 fw-bold">Customer Details</h2>
                        <p class="col-12 text-black fs-4"><strong>Name:</strong> <?php echo $order->firstName . ' ' . $order->lastName; ?></p>
                        <p class="col-12 text-black fs-4"><strong>Email:</strong> <?php echo $order->email; ?></p>
                        <p class="col-12 text-black fs-4"><strong>Mobile:</strong> <?php echo $order->mobile; ?></p>
                        <p class="col-12 text-black fs-4"><strong>Address:</strong> <?php echo $order->address; ?></p>
                        <p class="col-12 text-black fs-4"><strong>Postal Code:</strong> <?php echo $order->postalCode; ?></p>
                        <p class="col-12 text-black fs-4"><strong>State:</strong> <?php echo $order->state; ?></p>
                        <p class="col-12 text-black fs-4"><strong>City:</strong> <?php echo $order->city; ?></p>
                        <p class="col-12 text-black fs-4"><strong>Quantity:</strong> <?php echo $order->quantity; ?></p>
                    </div>


                    <div class="col-12 mt-5">
                        <h2 class="text-black-50 fw-bold">Payment Details</h2>
                        <p class="col-12 text-black fs-4"><strong>Credit Card Type:</strong> <?php
                                                                                                if ($order->creditCardType == 1) {
                                                                                                    echo "Visa";
                                                                                                } else if ($order->creditCardType == 2) {
                                                                                                    echo "Mastercard";
                                                                                                } else if ($order->creditCardType == 3) {
                                                                                                    echo "American Express";
                                                                                                }
                                                                                                ?></p>
                        <p class="col-12 text-black fs-4"><strong>Card Number:</strong> **** **** **** <?php echo substr($order->cardNumber, -4); ?></p>
                        <p class="col-12 text-black fs-4"><strong>Expiry Date:</strong> <?php echo $order->expiryDate; ?></p>
                        <p class="col-12 text-black fs-4"><strong>CVV:</strong> ***</p>
                    </div>

                    <div class="col-12 mt-5">
                    <hr class="col-12 text-black-50">
                        <h2 class="text-black-50 fw-bold">Order Summary</h2>
                        <p class="col-12 text-black fs-4"><strong>Total Price:</strong> $<?php echo number_format(doubleval($order->total_price), 2); ?></p>
                        <hr class="col-12 text-black-50">
                        <hr class="col-12 text-black-50">
                    </div>
                </div>
            </div>



        </div>
    </div>

    <?php include 'include/footer.inc'; ?>
    <script src="script.js">

    </script>


</body>

</html>