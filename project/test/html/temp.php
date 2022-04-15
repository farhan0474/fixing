      <?php
      session_start();
include "login.php";



$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_REQUEST['login']) && isset($_REQUEST['username']) && isset($_REQUEST['password']))
{
    $username = get_post($conn, 'username');
    $password = get_post($conn, 'password');

    $query = mysqli_query($conn, "SELECT * FROM userInfo WHERE username='".$username."' AND 
    password='".$password."'");
    
    if(mysqli_num_rows($query)>0){
        $data = mysqli_fetch_assoc($query);
        $_SESSION['user_data'] = $data;
        if($data['usertype']==1){
            header("Location:admin_home.php");

        }
        else{
            header("Location:test.php");

        }
    }
    else{
            header("Location:loginpage.php?error?Invalid Login Details!");

    }

    
}
else{
    header("Location:loginpage.php?error?Please Enter Username and Password");
}
function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}

?>