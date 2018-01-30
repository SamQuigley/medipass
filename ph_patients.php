<?php	
	
	
	include('phpFunctions/SessionCheck.php');
	include('phpFunctions/physicianDetails.php');
	include('phpFunctions/patientDetails.php');
	include('phpFunctions/medicalrecordDetails.php');
	


?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MediPass - <?php echo $physicianName.' '.$physicianSurname;?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<script type="text/javascript" src="js/ViewPatientBio.js"></script>
<script type="text/javascript" src="js/viewRecord.js"></script>

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
				<a class="navbar-brand text-center" href="#"><span>Physician</span>Dashboard</a>
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
			<li class="active"><a href="ph_patients.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Patients</a></li>
			<li><a href="ph_statistics.php"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Statistics</a></li>
		</ul>
	
	
						
						<div  class="panel panel-blue" id="patientDetailsDiv" style="display:none;">
						<div class="panel-heading"><h3>Patient Details</h3></div>
						<div class="panel-body">
							
							
							<i class="glyphicon glyphicon-user"></i><label for="PatientName"> Name</label><i id="PatientName"></i>
							<i class="fa fa-birthday-cake"></i><label for="age"> Age</label><i id="age"></i>
							<i class="glyphicon glyphicon-earphone"></i><label for="phMobile">Phone (Mobile)</label></label><i id="phMobile"></i>
							<i class="glyphicon glyphicon-home"></i><label for="phHome"> Phone (Home)</label><i id="phHome"></i>
							<i class="fa fa-intersex"></i><label for="sex"> Gender</label><i id="sex"></i>
							<i class="glyphicon glyphicon-check"></i><label for="ppsn">PPSN</label><i id="ppsn"></i>
						</div>
			</div>
	
	
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		<div class="row" id="patientList">
			<div class="col-lg-12">
				<div class="panel">
					<div class="panel-heading" id="patientsTableheader">
						
						<center>
							<h2 style="margin-top:10px;	">PATIENTS</h2>
						</center>
						
					</div>
					<!--<form role="search" style="width:250px; float:right;" >-->
					<!--<div class="form-group">-->
					<!--	<input type="text" id="search" class="form-control" placeholder="Search">-->
					<!--</div>-->
					<!--</form>-->
					<div class="panel-body">
						<?php require ('PatientsList.php');?>
					</div>
					
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
					
				
						
					</div>
				</div>
			</div><!--/.row-->	<!--/.row-->
			
			<div class="row" id="medicalRecords" style="display:none;">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div id="medicalRecordsTableHeader" class="panel-heading">
							<button type="button" href="phpFunctions/resetpatientId_Recs.php" id="patBioBackBtn" style="float:left;" class="btn btn-sm btn-info" ><span class="glyphicon glyphicon-arrow-left"></span>RETURN</button>
						
								<h2 id="recordTableHeader">MEDICAL RECORDS</h2>
							<button id="addRecordBtn" class='btn btn-md btn-success' data-toggle='modal' data-target='#addRecordModal'><span class='glyphicon glyphicon-plus'>ADD NEW RECORD</button>
						</div>
						
						<div class="panel-body">

							<table class='table table-striped'>
								<thead class='thead-default'>
									<tr>
										<th>No.</th>
		                                <th>Case</th>
		                                <th>Referral Doctor</th>
		                                <th>Date</th>
		                                <th></th>
                            		</tr>
								</thead>
								<tbody id="table"></tbody>
								<div id="error"></div>
								</table>
						</div>
					</div>
				</div>
			</div><!--/.row-->	<!--/.row-->
			
			<div class="modal fade" id="medicalRecModal" role="dialog">
						   
						    <div class="modal-dialog">
								
						        <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        	<div id="recordDate"></div>
						        	<h2 style="margin-top:0;">MEDICAL RECORD</h2>
						        </div>
						        
						        <!--<h3 style="display: inline">Subject</h3>-->
						        <div style="display: inline" id="recordSubject" class="modal-body">
						        </div>
						        <hr>
						        <h4 style="display:inline;style: underline;text-decoration: underline;">DESCRIPTION</h4><div id="recordNote" class="modal-body">
						        </div>
						        
						        <div class="modal-footer">
						        	
						          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
						        </div>
						      </div>
			</div>
						  
						  
			<div class="modal fade" id="addRecordModal" role="dialog">
						    <div class="modal-dialog">
						    
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modalHeader text-center">NEW MEDICAL RECORD</h4>
						        </div>
						        <div class="modal-body form-group">
						          <form class="add_med_record" >
						          	
						          		<label for="comment">Subject</label>
						          		<input type="text" name="new-case" class="form-control">
									 	<label for="comment">Description</label>
  										<textarea style="resize: none;" class="form-control" name="new-note" rows="5"></textarea>
  											        	
  										<input id="addRecordBtn2" type="submit" value="ADD RECORD" >

									</form> 
						        </div>
						        
						        <div class="modal-footer">
						          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
						        </div>
						      </div>
						      
						    </div>
						  </div>
		
		
		
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
<!--	<script src="js/bootstrap.min.js"></script>-->
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	
	<script>
	
		add_task(); // Call the add_task function
		

		function add_task() {

			$('.add_med_record').submit(function(){
			
			var new_case = $('.add_med_record input[name=new-case]').val();
			var new_note = $('.add_med_record textarea[name=new-note]').val();
			var physicianId = <?php echo $physicianId ?>;
				
			if(new_case != '' && new_note != ''){

			$.post('phpFunctions/addRecord.php', { new_case: new_case, new_note: new_note, physicianId: physicianId }, function( data ) {
					
			$('#table').prepend(data).hide().fadeIn();
		
			$('.add_med_record input[name=new-case]').val('');
			$('.add_med_record textarea[name=new-note]').val('');
					});
				}

				return false; // Ensure that the form does not submit twice
			});
		}
	
	
	
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
