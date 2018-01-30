<?php

//config file to connecr to database
include('config.php');
    
    header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0', FALSE);
    header('Pragma: no-cache');


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
        $mypasswordsecure = md5($mypassword);
        
         
        //Getting email and password from table
        $sql = "SELECT email FROM patient WHERE email = '$myemail'";
        $result=mysqli_query($connection,$sql);
        $count=mysqli_num_rows($result);
        
        if($count==1){
            
        // ---------------------------------------------
        // he is a user      
        // ---------------------------------------------
                        $sql = "SELECT email FROM patient WHERE email = '$myemail' and password = '$mypasswordsecure'";
                        $result=mysqli_query($connection,$sql);
                        $count=mysqli_num_rows($result);
                        
                        if($count==1){
                            
                        // ---------------------------------------------
                        // he is a user | password is correct
                        // ---------------------------------------------
                                    $sql = "SELECT * FROM patient WHERE email = '$myemail' and password = '$mypasswordsecure' and active='1'";
                                    $result=mysqli_query($connection,$sql);
                                    $count=mysqli_num_rows($result);
                                    
                                    if($count==1){
                                                
                                                
                                                $patientId = $row['patientId'];
                                                session_start();
                                    // ---------------------------------------------
                                    // he is a user | password is correct | he is active    PATIENT.PHP
                                    // ---------------------------------------------
                                                 $_SESSION['myemail'] = $myemail;
                                                 $_SESSION['patientId'] = $patientId;
                                                 echo "phpFunctions/pa_welcome.php";
                                                
                                                
                                                }
                                                else{
                                                    // ---------------------------------------------
                                                    // he is a user | password is correct | he is not active   Bring to page where sends verification email
                                                    // ---------------------------------------------
                                                    echo "test2.php";
                                                }
                                    }
                                    else{
                                        // ---------------------------------------------
                                        // not a user returns 0 to ajax function which will display error and reset input fields for user when logining in
                                        // ---------------------------------------------
                                        echo '0';
                                    }
            
        }
        else{
            
        // ---------------------------------------------
        // not a user returns 0 to ajax function which will display error and reset input fields for user when logining in
        // ---------------------------------------------
            echo "0";
        }
}
?>