<!DOCTYPE html>
<html lang="en">

<head>
	<title>Gaming Laptops</title>
	<link href="styles/index.css" rel="stylesheet">
	<link href="styles/styles.css" rel="stylesheet">
	<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
	<link rel="stylesheet" href="styles/bootstrap.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</head>

<body class="body" style="background-color: #081b29;">

	<?php
	include "include/header.inc";
	?>


	<div class="col-12">
		<div class="row justify-content-center">



			<div class="col-12 mb-5" style="margin-top: 100px;">
				<div class="row">
					<div id="carouselExampleIndicators" class="carousel">
						<div class="carousel-indicators">
							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
						</div>
						<div class="carousel-inner ">
							<div class="carousel-item active">
								<img src="images/1.jpeg" class="d-block w-100" alt="...">
							</div>
							<div class="carousel-item  ">
								<img src="images/2.jpeg" class="d-block w-100" alt="...">
							</div>
							<div class="carousel-item ">
								<img src="images/3.jpeg" class="d-block w-100" alt="...">
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
				</div>
			</div>


			<section class="col-12 position-absolute " style="margin-top: 230px;">
				<div class="row ">
					<div class="home-content col-12">
						<div class="row d-flex justify-content-center text-center">
							<h3 class="text-white">Your Ultimate Destination for</h3>
							<p class="h1 text-primary">Laptops!</p>
							<br><br>
							<p class="text-white">Powerful laptops curated for your needs, ready to elevate your every endeavor</p>
							<div class=" row justify-content-center icon">
								<a href="https://web.facebook.com/shan.eranda.792" target="_blank"><i class="bx bxl-facebook-circle"></i></a>
								<a href="https://wa.me/+94776720001" target="_blank"><i class="bx bxl-whatsapp"></i></a>
								<a href="https://www.youtube.com/watch?v=p65LjLzPHBw" target="_blank"><i class="bx bxl-youtube"></i></a>

							</div>
						</div>
					</div>
				</div>
			</section>

			<div class="container mt-5">

				<div class="row justify-content-center">

					<div class="card bg-transparent text-center col-lg-3 col-6">
						<img id="slide-1" src="images/tech.png" alt="lap1">
						<div class="intro">
							<h2>Technology<br>
								Support</h2>
							<p class="sub">We have best Support<br>for your Tech Issues</p>
						</div>
					</div>
					<div class="card bg-transparent text-center col-lg-3 col-6">
						<img id="slide-2" src="images/fast.png" alt="lap1">
						<div class="intro">
							<h2>Fast-Delivery</h2>
							<p class="sub">We Deliver with-in 2 Days</p>
						</div>
					</div>
					<div class="card bg-transparent text-center col-lg-3 col-6">
						<img id="slide-3" src="images/cash.png" alt="lap1">
						<div class="intro">
							<h2>Cash-On-<br>Delivery</h2>
							<p class="sub">Pay when you recieve</p>
						</div>
					</div>
					<div class="card bg-transparent text-center col-lg-3 col-6">
						<img id="slide-4" src="images/24.png" alt="lap1">
						<div class="intro">
							<h2>24/7 Support</h2>
							<p class="sub">Support whennever you want</p>
						</div>
					</div>
					<div class="card bg-transparent text-center col-lg-3 col-6">
						<img id="slide-5" src="images/trust.png" alt="lap1">
						<div class="intro">
							<h2>Trusted!</h2>
							<p class="sub">Trust is best</p>
						</div>
					</div>


				</div>

			</div>

		</div>
	</div>

	<?php
	include "include/footer.inc";
	?>

</body>

</html>