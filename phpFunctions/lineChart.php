<?php
include('config.php');

$var1 = $_POST['var_1'];
// $var2 = $_POST['var_2'];
// $var3 = $_POST['var_3'];
// $var4 = $_POST['var_4'];

        
$var1_quarter1 = "SELECT COUNT( * ) FROM medicalrecord WHERE subject LIKE '%$var1%' AND Date BETWEEN '2016/01/01' AND '2016/03/31'";
$var1_quarter2 = "SELECT COUNT( * ) FROM medicalrecord WHERE subject LIKE '%$var1%' AND Date BETWEEN '2016/04/01' AND '2016/06/31'";
$var1_quarter3 = "SELECT COUNT( * ) FROM medicalrecord WHERE subject LIKE '%$var1%' AND Date BETWEEN '2016/07/01' AND '2016/09/31'";
$var1_quarter4 = "SELECT COUNT( * ) FROM medicalrecord WHERE subject LIKE '%$var1%' AND Date BETWEEN '2016/10/01' AND '2016/12/31'";

$result=mysqli_query($connection,$var1_quarter1);
$data=mysqli_fetch_assoc($result);
$var1_count = $data['total_var1'];


// $result=mysqli_query($connection,$sql2);
// $data=mysqli_fetch_assoc($result);
// $var2_count = $data['total_var2'];

// $result=mysqli_query($connection,$sql3);
// $data=mysqli_fetch_assoc($result);
// $var3_count = $data['total_var3'];

// $result=mysqli_query($connection,$sql4);
// $data=mysqli_fetch_assoc($result);
// $var4_count = $data['total_var4'];

$MultiDimArray = array();


      
$MultiDimArray[] = array ( 'value' => $var1_count, 'color' => "#30a5ff", 'highlight' => "#62b9fb", 'label' => $var1); 
// $MultiDimArray[] = array ( 'value' => $var2_count, 'color' => "#ffb53e", 'highlight' => "#fac878", 'label' => $var2); 
// $MultiDimArray[] = array ( 'value' => $var3_count, 'color' => "#1ebfae", 'highlight' => "#1ebfae", 'label' => $var3); 
// $MultiDimArray[] = array ( 'value' => $var4_count, 'color' => "#f9243f", 'highlight' => "#f9243f", 'label' => $var4); 


echo json_encode($MultiDimArray,JSON_NUMERIC_CHECK);



?>


