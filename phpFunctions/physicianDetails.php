<?php
  include('config.php');
  
  session_start();
  $myemail = $_SESSION['myemail'];
  
    $sql = "SELECT * FROM physician where username = '$myemail'";
    $result = $connection->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
            $physicianId = $row["physicianId"];
            $physicianName = $row["name"];  
            $physicianSurname = $row["surname"];
            $title = $row["title"];
            
             $_SESSION['physicianId'] = $physicianId;
            
        }
    } else {
        echo "0 results";
    }
    
?> 

