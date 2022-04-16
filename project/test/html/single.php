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
       
      
      <div class="container">
          <div class="navbar">
          <div class = "logo">
            <a href="test.php"><img class="logo" src="pics/logocom.jpg"></a>
          </div>
          <nav>
              <ul id="menuitems"  >
                  <li><a href="products.php">Back to Collection</a></li>
                   <?php
                   require_once 'login.php';
                   
                   $conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);


?>
              </ul>
          </nav>
          <img src="pics/cart.png" style="visibility: hidden;" width="30px" height="30px">
          <img src="pics/menu.png" class="menu-icon"  onclick="menutoggle()">
      </div>
      </div>
      <!-- single product details -->
      <div class="tinycontainer single-product">
      <div class="row">
          <div class="col-2">
              <?php
              $item_id = $_GET['item_id']??1;


$query = " SELECT * FROM itemTable WHERE itemNum=$item_id";
$result = $conn->query($query);


            
              ?>
              <img src="<?php echo getimage($result,0); ?>" width="100%">
          </div>
          <div class="col-2">
              
 
              <p style="color:#000;">Quantity: <?php $iquan= $result->fetch_assoc()['itemQuantity']; $result->data_seek(0);echo $iquan;?></p>
              <h1 style="color:#000;"><?php echo $result->fetch_assoc()['itemName']; $result->data_seek(0); ?></h1>
              <h4 style="color:#000;">$<?php echo $result->fetch_assoc()['itemPrice']; $result->data_seek(0); ?></h4>
             <?php
             if(isset($_SESSION['username']) ){
                 if($iquan == 0){
                     echo "<p style='color:#FF0000;text-decoration: line-through;'> out of stock </p>";
                 }
                 
                          

             }
              ?>
              <h3>Product Details</h3>
              <p style="color:#000;"><?php echo $result->fetch_assoc()['itemDesc']; $result->data_seek(0); ?></p>
          </div>
      </div>
      </div>

  
  <div class="tinycontainer">
      
      
              <?php
              
              $itemcat = $result->fetch_assoc()['Category'];
              
$query = " SELECT * FROM itemTable WHERE Category=$itemcat AND itemNum!='$item_id' ORDER BY RAND()";
$result = $conn->query($query);

              
              
              ?>
      
      <div class="row">
          <?php
          for($j=0;$j<4;$j++){
          echo '<div class="col-4"><a href=" ';
        $result->data_seek($j);
          $item_id2 = $result->fetch_assoc()['ItemNum'];
          $result->data_seek($j);
          printf("%s?item_id=%s","single.php",$item_id2);
          echo '"><img src="';
          getimage($result,$j);
          echo '"></a><h4>';
          echo $result->fetch_assoc()['itemName'];
          $result->data_seek($j);
          echo '</h4><p>';
          echo $result->fetch_assoc()['itemPrice'];
          $result->data_seek($j);
          echo '</p></div>';
}
          ?>
         
          
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
                    if(isset($_SESSION['username'])){
                          $username = $_SESSION['username'];
                          echo '<li><a>'.$username.'</a></li>';
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


<?php
function getImage($result,$num){
    $result->data_seek($num);
                  $nametemp = $result->fetch_assoc() ['ItemNum'];
                  $result->data_seek($num);

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
            echo $image2;
        }
    }
    

}

?>
    </body>

</html>