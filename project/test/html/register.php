<?php 
session_start();

?>


<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Register</title>
      <link rel="stylesheet" href="../css/main.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"> 
      
  </head>
  <body>
      
      <div class="container">
          <div class="navbar">
          <div class = "logo">
              <a href="test.php"><img class="logo" src="pics/logocom.jpg" alt="logo of the website"></a>
          </div>
          </div>
      </div>
      
      <?php
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_POST['signup']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']))
{
    $username = get_post($conn, 'username');
    $password = get_post($conn, 'password');
    $fname = get_post($conn, 'firstname');
    $lname = get_post($conn, 'lastname');
    $email = get_post($conn, 'email');
    $address = get_post($conn, 'address');

    $query = "SELECT * FROM userInfo";
    $result = $conn->query($query);

    if (!$result) die($conn->error);
    $rows = $result->num_rows;

    for ($j = 0;$j < $rows;++$j)
    {

        $result->data_seek($j);

        if ($username == $result->fetch_assoc() ['username'])
        {
            echo "<script type='text/javascript'>alert('Username already taken');</script>";
            header("Refresh:0");

        }

    }

    $query = "SELECT * FROM CustomerInfo";
    $result = $conn->query($query);

    if (!$result) die($conn->error);
    $rows = $result->num_rows;

    for ($j = 0;$j < $rows;++$j)
    {
        $result->data_seek($j);
        if ($email == $result->fetch_assoc() ['email'])
        {
            echo "<script type='text/javascript'>alert('Email already taken');</script>";
            header("Refresh:0");
        }

    }

    $query = "INSERT INTO `CustomerInfo` (`fname`, `lname`, `address`, `email`, `id`)
    VALUES ('$fname', '$lname', '$address', '$email', NULL)";

    $conn->query($query);

    $query = "SELECT * FROM `CustomerInfo` WHERE email='$email' ";

    $result = $conn->query($query);
    if (!$result) die("ERROR");

    $customerid = $result->fetch_assoc() ['id'];
    $query = "INSERT INTO `userInfo` (`username`, `password`, `userId`, `customerId`) 
    VALUES ('$username', '$password', DEFAULT, '$customerid') ";

    $conn->query($query);
    
    header("Location: loginpage.php");

}

function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}

?>
     
  <!--login page-->
  
  <div class="account-page">
      <div class="container">
          <div class="row">
              <div class="col-2">
              <img src="pics/registerpage.jpg" alt="Image on the left" style="border-radius: 50px;">
            </div>
              <div class="col-2">
                  <div class="form-container2">
                      <div class="form-btn">
                          <span>Register</span>
                          <hr id="indicator">
                      </div>
                      <form action='register.php' method='post' id="regForm">
                          <input type="hidden" name="signup" value="yes">
                          <input type="text" name="username" placeholder="Username">
                          <input type="password" name="password" placeholder="Password">
                          <input type="text" name="firstname" placeholder="First Name">
                          <input type="text" name="lastname" placeholder="Last Name">
                          <input type="text" name="address" placeholder="Address">
                          <input type="email" name="email" placeholder="Email">
                          <button type="submit" value="register" class="btn">Register</button>
                          <h4>Already Registered?</h4><a href="loginpage.php">Log-in</a>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

  
  
<!--footer-->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3> Download our app</h3>
                <p>  On All Platforms</p>
                <div class="app-logo">
                    <a href="https://play.google.com/store"><img src="pics/googlelogo.png" alt = "logo of google playstore"></a>
                    <a href="https://www.apple.com/ca/app-store/"><img src="pics/appstore.png" alt = "logo of appstore"></a>
                </div>
            </div>
            <div class="footer-col-2">
                <img src="pics/footerlogo.jpg" alt = "logo of footer">
            </div>
            <div class="footer-col-3">
                <h3>Useful Links</h3>
                <ul>

                  
                  <li><a href="test.php">Home</a></li>
                  <li><a href="products.php">Collection</a></li>
                   <?php
if (isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
    echo '<li><a>' . $username . '</a></li>';
    echo <<<_END
                          <li><a href="logout.php" >Log-out</a></li>
_END;
    

    
}
else
{
    echo ' <li><a href="loginpage.php">Log-in</a></li><li><a href="register.php">Register</a></li>';
}

?>
                </ul>
            </div>
             <div class="footer-col-4">
                <h3>Social Media</h3>
                <ul>
                    <li><a href="https://www.facebook.com/">Facebook </a></li>
                    <li> <a href="https://www.twitter.com/">Twitter</a> </li>
                    <li><a href="https://www.instagram.com/">Instagram</a> </li>
                    <li><a href="https://www.github.com/">GitHub </a></li>

                </ul>
            </div>
        </div>
        <hr>
        <p class="copyright"> Copyright 2022 - Group 17 ™</p>
    </div>
</div>
<script>
    var menuitems= document.getElementById("menuitems");
    menuitems.style.maxHeight = "0px";
    
    function menutoggle(){
        if(menuitems.style.maxHeight == "0px")
        {
           menuitems.style.maxHeight = "200px";
        }
        else{
            menuitems.style.maxHeight = "0px";
        }
    }
</script>
<!--- toggle form -->

    </body>

</html>