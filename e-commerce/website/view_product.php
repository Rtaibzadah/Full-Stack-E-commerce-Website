<?php 
  $PATH = $_SERVER['DOCUMENT_ROOT'];
  include($PATH.'/connect.php');

  if(isset($_GET['id'])) {
    $item = $_GET['id'];

    $sql = "SELECT * FROM `products` WHERE `book_id` = '$item'";
    $result = mysqli_query($con, $sql);

    // Check if the product exists
    if(!(mysqli_num_rows($result) == 0)){
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $author = $row['author'];
        $price = $row['price'];
        $description = $row['description'];
        $image = $row['image'];
        $stock = $row['quantity'];
        $isbn = $row['isbn'];
        $publication_date = $row['publication_date'];
        $book_id = $row['book_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="viewproduct.css">
</head>
<body>
    <div class="product">
        <img src="/products/<?php echo $image ?>" alt="<?php echo $title ?>" height="33.33vh">
        <div class="details">
            <h2><?php echo $title ?></h2>
            <p class="author">Author: <?php echo $author ?></p>
            <p class="description"><?php echo $description ?></p>
            <p class="price">Price: <?php echo $price ?></p>
            <p class="stock"> <?php echo $stock ?> left in stock</p>
            <p class="isbn">ISBN: <?php echo $isbn ?></p>
            <p class="publication_date">Publication Date: <?php echo $publication_date ?></p>
            <button><a href="add_to_basket.php?book_id=<?php echo $book_id ?>">Add to Cart</a></button>
        </div>
    </div>
</body>
</html>
<?php
    } else {
        echo "Something went wrong :(";
    }
  } else {
    echo "Something went wrong :(";
  }
?>
