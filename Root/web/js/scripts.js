/**
 * Created by 11791 on 1/06/2015.
 */

/*
* Used by JobFunctionsView.php
**/
function jobFunctionSelectChanged() {
    // Will be called whenever the user selects a job function from the dropdown
    // CompetencesView will used inside the div fetchCompetencesDiv, fetched with Ajax

    HideButtons();
    var cdiv = $("#fetch-competences-div");
    cdiv.html("<img src='img/loading.gif' width='30'/><span>Loading...</span>"); // making a loading effect

    var select = document.getElementById("jobfunction-select");
    var id = select.options[select.selectedIndex].value; // gets the JobFunction Id

    $.ajax({
        type: "GET",
        url: "../app/views/CompetencesView.php",
        data: {q: id},
        success: function (msg) {
            cdiv.html(msg);
            // Unhide buttons
            $("#modal-report-button").removeClass("hidden");
            $("#show-all-button").removeClass("hidden");
            $("#add-question-button").removeClass("hidden");
        },
        error: function () {
            alert("failure");
        }
    });
}

function HideButtons() {
    // Hide buttons
    $("#modal-report-button").addClass("hidden");
    $("#show-all-button").addClass("hidden");
    $("#add-question-button").addClass("hidden");
}

// user clicks "Laat alles zien" button
function showAll() {
    // all questionssection are shown
    $("div[id^='questionssection']").collapse('show');

    // hide the button since it is no longer needed
    $("#show-all-button").addClass("hidden");
}

// user clicks "Voeg Toe" button
function sendQuestion() {
    // with Ajax send the serialized form to AddQuestion.php
    $.ajax({
        type: "POST",
        url: "../BLL/AddQuestion.php",
        data: $('form#form-add-question').serialize(),
        success: function (msg) {
            //$("#testdiv").html(msg); //hide button and show thank you
            $("#interview-form").empty();
            $("#interview-form").html(msg);
            HideButtons();
            $("#add-question-modal").modal('hide'); //hide popup
            //$('#jobfunction-select').load('../app/views/JobFunctionsView.php');

            // maak hier een nieuwe methode die opnieuw ajax gebruikt om JobFunctionsView te vernieuwen met als querystring de nu geselecteerde jobfunctie
        },
        error: function () {
            alert("Something went wrong, please try again.");
        }
    });
}

/*
* Toggle the clicked competence
* */
function handleCompetenceClick(id) {
    $("#questionssection" + id).toggle();
}

$(document).ready(function() {
    // user clicks the "Rapport" button
    $('#modal-report-button').click(function () {
        // Show the report modal
        $('#report-modal').modal();

        // print out each question in the body of the modal fordoublecheck.
        var out = "";
        $("input:checked").parent().next("div").find("label").each(function () {
            out += $(this).text() + "</br>";
        });
        $("#report-body").html(out);
    });

    // user clicks the "Download PDF" button
    $('#get-report-button').click(function () {
        // gets the Id of the selected function
        var func = document.getElementById('jobfunction-select');
        var jobTitle = func.options[func.selectedIndex].value;

        // creates an array of selected questions
        var ids = [];
        $("input.questionsCheck:checked").each(function() {
            ids.push(this.id.substring(9));
        });

        // combine into a JSON object
        var result = {"functionId": jobTitle};
        result.questionId = ids;
        var jsonObj = JSON.stringify(result);

        // send it to the server with AJAX
        // upon receiving a result, send it to Download.php to to download the file that was created.
        $.ajax({
            type: "POST",
            url: "../BLL/CreateReport.php",
            data: jsonObj,
            success: function (msg) {
                window.location = "../BLL/Download.php?filename=" + msg , "_blank"; //hide button and show thank you
            },
            error: function () {
                alert("The pdf file was not ready for download. Please try again.");
            }
        });
    });

    // user clicks the "Voeg vraag toe" button
    $('#add-question-button').click(function () {
        // Show the add question modal
        $('#add-question-modal').modal();

        var select = $('#competence-select');
        $("div[id^='questionssection']").each(function () { // for each question section
            select.append($('<option></option>') // add an option to the select element
                .val(this.id.substring(16)) // with value question section Id (competence Id)
                .html($(this).find(".panel-title").text())); // and as text the competence
        });
    });

    /*
     * Collapse for collapsing the questions in the fetchCompetences.php
     * */
    $(".collapse").collapse();
});
