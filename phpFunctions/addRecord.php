<?php
        include('config.php'); 
 
        session_start();
        
        $patientId = $_SESSION['patientId_AddRecord']; 
        $case = $_POST['new_case'];
        $new_note = $_POST['new_note'];
        $physicianId = $_POST['physicianId'];
    	$date = date('Y-m-d');
     
        $sql_insert = "INSERT INTO medicalrecord (recordId,physicianId,patientId,subject,prescriptionId,notes,date) 
                        VALUES ('','$physicianId','$patientId','$case','','$new_note','$date')";
        $result = mysqli_query($connection,$sql_insert); 
        
        $sql_select = "SELECT * FROM medicalrecord WHERE subject ='$case' and date='$date' and physicianId ='$physicianId' and patientId = '$patientId'";                                               //If statement, Enter into statement if there are more than zero rows.
        $query = mysqli_query($connection,$sql_select);
        
                                                                    
            while($row = mysqli_fetch_array($query)){  
                
                
                
                                echo "<tr>
                                    <td>".$row[0]."</td>
                                    <td>".$row[3]."</td>
                                    <td>".$row[2]."</td>
                                    <td>".$row[3]."</td>
                                    <td align='center'><button id='viewRecordBtn' class='btn btn-sm btn-info' data-toggle='modal' data-target='#viewRecModal' onclick=\"viewPatientRecord(".$row[0].")\">VIEW RECORD</button></td>
                                </tr>";  
                
    
				
            }
                                                             
        
        
        
        
           
               
?> 

                