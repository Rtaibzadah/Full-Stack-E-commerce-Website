<?php 
  $PATH = $_SERVER['DOCUMENT_ROOT'];
  include($PATH.'/connect.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Shop Page</title>
    <meta charset="UTF-8">
    <meta naåme="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
  </head>
  <body>
    <form action="" method="GET">
      <input type="submit" name="submit" value="Filter">
      <!-- method get sends the data to the url-->
      <div id="filter">
      <?php
          $sql = "SELECT * FROM products";
          $result = $con->query($sql);

          $displayed_authors = [];

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $selected = [];
              // if the form has been submitted, it keeps the checkbox checked
              if(isset($_GET['brands'])){
                $selected = $_GET['brands'];
              }

              // check if the author has already been displayed
              if (!in_array($row['author'], $displayed_authors)) {
                // mark the author as displayed
                array_push($displayed_authors, $row['author']);

                $checked = in_array($row['book_id'], $selected) ? 'checked' : '';
                echo "<div class='product'>
                        <input type='checkbox' name='brands[]' value='".$row['book_id']."' ".$checked."/> 
                        ".$row['author']."
                      </div>";
              }
            }
          } else {
            echo "0 results";
          }
          ?>
      </div>
    </form>
  </body>
</html>
