// JavaScript File
/* global $ */
function confirmPassword() {
    var pass1 = document.getElementById("password").value;                                  //Create local variable and assign the value from password field.
    var pass2 = document.getElementById("confirmpassword").value;                           //Create local variable and assign the value from confirmPassword field.
    var ok = true;                                                          
    if (pass1 != pass2) {                                                                   //Checks the 2 variables, to see if they do not match.
        $("#errorMsg").html("<span style='color:#cc0000'>* Error: Passwords did not match !</span>");  //Pop up box displaying message if passwords don't match.
        document.getElementById("password").style.borderColor = "#E34234";                  //If passwords dont match, set border colour to red.
        document.getElementById("confirmpassword").style.borderColor = "#E34234";           //If passwords dont match, set border colour to red.
// document.getElementById("confirmpassword").setCustomValidity("Passwords Don't Match");
        $('#password').val('');                                                             //passowrd doesn't match, this sets input field back to blank.
        $('#confirmpassword').val('');                                                      //passowrd doesn't match, this sets input field back to blank.
        ok = false;
    }
    else {                                                                                  //If passwords do match, it will execute following...
                                                            //Alerts message letting user know passwords match.
        processRegistration();  
        //calls the function processRegistration, which uses javascript to take user inputs, then ajax to post variables to registration.php.
    }
    location.href = "login.html";
    return ok;                                                                              //returns ok
}