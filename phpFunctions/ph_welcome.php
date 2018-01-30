<?php
header( "refresh:5;url=../ph_dashboard.php" );
	include('SessionCheck.php');
	include('physicianDetails.php');
?>
<html>
    <head>
    <style>
    
    
    .elementToFadeInAndOut {
    
    -webkit-animation: fadeinout 5s linear forwards;
    animation: fadeinout 5s linear forwards;
}



@-webkit-keyframes fadeinout {
  0%,100% { opacity: 0; }
  50% { opacity: 1; }
}

@keyframes fadeinout {
  0%,100% { opacity: 0; }
  50% { opacity: 1; }
}



</style><head><link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
    <body style="background-image:../img/Reg_Bg.jpg;">
        <div>
		<center><img class="elementToFadeInAndOut" style="padding-top:10%;" src="../img/medipass_logo.png"></center>
		<div class="elementToFadeInAndOut" style="text-align: center; padding-top:2%;"><h1>Welcome <?php echo $physicianName;?></h1><h2>Your Medipass Control centre...</h2></div>

	</div>
	
    </body>
</html>