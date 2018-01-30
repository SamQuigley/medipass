<?php	
	include('phpFunctions/SessionCheck.php');
	include('phpFunctions/patientDetails.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MediPass - <?php echo $patientName." ".$patientSurname;?></title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="css/modalStyling.css" rel="stylesheet">

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
<script src="js/pa_viewRecord.js"></script>
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

 </style>

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
				<a class="navbar-brand" href="#"><span>PATIENT</span>DASHBOARD</a>
				<ul class="user-menu">
					<a href="phpFunctions/logout.php" class=" btn btn-danger" ><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<center><h2><?php echo $patientName." ".$patientSurname;?></h2></center>
		<img src="img/medipass_logo.png" id="navbar_logo"  class="img-responsive"/>
		<ul class="nav menu">
			<li class="active"><a href="pa_myrecords.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> My Records</a></li>
			<li><a href="pa_mydetails.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> My Details</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">My Medical Records</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Record Table<input type='text' style='width:400px; float:right; ' id='search' class='form-control' placeholder='Search'></div>
					<div class="panel-body">
						<?php require('phpFunctions/pa_viewRecords.php'); ?>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		<div class="modal fade" id="medicalRecModal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<div id="recordDate"></div>
		        	<h2>MEDICAL RECORD</h2>
		        </div>
				<div id="recordSubject" class="modal-body">
				</div>
				<hr>
				 <h3>Description</h3>
				 <div id="recordNote" class="modal-body">
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-warning centered" data-dismiss="modal">Close</button>
				 </div>
			</div>
		 </div>
		
		
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	
	<script>
					$("#search").keyup(function () {
    var value = this.value.toLowerCase().trim();

    $("table tr").each(function (index) {
        if (!index) return;
        $(this).find("td").each(function () {
            var id = $(this).text().toLowerCase().trim();
            var not_found = (id.indexOf(value) == -1);
            $(this).closest('tr').toggle(!not_found);
            return not_found;
        });
    });
});
					</script>
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
