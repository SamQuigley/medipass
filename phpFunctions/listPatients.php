<?php
 include('config.php');                                                                         //Include Config.php to connect to database.
 
    $sql = "SELECT * FROM patient";                                                             //Create local variable, assign sql statement.
    $result = $connection->query($sql);                                                         //Query database using the local variable from above(contains sql statement).
        
        if ($result->num_rows > 0) {                                                            //If statement, Enter into statement if there are more than zero rows.
            
            $MultiDimArray = array();                                                           //Create local variable, assign an array list.
            while($row = mysqli_fetch_array($result)){                                          //While loop, iterates through the resulting rows.
                
                $MultiDimArray[] = array ( 'ppsn' => $row['ppsn'], 'patientName' => $row['patientName'], 'patientSurname' => $row['patientSurname'] );   //create an array of arrays which would be each row.
            }
            echo json_encode($MultiDimArray);                                                   //echo the result and encode into json format ready for access for the patients table on physician dahsboard.
            }else {                                                                             // else, there are zero patients in patient table.
            echo "0 results";                                                                   //echo zero patients
        }
?>



