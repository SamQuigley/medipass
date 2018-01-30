<?php

//config file to connecr to database
include('config.php');

    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysqli_error());
    
    if(isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['password']) && !empty($_POST['password'])){     // Checking if all fields have been filled in, if not then no data will be inserted into database.
        
        
        $myemail = mysqli_real_escape_string($connection,$_POST['email']);              // Turn our post into a local variable also prevented SQL injection by removing special characters.
        $mypassword = mysqli_real_escape_string($connection,$_POST['password']);        // Turn our post into a local variable also prevented SQL injection by removing special characters.

        
        //email and password sent from form
        $myemail=$_POST['email']; 
        $mypassword=$_POST['password'];
        
        // To protect MySQL injection 
        $myemail = stripslashes($myemail);
        $mypassword = stripslashes($mypassword);
        
        $myemail = mysqli_real_escape_string($connection,$myemail);
        $mypassword = mysqli_real_escape_string($connection,$mypassword);
        
        // Encrypted password
        $mypasswordsecure = $mypassword;
        
         
        //Getting email and password from table
        $sql = "SELECT * FROM physician WHERE username = '$myemail' and password = '$mypasswordsecure'";
        $result=mysqli_query($connection,$sql);
        $count=mysqli_num_rows($result);
                                    
        if($count==1){
                                        
                    // ---------------------------------------------
                    // Physician username and password were correct.
                    // ---------------------------------------------
                    session_start();
                    $_SESSION['myemail'] = $myemail;
                    echo "phpFunctions/ph_welcome.php";
                    
                    
                                                 
                     }
                    else{
                    // ---------------------------------------------
                    // Physician username and password were incorrect.
                    // ---------------------------------------------
                    echo 0;
                    }
}
?>