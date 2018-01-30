<?php

    include('config.php');                              //Include Config.php to connect to database.
     
    session_start();
    $myemail = $_SESSION['myemail'];
   
    $age = $_POST['age'];
    $telephoneMobile = $_POST['mobileNum'];
    $telephoneHome = $_POST['homeNum'];
    $county = $_POST['county'];
    $eircode = $_POST['eircode'];
    $sex = $_POST['sex'];
    $ppsn = $_POST['ppsn'];
    $medicalCard = $_POST['medicalCard'];
    
    $curDetailsQuery = "Select * FROM patient Where email = '$myemail'";
    $result = $connection->query($curDetailsQuery);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $currAge = $row["age"];
            $currTelephoneMobile = $row["telephoneMobile"];
            $currTelephoneHome = $row["telephoneHome"];
            $currCounty = $row["county"];
            $currEircode = $row["eircode"];
            $currSex = $row["sex"];
            $currPpsn = $row["ppsn"];
            $currMedicalCard = $row["medicalCard"];
        }
        
    } 
    
    if($age == ''){
        $age = $currAge;
    }
    
    if($telephoneMobile == ''){
        $telephoneMobile = $currTelephoneMobile;
    }
    
    if($telephoneHome == ''){
        $telephoneHome = $currTelephoneHome;
    }
    
    if($county == ''){
        $county = $currCounty;
    }
    
    if($eircode == ''){
        $eircode = $currEircode;
    }
    
    if($sex == ''){
        $sex = $currSex;
    }
    
    if($ppsn == ''){
        $ppsn = $currPpsn;
    }
    
    $age = mysqli_real_escape_string($connection,$age);                             // Turn our post into a local variable also prevented SQL injection by removing special characters.
    $teleMobile = mysqli_real_escape_string($connection,$telephoneMobile);                             // Turn our post into a local variable also prevented SQL injection by removing special characters.
    $teleHome = mysqli_real_escape_string($connection,$telephoneHome);                             // Turn our post into a local variable also prevented SQL injection by removing special characters.
    $county = mysqli_real_escape_string($connection,$county);                             // Turn our post into a local variable also prevented SQL injection by removing special characters.
    $eircode = mysqli_real_escape_string($connection,$eircode);                             // Turn our post into a local variable also prevented SQL injection by removing special characters.
    $sex = mysqli_real_escape_string($connection,$sex);                             // Turn our post into a local variable also prevented SQL injection by removing special characters.
    $ppsn = mysqli_real_escape_string($connection,$ppsn);                             // Turn our post into a local variable also prevented SQL injection by removing special characters.
    $medicalCard = mysqli_real_escape_string($connection,$medicalCard);   
        
    $SQL = "UPDATE patient
            SET age = '$age',
            telephoneMobile = '$telephoneMobile',
            telephoneHome = '$telephoneHome',
            eircode = '$eircode',
            sex = '$sex',
            ppsn = '$ppsn',
            medicalCard = '$medicalCard',
            county = '$county'
            WHERE email = '$myemail'";
        
        $result = mysqli_query($connection,$SQL); // executes SQL code by using the connection to database from config.php file, and then inserting variabe $SQL from above.
        
    
  

?>


