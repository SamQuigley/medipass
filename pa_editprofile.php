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
<link href="css/styles.css" rel="stylesheet">

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
    
    
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!--Icons-->
<script src="js/lumino.glyphs.js"></script>
<script src="js/updatePatientDetails.js"></script>

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

<style>
   #notification {
   	width:300px;
  	position:absolute;
 			right:-400px; 
 			top:60px;
    
   -webkit-animation: fadeinout 5s linear forwards;
   animation: fadeinout 5s linear forwards;
}
@-webkit-keyframes fadeinout {
  0%,100% { }
 50% { position:absolute;
			right:-4px; 
			top:60; }
}

@keyframes fadeinout {
  0%,100% {  }
 20% { position:absolute;
 			right:-4px; 
 			top:60;
  			}
 60% { position:absolute;
 			right:-4px; 
 			top:60;
 			}
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
		<img src="img/medipass_logo.png" id="navbar_logo" class="img-responsive"/>
		<ul class="nav menu">
			<li><a href="pa_myrecords.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> My Records</a></li>
			<li class="active"><a href="pa_mydetails.php"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> My Details</a></li>
		</ul>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		
		
		<div id="notificationResponse">

		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">My Details</h1>
			</div>
		</div><!--/.row-->
									
		
		
		<div class="row">
			
			<div class="col-md-8">
				<ul class="nav nav-tabs" id="myTab">
					  	<li ><a href="pa_mydetails.php#profile">Profile</a></li>
					  	<li class="active"><a href="editprofile.php#editpro">Edit Profile</a></li>
					</ul>
				
				<div class="panel panel-default" >
					<!--<div class="panel-heading"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg> Contact Form</div>-->
					<div class="panel-body">
						<form class="form-horizontal" onsubmit="updatePatientDetails()" >
							<fieldset>
								<!-- Age input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="age">Age</label>
									<div class="col-md-9">
									<input id="age" name="age" type="text" placeholder="Your age" class="form-control">
									</div>
								    </div>
								
								<!-- telephone Mobile input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="telephoneMobile">Mobile number</label>
									<div class="col-md-9">
									<input id="telephoneMobile" name="telephoneMobile" type="text" placeholder="Mobile number" class="form-control" id="telephoneMobile">
									</div>
								    </div>
								<!-- telephon Home input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="username">Home telephone</label>
									<div class="col-md-9">
									<input id="telephoneHome" name="telephoneHome" type="text" placeholder="Landline number" class="form-control" id="telephoneHome">
									</div>
								    </div>
								    <!-- county -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="county">County</label>
									<div class="col-md-9">
									<select class="form-control" name="county" id="county">
										<option>Please Select...</option>
									    <option value="Antrim">Antrim</option>
									    <option value="Armagh">Armagh</option>
									    <option value="Carlow">Carlow</option>
									    <option value="Cavan">Cavan</option>
									    <option value="Clare">Clare</option>
									    <option value="Cork">Cork</option>
									    <option value="Derry">Derry</option>
									    <option value="Donegal">Donegal</option>
									    <option value="Down">Down</option>
									    <option value="Dublin">Dublin</option>
									    <option value="Fermanagh">Fermanagh</option>
									    <option value="Galway">Galway</option>
									    <option value="Kerry">Kerry</option>
									    <option value="Kildare">Kildare</option>
									    <option value="Kilkenny">Kilkenny</option>
									    <option value="Laois">Laois</option>
									    <option value="Leitrim">Leitrim</option>
									    <option value="Limerick">Limerick</option>
									    <option value="Longford">Longford</option>
									    <option value="Louth">Louth</option>
									    <option value="Mayo">Mayo</option>
									    <option value="Meath">Meath</option>
									    <option value="Monaghan">Monaghan</option>
									    <option value="Offaly">Offaly</option>
									    <option value="Roscommon">Roscommon</option>
									    <option value="Sligo">Sligo</option>
									    <option value="Tipperary">Tipperary</option>
									    <option value="Tyrone">Tyrone</option>
									    <option value="Waterford">Waterford</option>
									    <option value="Westmeath">Westmeath</option>
									    <option value="Wexford">Wexford</option>
									    <option value="Wicklow">Wicklow</option>
									</select>
									</div>
								</div>
								<!-- eircode input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="eircode">Eircode</label>
									<div class="col-md-9">
									<input id="eircode" name="eircode" type="text" placeholder="Eircode" class="form-control" id="eircode">
									</div>
								    </div>
								<!-- sex input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="sex"  name="sex">Sex</label>
									<div class="col-md-9">
										<select class="form-control" name="sex" id="sex">
										<option>Please Select...</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
									</div>
								    </div>
							    <!-- ppsn input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="ppsn">PPSN</label>
									<div class="col-md-9">
									<input id="ppsn" name="ppsn" type="text" placeholder="Your ppsn" class="form-control" id="ppsn">
									</div>
								    </div>
							     <!-- ppsn input-->
								<div class="form-group">
									
									<label class="col-md-3 control-label" for="MedicalCard" name="medicalCard">Medical Card</label>
									<div class="col-md-9">
												<label><input type="radio" name="medicalCard" value="1" id="medicalCard"> Yes	
												<input type="radio" name="medicalCard" value="0" id="medicalCard"> No</label>
									</div>
									
								    </div>
								
								
							
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<button type="submit" class="btn btn-default btn-md pull-right">Update</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				
				
				
			</div><!--/.col-->
						<div class="col-md-4">
			
				<div class="panel panel-blue" >
					<div class="panel-heading dark-overlay"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Calendar</div>
					<div class="panel-body">
						<div id="calendar"></div>
					</div>
				</div>
				
				
								
			</div><!--/.col-->
			
			
			<div class="col-md-4">

				
				<!--<div class="panel panel-blue">-->
				<!--	<div class="panel-heading dark-overlay"><svg class="glyph stroked clipboard-with-paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg>To-do List</div>-->
				<!--	<div class="panel-body">-->
				<!--		<ul class="todo-list">-->
				<!--		<li class="todo-list-item">-->
				<!--				<div class="checkbox">-->
				<!--					<input type="checkbox" id="checkbox" />-->
				<!--					<label for="checkbox">Make a plan for today</label>-->
				<!--				</div>-->
				<!--				<div class="pull-right action-buttons">-->
				<!--					<a href="#"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>-->
				<!--					<a href="#" class="flag"><svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg></a>-->
				<!--					<a href="#" class="trash"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg></a>-->
				<!--				</div>-->
				<!--			</li>-->
				<!--			<li class="todo-list-item">-->
				<!--				<div class="checkbox">-->
				<!--					<input type="checkbox" id="checkbox" />-->
				<!--					<label for="checkbox">Update Basecamp</label>-->
				<!--				</div>-->
				<!--				<div class="pull-right action-buttons">-->
				<!--					<a href="#"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>-->
				<!--					<a href="#" class="flag"><svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg></a>-->
				<!--					<a href="#" class="trash"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg></a>-->
				<!--				</div>-->
				<!--			</li>-->
				<!--			<li class="todo-list-item">-->
				<!--				<div class="checkbox">-->
				<!--					<input type="checkbox" id="checkbox" />-->
				<!--					<label for="checkbox">Send email to Jane</label>-->
				<!--				</div>-->
				<!--				<div class="pull-right action-buttons">-->
				<!--					<a href="#"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>-->
				<!--					<a href="#" class="flag"><svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg></a>-->
				<!--					<a href="#" class="trash"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg></a>-->
				<!--				</div>-->
				<!--			</li>-->
				<!--			<li class="todo-list-item">-->
				<!--				<div class="checkbox">-->
				<!--					<input type="checkbox" id="checkbox" />-->
				<!--					<label for="checkbox">Drink coffee</label>-->
				<!--				</div>-->
				<!--				<div class="pull-right action-buttons">-->
				<!--					<a href="#"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>-->
				<!--					<a href="#" class="flag"><svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg></a>-->
				<!--					<a href="#" class="trash"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg></a>-->
				<!--				</div>-->
				<!--			</li>-->
				<!--			<li class="todo-list-item">-->
				<!--				<div class="checkbox">-->
				<!--					<input type="checkbox" id="checkbox" />-->
				<!--					<label for="checkbox">Do some work</label>-->
				<!--				</div>-->
				<!--				<div class="pull-right action-buttons">-->
				<!--					<a href="#"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>-->
				<!--					<a href="#" class="flag"><svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg></a>-->
				<!--					<a href="#" class="trash"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg></a>-->
				<!--				</div>-->
				<!--			</li>-->
				<!--			<li class="todo-list-item">-->
				<!--				<div class="checkbox">-->
				<!--					<input type="checkbox" id="checkbox" />-->
				<!--					<label for="checkbox">Tidy up workspace</label>-->
				<!--				</div>-->
				<!--				<div class="pull-right action-buttons">-->
				<!--					<a href="#"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>-->
				<!--					<a href="#" class="flag"><svg class="glyph stroked flag"><use xlink:href="#stroked-flag"></use></svg></a>-->
				<!--					<a href="#" class="trash"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg></a>-->
				<!--				</div>-->
				<!--			</li>-->
				<!--		</ul>-->
				<!--	</div>-->
				<!--	<div class="panel-footer">-->
				<!--		<div class="input-group">-->
				<!--			<input id="btn-input" type="text" class="form-control input-md" placeholder="Add new task" />-->
				<!--			<span class="input-group-btn">-->
				<!--				<button class="btn btn-primary btn-md" id="btn-todo">Add</button>-->
				<!--			</span>-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</div>-->
								
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
		  

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

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
