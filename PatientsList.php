<?php

    include ('phpFunctions/config.php');
    
    $query = "SELECT patient.* , physician.name, physician.surname
                FROM patient
                INNER JOIN physician ON patient.physicianId = physician.physicianId;";
    

    if ($result = mysqli_query($connection, $query)) {
        $output = "<table class='table table-striped'>
                        <thead class='thead-default'>
                            <tr>
                                <th>PPSN</th>
                                <th>Forename</th>
                                <th>Surname</th>
                                <th>Doctor</th>
                                <th><input type='text' style='width:90%; float:right;' id='search' class='form-control' placeholder='Search'></th>				                
                            </tr>
                        </thead>
                    <tbody>"; // this creates a table and its headings in html
        
        while($row = mysqli_fetch_row($result)){
            
            
            $output = $output . "<tr>
                                    <td>".$row[12]."</td>
                                    <td>".$row[1]."</td>
                                    <td>".$row[2]."</td>
                                    <td>".$row[17].' '.$row[18]."</td>
                                    <td align='center'><button id='viewBioBtn' class='btn btn-sm btn-info' onclick=\"viewPatientBio('".$row[0]."')\">VIEW PATIENT</button></td>
                                </tr>";
            
        }
        
        $output = $output . "</tbody></table>";// this finishes the html table
        echo $output;// this displays the table
            
    }
?>