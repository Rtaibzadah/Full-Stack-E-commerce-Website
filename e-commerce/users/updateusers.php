<?php
$PATH = $_SERVER['DOCUMENT_ROOT'];
 include ($PATH.'/connect.php');

$id = $_GET['updatedid'];//stores the id of the user to be updated
$sql="SELECT * FROM crud WHERE user_id = '$id'";
$result = mysqli_query($con, $sql);//executes the sql command
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$surname = $row['surname'];
$number = $row['number'];
$email = $row['email'];
$password = $row['password'];
  

if(isset($_POST['submit'])){
    $name1 = $_POST['name'];
    $surname1 = $_POST['surname'];
    $number1 = $_POST['number'];
    $email1 = $_POST['email'];
    $password1 = $_POST['password'];
    
    if(empty($name1) || empty($surname1) || empty($number1) ||
     empty($email1) || empty($password1)){
        echo "Please fill in all fields";
        
    }else{
        $sql = "UPDATE `crud` SET `name`='$name1', `surname`='$surname1',
            `number`='$number1', `email`='$email1', `password`='$password1'
            WHERE `user_id`=$id";

        $result = mysqli_query($con, $sql);
        if($result){
            header('location:displayusers.php');
            echo "updated successfully";
        }else{
            die(mysqli_error($con));
        }
    }
    
}
?>

<!DOCTYPE html>
<head>
    <title>Update User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>  
    <div class="enterusers">
        <form action="" method="post">
            <div class="form1">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value=<?php echo $name;?> placeholder="Enter Name">
            </div>
            <div class="form1">
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname" value=<?php echo $surname;?> placeholder="Enter Surname">
            </div>
            <div class="form1">
                <label for="phone number">Phone</label>
                <input type="text" name="number" id="number" value=<?php echo $number;?> placeholder="Enter Phone Number">
            </div>
            <div class="form1">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value=<?php echo $email;?> placeholder="Enter Email">
            </div>
            <div class="form1">
                <label for="password">Password</label>
                <input type="text" name="password" id="password" value=<?php echo $password;?> placeholder="Enter Password">
            </div>
            <div class="form1">
                <button type="submit" class="submit" name="submit">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
