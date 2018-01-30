<?php
  include('config.php');
  
  session_start();
  $patientId = $_POST['patientId'];
  
      $sql = "SELECT * FROM medicalrecord where patientId = '.$patientId.'";
      $result = $connection->query($sql);
      
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            
             
            $recordId = $row["recordId"];
            $physicianId = $row["physicianId"];  
            $patientId = $row["patientId"];
            $subject = $row["subject"];
            $prescriptionId = $row["prescriptionId"];
            $notes = $row["notes"];
            $date = $row["date"];
            
          }
        
        
    } else {
        echo "0 results";
    }
    $connection->close();
          
?>