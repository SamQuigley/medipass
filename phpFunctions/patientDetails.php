<?php
  include('config.php');
  
  session_start();
  $myemail = $_SESSION['myemail'];
  
    $sql = "SELECT * FROM patient where email = '$myemail'";
    
    $result = $connection->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
            $patientId = $row["patientId"];
            $patientName = $row["patientName"];  
            $patientSurname = $row["patientSurname"];
            $age = $row["age"];
            $email = $row["email"];
            $telephoneMobile = $row["telephoneMobile"];
            $telephoneHome = $row["telephoneHome"];
            $county = $row["county"];
            $eircode = $row["eircode"];
            $locationId = $row["locationId"];
            $sex = $row["sex"];
            $ppsn = $row["ppsn"];
            $medicalCard = $row["medicalCard"];
            $physicianId = $row["physicianId"];
        }
        $_SESSION['myId'] = $patientId;
        
        $sql = "SELECT name, surname FROM physician where physicianId = '$physicianId'";
        
        $result = $connection->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
            $doctorfName = $row["name"];
            $doctorsName = $row["surname"];  
            
        }
    }
        
    } else {
        echo "0 results";
    }
    $connection->close();
?>

