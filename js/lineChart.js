// JavaScript File
  /* global $ */


$(document).ready(function() {

    $('#lineGraph_Btn').click(function() {
    $('#Data_welcome_msg').hide();
    
    $('#pie-chart').hide();
    $('#line-chart').show();
    $('#results_sideBar').empty();
    $('#notation-PieChart').empty(); 
    
    var date_lineG = document.getElementById("date_lineGraph").value;
    var var_1_lineG = document.getElementById("var2_lineGraph").value;  
    var var_2_lineG = document.getElementById("var1_lineGraph").value;  

    
    $.ajax({
       type: "POST", 
       url: '../phpFunctions/lineGraphTest.php',
       data: { date_lineG: date_lineG, var_1_lineG: var_1_lineG, var_2_lineG: var_2_lineG},
       success: function (response) {//response is value returned from php
            
            
            var lineChartData  = JSON.parse(response);
            
             var var_1_Winter = (lineChartData[0].var_1_Winter);
             var var_1_Spring = (lineChartData[0].var_1_Spring);
             var var_1_Summer = (lineChartData[0].var_1_Summer);
             var var_1_Autumn = (lineChartData[0].var_1_Autumn);
             
             var var_2_Winter = (lineChartData[1].var_2_Winter);
             var var_2_Spring = (lineChartData[1].var_2_Spring);
             var var_2_Summer = (lineChartData[1].var_2_Summer);
             var var_2_Autumn = (lineChartData[1].var_2_Autumn);
            
             var lineChartData = {
			labels : ["Winter","Spring","Summer","Autumn"],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(249,36,63,0.2)",
					strokeColor : "rgba(249,36,63,1)",            
					pointColor : "rgba(249,36,63,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [var_1_Winter,var_1_Spring,var_1_Summer,var_1_Autumn]
				},
				{
					label: "My Second dataset",
					fillColor : "rgba(48, 164, 255, 0.3)",
					strokeColor : "rgba(48, 164, 255, 1)",
					pointColor : "rgba(48, 164, 255, 1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(48, 164, 255, 1)",
					data : [var_2_Winter,var_2_Spring,var_2_Summer,var_2_Autumn]
				}
			]

		}
		
		
		           
                   
                    if(var_2_lineG != 0){
                    $("#results_sideBar").append("<li class='list-group-item' style='background-color:#30a5ff; color:white; font-size:150%;'>"+var_2_lineG+"</li>");
                    $("#notation-PieChart").append("<h1 style='color:#30a5ff; display:inline'> "+var_2_lineG+"</h1>");
                    }
                    
                    if(var_1_lineG != 0){
                        
                        
                    $("#results_sideBar").append("<li class='list-group-item' style='background-color:#f9243f; color:white; font-size:150%;'>"+var_1_lineG+"</li>");
                    // $("#results_sideBar").html("<h3 style='color:#30a5ff'>- "+var_1+" ("+var_1_Qty+")</h3>");
                    $("#notation-PieChart").append("<h3 style='display:inline;'> vs. </h3><h1 style='color:#f9243f; display:inline'> "+var_1_lineG+"</h1>");
                    }
                    
                    if(var_1_lineG == 0 && var_2_lineG == 0){
                         $('#Data_welcome_msg').show();
                         $('#resultMessage').hide();
                         $('#lineGraph_DataStats').hide();
                         $('#line-chart').hide();
                    }
                 $('#line-chart').show();     
            
            var chart1 = document.getElementById("line-chart").getContext("2d");
        	window.myLine = new Chart(chart1).Line(lineChartData, {
        		responsive: true
        	});
        }
});
    })
});



    





