<?php
    			session_start();
    			$physicianId = $_SESSION['physicianId'];
    			
				require("config.php");
				$sql = "SELECT * FROM tasks where physicianId = '$physicianId' ORDER BY time asc";
				$query = mysqli_query($connection,$sql);
				$numrows = mysqli_num_rows($query);

				if($numrows>0){
					while( $row = mysqli_fetch_assoc( $query ) ){

						$task_id = $row['id'];
						$task_name = $row['task'];

						echo '<li>
							
								<span>'.$task_name.'</span><span class="glyphicons glyphicons-bin"></span>
								<img id="'.$task_id.'" class="delete-button" width="20px" src="img/remove_icon.png" />
								<hr>
								
							  </li>';
					}
				}

			
?>