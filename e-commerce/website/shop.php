<?php 
  $PATH = $_SERVER['DOCUMENT_ROOT'];
  include($PATH.'/connect.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Shop Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
  </head>
  <body>
    <button><a href="index.php">Home</a></button>
    <form method="get" action="">
  <label for="author">Select an Author:</label>
  <select name="author" id="author">
    <option value="">All Authors</option>
    <?php
        $sql = "SELECT DISTINCT author FROM products";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()) {
            $author = $row['author'];
            $selected = "";
            if (isset($_GET['author']) && $_GET['author'] == $author) {
                $selected = "selected";
            }
            // Display the currentauthor name in the drop-down
            echo "<option value='$author' $selected>$author</option>";
        }
    ?>
</select>


  <button type="submit">Filter Products</button>
</form>

    <?php
        // Get the selected author from the form
        if (isset($_GET['author'])) {
          $selected_author = $_GET['author'];
        } 
        else {
          $selected_author = "";
          }
          //if option all authors is selected, then show all products
          if($selected_author == "") {
            $sql = "SELECT * FROM products";
            $result = $con->query($sql);
          } 
          else {
            // Construct a SQL query to get all products by the selected author
            $sql = "SELECT * FROM products WHERE author='".$selected_author."'";
            $result = $con->query($sql);
          }
              // Display the results
            if ($result->num_rows > 0) {
                //if result is greater than 0, then there are products
              while($row = $result->fetch_assoc()) {
                  echo "<div class='product'>
                          <h2>".$row['name']."</h2>
                          <p>Author: ".$row['author']."</p>
                          <p>".$row['description']."</p>
                          <p>Price: ".$row['price']."</p>
                          <p><img src='/products/".$row['image']."' height='200px' width='200px'</p>
                      </div>";
              }
            } 
            else {
              echo "No products found.";
            }
            
    ?>
  </body>
</html>
