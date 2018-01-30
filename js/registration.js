// JavaScript File
  /* global $ */
   
  function processRegistration(){
                                 
    var firstname = document.getElementById("fname").value;                              //Javascript takes input from user and stores in local variable.
    var surname = document.getElementById("sname").value;                                //Javascript takes input from user and stores in local variable.
    var email = document.getElementById("email").value;                                  //Javascript takes input from user and stores in local variable.
    var password = document.getElementById("password").value;                            //Javascript takes input from user and stores in local variable.
     
    $.ajax({                                                                             //Ajax function starts
        type: "POST",                                                                    //Uses a method called post, which is used to post variables stored above.
        url: "../phpFunctions/registration.php",                                                      //the location these variables will be sent to.
      data: { firstname: firstname, surname: surname, email: email, password: password}  //The variables we wish to post.
      }).done(function( msg ) {                                                          //when variables posted, creates msg.
      alert( "Account is registered");     
     
    });
    alert('Email has been sent to '+email+'. Please verify your account');
    location.href = "http://www.example.com/ThankYou.html";
}
  

  
  
  
