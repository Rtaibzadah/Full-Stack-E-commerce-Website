<!DOCTYPE html>
<html>
  <head>
    <title>Website Title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inddd.css">
  </head>
  <body>
    <section id="header">
      <a href="index.html"><img src="images/logo/logo1.jpeg" alt=""></a>
      <div>
        <ul id="navigationBar">
          <p id="user">hello, 
            <!-- if there is no login then it is left as guest -->
            <?php  
              if($_SESSION['name']) {
                echo $_SESSION['name'];
              } else {
                echo "Guest";
              }; 
            ?>
          </p>
          <li><a href="index.php">Home</a></li>
          <li><a href="shop1.php">Products</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <div class="dropdown">
            <div class="dropbtn">Accounts</div>
            <div class="dropdown-account">
              <?php 
                if($_SESSION['name']) {
                  echo '<a href="logout.php">Logout</a>';
                } else {
                  echo '<a href="display_login.php">LogIn</a>';
                  echo '<a href="register_user.php">Register</a>';
                }; 
              ?>
            </div>
          </div>
          <li><a href="basket.php">Basket</a></li>
        </ul>
      </div>
    </section>
  </body>
</html>


  