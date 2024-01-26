<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/bootstrap.css" />
	<style>
		header {

			width: 100%;
			position: fixed;
			height: 140px;
			top: 0px;
			padding: 10px 80px;
			display: flex;
			justify-content: space-between;
			align-items: center;
			background: linear-gradient(180deg, #00abf0, #081b29);
		}

		.name {
			font-size: 60px;
			color: white;
			font-weight: 600;
			cursor: pointer;
		}

		.logo a {
			text-decoration: none;
		}

		.navbar a {
			text-decoration: none;
			font-size: 25px;
			font-weight: 500;
			margin-left: 30px;
			margin-right: 30px;
			transition: 0.4s;
			color: white;
			font-weight: bold;
		}

		.navbar a:hover {
			color: #00abf0;
		}

		.navbar a.active {
			color: #00abf0;
		}

		.title {
			color: #00abf0;
		}
	</style>
</head>

<body>
	<header class="fixed-top">
		<div class="logo">
			<a href="index.php">
				<p class="name">LapZilla</p>
			</a>
		</div>
		<nav class="navbar">
			<a href="index.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'class="active"' : ''; ?>>Home</a>
			<a href="product.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'product.php') ? 'class="active"' : ''; ?>>Products</a>
			<a href="enquire.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'enquire.php') ? 'class="active"' : ''; ?>>Enquire</a>
			<a href="About.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'About.php') ? 'class="active"' : ''; ?>>About</a>
			<a href="enhansments.php" <?php echo (basename($_SERVER['PHP_SELF']) == 'enhansments.php') ? 'class="active"' : ''; ?>>Enhancements</a>
		</nav>
	</header>
</body>

</html>