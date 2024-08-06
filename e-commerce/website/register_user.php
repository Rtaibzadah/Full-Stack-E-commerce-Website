<?php
include('head.php');

  $PATH = $_SERVER['DOCUMENT_ROOT'];
  include($PATH.'/connect.php');

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['repassword'];
    //$name ect are variables that are being sent to the database

    $sql_check_email = "SELECT * FROM `crud` WHERE `email` = '$email'"; 
    $result_check_email = mysqli_query($con, $sql_check_email); 

    if(empty($name) || empty($surname) || empty($number) || empty($email) || empty($password)){
        echo "Please fill in all fields";
    }else if(mysqli_num_rows($result_check_email) > 0){
        echo "Email already exists";
    }else if( $password != $re_password){
        echo "Passwords do not match";
    }else if(strlen($password) < 8) {
        echo "Password must be at least 8 characters long";
    } else if(!preg_match("/[0-9]/", $password)) {
        echo "Password must contain at least 1 number";
    } else if(!preg_match("/[^A-Za-z0-9]/", $password)) {
        echo "Password must contain at least 1 special character";
    } else{

        // hash the passwords before storing into database
        $password = md5($_POST['password']);
        $re_password = md5($_POST['repassword']);

        $sql = "insert into `crud` (name, surname, number, email, password) 
    values('$name', '$surname', '$number', '$email', '$password')";
    // insert query
    
        //execute query with variable execute
        $result = mysqli_query($con, $sql);
        if($result){
            header("location: display_login.php?success=You have successfully registered <br> Please login to continue");
            // this is the page that will be displayed after the user has been entered
        }else{
            die(mysqli_error($con));
        }

    }

}
?>

<!DOCTYPE html>
<head>
    <title>Register Users</title>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ind.css">
    <!-- link to css when complete -->
</head>
<body>
    <h1>Register</h1>
    <div class="registeruser">
        <form action="register_user.php" method="post">
            <div class="form1">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value = "<?php echo $name; ?>"
                placeholder="Enter Name">
            </div>
            <div class="form1">
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname" value = "<?php echo $surname; ?>"
                placeholder="Enter Surname">
            </div>
            <div class="form1">
                <label for="phone number">Phone</label>
                <input type="text" name="number" id="number" value = "<?php echo $number; ?>"
                placeholder="Enter Phone Number">
            </div>
            <div class="form1">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value = "<?php echo $email; ?>"
                placeholder="Enter Email">
            </div>
            <div class="form1">
                <label for="password">Password</label>
                <input type="password" name="password" id="password"
                placeholder="Enter Password">
            </div>
            <div class="form1">
                <label for="password">Re-Enter Password</label>
                <input type="password" name="repassword" id="repassword"
                placeholder="Re-enter Password">
            </div>
            <div class="form1">
                <input type="checkbox" id="reveal_pass" name="reveal_pass">
                <label for="reveal_pass">Show password</label>
                <div class="form1">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
    
    <script src="web.js"></script>
</body>
<html>