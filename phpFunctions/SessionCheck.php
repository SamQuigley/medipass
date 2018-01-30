<?php
   
    if(empty($_SESSION)) // if the session not yet started 
   session_start();
   

if(!isset($_SESSION['myemail'])) { //if not yet logged in
   header("Location: login.html");// send to login page
   exit;
} 
?>

<?php
   
    if(empty($_SESSION)) // if the session not yet started 
   session_start();
   

if(!isset($_SESSION['myemail'])) { //if not yet logged in
   header("Location: login.html");// send to login page
   exit;
} 
?>

