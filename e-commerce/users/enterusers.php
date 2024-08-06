<?php

// debugging code
// var_dump($_POST);


// sending to database
include 'connect.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //$name ect are variables that are being sent to the database
    if(empty($name) || empty($surname) || empty($number) || empty($email) || empty($password)){
        echo "Please fill in all fields";
        
    }else{
        $sql = "insert into `crud` (name, surname, number, email, password) 
    values('$name', '$surname', '$number', '$email', '$password')";
    // insert query
    
        //execute query with variable execute
        $result = mysqli_query($con, $sql);
        if($result){
            header('location:displayusers.php');
            // this is the page that will be displayed after the user has been entered
        }else{
            die(mysqli_error($con));
        }

    }
}
?>

<!DOCTYPE html>
<head>
    <title>Enter Users</title>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <!-- link to css when complete -->

</head>
<body>  
    <?php include('/Applications/MAMP/htdocs/admin/adminpannel.php'); 
    echo $PATH;?>
    <h1>Enter Users</h1>
    
    <div class="enterusers">
        <form action="enterusers.php" method="post">
            <div class="form1">
                <label for="name">Name</label>
                <input type="text" name="name" id="name"
                placeholder="Enter Name">
            </div>
            <div class="form1">
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname"
                placeholder="Enter Surname">
            </div>
            <div class="form1">
                <label for="phone number">Phone</label>
                <input type="text" name="number" id="number"
                placeholder="Enter Phone Number">
            </div>
            <div class="form1">
                <label for="email">Email</label>
                <input type="email" name="email" id="email"
                placeholder="Enter Email">
            </div>
            <div class="form1">
                <label for="password">Password</label>
                <input type="password" name="password" id="password"
                placeholder="Enter Password">
            </div>
            <div class="form1">
            <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
<html>