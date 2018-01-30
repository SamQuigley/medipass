<?php
  
  	/*
  	LINK TO PHPMYADMIN
  	Username: x14500057
  	Password: blank
  	https://medipass-x14500057.c9users.io/phpmyadmin/index.php?token=3c953ce71a06fc7824de5b939fb4419e
  	 */
  	
  	$host = "127.0.0.1";                         //server 127.0.0.1
    $user = "x14500057";                         //Your Cloud 9 username
    $pass = "";                                 // Remember, there is NO password by default!
    $db = "medipass";                            //Your database name you want to connect to
    $port = 3306;                                //port is 3306 by default
  
    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());  //connect to the database or die and display the error.

?>