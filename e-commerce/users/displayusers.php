<?php 
 $PATH = $_SERVER['DOCUMENT_ROOT'];
  include ($PATH.'/connect.php');
?>

<!DOCTYPE html>
    <head>
        <title>Display Users</title>
        <meta charset = "utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="user.css">
        <!-- link to css when complete -->
    </head>
    <body>

    <?php include($PATH.'/admin/adminpannel.php'); ?>

    <h1>Users</h1>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        
        <?php
            $con = mysqli_connect("localhost", "root", "root", "ecom");

            $sql="SELECT * FROM crud";
            $working = mysqli_query($con, $sql);
            // if($working){
            if($working) {   
                while($row = mysqli_fetch_assoc($working)){
                    $id = $row['user_id'];
                    $name = $row['name'];
                    $surname = $row['surname'];
                    $number = $row['number'];
                    $email = $row['email'];
                    $password = $row['password'];
                    echo '<tr>
                    
                    <th scope="row">'.$id.'</th>
                    <td>'.$name.'</td>
                    <td>'.$surname.'</td>
                    <td>'.$number.'</td>
                    <td>'.$email.'</td>
                    <td>'.$password.'</td>

                    <td>
                    <button><a href="deleteusers.php?deletedid='.$id.'">Delete</a></button>
                    <button><a href="updateusers.php?updatedid='.$id.'">Update</a></button>
                    </td>

                    </tr>';
                }
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }

            ?> 
          

    </table>
    </body>
</html>
