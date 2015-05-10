<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 10/05/2015
 * Time: 22:08
 */

/*  // should have available
    // - array of competence objects that will then be displayed.
    // - array of id's of the competence objects that should be marked.

    // foreach competence in the competences array
    //     make a competence html part with
    //         - a checkbox (or similar)
    //         - a label for the control with value the actual competence
    //         - check if this needs to be marked
    //         - attach a trigger to notify a change when a competence is marked

marking a competence will request a new combined.php view because the questions sections is likely to be updated.
consider sending a param to notify this request comes from marking a competenc.
*/

$competenties = $controller->getCompetenties();

?>

<script type="text/javascript">
    // this will post the name of the checkbox that was clicked and the value
    function handleCompetenceClick(cb) {
        $.ajax({
            url: 'changechecked.php',
            type: 'POST', // GET or POST
            data: 'c=' + cb.name + '&v=' + cb.checked, // will be in $_POST on PHP side
            success: function () { // data is the response from your php script
                // This function is called if your AJAX query was successful
                RefreshData();
            },
            error: function () {
                // This callback is called if your AJAX query has failed
                alert("Error!");
            }
        });
    }

    function RefreshData() {
        alert ('refresh triggered');
        if (document.getElementById("combined") != null) {
            document.getElementById("combined").innerHTML = "";
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
                document.getElementById("combined").innerHTML = xmlhttp.responseText;
            }
        }
        // actually call to the data
        xmlhttp.open("GET", "combined.php", true);
        xmlhttp.send();
        alert("Response");

    }
</script>

<div id="competences">
    <p><b>Competences View</b></p>
    This div will contain the competences
    <?php foreach ($competenties as $competentie) { ?>
        <div>
            <label><input name="<?php echo $competentie->getId()?>" type='checkbox' onclick='handleCompetenceClick(this);'><?php echo $competentie->getNaam() ?></label>
        </div>
    <?php } ?>
</div>
