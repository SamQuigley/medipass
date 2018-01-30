<?php
	
	include('phpFunctions/SessionCheck.php');
	include('phpFunctions/physicianDetails.php');

?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MediPass - <?php echo $physicianName.' '.$physicianSurname;?></title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="css/ph_statistics.css" rel="stylesheet">
<link href="css/statistics_page.css" rel="stylesheet">

<!--Favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--Favicon End-->

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<script src="js/ph_DataStats_Controls.js"></script>

<style>
    
    .elementToFadeInAndOut {
    
    -webkit-animation: fadeinout .5s linear forwards;
    animation: fadeinout .5s linear forwards;
}



@-webkit-keyframes fadeinout {
  0% { opacity: 0; }
  100% { opacity: 1; }
}

@keyframes fadeinout {
  0% { opacity: 0; }
  100% { opacity: 1; }
}

#stats_home {
    
    -webkit-animation: fadeinout_img 2s linear forwards;
    animation: fadeinout_img 2s linear forwards;
}



@-webkit-keyframes fadeinout_img {
  0% { opacity: 1; }
  100% { opacity: 0.6; }
}

@keyframes fadeinout_img {
  0% { opacity: 1; }
  100% { opacity: 0.6; }
}

.shadow {
    position: absolute;
    width: 100%;
    height: 100%;
    box-shadow: inset 100px 3px 100px 0 #000000;
    top: 0;
    left: 0;
    
    -webkit-animation: fadeinout_img 2s linear forwards;
    animation: fadeinout_img 2s linear forwards;
}

@-webkit-keyframes fadeinout_img {
  0% { opacity: 0;
  	   box-shadow: inset 1500px 3px 100px 0 #000000;}
  100% { opacity: 9;
  		 box-shadow: inset 60px 3px 100px 0 #000000;}
}

@keyframes fadeinout_img {
 0% { opacity: 0;
  	   box-shadow: inset 1500px 3px 100px 0 #000000;}
  100% { opacity: 9;
  		 box-shadow: inset 60px 3px 100px 0 #000000;}
}

.statsContainer{
     -webkit-animation: expand 4s linear forwards;
    animation: expand 4s linear forwards;
}

@-webkit-keyframes expand {
  0% { width:30%; }
  60% { width:30%; }
  100% { width:70%;}
}

@keyframes expand {
  0% { width:30%; }
  50% { width:30%; }
  100% { width:70%;}
}

 </style>

<link href="css/modalStyling.css" rel="stylesheet">
</head>

<body class="elementToFadeInAndOut">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Physician</span>Dashboard</a>
				<ul class="user-menu">
					<a href="phpFunctions/logout.php" class=" btn btn-danger" ><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a>
					
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
			<center><h2><?php echo $physicianName.' '.$physicianSurname;?></h2></center>
		<img src="img/medipass_logo.png" id="navbar_logo" class="img-responsive"/>
		<ul class="nav menu">
			<li><a href="ph_dashboard.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="ph_patients.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Patients</a></li>
			<li class="active"><a href="ph_statistics.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Statistics</a></li>
			<li role="presentation" class="divider"></li>
		</ul>
		
		
		<center>
			<h2>Control Panel</h2>
		</center>
		<div id="navigation_menu">
			<center>
					<button type="submit" name="Compare" onclick="menu_PieChartBtn()" class="btn btn-success btn-lg text-center ">Pie Chart</button>
					<button type="submit" name="Compare" onclick="menu_lineGraphBtn()" class="btn btn-info btn-lg text-center ">Line Chart</button>
			</center>	
		
		<div id="lineGraph_control_panel">
		<form>			
		
						<select id="date_lineGraph" class="form-control" required >
						  <option value="0">Please Select Year</option>
						  <option value="2016" >2016</option>
						  <option value="2015">2015</option>
						  <option value="2014">2014</option>
						  <option value= "2013" >2013</option>
						</select>
						
						
						<select id="var1_lineGraph" class="form-control" required >
						  <option value="0">Please Select</option>
						  <option value= "Common Cold" >Common Cold</option>
						  <option value="Heart Disease">Heart Disease</option>
						  <option value="Sexually Transmitted Disease">Sexually Transmitted Disease</option>
						  <option value= "Anemia" >Anemia</option>
						  <option value="Diarrhea">Diarrhea</option>
						  <option value="Strep Throat">Strep Throat</option>
						  <option value= "Lung Cancer" >Lung Cancer</option>
						  <option value="Hepatitis B">Hepititis B</option>
						  <option value="Periodontal Disease">Periodontal Disease</option>
						  
						</select>
						<select id="var2_lineGraph" class="form-control"required>
						  <option value="0">Please Select</option>
						  <option value="Common Cold" >Common Cold</option>
						  <option value="Heart Disease">Heart Disease</option>
						  <option value="Sexually Transmitted Disease">Sexually Transmitted Disease</option>
						  <option value= "Anemia" >Anemia</option>
						  <option value="Diarrhea">Diarrhea</option>
						  <option value="Strep Throat">Strep Throat</option>
						  <option value= "Lung Cancer" >Lung Cancer</option>
						  <option value="Hepatitis B">Hepititis B</option>
						  <option value="Periodontal Disease">Periodontal Disease</option>
						 </select>
						 
						 
				</form>	
						
						<center>
							<button type="submit"  id="lineGraph_Btn" class="btn btn-info btn-lg text-center ">Compare</button>
							
						</center>
					</div>	
				</div>
			
			
		<div id="pie_control_panel">
		<form>
						<select id="var1" class="form-control" required >
						  <option value="0">Please Select</option>
						  <option value= "Common Cold" >Common Cold</option>
						  <option value="Heart Disease">Heart Disease</option>
						  <option value="Sexually Transmitted Disease">Sexually Transmitted Disease</option>
						  <option value= "Anemia" >Anemia</option>
						  <option value="Diarrhea">Diarrhea</option>
						  <option value="Strep Throat">Strep Throat</option>
						  <option value= "Lung Cancer" >Lung Cancer</option>
						  <option value="Hepatitis B">Hepititis B</option>
						  <option value="Periodontal Disease">Periodontal Disease</option>
						  
						</select>
						<select id="var2" class="form-control"required>
						  <option value="0">Please Select</option>
						  <option value= "Common Cold" >Common Cold</option>
						  <option value="Heart Disease">Heart Disease</option>
						  <option value="Sexually Transmitted Disease">Sexually Transmitted Disease</option>
						  <option value= "Anemia" >Anemia</option>
						  <option value="Diarrhea">Diarrhea</option>
						  <option value="Strep Throat">Strep Throat</option>
						  <option value= "Lung Cancer" >Lung Cancer</option>
						  <option value="Hepatitis B">Hepititis B</option>
						  <option value="Periodontal Disease">Periodontal Disease</option>
						  
						</select>
						<select id="var3" class="form-control">
						  <option value="0">Please Select</option>
						  <option value= "Common Cold" >Common Cold</option>
						  <option value="Heart Disease">Heart Disease</option>
						  <option value="Sexually Transmitted Disease">Sexually Transmitted Disease</option>
						  <option value= "Anemia" >Anemia</option>
						  <option value="Diarrhea">Diarrhea</option>
						  <option value="Strep Throat">Strep Throat</option>
						  <option value= "Lung Cancer" >Lung Cancer</option>
						  <option value="Hepatitis B">Hepititis B</option>
						  <option value="Periodontal Disease">Periodontal Disease</option>
						  
						</select>
						
						<select id="var4" class="form-control">
						  <option value="0">Please Select</option>
						  <option value= "Common Cold" >Common Cold</option>
						  <option value="Heart Disease">Heart Disease</option>
						  <option value="Sexually Transmitted Disease">Sexually Transmitted Disease</option>
						  <option value= "Anemia" >Anemia</option>
						  <option value="Diarrhea">Diarrhea</option>
						  <option value="Strep Throat">Strep Throat</option>
						  <option value= "Lung Cancer" >Lung Cancer</option>
						  <option value="Hepatitis B">Hepititis B</option>
						  <option value="Periodontal Disease">Periodontal Disease</option>
						  
						</select>
					</form>	
						
						<center>
							<button type="submit" name="Compare" id="pie_Btn" class="btn btn-info btn-lg text-center ">Compare</button>
							<br><br>
							<!--<button type="submit" name="Compare" id="line_Btn" class="btn btn-info btn-lg text-center ">Compare</button>-->
						
						<div id="resultMessage" >
							
							<ul id="results_sideBar" class="list-group">
							    
							  </ul>
							
						</center>
						
				</div>
			</div>
			
						
	
	</div><!--/.sidebar-->
	
	<div  id="stats_home" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
		<div class="shadow">
			
			<center>
				<div class="statsContainer">
					<div class="canvas-wrapper">
						<br><br>
						<div id="notation-PieChart"></div><br><br><br>
							<canvas class="main-chart" id="line-chart" height="360" width="700"></canvas>
						</div>
					
						
					<center>
						<div id="Data_welcome_msg">
							<center><br><br><br><br><br><br><br>
								<img src="img/medipass_logo.png" class="img-responsive" alt="MediPass Logo">
							</center><br>
							<h1>Your Data Comparisons</h1>
							<h2>Will be displayed here</h2>
						</div>
					</center><br>
					
					
						
						
					
						<div id="lineGraph_DataStats" style="height:70%; width:90%"class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" style="height:70%; width:90% "></canvas>
						</div>
					 <div id="ChartPie_DataStats"class="canvas-wrapper">
							<canvas class="chart" id="pie-chart" ></canvas>
					</div>
				</div>
			</center>
		</div>
	</div>
	
	<div  id="stats" class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Charts</h1>
				
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				
				<div class="panel panel-default">
					<div class="panel-heading">Line Chart</div>
					
					<div class="panel-body">
						
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		
	
											
	</div>	<!--/.main-->
	  

	<!--<script src="js/jquery-1.11.1.min.js"></script>-->
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<!--<script src="js/chart-data.js"></script>-->
	<script src="js/lineChart.js"></script>
	<script src="js/pieChart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
													
	<script>
		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
