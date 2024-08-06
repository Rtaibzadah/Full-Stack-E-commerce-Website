<?php
 $PATH = $_SERVER['DOCUMENT_ROOT'];
  include ($PATH.'/connect.php');


$id = $_GET['updatedid'];//stores the id of the user to be updated
$sql="SELECT * FROM products WHERE book_id = '$id'";
$result = mysqli_query($con, $sql);//executes the sql command
$row = mysqli_fetch_assoc($result);
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
  


if(isset($_POST['submit'])){
    $productprice = $_POST['bookprice'];
    $productname = $_POST['bookname'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $publicationdate = $_POST['publicationdate'];
    $language = $_POST['language'];
    $category = $_POST['category'];
    $image = $_FILES['file'];
    if(empty($productprice) || empty($productname) || empty($description) ||
     empty($quantity) || empty($isbn) || empty($author) || empty($publisher) ||
      empty($publicationdate) || empty($language) || empty($category) || empty($image)){
        echo "Please fill in all fields";
    
    }else{
        $sql = "UPDATE `products` SET `price`='$productprice',`name`='$productname',
        `description`='$description',`category`='$category',`isbn`='$isbn',
        `author`='$author',`publisher`='$publisher',`publication_date`='$publicationdate',
        `language`='$language',`quantity`='$quantity',`image`='$image' WHERE book_id = '$id'";

        $result = mysqli_query($con, $sql);
        if($result){
            header('location:display_products.php');
            echo "updated successfully";
        }else{
            die(mysqli_error($con));
        }
    }
    
}
?>

<h1>Update Products</h1>


<head>
    <title>Update Products</title>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="products">
        <!-- whenever submit is pressed you are redirected to display.php -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- enctype="multipart/form-data" necessary when uploading files using a form -->
                <div>
                    <div>
                        Book Price
                        <input type="text" name="bookprice" id="bookprice" value="<?php echo 'hello'; echo $price; ?>" placeholder="Enter Price">
                    </div>
                    <div>
                        Book Name
                        <input type="text" name="bookname" id="bookname" value="<?php echo $name; ?>" placeholder="Enter Name">
                    </div>
                    <div>
                        Description
                        <input type="text" name="description" id="description" value="<?php echo $description; ?>" placeholder="Enter Description">
                    </div>
                    <div>
                        Quantity
                        <input type="text" name="quantity" id="quantity" value="<?php echo $quantity; ?>" placeholder="Enter Quantity">
                    </div>
                    <div>
                        ISBN
                        <input type="text" name="isbn" id="isbn" value="<?php echo $isbn; ?>" placeholder="Enter ISBN">
                    </div>
                    <div>
                        Author
                        <input type="text" name="author" id="author" value="<?php echo $author; ?>" placeholder="Enter Author">
                    </div>
                    <div>
                        Publisher
                        <input type="text" name="publisher" id="publisher" value="<?php echo $publisher; ?>" placeholder="Enter Publisher">
                    </div>
                    <div>
                        Publication Date
                        <input type="text" name="publicationdate" id="publicationdate" value="<?php echo $publicationdate; ?>" placeholder="Enter Publication Date">
                    </div>
                    <div>
                        Language
                        <input type="text" name="language" id="language" value="<?php echo $language; ?>" placeholder="Enter Language">
                    </div>

                    <div>
                        Category
                        <select name="category" id="category" value="<?php echo $category; ?>">
                            <option value="">Select Category</option>
                            <option value="New Releases">New Releases</option>
                            <option value="Fiction">Fiction</option>
                            <option value="Non-fiction">Non-fiction</option>
                            <option value="Biography">Biography</option>
                            <option value="Self-help">Self-help</option>
                        </select>
                    </div>
                    <div><input type="file" name="file" id="image" value="<?php echo $image; ?>"></div>
                    <div><input type="submit" name="submit" value="submit"></div>
                </div>
            </form>
    </div>
</body>

</html>