<?php
session_start();
if (isset($_SESSION['order'])) {

    $Object = json_decode($_SESSION['order']);

?>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment</title>
        <link href="styles/styles.css" rel="stylesheet">
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles/bootstrap.css" />

    </head>

    <body style="background-color: #081b29;">
        <?php

        include 'include/header.inc';

        ?>

        <div class="container-fluid d-flex justify-content-center align-items-center" style="margin-top: 150px;">
            <div class="row">
                <h1 class="col-12 text-center fw-bold title">Place Order</h1>
                <div class="col-12">
                    <div class="row d-flex justify-content-center mt-3">
                        <h3 class="col-4 text-white-50 text-center fw-bold">Total Price :</h3>
                        <h3 class="col-4 text-white-50 text-center fw-bold" id="total_price">0.00</h3>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-0 mt-lg-2 ">
                    <div class="row">



                        <div id="carouselExampleIndicators" class="carousel slide col-7" style="left: 15%;">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner ">
                                <div class="carousel-item active">
                                    <img src="<?php echo $Object->img ?>" class="d-block w-100" style="height: 450px;" alt="...">
                                </div>
                                <div class="carousel-item  ">
                                    <img src="<?php echo $Object->img ?>" class="d-block w-100" style="height: 450px;" alt="...">
                                </div>
                                <div class="carousel-item ">
                                    <img src="<?php echo $Object->img ?>" class="d-block w-100" style="height: 450px;" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        <div class="product-details text-white col-11 ms-4 mt-4 container">
                            <div class="row">
                                <h3 class="col-12 text-white-50" id="product_name"><?php echo $Object->title ?></h3>
                                <p class="  text-justify col-12"><?php echo $Object->description; ?></p>
                                <p class="col-6">Price: $<span id="product_price"><?php echo number_format(doubleval($Object->price), 2); ?></span></p>
                                <p class="col-6">Color : <span id="product_color"><?php echo $Object->color ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6  mt-0 mt-lg-4 d-flex justify-content-center align-items-center">
                    <div class="row ">

                        <div class="col-11 ms-4 ms-lg-0">
                            <div class="row">

                                <div class="col-12 col-lg-6">
                                    <div>
                                        <label class="text-white-50 fw-bold col-12 form-label" for="first_name">First Name :</label>
                                        <input class="col-12 form-control" type="text" id="first_name" name="first_name" required>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 mt-3 mt-lg-0">
                                    <div>
                                        <label class="text-white-50 fw-bold col-12 form-label" for="last_name">Last Name :</label>
                                        <input class="col-12 form-control" type="text" id="last_name" name="last_name" required>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 mt-3">
                                    <div>
                                        <label class="text-white-50 fw-bold col-12 form-label" for="email">Email:</label>
                                        <input class="col-12 form-control" type="email" id="email" name="email" required>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 mt-3">
                                    <div>
                                        <label class="text-white-50 fw-bold col-12 form-label" for="mobile">Mobile No :</label>
                                        <input class="col-12 form-control" type="text" id="mobile" name="mobile" required>
                                    </div>
                                </div>

                                <div class="col-12 mt-3 ">
                                    <div>
                                        <label class="text-white-50 fw-bold col-12 form-label" for="address">Address :</label>
                                        <input class="col-12 form-control" type="text" id="address" name="address" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-3 ">
                                    <div>
                                        <label class="text-white-50 fw-bold col-12 form-label" for="postal_code">Postal Code :</label>
                                        <input class="col-12 form-control" type="text" id="postal_code" name="postal_code" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-3">
                                    <div>
                                        <label class="text-white-50 fw-bold col-12 form-label" for="state">State :</label>
                                        <input class="col-12 form-control" type="text" id="state" name="state" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-3">
                                    <div>
                                        <label class="text-white-50 fw-bold col-12 form-label" for="city">City :</label>
                                        <input class="col-12 form-control" type="text" id="city" name="city" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-3">
                                    <div>
                                        <label class="text-white-50 fw-bold col-12 form-label" for="quantity">Quantity:</label>
                                        <input class="form-control col-12" type="number" id="quantity" name="quantity" onkeyup="quantityChange();" required>
                                    </div>
                                </div>
                                <hr class="col-11 border border-2 border-white mt-3" style="margin-left: 40px;">
                                <div class="col-12 col-lg-6 mt-2">
                                    <div><label class="text-white-50 fw-bold col-12 form-label" for="creditCardType">Credit Card Type:</label>
                                        <select class="form-select col-12" id="creditCardType" name="creditCardType" required>
                                            <option value="0">Select</option>
                                            <option value="1">Visa</option>
                                            <option value="2">Mastercard</option>
                                            <option value="3">American Express</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 mt-3 mt-lg-2">
                                    <div>
                                        <label class="text-white-50 fw-bold col-12 form-label" for="cardNumber">Credit Card Number:</label>
                                        <input class="form-control col-12" type="text" id="cardNumber" name="cardNumber" pattern="[0-9]{15,16}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-3">
                                    <div>
                                        <label class="text-white-50 fw-bold col-12 form-label" for="expiryDate">Expiry Date (mm-yy):</label>
                                        <input class="form-control col-12" type="text" id="expiryDate" name="expiryDate" pattern="(0[1-9]|1[0-2])-[0-9]{2}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mt-3">
                                    <div>
                                        <label class="text-white-50 fw-bold col-12 form-label" for="cvv">CVV:</label>
                                        <input class="form-control col-12" type="text" id="cvv" name="cvv" pattern="[0-9]{3,4}" required>
                                    </div>
                                </div>

                                <button class="col-12 btn btn-info mt-5 fw-bold fs-4" onclick="OrderProcess();">Proceed to Payment</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php
        include 'include/footer.inc';
        ?>

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>

    </html>

<?php
} else {

?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php

}
?>