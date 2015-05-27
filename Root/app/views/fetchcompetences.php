<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 11/05/2015
 * Time: 21:16
 */
include('../../vendor/autoload.php');

//include('../app/controller/Controller.php');


$controller = new Controller\Controller();
$controller->LoadTestData();

?>
<div class="col-xs-12" id="questions">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php foreach ($controller->getCompetences() as $competence) { // iterate through all the competences and prepare a div for questions for each competence?>
            <div class="panel panel-primary" id="questionssection<?php echo $competence->getId() ?>">
                Loading...
            </div>
        <?php } ?>
    </div>
</div>

<script type="text/javascript">
    function handleCompetenceClick(id) {
        $("#questionssection" + id).toggle();
    }
</script>

<!--
$().button('toggle')

Toggles push state. Gives the button the appearance that it has been activated.

$().button('reset')

Resets button state - swaps text to original text.

$().button(string)

Swaps text to any data defined text state.
-->


