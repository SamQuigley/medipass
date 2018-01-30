<?php
 include('config.php'); 
 session_start();
 $physicianId = $_SESSION['physicianId'];
 
	$task = strip_tags( $_POST['task'] );
	$date = date('Y-m-d');
	$time = date('H:i:s');
 
   
    $physicianId = $_SESSION['physicianId'];
   
     
    $sql_insert = "INSERT INTO tasks (id,physicianId,task,date,time) VALUES ('','$physicianId', '$task', '$date', '$time')";
    $result = mysqli_query($connection,$sql_insert); 
        
    $sql_select = "SELECT * FROM tasks WHERE task ='$task' and date='$date' and time='$time' and physicianId ='$physicianId'";                                               //If statement, Enter into statement if there are more than zero rows.
    $query = mysqli_query($connection,$sql_select);
        
                                                                    
            while($row = mysqli_fetch_array($query)){                                        
                
                $task_id = $row['id'];
				$task_name = $row['task'];   
            }
                                                             
        echo '<li><span>'.$task_name.'</span><img id="'.$task_id.'" class="delete-button" src="img/remove_icon.png" /></li><hr>';
?> 