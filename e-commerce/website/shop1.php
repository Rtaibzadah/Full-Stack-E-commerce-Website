<?php 
  session_start();
  $PATH = $_SERVER['DOCUMENT_ROOT'];
  include($PATH.'/connect.php');
  include('head.php');
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Shop Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test111.css">
  </head>
  <body>
  
    <div class="filter">
      <form method="get" action="">
        <label for="author">Select an Author:</label>
        <select name="author" id="author">
          <option value="">All Authors</option>
          <?php
              $sql = "SELECT DISTINCT author FROM products";
              //distinct means that it will only show one of each author
              $result = $con->query($sql);
              while($row = $result->fetch_assoc()) {
                  $author = $row['author'];
                  $selected = "";
                  if (isset($_GET['author']) && $_GET['author'] == $author) {
                      $selected = "selected";
                  }
                  // Display the current author name in the drop-down
                  echo "<option value='$author' $selected>$author</option>";
              }
          ?>
        </select>
        <button type="submit">Filter Products</button>
      </form>
    </div>

    <div class="products">
    <?php
  // Get the selected author from the form
        if (isset($_GET['author'])) {
          $selected_author = $_GET['author'];
        } else {
          $selected_author = "";
        }

        //if option all authors is selected, then show all products
        if($selected_author == "") {
          $sql = "SELECT * FROM products";
        } else {
          // Construct a SQL query to get all products by the selected author
          $sql = "SELECT * FROM products WHERE author='".$selected_author."'";
        }
        $result = $con->query($sql);
        // Display the results
        if ($result->num_rows > 0) {
          //if result is greater than 0, then there are products
          echo "<div class='product-row'>";
          $count = 0;
          while($row = $result->fetch_assoc()) {
            if($count % 6 == 0) {
              echo "</div><div class='product-row'>";
              $count = 0;
            }

            echo "<div class='product'>
                    <a href=view_product.php?id=".$row['book_id'].">";

            // Check if the image is a URL or a file
            if (filter_var($row['image'], FILTER_VALIDATE_URL)) {
              echo "<img src='".$row['image']."'>";
            } else {
              echo "<img src='/products/".$row['image']."''>";
            }

            echo "<h2>".$row['name']."</h2>
                  <p>Author: ".$row['author']."</p>
                  
                  <p>Price: £".$row['price']."</p>
                  </a>
                </div>";
            $count++;
          }
          echo "</div>";
        } else {
          echo "<p>No products found.</p>";
        }
        //<p>".$row['description']."</p>
      ?>
    </div>
  </body>
</html>
