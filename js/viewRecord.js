// JavaScript File

function viewPatientRecord(recordId){
    
                $.ajax({                                                //Ajax function starts
                type: "POST",                                           //Uses a method called post, which is used to post variables stored above.
                url: "../phpFunctions/viewRecord.php",                     //the location these variables will be sent to.
                data: { recordId: recordId}               //The variables we wish to post.
                }).done(function( response ) {
                
                response = JSON.parse(response);
                 
                $("#recordSubject").html("<p>"+response[0].subject+"</p>");
                $("#recordNote").html("<p>"+response[0].notes+"</p>");
                $("#recordDate").html("<p>"+response[0].date+"</p>");
               
        });
}