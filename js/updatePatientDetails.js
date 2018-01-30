// JavaScript File
  /* global $ */
    
    function updatePatientDetails(){

    
    var age = document.getElementById("age").value;                              //Javascript takes input from user and stores in local variable.
    var mobileNum = document.getElementById("telephoneMobile").value;                                  //Javascript takes input from user and stores in local variable.
    var homeNum = document.getElementById("telephoneHome").value;
    var county = document.getElementById("county").value; 
    var eircode = document.getElementById("eircode").value; 
    var sex = document.getElementById("sex").value; 
    var ppsn = document.getElementById("ppsn").value; 
    var medicalCard = document.getElementById("medicalCard").value;


    $.ajax({
	     url: '../phpFunctions/updatePatient.php',
	     type: 'post',
	     data: { age: age, mobileNum: mobileNum, homeNum: homeNum, county: county, eircode: eircode, sex: sex, ppsn: ppsn, medicalCard: medicalCard},
       async: false,
	     success: function(data){
        
        alert('Profile Updated');
        
         
	     },
	     cache: false
    });
  }

    






   
