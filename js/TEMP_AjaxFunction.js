// JavaScript/Ajax File
/*
    This is our little function that we created today. Essentiall what we are trying to do here
    is to capture some information from the user and pass it over to the server via an ajax request.
    Once we get some information back from our PHP page we need to consider what we are going to do...in
    the example code below:

    - if we get the string "Success" coming back from the server this means that the requested user is in
      the database, and in that case we manipulate the DOM and hide the loginStuff div and show the member
      div

    - if we get anything else coming back from the PHP query we simple hide the loginStuff div and show the
      unknown div

    Once you can interact with a user and then engage with a database and respond appropriately by manipulating
    the DOM you can complete all the components of your project
*/
  function processLogin(){
    alert("The processLogin function has been created");
    var username = document.getElementById("user").value;
    var password = document.getElementById("pass").value;


    $.ajax({
	     url: './lib/processLogin.php',
	     type: 'post',
	     data: {username: username, password: password},
       async: false,
	     success: function(data){
         if(data == "Success"){
           document.getElementById("loginStuff").style.display = "none";
           document.getElementById("member").style.display = "inline";
         }
         else{
           document.getElementById("loginStuff").style.display = "none";
           document.getElementById("unknown").style.display = "inline";
         }
	     },
	     cache: false
    });
  }
