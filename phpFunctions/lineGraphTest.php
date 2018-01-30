<?php
    include('config.php');
    
    $date_lineG = $_POST['date_lineG'];
    $var1 = $_POST['var_1_lineG'];
    $var2 = $_POST['var_2_lineG'];
    
    $var1_Winter = "SELECT COUNT( * ) AS 'total_var_Winter'FROM medicalrecord  WHERE subject LIKE '%$var1%' AND Date BETWEEN '$date_lineG/01/01' AND '$date_lineG/03/31'";
    $var1_Spring = "SELECT COUNT( * ) AS 'total_var_Spring' FROM medicalrecord WHERE subject LIKE '%$var1%' AND Date BETWEEN '$date_lineG/04/01' AND '$date_lineG/06/31'";
    $var1_Summer = "SELECT COUNT( * ) AS 'total_var_Summer' FROM medicalrecord WHERE subject LIKE '%$var1%' AND Date BETWEEN '$date_lineG/07/01' AND '$date_lineG/09/31'";
    $var1_Autumn = "SELECT COUNT( * ) AS 'total_var_Autumn' FROM medicalrecord WHERE subject LIKE '%$var1%' AND Date BETWEEN '$date_lineG/10/01' AND '$date_lineG/12/31'";
    
    $var2_Winter = "SELECT COUNT( * ) AS 'total_var_Winter'FROM medicalrecord  WHERE subject LIKE '%$var2%' AND Date BETWEEN '$date_lineG/01/01' AND '$date_lineG/03/31'";
    $var2_Spring = "SELECT COUNT( * ) AS 'total_var_Spring' FROM medicalrecord WHERE subject LIKE '%$var2%' AND Date BETWEEN '$date_lineG/04/01' AND '$date_lineG/06/31'";
    $var2_Summer = "SELECT COUNT( * ) AS 'total_var_Summer' FROM medicalrecord WHERE subject LIKE '%$var2%' AND Date BETWEEN '$date_lineG/07/01' AND '$date_lineG/09/31'";
    $var2_Autumn = "SELECT COUNT( * ) AS 'total_var_Autumn' FROM medicalrecord WHERE subject LIKE '%$var2%' AND Date BETWEEN '$date_lineG/10/01' AND '$date_lineG/12/31'";
    
    $result=mysqli_query($connection,$var1_Winter);
    $data=mysqli_fetch_assoc($result);
    $var1_count_Winter = $data['total_var_Winter'];
    

    $result=mysqli_query($connection,$var1_Spring);
    $data=mysqli_fetch_assoc($result);
    $var1_count_Spring = $data['total_var_Spring'];
    if($var1_count_Spring == null){
        $var1_count_Spring = 0;
    }
    
    $result=mysqli_query($connection,$var1_Summer);
    $data=mysqli_fetch_assoc($result);
    $var1_count_Summer = $data['total_var_Summer'];
    if($var1_count_Summer == null){
        $var1_count_Summer = 0;
    }
    
    $result=mysqli_query($connection,$var1_Autumn);
    $data=mysqli_fetch_assoc($result);
    $var1_count_Autumn = $data['total_var_Autumn'];
    if($var1_count_Autumn == null){
        $var1_count_Autumn = 0;
    }
    
    $result=mysqli_query($connection,$var2_Winter);
    $data=mysqli_fetch_assoc($result);
    $var2_count_Winter = $data['total_var_Winter'];
    if($var2_count_Winter == null){
        $var2_count_Winter = 0;
    }

    $result=mysqli_query($connection,$var2_Spring);
    $data=mysqli_fetch_assoc($result);
    $var2_count_Spring = $data['total_var_Spring'];
    if($var2_count_Spring == null){
        $var2_count_Spring = 0;
    }
    
    $result=mysqli_query($connection,$var2_Summer);
    $data=mysqli_fetch_assoc($result);
    $var2_count_Summer = $data['total_var_Summer'];
    if($var2_count_Summer == null){
        $var2_count_Summer = 0;
    }
    
    $result=mysqli_query($connection,$var2_Autumn);
    $data=mysqli_fetch_assoc($result);
    $var2_count_Autumn = $data['total_var_Autumn'];
    if($var2_count_Autumn == null){
        $var2_count_Autumn = 0;
    }
    
    $datasets[] = array('var_1_Winter' =>$var1_count_Winter,'var_1_Spring' => $var1_count_Spring, 'var_1_Summer' => $var1_count_Summer,'var_1_Autumn' => $var1_count_Autumn);
    $datasets[] = array('var_2_Winter' =>$var2_count_Winter,'var_2_Spring' => $var2_count_Spring, 'var_2_Summer' => $var2_count_Summer,'var_2_Autumn' => $var2_count_Autumn);

    echo json_encode($datasets,JSON_NUMERIC_CHECK);
?>