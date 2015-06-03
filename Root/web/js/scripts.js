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
function jobFunctionSelectChanged() {
    // this funtion will be called whenever the user selects a function from the dropdown
    // fetchcompetences wordt gebruikt om in de div fetchCompetencesDiv te steken
    // nadat de php pagina is ingeladen wordt op elek questionssection class div fetchdata toegepast die data uit de controller haalt.
    var div = document.getElementById("fetchCompetencesDiv");
    div.innerHTML = "<img src='img/loading.gif' width='30'/><span>Loading...</span>";
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

            // Unhide buttons
            document.getElementById('QSubmit').classList.remove('hidden');
            document.getElementById('ShowAll').classList.remove('hidden');
        }
    }
    // actually make the call
    var select = document.getElementById("jobTitleSelect");
    var id = select.options[select.selectedIndex].value;
    xmlhttp.open("GET", "../app/views/fetchcompetences.php?q=" + id , true); // substring to cut function- off
    xmlhttp.send();

    // Hide buttons
    document.getElementById('QSubmit').classList.add('hidden');
    document.getElementById('ShowAll').classList.add('hidden');

}

/*
* Button functionality used in index.php
 */
$(document).ready(function(){
    $('#QSubmit').click(function(){
        $('#report').modal();
        Test();
    });
});

function FillModelWithQuestions(){
    var out = "";
    var checkedboxes = $("input:checked").parent().next('div').find('label');
    for (var i = 0; i<checkedboxes.length;i++){
        out += checkedboxes[i].innerText + '</br>';
    }

    document.getElementById('reportBody').innerHTML = out;
}

function Test(){
    var out = "";
    var competences = $("input:checked").parent().next('div').find('label');
    for (var i = 0; i<competences.length;i++){
        out += competences[i].innerText + '</br>';
    }

    document.getElementById('reportBody').innerHTML = out;
}

function showAll() {
    $("div[id^='questionssection']").collapse('show');
    document.getElementById('ShowAll').classList.add('hidden');
}

/*
* Function to request data for report
* */
function getReport(jsonObj){
    var div = document.getElementById("reportBody");
    if (div != null){
        div.innerHTML = "Loading...";
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
            var reportArray = JSON.parse(xmlhttp.responseText);
        }
    }

    // posting the JSON data object
    xmlhttp.open("POST", "../app/views/fetchReport.php");
    xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xmlhttp.send(jsonObj);

    // Display the array in the div with JQuery
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