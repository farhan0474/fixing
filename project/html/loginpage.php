<!DOCTYPE html>
<html lang="en">
    <head>
    <title> login</title>
    </head>
    
<body>
   
   <?php 
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

 


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
  
  if(isset($_POST['signup'])){
        formcreator(1);

  }
  if(isset($_POST['login'])){
         formcreator(2);

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
    <form action='loginpage.php' method='post'><pre>
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
    
   <form action='loginpage.php' method='post'><pre>
        <input type="hidden" name="login1" value="yes">
        Username: <input type="text" required name="username">
        Password: <input type="text" required name="password">
        <input type="submit" value="log-in">
    </pre>
    </form>
    <form action="loginpage.php" method="post"><pre>
    <input type="hidden" name="signup" value="yes">
    <input type="submit" value="signup">
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
</body>

   

    
</html>