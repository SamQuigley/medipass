// JavaScript File
/* global $ */
function viewPatientBio(patientId) {


    $("#patientDetailsDiv").show();
    $("#patientList").hide();
    $("#patientBio").show();
    $("#medicalRecords").show();
    $("#table").show();

    $.ajax({ //Ajax function starts
        type: "POST", //Uses a method called post, which is used to post variables stored above.
        url: "../phpFunctions/patientBio.php", //the location these variables will be sent to.
        data: {
            patientId: patientId
        } //The variables we wish to post.
    }).done(function(response) {

        response = JSON.parse(response);
        $("#patBioBackBtn").show();
        $("#PatientName").html("<p>" + response[0].patientName + " " + response[0].patientSurname + "</p>");
        $("#age").html("<p>" + response[0].age + "</p>");
        $("#phMobile").html("<p>" + response[0].telephoneMobile + "</p>");
        $("#phHome").html("<p>" + response[0].telephoneHome + "</p>");
        $("#sex").html("<p>" + response[0].sex + "</p>");
        $("#ppsn").html("<p>" + response[0].ppsn + "</p>");

    });

    $.ajax({ //Ajax function starts
        type: "POST", //Uses a method called post, which is used to post variables stored above.
        url: "../phpFunctions/patientMedRecs.php", //the location these variables will be sent to.
        data: {patientId: patientId } //The variables we wish to post.
    }).done(function(response) {
        
        if (response == 0) {
            $("#table").hide();
            $("#error").show();
            $("#error").html("<span style='color:#cc0000'>* Error: No records founds !</span>");

        }
        else {
            response = JSON.parse(response);
            var tr;
            for (var i = 0; i < response.length; i++) {
                tr = $('<tr/>');
                tr.append("<td>" + response[i].recordId + ".</td>");
                tr.append("<td>" + response[i].case + "</td>");
                tr.append("<td>" + response[i].physicianName + " "+response[i].physicianSurname+ "</td>");
                tr.append("<td>" + response[i].date + "</td>");
                tr.append("<td><button id='viewRecordBtn' class='btn btn-sm btn-info' data-toggle='modal' data-target='#medicalRecModal' onclick=\"viewPatientRecord(" + response[i].recordId + ")\">VIEW RECORD</button></td>")
                $('#table').append(tr);


            }

        }
    });
}




$(document).ready(function() {
    $("#patBioBackBtn").click(function() {
        $('.add_med_record input[name=new-case]').val('');
		$('.add_med_record textarea[name=new-note]').val('');
        $("#table").empty();
        $("#patientList").show();
        $("#patientBio").hide();
        $("#medicalRecords").hide();
        $("#error").hide();
        $("#patientDetailsDiv").hide();
    });
});


