<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name=="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin Mode</title>
      <link rel="stylesheet" href="../css/main.css">
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"> 
      
  </head>
  <body>
  <!--header-->
            <?php
if (isset($_SESSION['usercode']))
{
    if ($_SESSION['usercode'] != 1)
    {
        header("Location: test.php");
    }
}
else{
    header("Location: test.php");

}
?>
      
           <?php
        require_once 'login.php';
        
        $conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

    
      
      
      
      function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}
      ?>
      
      <div class="header">
      <div class="container">
          <div class="navbar">
          <div class = "logo">
              <a href="test.php"><img class="logo" src="pics/logocom.jpg" alt="logo of the website"></a>
          </div>
          <nav>
              <ul id="menuitems">
                  
                  <li><a href="admin_home.php">Home</a></li>
                  <li><a href="products_admin.php">Edit Collection</a></li>
                  <li><a href="aboutus.php">About us</a></li>
                  <li>Admin</li>
                <li><a href="logout.php">Sign-out</a></li>
              </ul>
          </nav>
              <img src="pics/menu.png" alt="menu logo" class="menu-icon" onclick="menutoggle()">
      </div>
      <div class="parallax">
                    

      <div class="row">
          
          <div class="col-2">
              <h1>Best Designer Clothes <br> on Planet Earth!</h1>
              <p> Explore With<br> Care</p>
          </div>
          
          </div>
      </div>
      </div>
      </div>
  
  <!--New realeases -->
  <div class="category">
      <div class="tinycontainer">
      <div class="row">
    <div class="col-3">
        <form id="form1" action="products_admin.php" method="post">
            <input type="hidden" name="collec" value="yes">
            <input type="hidden" name="num" value="1">
            <a href="#" onclick="document.getElementById('form1').submit();"><img src="pics/adidaslogo.jpg" alt="Logo of adidas"></a>
        </form>
    </div>
    <div class="col-3">
        <form id="form2" action="products_admin.php" method="post">
            <input type="hidden" name="collec" value="yes">
            <input type="hidden" name="num" value="5">
            <a href="#" onclick="document.getElementById('form2').submit();"><img src="pics/nikelogo.jpg" alt="Logo of nike"></a>
        </form>
    </div>
    <div class="col-3">
        <form id="form3" action="products_admin.php" method="post">
            <input type="hidden" name="collec" value="yes">
            <input type="hidden" name="num" value="2">
            <a href="#" onclick="document.getElementById('form3').submit();"><img src="pics/pumalogo.png" alt="Logo of puma"></a>
        </form>
    </div>
    </div>
</div>
  </div>
  
  <!-- featured products --->
  <div class="tinycontainer">
      <h2 class="title"> Shoe Collection</h2>
      <div class="row">
          <div class="col-4">
              <a href='<?php printf("%s?item_id=%s","single_admin.php" , '202343') ?>'><img src="pics/202343.jpg" alt="picture of a shoe"></a>
              <h4>Travis Scott's Jordans</h4>
              <p>1250.00</p>
          </div>
          <div class="col-4">
              <a href='<?php printf("%s?item_id=%s","single_admin.php" , '202342') ?>'><img src="pics/202342.jpg" alt="picture of a shoe"></a>
              <h4>Cactus Jack 6's</h4>
              <p>$750.00</p>
          </div>
          <div class="col-4">
              <a href='<?php printf("%s?item_id=%s","single_admin.php" , '202344') ?>'><img src="pics/202344.jpg" alt="picture of a shoe"></a>
              <h4>Cactus Jack Lows</h4>
              <p>$650.00</p>
          </div>
          <div class="col-4">
              <a href='<?php printf("%s?item_id=%s","single_admin.php" , '202339') ?>'><img src="pics/202339.jpg" alt="picture of a shoe"></a>
              <h4>Red Jordan 1s</h4>
              <p>$1200.00</p>
          </div>
          <div class="col-4">
              <a href='<?php printf("%s?item_id=%s","single_admin.php" , '202341') ?>'><img src="pics/202341.jpg" alt="picture of a shoe"></a>
              <h4>Off-White Jordans</h4>
              <p>$1250.00</p>
          </div>
          
      </div>
      </div>
      
      <!--- exclusive --->
      <div class="exc">
          <div class="tinycontainer">
              <div class="row">
                  <div class="col-2">
                      <div class="slider">

                      </div>
                  </div>
                  <div class="col-2">
                      <p>Place your order while you can</p>
                      <h1>Limited Stock!</h1>
                      <small> Best website for all your sneaker head needs :)</small>
                  </div>
              </div>
          </div>
      </div>
      
      <!---- brands ---->
      <div class="brands">
          <div class="small-container">
              <div class="row">
                  <div class="col-5">
                      <a href="https://www.adidas.ca/en"><img src="pics/adidaslogowhite.png" alt="logo of adidas"></a>
                  </div>
                  <div class="col-5">
                      <a href="https://ca.puma.com/ca/en"><img src="pics/pumalogowhite.jpg" alt="logo of puma"></a>
                  </div>
                  <div class="col-5">
                      <a href="https://www.vans.ca/en-ca"><img src="pics/vanslogowhite.jpg" alt="logo of vans"></a>
                  </div>
                  <div class="col-5">
                      <a href="https://converse.ca/"><img src="pics/converselogowhite.jpg" alt="logo of converse"></a>
                  </div>
                  <div class="col-5">
                      <a href="https://www.nike.com/ca/"><img src="pics/nikelogowhite.png" alt="logo of nike"></a>
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
                        if(isset($_POST['username'])){
                              $username = get_post($conn,'username');
                              echo '<li><a>'.$username.'</a></li>';
                              echo '<li><a href="test.php">Log-out</a></li>';

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
            <p class="copyright"> Copyright 2022 - Group 17 ???</p>
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
    </body>
</html>