<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 14/05/2015
 * Time: 0:48
 */

// JobTitlesView

?>
<form>
    <div class="form-group col-xs-12 col-md-6">
This div will contain the jobtitles
    <select  class="form-control" id="jobTitleSelect" onchange="jobTitlesSelectChanged()">
        <option selected disabled hidden value=''></option>

<?php foreach ($controller->getJobTitles() as $jobTitle) { // iterate through all the jobtitles and make an option in the listbox for each jobtitles ?>
    <option
         value="<?php echo $jobTitle->getId()?>" ><?php echo $jobTitle->getName() ?>
    </option>
<?php } ?>

    </select>
    </div>
</form>

<script type="text/javascript">
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
        xmlhttp.open("GET", "../app/views/fetchcompetences.php?q=" + select.options[select.selectedIndex].value , true);
        xmlhttp.send();

    }
</script>