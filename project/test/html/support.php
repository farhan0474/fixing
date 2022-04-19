<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Page</title>

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
<div class="header">
    <div class="container">
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
                    if(isset($_SESSION['username'])){
                        $username = $_SESSION['username'];
                        echo '<li><a>'.$username.'</a></li>';
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
</div>

<!---Description-->
<h1 class="title">User Support</h1>
<div style="margin-left: 20%; margin-right: 20%;">
    <p> Below are some tips to navigate the website.</p>
    1. How to view the entire collection?.<br>
    After the user enters the website,the user can click on collection button from the navigation bar to view the enire collection.
    <img src="pics/UGen.JPG" alt="Picture of Navbar of homepage"> <br>
    <br><hr><br>
    2. What are the highlights? <br>
    Our website mainly deals in high-end shoe retail, however our most popular choices are highlighted on the homepage<br> and clicking on any of them takes to their home(For people with brand preferances). <br>
    <img src="pics/FUSupp.JPG"> <br>
    <br><hr><br>
    3.How do I become a member?(exclusives are in a very near future.) <br>
    On the navigation bar there is a register button as visible saw in the image for the 1st suggestion.<br>
    4. How do I log-in?
    Look at the navigation bar above and click on the log-in button, where pre-registered users can log-in.
    <br><br><br>
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
</body>
</html>
