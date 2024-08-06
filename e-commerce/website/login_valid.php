<?php 
    session_start();
    //this will start the session which will allow the user to stay logged in
    $PATH = $_SERVER['DOCUMENT_ROOT'];
    include ($PATH.'/connect.php');

    if(isset($_POST['email']) && isset($_POST['password'])) {

        function validateLogIn($details) {
            $details = trim($details);
            $details = stripslashes($details);
            $details = htmlspecialchars($details);
            //this will remove any spaces, slashes and special characters
            return $details;
        }
    }

    $email = validateLogIn($_POST['email']);
    $password = validateLogIn($_POST['password']);

    // checks if either the username or password are empty
    if(empty($email)) {
        header("Location: display_login.php?error=Email is required");
        exit();
        //exit will stop the script from running
    }
    else if(empty($password)) {
        header("Location: display_login.php?error=Password is required");
        exit();
    }

    // hash the deatails that were eneterd by the user to check if they match the database
    // $email = md5($email);
    // $password = md5($password);

    $sql = "SELECT * FROM `crud` WHERE `email` = '$email' AND `password` = '$password'";
    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_assoc($result);
    if($row['email'] === $email && $row['password'] === $password) {
        // === is a strict comparison operator
        echo "Login Successful";
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['name'];
        header("Location: index.php");
        exit();
    }
    else {
        header("Location: display_login.php?error=Incorrect Email or Password");
        exit();
    }
    header("Location: display_login.php");
    exit();
?>
