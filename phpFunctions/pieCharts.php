<?php
include('config.php');

// if(isset($_POST['var1']) && !empty($_POST['var1']) 
// AND isset($_POST['var2']) && !empty($_POST['var2'])
// AND isset($_POST['var3']) && !empty($_POST['var3'])
// AND isset($_POST['var4']) && !empty($_POST['var4'])){
    
// $patientId = $_SESSION['myId'];



$var1 = $_POST['var_1'];
$var2 = $_POST['var_2'];
$var3 = $_POST['var_3'];
$var4 = $_POST['var_4'];

        
$sql1 = "SELECT count(recordId) as 'total_var1' FROM medicalrecord WHERE subject LIKE  '%$var1%'";
$sql2 = "SELECT count(recordId) as 'total_var2' FROM medicalrecord WHERE subject LIKE  '%$var2%'";
$sql3 = "SELECT count(recordId) as 'total_var3' FROM medicalrecord WHERE subject LIKE  '%$var3%'";
$sql4 = "SELECT count(recordId) as 'total_var4' FROM medicalrecord WHERE subject LIKE  '%$var4%'";

$result=mysqli_query($connection,$sql1);
$data=mysqli_fetch_assoc($result);
$var1_count = $data['total_var1'];


$result=mysqli_query($connection,$sql2);
$data=mysqli_fetch_assoc($result);
$var2_count = $data['total_var2'];

$result=mysqli_query($connection,$sql3);
$data=mysqli_fetch_assoc($result);
$var3_count = $data['total_var3'];

$result=mysqli_query($connection,$sql4);
$data=mysqli_fetch_assoc($result);
$var4_count = $data['total_var4'];

$MultiDimArray = array();
      
$MultiDimArray[] = array ( 'value' => $var1_count, 'color' => "#30a5ff", 'highlight' => "#62b9fb", 'label' => $var1); 
$MultiDimArray[] = array ( 'value' => $var2_count, 'color' => "#ffb53e", 'highlight' => "#fac878", 'label' => $var2); 
$MultiDimArray[] = array ( 'value' => $var3_count, 'color' => "#1ebfae", 'highlight' => "#1ebfae", 'label' => $var3); 
$MultiDimArray[] = array ( 'value' => $var4_count, 'color' => "#f9243f", 'highlight' => "#f9243f", 'label' => $var4); 


echo json_encode($MultiDimArray,JSON_NUMERIC_CHECK);



?>


