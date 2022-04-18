<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Miranda</title>

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
                <img src="pics/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>
    </div>

    <!---Description--->
    <h1 class="title">About Us</h1>
    <div class = "center">

        <p>Sit amet venenatis urna cursus eget nunc scelerisque. At auctor urna nunc id cursus metus. Ullamcorper morbi tincidunt ornare massa eget egestas. Scelerisque purus semper eget duis at tellus at urna condimentum. Sit amet purus gravida quis blandit turpis cursus. Risus quis varius quam quisque id diam vel. Auctor augue mauris augue neque. In ante metus dictum at tempor commodo ullamcorper a. Ut placerat orci nulla pellentesque dignissim enim sit amet venenatis. Adipiscing at in tellus integer feugiat scelerisque varius morbi enim. Est lorem ipsum dolor sit amet consectetur adipiscing elit. Mauris vitae ultricies leo integer malesuada nunc vel. A cras semper auctor neque vitae tempus quam pellentesque. Bibendum neque egestas congue quisque egestas. Magnis dis parturient montes nascetur ridiculus mus.<br><br></p>


    </div>
    <div class = "center">
        <p>Location:<br>401 Sunset Ave, Windsor, ON N9B 3P4<br></p>
    </div>
    <div class = "center">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2950.7914983377095!2d-83.06822768467963!3d42.30431417919064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x883b2d77c6ec4bef%3A0x1a44f1192a4e41ee!2sUniversity%20of%20Windsor!5e0!3m2!1sen!2sca!4v1646188660590!5m2!1sen!2sca" width="1200" height="700" style="border:0;" allowfullscreen="" loading="lazy"></iframe><br>
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