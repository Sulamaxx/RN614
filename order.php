<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include('include/header.php');

?>

<div class="content">
    <h2>Place Your Order</h2>

    <form action="process_order.php" method="post">
        <!-- Product information (customize based on your product) -->
        <h3>Product: Product Name</h3>
        <p>Product Description Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <p>Price: $19.99</p>

        <!-- Quantity input -->
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" min="1" required>

        <!-- User information (modify as needed) -->
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <!-- Add other user information fields (address, phone, etc.) as needed -->

        <!-- Submit button -->
        <button type="submit">Proceed to Payment</button>
    </form>
</div>

<?php
include('include/footer.php');
?>

</body>
</html>