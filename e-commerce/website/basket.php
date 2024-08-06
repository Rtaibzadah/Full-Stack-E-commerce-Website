<?php
session_start();
$PATH = $_SERVER['DOCUMENT_ROOT'];
include($PATH.'/connect.php');

// Remove cart item
if (isset($_POST['remove'])) {
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);
    $user_id = $_SESSION['user_id'];
    $sql = "DELETE FROM `basket` WHERE `book_id` = $product_id AND `user_id` = $user_id";
    $result = mysqli_query($con, $sql);
}

// Update cart item quantity
if (isset($_POST['update'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $_SESSION['cart'][$product_id] = $quantity;
    $user_id = $_SESSION['user_id'];
    $sql = "UPDATE `basket` SET `quantity` = $quantity WHERE `book_id` = $product_id AND `user_id` = $user_id";
    $result = mysqli_query($con, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Basket</title>
    <link rel="stylesheet" type="text/css" href="ttt.css">
    <?php include('head.php'); ?>
</head>
<body>
    
    <?php
    // Display cart session
    if (isset($_SESSION['user_id'])){
        $_SESSION['cart'] = array();
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM basket WHERE user_id = $user_id";
        $result = mysqli_query($con, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['book_id'];
                $quantity = $row['quantity'];
                $_SESSION['cart'][$product_id] = $quantity;
            }
        }
    } elseif (isset($_SESSION['cart']) && !empty($_SESSION['cart']) && !isset($_SESSION['user_id'])) {
        echo '<h3>Please Sign in or create an account to checkout or to save items to your basket</h3>
        <ul>';
    } else {
        echo '<p class="empty_cart">Your cart is empty.</p>';
    }

    $total = 0;
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $sql = "SELECT * FROM products WHERE book_id = $product_id"; 

        $result = mysqli_query($con, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['name'];
            $author = $row['author'];
            $price = $row['price'];
            $description = $row['description'];
            $image = $row['image'];
            $book_id = $row['book_id'];

            echo "<div class='basket_item'>
                    <div class='image_container'>
                        <img src='/products/$image' alt='$title'>
                    </div>
                <div class='details'>
                    <h2>$title</h2>
                    <p>$description</p>
                    <p>Author: $author</p>
                    <p>Price: £$price</p>
                    <form method='post'>
                        <input type='hidden' name='product_id' value='$product_id'>
                        <label>Quantity</label>
                        <input type='number' name='quantity' value='$quantity'>
                        <button type='submit' name='update'>Update</button>
                        <button type='submit' name='remove'>Remove</button>
                    </form>
                </div>
            </div>";
            $total += $price * $quantity;
        } 
    }
    ?>

    <div id="checkout">
            <div id='total'><p>Total: £<?php echo $total; ?></p></div>
            <a href="checkout.php"><button>Checkout</button></a>
            <a href="shop1.php"><button>Continue Shopping</button></a>
    </div>
 
</body>
</html>
