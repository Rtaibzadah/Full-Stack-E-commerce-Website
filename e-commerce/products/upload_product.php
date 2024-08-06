<?php 
 $PATH = $_SERVER['DOCUMENT_ROOT'];
  include ($PATH.'/connect.php');

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

    
    echo $productprice;
    echo "<br>";
    echo $productname;
    echo "<br>";
    echo $productdescription;
    echo "<br> image temp   ";
    print_r($image);
    // echo $image;

    $imagename = $image['name'];

    $imagetemp = $image['tmp_name'];
   
    $split_imagename = explode('.',$imagename);

    $file_exention = strtolower($split_imagename[1]);//need to add if stament later

    $imagesize = $image['size'];
    

    //check if uploaded file is valid
    $allowed = array('jpg','jpeg','png','pdf');
    // if(in_array($file_exention,$allowed)){
        //cecks if the file extention exists in the array $allowed
        $uploadimage = 'images/'.$imagename;
        //method to move teh file from $imagetmp to the location $uploadimage
        move_uploaded_file($imagetemp,$uploadimage);
        $sql = "insert into `products` (name,price,description,category,isbn,author,publisher,publication_date,language,quantity,image)
        values ('$productname','$productprice','$description','$category'
        ,'$isbn','$author','$publisher','$publicationdate','$language','$quantity','$uploadimage')";

        $result = mysqli_query($con,$sql);
        mysqli_error($con);
        if($result){
            echo "success";
        }else{
            die(mysqli_error($con));
        }
        
        header("Location:display_products.php");

    // mysqli_error($cone);
}
?>

