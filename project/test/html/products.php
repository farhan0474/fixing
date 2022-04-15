<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a href="test.php"><img class="logo" src="pics/logocom.jpg"></a>
          </div>
          <nav>
              <ul id="menuitems">
                  
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
          </nav>
          <a href="cart.php"><img src="pics/cart.png" style="visibility: hidden;" width="30px" height="30px"></a>
          <img src="pics/menu.png" class="menu-icon" onclick="menutoggle()">
      </div>

  </div>
  <div class="tinycontainer">
      
      <div class="row row-2">
          <?php
$hn = 'localhost'; //hostname
$db = 'mahmoud2_mahmoud2db'; //database
$un = 'mahmoud2_mahmoud2db'; //username
$pw = 'mypassword'; //password
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
              <option value="0"> </option>
              <option value="1">Price &#8593</option>
              <option value="2">Price &#8595</option>
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

//shuffle($result);

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
   echo "'><img src='$pic2'></a>";
    
   
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
      
     <!--- <div class="page-buttons">
          <?php
/* for($j=0,$k=1 ; $j < $rows ; $j=$j+16,$k++){
              echo "<span>$k</span>";
          }
*/

?>
      </div> ---->
      </div>
      
  
  
<!--- footer--->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3> Download our app</h3>
                <p>  On All Platforms</p>
                <div class="app-logo">
                    <a href="https://www.apple.com/ca/?afid=p238%7CsQDZ67JfO-dc_mtid_1870765e38482_pcrid_454193119641_pgrid_39429563412_&cid=aos-ca-kwGO-brand--slid---product-"><img src="pics/googlelogo.png"></a>
                    <a href="https://shop.samsung.com/ca/"><img src="pics/appstore.png"></a>
                </div>
            </div>
            <div class="footer-col-2">
                <img src="pics/logopurple.jpg">
                <p> designer for everyone</p>
            </div>
            <div class="footer-col-3">
                <h3>usefull links</h3>
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
                    <li> <a href="https://www.twitter.com/">twitter</a> </li>
                    <li><a href="https://www.instagram.com/yassoof_7">instaGram</a> </li>
                    <li><a href="https://www.github.com/">GitHub </a></li>

                </ul>
            </div>
        </div>
        <hr>
        <p class="copyright"> Copyright 2020 - WildCard™</p>
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