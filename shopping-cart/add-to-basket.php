<?php
session_start();

// Connect to the database
$con = mysqli_connect('localhost', 'HNCWEBMR2', 'BSoEExqxv5', 'HNCWEBMR2')
    or die ("could not connect network");

// Check if the form has been submitted to add item to cart
if(isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Retrieve the product from the database
    $query = "SELECT * FROM items WHERE id = $product_id";
    $result = mysqli_query($con, $query);
    $product = mysqli_fetch_assoc($result);

    // Add the product to the cart
    if(isset($_SESSION['cart'][$product_id])) {
        // If the product is already in the cart, increment the quantity
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    }
    else {
        // Otherwise, add the product to the cart
        $_SESSION['cart'][$product_id] = array(
            'title' => $product['title'],
            'image' => $product['image'],
            'price' => $product['price'],
            'quantity' => $quantity
        );
    }

    // Redirect to the shopping cart page
    header('Location: cart.php');
    exit;
}
else {
    // Redirect back to the product catalog list page
    header('Location: index.php');
    exit;
}
?>