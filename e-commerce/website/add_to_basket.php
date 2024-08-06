<?php
session_start();
$PATH = $_SERVER['DOCUMENT_ROOT'];
include($PATH.'/connect.php');

// if user session has started and user is logged in php

if (isset($_SESSION['user_id']) && !isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
  $user_id = $_SESSION['user_id'];
  $sql = "SELECT * FROM basket WHERE user_id = $user_id";
  $result = mysqli_query($con, $sql);
  if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $quantity = $row['quantity'];
        
        $_SESSION['cart'][$product_id] = $quantity;
    }
}
}

// Add a product to the cart
if (isset($_GET['book_id'])) { // Check if the product ID is set
    $product_id = $_GET['book_id']; // Product ID from the form

    if (!isset($_SESSION['cart'])) { // Check if the cart is empty
        $_SESSION['cart'] = array(); // Create an empty cart array
    }

    $user_id = $_SESSION['user_id']; // Get the user ID from the session

    // Get the product from the database using the product ID
    if (isset($_SESSION['cart'][$product_id] )) { // Check if the product is already in the cart
      $quantity = $_SESSION['cart'][$product_id] += 1; // If so, add to the existing quantity
      $sql = "UPDATE `basket` SET `quantity` = $quantity WHERE `book_id` = $product_id AND `user_id` = $user_id";
      echo 'Product already in cart, quantity updated';
    } else {
      $quantity = $_SESSION['cart'][$product_id] = 1; // Otherwise, add a new entry to the cart array
      $sql = "INSERT INTO `basket` (user_id, book_id, quantity) VALUES ($user_id, $product_id, $quantity)";
    }
   
    $result = mysqli_query($con, $sql);
    // Execute the SQL query to insert the data into the baskets table

    header('Location: shop1.php'); // Redirect the user back to the main page
    exit(); // Stop executing the rest of the script
} else {
    echo "Something went wrong :(";
}
?>
