// JavaScript File
  /* global $ */
   
  function processLogin(){
    
    var email = document.getElementById("email").value;                                  //Javascript takes input from user and stores in local variable.
    var password = document.getElementById("password").value;                            //Javascript takes input from user and stores in local variable.
    if (email.indexOf("@") >= 1) {
      
      
       $.ajax({                                                                             //Ajax function starts
        type: "POST",                                                                    //Uses a method called post, which is used to post variables stored above.
        url: "../phpFunctions/patientLogin.php",                                                             //the location these variables will be sent to.
      data: { email: email, password: password},                                          //The variables we wish to post.
     
         
       }).done(function( response ) {                                                         //when variables posted, creates msg.
                
                if(response == 0){
                  $("#error").html("<span style='color:#cc0000'>* Error: Invalid email or password !</span>");
                  document.getElementById("email").style.borderColor = "#E34234";
                  document.getElementById("password").style.borderColor = "#E34234";
                  $('#email').val(''); 
                  $('#password').val(''); 
                }
                else{
                  
                  location.href = (response);
                }
                
    });

} else {
  
    $.ajax({                                                                             //Ajax function starts
        type: "POST",                                                                    //Uses a method called post, which is used to post variables stored above.
        url: "../phpFunctions/physicianLogin.php",                                                             //the location these variables will be sent to.
      data: { email: email, password: password}                                          //The variables we wish to post.
      }).done(function( response ) {                                                         //when variables posted, creates msg.
                if(response == 0){
                  $("#error").html("<span style='color:#cc0000'>* Error: Invalid email or password !</span>");
                  document.getElementById("email").style.borderColor = "#E34234";
                  document.getElementById("password").style.borderColor = "#E34234";
                  $('#email').val(''); 
                  $('#password').val(''); 
                }
                else{
                  location.href = (response);
                }
                
        
      });

}
    
    
}