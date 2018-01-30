
<?php

    
    include('patientDetails.php');
    include('config.php');

    
    $query = "SELECT medicalrecord. * , physician.name, physician.surname
            FROM medicalrecord
            INNER JOIN physician ON medicalrecord.physicianId = physician.physicianId
            WHERE medicalrecord.patientId = '$patientId'
            Order By medicalrecord.recordId Desc
            LIMIT 0 , 30";

    if ($result = mysqli_query($connection, $query)) {
        $output = "<table class='table table-striped'>
                        <thead class='thead-default'>
                            <tr>
                                <th>No</th>
                                <th>Case</th>
                                <th>Referral Doctor</th>
                                <th>Date</th>	
                                <th></th>
                            </tr>
                        </thead>
                    <tbody>"; // this creates a table and its headings in html
        
        while($row = mysqli_fetch_row($result)){
            
            
            $output = $output . "<tr>
                                    <td>".$row[0]."</td>
                                    <td>".$row[3]."</td>
                                    <td>".$row[7].' '.$row[8]."</td>
                                    <td>".$row[6]."</td>
                                    <td align='center'><button id='viewRecordBtn' class='btn btn-sm btn-info' data-toggle='modal' data-target='#medicalRecModal' onclick=\"viewPatientRecord(".$row[0].")\">VIEW RECORD</button></td>
                                </tr>";
            
        }
        
        $output = $output . "</tbody></table>";// this finishes the html table
        echo $output;// this displays the table
            
    }
    
    