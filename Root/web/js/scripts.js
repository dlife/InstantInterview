/**
 * Created by 11791 on 1/06/2015.
 */

/*
* Used to fetch the data from sql server
*
 */

function fetchdata(id) {
    if (document.getElementById(id) != null) {
        document.getElementById(id).innerHTML = "";
    }
    var xmlhttp;
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    // this will be called when loaded succesfully
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(id).innerHTML = xmlhttp.responseText;
        }
    };
    // actually make the call
    xmlhttp.open("GET", "../app/views/fetchquestions.php?q=" + id.replace('questionssection',''), true);
    xmlhttp.send();
}

/*$(document ).ready(function() {
 // one by one load the data
 $('[id^="questionssection"]').each(function(i, obj) {
 fetchdata(obj.id);
 });
 });*/

/*
* Used by fetchjobtitles.php
**/
function jobTitlesSelectChanged() {
    // this funtion will be called whenever the user selects a function from the dropdown
    // fetchcompetences wordt gebruikt om in de div fetchCompetencesDiv te steken
    // nadat de php pagina is ingeladen wordt op elek questionssection class div fetchdata toegepast die data uit de controller haalt.
    var div = document.getElementById("fetchCompetencesDiv");
    var xmlhttp;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    // this will be called when loaded succesfully
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            div.innerHTML = xmlhttp.responseText;
            /*
             $('[id^="questionssection"]').each(function (i, obj) {
             fetchdata(obj.id);
             });
             // fetchquestions is now obsolete
             */
        }
    }
    // actually make the call
    var select = document.getElementById("jobTitleSelect");
    var id = select.options[select.selectedIndex].value;
    xmlhttp.open("GET", "../app/views/fetchcompetences.php?q=" + id , true); // substring to cut function- off
    xmlhttp.send();

    // Unhide button
    document.getElementById('QSubmit').classList.remove('hidden');

}

/*
* Button functionality used in index.php
 */
$(document).ready(function(){
    $('#QSubmit').click(function(){
        $('#report').modal();
        var checkboxes = document.getElementsByClassName('questionsCheck');
        var func = document.getElementById('jobTitleSelect');
        var jobTitle = func.options[func.selectedIndex].value;
        var ids = [];
        for(x= 0;x < checkboxes.length; x++){
            if(checkboxes[x].checked ){
                ids.push(checkboxes[x].id);
            }
        }
        /*var result = jobTitle + " \n";
        ids.forEach(function(element, index){
            result += element + " \n";
        });*/

        var result = {"functionId": jobTitle};
        var arr = [];
        ids.forEach(function(element, index){
            arr.push(element.substring(9));
        });
        result.questionId = arr;
        var jsonObj = JSON.stringify(result);
        getReport(jsonObj);
    });
});

/*
* Function to request data for report
* */
function getReport(jsonObj){
    var div = document.getElementById("reportBody");
    var xmlhttp;

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    // this will be called when loaded succesfully
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            div.innerHTML = xmlhttp.responseText;
            /*
             $('[id^="questionssection"]').each(function (i, obj) {
             fetchdata(obj.id);
             });
             // fetchquestions is now obsolete
             */
        }
    }
    // actually make the call
    xmlhttp.open("GET", "../app/views/fetchReport.php?q=" + jsonObj , true); // substring to cut function- off
    xmlhttp.send();

}

 /*
* Collapse for collapsing the questions in the fetchCompetences.php
* */
$(".collapse").collapse();

/*
* Toggle the clicked competence
* */

function handleCompetenceClick(id) {
    $("#questionssection" + id).toggle();
}