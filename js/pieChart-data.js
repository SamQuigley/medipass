// JavaScript File
  /* global $ */


$(document).ready(function() {

    
    


    $('#pie_Btn').click(function() {
    $('#Data_welcome_msg').hide();
    
    $('#lineGraph_DataStats').hide();
    $('#line-chart').hide();
    $('#pie-chart').show();
    $('#results_sideBar').empty();
    $('#notation-PieChart').empty();   
    var var_1 = document.getElementById("var1").value;                                  //Javascript takes input from user and stores in local variable.
    var var_2 = document.getElementById("var2").value; 
    var var_3 = document.getElementById("var3").value;                                  //Javascript takes input from user and stores in local variable.
    var var_4 = document.getElementById("var4").value;
    
    if(var_1 == 0 && var_2 == 0 && var_3 == 0 && var_4 == 0){
         $('#Data_welcome_msg').show();
         $('#resultMessage').hide();
    }
    
            $.ajax({
               type: "POST", 
               url: '../phpFunctions/pieCharts.php',
               data: { var_1: var_1, var_2: var_2, var_3: var_3, var_4: var_4},
               success: function (response) {//response is value returned from php
                    
                    var datachart = JSON.parse(response);
                    
                    var var_1_Qty = (datachart[0].value);
                    var var_2_Qty = (datachart[1].value);
                    var var_3_Qty = (datachart[2].value);
                    var var_4_Qty = (datachart[3].value);
                    
                    $('#resultMessage').show();
                   
                    if(var_1 != 0){
                        
                        
                    $("#results_sideBar").append("<li class='list-group-item' style='background-color:#30a5ff; color:white; font-size:150%;'>"+var_1+ " ("+var_1_Qty+")</li>");
                    // $("#results_sideBar").html("<h3 style='color:#30a5ff'>- "+var_1+" ("+var_1_Qty+")</h3>");
                    $("#notation-PieChart").append("<h1 style='color:#30a5ff; display:inline'> "+var_1+"</h1>");
                    }
                   
                    if(var_2 != 0){
                    $("#results_sideBar").append("<li class='list-group-item' style='background-color:#ffb53e; color:white; font-size:150%;'>"+var_2+ " ("+var_2_Qty+")</li>");
                    $("#notation-PieChart").append("<h3 style='display:inline;'> vs. </h3><h1 style='color:#ffb53e; display:inline'> "+var_2+"</h1>");
                    }
                    
                    if(var_3 != 0){
                    $("#results_sideBar").append("<li class='list-group-item' style='background-color:#1ebfae; color:white; font-size:150%;'>"+var_3+ " ("+var_3_Qty+")</li>");
                    $("#notation-PieChart").append("<h3 style='display:inline;'> vs. </h3><h1 style='color:#1ebfae; display:inline'> "+var_3+"</h1>");
                    }
                    
                    if(var_4 != 0){
                    $("#results_sideBar").append("<li class='list-group-item' style='background-color:#f9243f; color:white; font-size:150%;'>"+var_4+ " ("+var_4_Qty+")</li>");
                    $("#notation-PieChart").append("<h3 style='display:inline;'> vs. </h3><h1 style='color:#f9243f; display:inline'> "+var_4+"</h1>");
                    }
                    if(var_1 == 0 && var_2 == 0 && var_3 == 0 && var_4 == 0){
                         $('#Data_welcome_msg').show();
                         $('#resultMessage').hide();
                    }
                               
                    
                    var chart4 = document.getElementById("pie-chart").getContext("2d");
                    window.myPie = new Chart(chart4).Pie(datachart, {responsive : true
	                });
                }
        });
    })
});


    





