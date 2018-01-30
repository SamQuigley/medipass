
<?php

    include ('config.php');

    $patientId = $_POST['patientId'];
    $sql = "SELECT * FROM patient where patientId = '$patientId'";
    
    session_start();
    
    $_SESSION['patientId_AddRecord'] = $patientId; 
                                                                                                    //Create local variable, assign sql statement.
    $result = $connection->query($sql);                                                         //Query database using the local variable from above(contains sql statement).
        
        if ($result->num_rows > 0) {                                                            //If statement, Enter into statement if there are more than zero rows.
            
            $MultiDimArray = array();                                                           //Create local variable, assign an array list.
            while($row = mysqli_fetch_array($result)){                                          //While loop, iterates through the resulting rows.
                
                $MultiDimArray[] = array (  'patientName' => $row['1'],
                                            'patientSurname' => $row['2'],
                                            'age' => $row['3'],
                                            'telephoneMobile' => $row['7'],
                                            'telephoneHome' => $row['8'],
                                            'sex' => $row['11'],
                                            'ppsn' => $row['12']
                                            );   //create an array of arrays which would be each row.
            }
            echo json_encode($MultiDimArray);                                                   //echo the result and encode into json format ready for access for the patients table on physician dahsboard.
            }else {                                                                             // else, there are zero patients in patient table.
            echo 0;                                                                   //echo zero patients
        }
        $connection->close();
    ?>