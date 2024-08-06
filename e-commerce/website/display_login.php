<?php 
  $PATH = $_SERVER['DOCUMENT_ROOT'];
  include ($PATH.'/connect.php');
?>
<!DOCTYPE html>
<?php include('head.php'); ?>
<html>
<head>
    <title>Display Login</title>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ind.css">
</head>
<body>
    <form action="login_valid.php" method="post">
        <h1>Login</h1>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } else if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; } ?>
        <!-- will check and siplay any errors with the login -->
        <table>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="text" name="email" id="email" placeholder="Email"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="password" placeholder="Password"></td>
            </tr>
        </table>
        <div class="form1">
            <input type="checkbox" id="reveal_pass" name="reveal_pass">
            <label for="reveal_pass">Show password</label>
        </div>
        <div class="button-container">
            <button type="submit">Login</button>
            <button><a href="register_user.php">Register</a></button>
        </div>
    </form>
    
    <script src="web.js"></script>
</body>
</html>
