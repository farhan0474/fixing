<!DOCTYPE html>
<html lang='en'>
    
    <head>
        <title>homepage</title>
            <link rel="stylesheet" href="../css/bootstrapcss/bootstrap.min.css" />
          <link rel="stylesheet" href="main.css" />
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="../js/bootstrapjs/bootstrap.min.js"></script>
    </head>
    
    <body>
                <div class="container">
        <div class="row">
        <a href="https://www.instagram.com/yassoof_7/"><img src="../pictures/website/insta.png" width=30 height=25></a>
        
        <form action='homepage.php' method='post'>
        <input type="hidden" name="signup" value="yes">
         <input type='submit' value='signup'>
            
        </form>
        <form action='homepage.php' method='post'>
        <input type="hidden" name="login" value="yes">
         <input type='submit' value='login'>
        </form>
   
        
         <form action='homepage.php' method='post'>
        <input type="hidden" name="shop" value="yes">
         <input type='submit' value='shop'>
        </form>
        
        <form action='homepage.php' method='post'>
        <input type="hidden" name="add" value="yes">
         <input type='submit' value='add'>
        </form>
        </div>
        <div class="row">


        
        
<?php 
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

 
    if(isset($_POST['add'])){
        formcreator(3);
    }


  if(isset($_POST['shop'])){
      listItems($conn);
  }


  if(isset($_POST['signup1']) &&
      isset($_POST['fname']) &&
  isset($_POST['lname']) &&
  isset($_POST['address']) &&
  isset($_POST['email']) &&
  isset($_POST['username']) &&
  isset($_POST['password'])){
      $username = get_post($conn,'username');
      $password = get_post($conn,'password');
      $fname= get_post($conn,'fname');
      $lname= get_post($conn,'lname');
      $email= get_post($conn,'email');
      $address= get_post($conn,'address');
       accountCreator($username,$password,$fname,$lname,$address,$email,$conn);
      
  }
  
  if(isset($_POST['login1']) &&isset($_POST['username']) && isset($_POST['password'])){
       $username = get_post($conn,'username');
      $password = get_post($conn,'password');
      accountChecker($username,$password,$conn);

  }
  
  if(isset($_POST['add1']) && isset($_POST['itemName'])
  && isset($_POST['itemPrice']) && isset($_POST['itemQuantity'])){
      
      $itemName = get_post($conn ,  'itemName');
      $itemPrice = get_post($conn ,  'itemPrice');
      $itemQuantity = get_post($conn ,  'itemQuantity');    
      $itemdesc= get_post($conn, 'itemdesc');
      $cat = get_post($conn,'cat');
      
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
        $picn = "../pictures/items/$itemNum.$ext";
        move_uploaded_file($_FILES['filename']['tmp_name'], $picn);     
     
    }
    
echo "itemnum " . $itemNum;

   
  }
  
  if(isset($_POST['signup'])){
        formcreator(1);

  }
  if(isset($_POST['login'])){
        formcreator(2);

  }
 
 
 
function listItems($conn){
    
    $query = "SELECT * FROM itemTable";
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    
    $rows = $result->num_rows;
    
     for ($j = 0 ; $j < $rows ; ++$j){
         echo '<div class="col-sm-4">';
         $result->data_seek($j);
         $name = $result->fetch_assoc()['ItemNum'].".png";
         echo "<img src='../pictures/items/$name'><br>"; 
         $result->data_seek($j);
         echo $result->fetch_assoc()['itemName']." ";
         $result->data_seek($j);
         echo $result->fetch_assoc()['itemPrice']."$ <br>";
         $result->data_seek($j);
         $quan = $result->fetch_assoc()['itemQuantity'];
        echo "Quantity: ";
         if($quan == 0){
             echo "sold out!"; //insert sold out function
         }
         else{
          echo $quan;   
         }
            echo "<br><button type='button' class='btn btn-success' data-toggle='modal' data-target='#details-$itemNum'>Details</button>";
            echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#details-$itemNum'>Add to cart</button>";
                
         
         
         echo "</div>";
     }
} 
  
function accountCreator($username,$password,$fname,$lname,$address,$email,$conn){
    
    
    $query  = "SELECT * FROM userInfo";
  $result = $conn->query($query);
  if (!$result) die($conn->error);
  $rows = $result->num_rows; 
    
    for ($j = 0 ; $j < $rows ; ++$j){

     
$result->data_seek($j);    

    
    if( $username == $result->fetch_assoc()['username']){
          echo "<script type='text/javascript'>alert('Username already taken');</script>";
          formcreator(1);
          return;
 
    }
    }
    
        //assuming password checks out

    
    $query = "INSERT INTO `CustomerInfo` (`fname`, `lname`, `address`, `email`, `id`)
    VALUES ('$fname', '$lname', '$address', '$email', NULL)";
    
    $conn->query($query);
    
    $query = "SELECT * FROM `CustomerInfo` WHERE email='$email' ";
    
    $result = $conn->query($query);
    if(!$result)
    die("ERROR");


    $customerid=$result->fetch_assoc()['id'];
    $query = "INSERT INTO `userInfo` (`username`, `password`, `userId`, `customerId`) 
    VALUES ('$username', '$password', DEFAULT, '$customerid') ";
    
    $conn->query($query);
    
}



function accountChecker($username,$password,$conn){
    $query  = "SELECT * FROM userInfo";
  $result = $conn->query($query);
  if (!$result) die($conn->error);
  $rows = $result->num_rows; 
    
    for ($j = 0 ; $j < $rows ; ++$j){

     
$result->data_seek($j);    

    
    if( $username == $result->fetch_assoc()['username']){
          $result->data_seek($j);  
 
    
     if($password ==  $result->fetch_assoc()['password'] ){
     echo "PERFECT!";
     $result->data_seek($j);
     echo "level ". $result->fetch_assoc()['userId'];
     
     }
     else{
         echo "<script type='text/javascript'>alert('Incorrect Password');</script>";
         formcreator(2);
         
     }
     break;
    }
 if( $j == $rows-1)
 echo "<script type='text/javascript'>alert('Incorrect Username');</script>";
  formcreator(2);
} 

}
function formcreator($num){
    if($num == 1){
        echo <<<_END
    <form action='homepage.php' method='post'><pre>
        <input type="hidden" name="signup1" value="yes">
        Username:   <input type="text" required name="username">
        Password:   <input type="text" required name="password">
        First Name: <input type="text" required name="fname">
        Last Name:  <input type="text" required name="lname">
        E-mail:     <input type="text" required name="email">
        Address:    <input type="text" required name="address">
        <input type="submit" value="Create">
    </pre>
    </form>
_END;
    }
    if($num == 2){
         echo <<<_END
    
   <form action='homepage.php' method='post'><pre>
        <input type="hidden" name="login1" value="yes">
        Username: <input type="text" required name="username">
        Password: <input type="text" required name="password">
        <input type="submit" value="log-in"></form><form action="homepage.php" method="post"><input type="hidden" name="signup" value="yes">        <input type="submit" value="signup">
 
    </form>
     </pre>
_END;
}
    if($num == 3){
         echo <<<_END
    
    <form method='post' action='homepage.php' enctype='multipart/form-data'>
    <input type="hidden" name="add1" value="yes"><pre>
    Item Name:    <input type="text" required name="itemName">
    Item Price:   <input type="text" required name="itemPrice"> 
    Item Quantity:<input type="text" required name="itemQuantity">
    itemdesc: <input type="text" required name="itemdesc">
    cat: <input type="text" required name="cat">
    Select a JPG, GIF, PNG or TIF File:
    <input type='file' name='filename' size='10'>
    <input type='submit' value='Upload'>
    </pre>
    </form>
_END;
    }
    
    
}
function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }

  
?>
</div>

</div>
    </body>
    
    
</html>