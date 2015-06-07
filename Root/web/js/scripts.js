/**
 * Created by 11791 on 1/06/2015.
 */

/*
* Used by JobFunctionsView.php
**/
function jobFunctionSelectChanged() {
    // this funtion will be called whenever the user selects a function from the dropdown
    // fetchcompetences wordt gebruikt om in de div fetchCompetencesDiv te steken
    // nadat de php pagina is ingeladen wordt op elek questionssection class div fetchdata toegepast die data uit de controller haalt.
    HideButtons();
    var cdiv = $("#fetchCompetencesDiv");
    cdiv.html("<img src='img/loading.gif' width='30'/><span>Loading...</span>"); // making a loading effect
    var select = document.getElementById("jobTitleSelect");
    var id = select.options[select.selectedIndex].value; // gets the JobFunction Id

    $.ajax({
        type: "GET",
        url: "../app/views/ComptencesView.php",
        data: {q: id},
        success: function (msg) {
            cdiv.html(msg);
            // Unhide buttons
            $("#QSubmit").removeClass("hidden");
            $("#ShowAll").removeClass("hidden");
            $("#AddQuestionButton").removeClass("hidden");
        },
        error: function () {
            alert("failure");
        }
    });
}

function HideButtons() {
    // Hide buttons
    $("#QSubmit").addClass("hidden");
    $("#ShowAll").addClass("hidden");
    $("#AddQuestionButton").addClass("hidden");
}

function FillModelWithQuestions() {
    var out = "";
    $("input:checked").parent().next("div").find("label").each(function () {
        out += $(this).text() + "</br>";
    });

    $("#reportBody").html(out);
}

function FillModalAddQuestionSelect() {
    //
    var select = $('#competenceSelect');

    $("div[id^='questionssection']").each(function () { // for each question section
        select.append($('<option></option>') // add an option to the select element
            .val(this.id.substring(16)) // with value question section Id (competence Id)
            .html($(this).find(".panel-title").text())); // and as text the competence
    });
}

function showAll() {
    $("div[id^='questionssection']").collapse('show');
    $("#ShowAll").addClass("hidden");
}

function sendQuestion() {
    $.ajax({
        type: "POST",
        url: "../BLL/AddQuestion.php", //process to mail
        data: $('form#formAddQuestion').serialize(),
        success: function (msg) {
            $("#testdiv").html(msg); //hide button and show thank you
            $("#interviewForm").empty();
            HideButtons();
            $("#AddQuestionModal").modal('hide'); //hide popup
            window.setTimeout(function () {
                location.reload()
            }, 3000); // refresh the page after 3 seconds
        },
        error: function () {
            alert("failure");
        }
    });
}


/*
* Function to request data for report
* */
function getReport(jsonObj) {
    $.ajax({
        type: "POST",
        url: "../BLL/CreateReport.php",
        data: jsonObj,
        success: function (msg) {
            window.location = "../BLL/Download.php?filename=" + msg , "_blank"; //hide button and show thank you
        },
        error: function () {
            alert("failure");
        }
    });
}

/*
* Toggle the clicked competence
* */
function handleCompetenceClick(id) {
    $("#questionssection" + id).toggle();
}

/*
 * Button to get and download the report
 * */
$(document).ready(function() {
    $('#QSubmit').click(function () {
        $('#report').modal();
        FillModelWithQuestions();
    });

    $('#GetPdf').click(function () {
        var func = document.getElementById('jobTitleSelect');
        var jobTitle = func.options[func.selectedIndex].value;

        var ids = [];
        $("input.questionsCheck:checked").each(function() {
            ids.push(this.id.substring(9));
        });

        var result = {"functionId": jobTitle};
        result.questionId = ids;
        var jsonObj = JSON.stringify(result);
        getReport(jsonObj);
    });

    /*
     * Add question button
     * */
    $('#AddQuestionButton').click(function () {
        $('#AddQuestionModal').modal();
        FillModalAddQuestionSelect();
    });

    /*
     * Collapse for collapsing the questions in the fetchCompetences.php
     * */
    $(".collapse").collapse();
});
