<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name=="viewport" content="width=device-width, initial-scale=1.0">
      <title>Edit Collection</title>
      <link rel="stylesheet" href="../css/main.css">
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"> 
      
  </head>
  <body>
      <?php
      require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

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
if(isset($_POST['add'])){
    
    
     $itemName = get_post($conn ,  'itemName');
      $itemPrice = get_post($conn ,  'itemPrice');
      $itemQuantity = get_post($conn ,  'itemQuantity');    
      $itemdesc= get_post($conn, 'itemDesc');
      $cat = get_post($conn,'Category');
      
      $query = "INSERT INTO `itemTable` (`ItemNum`, `itemName`, `itemPrice`, `itemQuantity` , `itemDesc`,`Category`)
      VALUES (NULL, '$itemName', '$itemPrice', '$itemQuantity' , '$itemdesc' , '$cat') ";
      $conn->query($query);
     
    
    
    $query = "SELECT * FROM `itemTable` WHERE itemName='$itemName' ";
    $result = $conn->query($query);
    $itemNum=$result->fetch_assoc()['ItemNum'];
 
    
    $picname = $_FILES['filename']['name'];

    switch($_FILES['filename']['type'])
    {
      case 'image/jpeg': $ext = 'jpg'; break;
      case 'image/gif':  $ext = 'gif'; break;
      case 'image/png':  $ext = 'png'; break;
      case 'image/tiff': $ext = 'tif'; break;
      default:           $ext = '';    break;
    }
    if($ext)
    {
        $picn = "./pics/$itemNum.$ext";
        move_uploaded_file($_FILES['filename']['tmp_name'], $picn);     
     
    }
    
    header("Location: products_admin.php");
}
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
              <ul id="menuitems" style="visiblity: hidden;">
                  
                

              </ul>
          </nav>
      </div>

  </div>
  
<div class="account-page">
      <div class="container">
          <div class="row">
              <div class="col-2">
            <!--------------------- enter pic ------------>
            </div>
              <div class="col-2">
                  <div class="form-container2">
                      <div class="form-btn">
                          <span>Add</span>
                          <hr id="indicator">
                      </div>
                     <form action='admin_add.php' method='post' id="regForm" enctype='multipart/form-data'>
                          <input type="hidden" name="add" value="yes">
                          <input type="text" required name="itemName" placeholder="Item Name">
                          <input type="number" required name="itemPrice" placeholder="Price">
                          <input type="number" required name="itemQuantity" placeholder="Quantity">
                          <input type="text"  required name="itemDesc" placeholder="Description">
                            <input type='file' required name='filename' size='10'>
                          <select name="Category" required id="Category">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                          </select>
                          <button type="submit"  value="add" class="btn">Upload</button>
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
                          <li><a href="logout.php" >Sign-out</a></li>
_END;
    

    
}
else
{
    echo ' <li><a href="loginpage.php">Sign-in</a></li><li><a href="register.php">Register</a></li>';
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
<script>

    function sortlist(){
        document.getElementById("jsform").submit(); 
    }
</script>
    </body>

</html>