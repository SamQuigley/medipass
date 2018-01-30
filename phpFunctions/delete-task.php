<?php 
	$task_id = strip_tags( $_POST['task_id'] );

	require("config.php");
	$sql_del = "DELETE FROM tasks WHERE id='$task_id'";
	$result = mysqli_query($connection,$sql_del); 
?>