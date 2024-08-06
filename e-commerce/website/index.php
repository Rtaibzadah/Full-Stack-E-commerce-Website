<?php 
  session_start();
 $PATH = $_SERVER['DOCUMENT_ROOT'];
  include ($PATH.'/connect.php');
?>
<!DOCTYPE html>
<head>
    <title>Ecommerce</title>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".css">
    <script src="web.js"></script>
</head>
<body>
    <?php include('head.php'); ?>
   <!-- this section is everything in the first view of the page ex the header -->
    <section id="mainBlock">
        <h1>Buy The Best Quality Clothing</h1>
        <h2>Amazing Prices</h2>
        <h3>Save more in our sale! <br>
            up to 40% off and Free Shipping</h3>

        <a href="shop1.php">
          <button>Shop Now</button>
        </a>
    </section>

    <section id="features" class="section-padding1">
        <div class="fet1">
            <!-- <img src="Images/features/shirt.png" alt=""> -->
            <h6>High Quality</h6>
        </div>
        <div class="fet1" id="shipping">
            <!-- <img src="Images/features/shipping.jpeg" alt=""> -->
            <h6>Free Shipping</h6>
        </div>
        <div class="fet1" id="support">
            <!-- <img src="Images/features/support.jpeg" alt=""> -->
            <h6>24/7 Support</h6>
        </div>
        <div class="fet1">
            <!-- <img src="Images/features/shirt.png" alt=""> -->
            <h6>High Quality</h6>
        </div>
    </section>
    
    <section id="newrelease">
      <h2>New Releases</h2>

      
      <section id="product_slide1">
        <?php
        $sql = "SELECT * FROM `products` WHERE `category` = 'New Releases'";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $price = $row['price'];
            $description = $row['description'];
            $image = $row['image'];

            echo '<div class="product_slide">
                <div id="imagebox">
                    <img src="/products/' . $image . '" alt="">
                </div>
                <h6>' . $name . '</h6>
                <h6>£' . $price . '</h6>
            </div>';
        }
        ?>
      </section>
    </section>


    
</body>

<footer>
    <hr>
    <p class="text-center">&copy; 2023 Example Company. All rights reserved.</p>
</footer>
</html>