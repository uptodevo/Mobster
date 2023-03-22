<?php
session_start();

// Check if a product should be removed from the cart
if(isset($_POST['remove_item'])) {
    $product_id = $_POST['remove_item'];
    unset($_SESSION['cart'][$product_id]);
}

// Check if the quantities of products in the cart should be updated
if(isset($_POST['update_quantity'])) {
    foreach($_POST['quantity'] as $product_id => $quantity) {
        // Ensure the quantity is a positive integer
        $quantity = max(0, intval($quantity));

        // If the quantity is zero, remove the item from the cart
        if($quantity == 0) {
            unset($_SESSION['cart'][$product_id]);
        }
        else {
            // Otherwise, update the quantity in the cart
            $_SESSION['cart'][$product_id]['quantity'] = $quantity;
        }
    }
}

// Redirect back to the shopping cart page
header('Location: cart.php');
exit;
?>
