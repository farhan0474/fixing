<?php 
session_start();

?>


<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Log in</title>
      <link rel="stylesheet" href="../css/main.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"> 
      
  </head>
  <body>

      <div class="container">
          <div class="navbar">
          <div class = "logo">
            <a href="test.php"><img class="logo" src="pics/logocom.jpg"></a>
          </div>
          </div>
      </div>
      
      
      <?php
require_once "login.php";


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password']))
{
    $username = get_post($conn, 'username');
    $password = get_post($conn, 'password');

    $query = "SELECT * FROM userInfo";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    $rows = $result->num_rows;
    $usercode = 0;
    for ($j = 0;$j < $rows;++$j)
    {
        $result->data_seek($j);

        if ($username == $result->fetch_assoc() ['username'])
        {
            $result->data_seek($j);

            if ($password == $result->fetch_assoc() ['password'])
            {
                $result->data_seek($j);
                $usercode = $result->fetch_assoc() ['userId'];
                //header("Location:test.php");
                if ($usercode == 1)
                {

                    $_SESSION['usercode']=1;
                    header('Location: admin_home.php');
                    
                    
                }
                else
                {
                    $_SESSION['username']=$username;
                    header('Location: test.php');
                }
            }
            else
            {
                echo "<script type='text/javascript'>alert('Incorrect Password');</script>";
                header("Refresh:0");
            }
            break;
        }
        if ($j == $rows - 1) echo "<script type='text/javascript'>alert('Incorrect Username');</script>";
        header("Refresh:0");
    }
}
function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}

?>

  <!---- login page --->
  
  <div class="account-page">
      <div class="container">
          <div class="row">
              <div class="col-2">
                  <!------------------------INSERT PICTURE ------------->
                <img src="pics/loginpage.jpg" style="border-radius: 50px;">
              </div>
              <div class="col-2">
                  <div class="form-container">
                      <div class="form-btn">
                          <span>login</span>
                          <hr id="indicator">
                      </div>
                      <form class="formloginc" action='loginpage.php' method='post' id="loginForm">
                          <input type="hidden" name="login" value="yes">
                          <input type="text" required name="username" placeholder="Username">
                          <input type="password" required name="password" placeholder="Password">
                          <button type="submit" value="log-in" class="btn">Login</button>
                          <h4>Dont have an account?</h4><a href="register.php">Register</a>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

  
  
<!--- footer--->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3> Download our app</h3>
                <p>  On All Platforms</p>
                <div class="app-logo">
                    <a href="https://play.google.com/store"><img src="pics/googlelogo.png"></a>
                    <a href="https://www.apple.com/ca/app-store/"><img src="pics/appstore.png"></a>
                </div>
            </div>
            <div class="footer-col-2">

            <img src="pics/footerlogo.jpg">
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