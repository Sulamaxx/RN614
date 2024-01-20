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

        include 'include/header.php';

        ?>

        <div class="container-fluid d-flex justify-content-center align-items-center" style="margin-top: 150px;">
            <div class="row">
                <h1 class="col-12 text-center fw-bold title">Payment Process</h2>
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

                            <div class="product-details text-white col-11 ms-4 mt-3 container">
                               <div class="row">
                               <p class="  text-justify col-12"><?php echo $Object->description; ?></p>
                                <p class="col-6" >Price: $<?php echo number_format(doubleval($Object->price), 2); ?></p>
                                <p class="col-6">Color : <?php echo $Object->color ?></p>
                               </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6  mt-0 mt-lg-4 d-flex justify-content-center align-items-center">
                        <div class="row ">

                            <div class="col-11">
                                <div class="row">

                                    <input type="hidden" name="product" value="<?php echo $productName; ?>">

                                    <label class="text-white-50 fw-bold col-12 form-label" for="quantity">Quantity:</label>
                                    <input class="col-12 form-control" type="number" name="quantity" min="1" required>

                                    <label class="text-white-50 fw-bold mt-4 col-12 form-label" for="name">Name:</label>
                                    <input class="col-12 form-control" type="text" name="name" required>

                                    <label class="text-white-50 fw-bold mt-4 col-12 form-label" for="email">Email:</label>
                                    <input class="col-12 form-control" type="email" name="email" required>


                                    <button class="col-12 btn btn-info mt-5 fw-bold fs-4" onclick="OrderProcess();">Proceed to Payment</button>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        </div>

        <?php
        include 'include/footer.php';
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