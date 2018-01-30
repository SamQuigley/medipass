<?php
	include('phpFunctions/SessionCheck.php');
	include('phpFunctions/physicianDetails.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<META HTTP-EQUIV="refresh" CONTENT="1800;URL=../phpFunctions/logout.php?timeout"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MediPass - <?php echo $physicianName.' '.$physicianSurname;?></title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="css/todolist.css" rel="stylesheet">

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

<!-- Scripts -->

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
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
				<div ><a class="navbar-brand" href="#"><span>Physician</span>Dashboard</a></div>
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
			<li class="active"><a href="ph_dashboard.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="ph_patients.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Patients</a></li>
			<li><a href="ph_statistics.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Statistics</a></li>
		
        	
			
			<li role="presentation" class="divider"></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		<div class="row">
			
			
			<div class="col-md-6">
			
		
			
				<div class="panel panel-default" id="todoListDiv">
					<div class="panel-heading dark-overlay"><svg class="glyph stroked clipboard-with-paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg>To-do List</div>
					<div class="panel-body">
					
		
			<div class="wrap">
				<div class="task-list">
			<ul>

			<?php 
				require("phpFunctions/pa_listTasks.php");
				?>
			</ul>
		</div>
		<form class="add-new-task" autocomplete="off">
			<input type="text" name="new-task" class="form-control" placeholder="Add a new item..." />
		</form>
		</div>
	</div>
	
</div>
	</div><!-- #wrap -->
			
				<div class="col-md-5">
			
				<div class="panel" >
					<div class="panel-heading dark-overlay" style="color:white; background-color: #ff0000"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Calendar</div>
					<div class="panel-body" >
						<div id="calendar"></div>
					</div>
				</div>
				</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	
	
	
	
	
	
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<!--<script src="TodoList/taskFunctions.js"></script>-->
	<script>
		
		add_task(); // Call the add_task function
		delete_task(); // Call the delete_task function

		function add_task() {

			$('.add-new-task').submit(function(){

				var new_task = $('.add-new-task input[name=new-task]').val();

				if(new_task != ''){

					$.post('phpFunctions/add-task.php', { task: new_task }, function( data ) {

						$('.add-new-task input[name=new-task]').val('');

						$(data).appendTo('.task-list ul').hide().fadeIn();

						delete_task();
					});
				}

				return false; // Ensure that the form does not submit twice
			});
		}

		function delete_task() {

			$('.delete-button').click(function(){

				var current_element = $(this);

				var id = $(this).attr('id');

				$.post('phpFunctions/delete-task.php', { task_id: id }, function() {

					current_element.parent().fadeOut("fast", function() { $(this).remove(); });
				});
			});
		}

	</script>
	
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
