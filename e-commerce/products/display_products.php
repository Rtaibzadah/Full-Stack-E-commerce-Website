<?php 
 $PATH = $_SERVER['DOCUMENT_ROOT'];
  include ($PATH.'/connect.php');
?>

<!DOCTYPE html>
    <head>
        <title>Display Poducts</title>
        <meta charset = "utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="product.css">
        <!-- link to css when complete -->
    </head>
    <body>

        <?php include($PATH.'/admin/adminpannel.php'); ?>
        <h1>Products</h1>
    <!-- <div class="menu">
    <button><a href="/admin/adminpannel.php">Admin Pannel</a></button>
    <button><a href="enter_products.php">Enter Products</a></button> -->
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Category</th>
                <th>Isbn</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Publication Date</th>
                <th>Language</th>
                <th>Quantity</th>
                <th>Image</th>
                
            </tr>
        </thead>
        
        <?php
            $con = mysqli_connect("localhost", "root", "root", "ecom");

            
                $sql = "select * from `products`";
                $result = mysqli_query($con,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['book_id'];
                    $price = $row['price'];
                    $name = $row['name'];
                    $description = $row['description'];
                    $quantity = $row['quantity'];
                    $isbn = $row['isbn'];
                    $author = $row['author'];
                    $publisher = $row['publisher'];
                    $publicationdate = $row['publication_date'];
                    $language = $row['language'];
                    $category = $row['category'];
                    $image = $row['image'];
                    echo '<tr>
                    
                    <th scope="row">'.$id.'</th>
                    <td>'.$name.'</td>
                    <td>'.$price.'</td>
                    <td>'.$description.'</td>
                    <td>'.$category.'</td>
                    <td>'.$isbn.'</td>
                    <td>'.$author.'</td>
                    <td>'.$publisher.'</td>
                    <td>'.$publicationdate.'</td>
                    <td>'.$language.'</td>
                    <td>'.$quantity.'</td>
                    <td>'.$image.'</td>
                    

                    <td>
                    <button><a href="delete_products.php?deletedid='.$id.'">Delete</a></button>
                    <button><a href="update_products.php?updatedid='.$id.'">Update</a></button>
                    </td>

                    </tr>';
                }
                

        ?> 
    </table>
    </body>
</html>
