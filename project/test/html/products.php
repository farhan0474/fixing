<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="The most unique shoe website you will ever find! "/>
      <meta name="keywords" content="Adidas, Nike, Puma, Converse, Vans "/>
      <title>Products</title>
      <link rel="stylesheet" href="../css/main.css">
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"> 
      
  </head>
  <body>
      <?php
if (isset($_SESSION['usercode']))
{
    if ($_SESSION['usercode'] == 1)
    {
        header("Location: admin_home.php");
    }
}
?>
      <div class="container" >
          <div class="navbar">
          <div class = "logo">
              <a href="test.php"><img class="logo" src="pics/logocom.jpg" alt="logo of the website"></a>
          </div>
          <nav>
              <ul id="menuitems">
                  
                  <li><a href="test.php">Home</a></li>

                  <li><a href="products.php">Collection</a></li>

                  <li><a href="aboutus.php">About us</a></li>
                   <?php
if (isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
    echo '<li><a>' . $username . '</a></li>';
    echo <<<_END
                          <li><a href="logout.php" >Log-out</a></li>
                          <li><a href="support.php" >Help</a></li>
<li><a href="cart.php"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     width="40px" height="24px" viewBox="0 0 40 36" style="enable-background:new 0 0 40 36;" xml:space="preserve">
<g id="Page-14" sketch:type="MSPage">
    <g id="Desktop4" transform="translate(-84.000000, -410.000000)" sketch:type="MSArtboardGroup">
        <path id="Cart" sketch:type="MSShapeGroup" class="st0" d="M94.5,434.6h24.8l4.7-15.7H92.2l-1.3-8.9H84v4.8h3.1l3.7,27.8h0.1
            c0,1.9,1.8,3.4,3.9,3.4c2.2,0,3.9-1.5,3.9-3.4h12.8c0,1.9,1.8,3.4,3.9,3.4c2.2,0,3.9-1.5,3.9-3.4h1.7v-3.9l-25.8-0.1L94.5,434.6"
            />
    </g>
</g>
  </svg></a></li>
_END;
    

    
}
else
{
    echo ' <li><a href="loginpage.php">Log-in</a></li><li><a href="register.php">Register</a></li>';
}

?>
              </ul>
          </nav>
              <img src="pics/menu.png" alt="menu logo" class="menu-icon" onclick="menutoggle()">
      </div>

  </div>
  <div class="tinycontainer">
      
      <div class="row row-2">
          <?php
include 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$listnum = 0;
if (isset($_POST['collec']))
{
    $listnum = $_POST['num'];
}

if ($listnum == 0)
{
    echo '<h2> All Products</h2>';
}
else
{

    $query = "SELECT * FROM Category WHERE ColumnId='" . $listnum . "'";
    $result = $conn->query($query);

    echo '<h2>' . $result->fetch_assoc() ['CategoryName'] . ' Collection </h2>';

}
?>
          <form id="jsform" action="products.php" method="post">
          <select name="sorting" onchange="sortlist()">
              <option value="0" label="empty"> </option>
              <option value="1" label="ascending">Price &#8593;</option>
              <option value="2" label="descending">Price &#8595;</option>
          </select>
          </form>
      </div>
<?php

$order = $_POST['sorting'];
if ($order == 1)
{
    $query = "SELECT * FROM itemTable ORDER BY itemPrice ASC";
}
elseif ($order == 2)
{
    $query = "SELECT * FROM itemTable ORDER BY itemPrice DESC";
}
else
{
    $query = "SELECT * FROM itemTable ORDER BY RAND()";
}
$result = $conn->query($query);
if (!$result) die($conn->error);

$rows = $result->num_rows;
?>
    <div class='row'>
    
    <?php

for ($j = 0;$j < $rows;++$j)
{

    $result->data_seek($j);

    if (($listnum != 0) && ($listnum != $result->fetch_assoc() ['Category']))
    {
        continue;
    }
    
    

?>

         <div class="col-4" >

         <?php
    $result->data_seek($j);

    $name = $result->fetch_assoc() ['ItemNum'] . ".png";
    $result->data_seek($j);
    $nametemp = $result->fetch_assoc() ['ItemNum'];
    $item_id=$nametemp;
   
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
            $pic2 = $image2;
        }
    }

 
    

   echo "<a href='";
   printf("%s?item_id=%s","single.php" , $item_id);
   echo "'><img src='$pic2' alt='shoe pic'></a>";
    
   
    $result->data_seek($j);
    echo "<h4>" . $result->fetch_assoc() ['itemName'] . "</h4>";
    $result->data_seek($j);
    echo "<p>$" . $result->fetch_assoc() ['itemPrice'] . " </p>";
    $result->data_seek($j);
    $quan = $result->fetch_assoc() ['itemQuantity'];
    echo "<p>Quantity: ";
    if ($quan == 0)
    {
        echo "sold out!"; //insert sold out function
        
    }
    else
    {
        echo $quan;
    }

    echo "</p></div>";

}
?>
      </div>
      </div>

      <div class="video">
          <?php
          if ($listnum == 0)
          {

          }
          else
          {

              $query = "SELECT * FROM Category WHERE ColumnId='" . $listnum . "'";
              $result = $conn->query($query);
              $name = $result->fetch_assoc() ['ColumnId'];
              $listOfCategory = array(1, 5, 2);
              for($i = 0; $i < 3; $i++){
                if($name == $listOfCategory[$i]){
                    if($listOfCategory[$i] == 1){
                        echo "<video src='adidas.mp4' controls></video>";
                    }
                    else if($listOfCategory[$i] == 5){
                        echo "<video src='nike.mp4' controls></video>";
                    }
                    else if($listOfCategory[$i] == 2){
                        echo "<video src='puma.mp4' controls></video>";
                    }
                }
              }
          }
          ?>
      </div>
<!--- footer-->
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
<script>

    function sortlist(){
        document.getElementById("jsform").submit(); 
    }
</script>
<script>
function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    }
</script>
    </body>

</html>