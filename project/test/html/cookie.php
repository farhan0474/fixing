<?php
    $username = $_GET['username']??1;
    $item_id = $_GET['item_id']??1;
    
    $cart = "c".$username;
    if(isset($_COOKIE[$cart])){
        $cookie = unserialize($_COOKIE[$cart]);
        
    }
    else{
        $cookie = array();
    }
    
    $cookie[] = $item_id;
    setcookie($cart , serialize($cookie) , time()+(86400 * 30));
    
   // print_r(unserialize($_COOKIE[$cart]));
    
    header("Location: products.php");



?>