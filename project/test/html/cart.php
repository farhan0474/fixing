<?php

header("Location: test.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name=="viewport" content="width=device-width, initial-scale=1.0">
      <title>Cart</title>
      <link rel="stylesheet" href="main.css">
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"> 
      
  </head>
  <body>
      
<?php
        require_once 'login.php';
        
        $conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

    
    
      
      
      
      function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}
      ?>
      <div class="container">
          <div class="navbar">
          <div class = "logo">
            <a href="test.php"><img class="logo" src="pics/logocom.jpg"></a>
          </div>
          <nav>
              <ul id="menuitems" style="visibility: hidden;">
                  
                 <li><a href="test.php">Home</a></li>
                <li><a href="aboutus.php">About Us</a></li>

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
          </nav>
          <a href="cart.php"><img src="pics/cart.png" width="30px" height="30px"></a>
          <img src="pics/menu.png" class="menu-icon" onclick="menutoggle()">
      </div>
      </div>

  
<!---shopping cart --->
<div class="tinycontainer cart-page">
    <table>
        <tr>
            <th>Product</th>
            <th>       </th>
            <th>Subtotal</th>
            
        </tr>
    
        
       
            <?php
                
                $cookieName = 'c' . $_SESSION['username'];
                
                if(isset($_COOKIE[$cookieName]))
                {
                    
                    $j=0;
                    foreach(unserialize($_COOKIE[$cookieName]) as $itemNum){
                        echo <<<_END
            <tr>
            <td>
                <div class="cart-info">
_END;
                        $query = "SELECT * FROM itemTable WHERE itemNum=$itemNum";
                        $result = $conn->query($query);
                         $result->data_seek($j);
                  $nametemp = $itemNum;

    $path2 = "pics/" . $nametemp;

    $file2 = $path2 . ".";

    $ext = array(
        "jpg",
        "jpeg",
        "JPEG",
        "gif",
        "png",
        "bmp"
    );
    for ($x = 0;$x < 6;$x++)
    {
        $image2 = $file2 . $ext[$x];
        if (file_exists($image2))
        {
            echo '<img src="' . $image2.'">';
        }
    }
    
    echo <<<_END
      <div>
                        <p>
_END;
                         $result->data_seek($j);

                        echo $result->fetch_assoc()['itemName'];
                                                 $result->data_seek($j);
                        echo $result->fetch_assoc()['itemPrice'];
                            echo <<<_END

                        </p>
                        <small>Price: $1800</small>
                        <br>
                        <a href="">remove</a>
                    </div>
                </div></td>
            <td><input type="number" value="1"></input></td>
            <td>$50.0</td>
        </tr>
_END;
                    
                
                    //<img src="pics/2002.png">
                    ?>
                    
<?php                 
$j++;
}
                    
                    //print_r(unserialize($_COOKIE[$cookieName]));
                }
                else{
                    echo "EMPTY CAARTTTTTTTTTTTTTTTTT";
                }
                
                ?>
                  
         <tr>
            <td>
                <div class="cart-info">
                    <img src="pics/2002.png">
                    <div>
                        <p>LV JACKET</p>
                        <small>Price: $1800</small>
                        <br>
                        <a href="">remove</a>
                    </div>
                </div></td>
            <td><input type="number" value="1"></input></td>
            <td>$50.0</td>
        </tr>
    </table>
    
    <div class="total-price">
        <table>
            <tr>
                <td>subtotal</td>
                <td>1800</td>
                </tr>
                  <tr>
                <td>tax</td>
                <td>100</td>
                </tr>
                  <tr>
                <td>total</td>
                <td>1900</td>
                </tr>
        </table>
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
                <h3>Useful links</h3>
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
    </body>

</html>