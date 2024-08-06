<?php
$PATH = $_SERVER['DOCUMENT_ROOT'];
 include ($PATH.'/connect.php');


if(isset($_GET['deletedid'])){
    $id = $_GET['deletedid'];
    $sql = "DELETE FROM products WHERE book_id = '$id'";
    //sql commmand to delete row from database
    $working = mysqli_query($con, $sql);
    if($working){
        // wcho "user with id" .$id. "deleted";
    
        header("Location:display_products.php");
        //return back to displayuser.php
    }
    else{
        echo "Not working";
        die(mysqli_error($con));
    }
}

?>