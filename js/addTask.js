// JavaScript File
  /* global $ */
    function addTask(){
        alert ("Task has been added");
        var taskDescription = document.getElementById("taskInput").value;
        
        alert(taskDescription);
        
            $.ajax({                                                //Ajax function starts
            type: "POST",                                           //Uses a method called post, which is used to post variables stored above.
            url: "../phpFunctions/addTask.php",                     //the location these variables will be sent to.
            data: { taskDescription: taskDescription}               //The variables we wish to post.
            }).done(function( msg ) {                               //when variables posted, creates msg.
            alert( "Task Saved: " + msg );
            });
    }
