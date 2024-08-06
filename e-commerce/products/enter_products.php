

<!DOCTYPE html>

<!-- <button><a href="productline1.php">productline1</a></button>
<button><a href="products.php">products</a></button>
<button><a href="">other</a></button>
<button><a href="">other</a></button> -->

<head>
    <title>Products</title>
    <meta charset = "utf-8">
    <link rel="stylesheet" href="product.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php include('/Applications/MAMP/htdocs/admin/adminpannel.php'); ?>
        <h1>Enter Products</h1>
    <div class="products">
        <!-- whenever submit is pressed you are redirected to display.php -->
        <form action="upload_product.php" method="post" enctype="multipart/form-data">
            <!-- enctype="multipart/form-data" necessary when uploading files using a form -->
                <div>
                    <div>
                        Book Price
                        <input type="text" name="bookprice" id="bookprice" value="" placeholder="Enter Price">
                    </div>
                    <div>
                        Book Name
                        <input type="text" name="bookname" id="bookname" value="" placeholder="Enter Name">
                    </div>
                    <div>
                        Description
                        <input type="text" name="description" id="description" value="" placeholder="Enter Description">
                    </div>
                    <div>
                        Quantity
                        <input type="text" name="quantity" id="quantity" value="" placeholder="Enter Quantity">
                    </div>
                    <div>
                        ISBN
                        <input type="text" name="isbn" id="isbn" value="" placeholder="Enter ISBN">
                    </div>
                    <div>
                        Author
                        <input type="text" name="author" id="author" value="" placeholder="Enter Author">
                    </div>
                    <div>
                        Publisher
                        <input type="text" name="publisher" id="publisher" value="" placeholder="Enter Publisher">
                    </div>
                    <div>
                        Publication Date
                        <input type="text" name="publicationdate" id="publicationdate" value="" placeholder="Enter Publication Date">
                    </div>
                    <div>
                        Language
                        <input type="text" name="language" id="language" value="" placeholder="Enter Language">
                    </div>

                    <div>
                        Category
                        <select name="category" id="category">
                            <option value="">Select Category</option>
                            <option value="New Releases">New Releases</option>
                            <option value="Fiction">Fiction</option>
                            <option value="Non-fiction">Non-fiction</option>
                            <option value="Biography">Biography</option>
                            <option value="Self-help">Self-help</option>
                        </select>
                    </div>
                    <div><input type="file" name="file" id="image" value=""></div>
                    <div><input type="submit" name="submit" value="submit"></div>
                </div>
            </form>
    </div>
</body>

</html>