<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>WildCard</title>
      <link rel="stylesheet" href="css/main.css">
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"> 
      
  </head>
  <body>
      <?php
      session_start();
      
      if(isset($_SESSION('user_data'))){
         if($_SESSION['user_data']['userid']!=1) {
             header("Location:test.php");
         }
         echo "hello admin, ".$_SESSION['user_data']['username'];
      }
      else{
          header("Location:loginpage.php?error=UnAuthorized Access");
      }
      
      
      ?>
      <div class="header">
      <div class="container">
          <div class="navbar">
          <div class = "logo">
              <a href="test.php"><img class="logo" src="pics/logocom.jpg"></a>
          </div>
          <nav>
              <ul id="menuitems">
                  
                  <li><a href="test.php">Home</a></li>
                  <li><a href="products.php">products</a></li>
                  <li><a href="">Home3</a></li>
                  <li><a href="loginpage.php">Account</a></li>
              </ul>
          </nav>
          <a href="cart.php"><img src="pics/cart.png" width="30px" height="30px"></a>
          <img src="pics/menu.png" class="menu-icon" onclick="menutoggle()">
      </div>
      <div class="row">
          <div class="col-2">
              <h1>Drip like <br>no tommorrow</h1>
              <p> ay who we<br> finessing</p>
              <a href="" class="btn">Explore Collection &#8594</a>
          </div>
          <div class="col-2">
              <img src="pics/2002.png">
          </div>
      </div>
      </div>
      </div>
  
  <!-- New realeases -->
  
  <div class="category">
      <div class="tinycontainer">
      <div class="row">
    <div class="col-3">
        <img src="pics/202312.png">
    </div>
    <div class="col-3">
        <img src="pics/202313.png">
    </div>
    <div class="col-3">
        <img src="pics/background.jpg">
    </div>
    </div>
</div>
  </div>
  
  <!-- featured products --->
  <div class="tinycontainer">
      <h2 class="title"> New realeases</h2>
      <div class="row">
          <div class="col-4">
              <img src="pics/2002.png">
              <h4>LV Jacket</h4>
              <p>$1799.00</p>
          </div>
          <div class="col-4">
              <img src="pics/2002.png">
              <h4>LV Jacket</h4>
              <p>$1799.00</p>
          </div>
          <div class="col-4">
              <img src="pics/2002.png">
              <h4>LV Jacket</h4>
              <p>$1799.00</p>
          </div>
          <div class="col-4">
              <img src="pics/2002.png">
              <h4>LV Jacket</h4>
              <p>$1799.00</p>
          </div>
          <div class="col-4">
              <img src="pics/2002.png">
              <h4>LV Jacket</h4>
              <p>$1799.00</p>
          </div>
          
      </div>
      </div>
      
      <!--- exclusive --->
      <div class="exc">
          <div class="tinycontainer">
              <div class="row">
                  <div class="col-2">
                      <img src="pics/2002.png" class="excpic">
                  </div>
                  <div class="col-2">
                      <p>Fresh Merch</p>
                      <h1>New Stuff</h1>
                      <small> Something</small>
                  </div>
              </div>
          </div>
      </div>
      
  <!---- brands ---->
  
  <div class="brands">
      <div class="small-container">
          <div class="row">
              <div class="col-5">
                  <img src="pics/lvlogo.png">
              </div>
              <div class="col-5">
                  <img src="pics/lvlogo.png">
              </div>
              <div class="col-5">
                  <img src="pics/lvlogo.png">
              </div>
              <div class="col-5">
                  <img src="pics/lvlogo.png">
              </div>
              <div class="col-5">
                  <img src="pics/lvlogo.png">
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
                <p> download app for an</p>
                <div class="app-logo">
                    <img src="pics/googlelogo.png">
                    <img src="pics/appstore.png">
                </div>
            </div>
            <div class="footer-col-2">
            <img src="pics/footerlogo.jpg">
            </div>
            <div class="footer-col-3">
                <h3>Useful Links</h3>
                <ul>
                    <li>coupons </li>
                    <li>coupons </li>
                    <li>coupons </li>
                    <li>coupon s </li>

                </ul>
            </div>
             <div class="footer-col-4">
                <h3>Socail Media</h3>
                <ul>
                    <li>Facebook </li>
                    <li>twitter </li>
                    <li>insta </li>
                    <li>youtube </li>

                </ul>
            </div>
        </div>
        <hr>
        <p class="copyright"> Copyright 2020 - Group 17 ™</p>
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