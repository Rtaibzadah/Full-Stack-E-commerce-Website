<?php 
session_start();
$PATH = $_SERVER['DOCUMENT_ROOT'];
include($PATH.'/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="viewproduct.css">
</head>
<body>
    <h1>Checkout</h1>

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
            $quantity = $_SESSION['cart'][$product_id];

            echo "<div class='basket_item'>
                    <div class='image_container'>

                    </div>
                <div class='details'>
                    <h2>$title</h2>
                    <p>$description</p>
                    <p>Author: $author</p>
                    <p>Price: £$price</p>
                    <p>Quantity: $quantity</p>

                    </form>
                </div>
            </div>";
            $total += $price * $quantity;
        } 
    }
        
    ?>
            <p>Shipping : £5 </br>2-3 days</p>

    <div id="checkout">
            <div id='total'><p>Total: £<?php echo $total; ?></p></div>
            <div id='total'><p>Total + Shipping: £<?php echo $total+5; ?></p></div>
            <a href="pay.php"><button>Pay</button></a>
            <a href="basket.php"><button>cancel</button></a>
    </div>
    
</body>
</html>

