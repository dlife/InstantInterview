<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 11/05/2015
 * Time: 21:16
 */
include('../../vendor/autoload.php');

$controller = new Controller\Controller();
//$controller->LoadTestData();

parse_str($_SERVER['QUERY_STRING']); // parses the query string and makes vars with the key => $q is created
if (isset($q)) {
    $controller->LoadDataByFunction($q);
}

// after this $controller->getCompetencesNotNeeded() will contain the competences that need to be hidden
// and $controller->getQuestionsMarked() will contain the questions that have to be marked
// this is used to generate the controls

?>
<div class="col-xs-12" id="questions">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php foreach ($controller->getCompetences() as $competence) { // iterate through all the competences and prepare a div for questions for each competence
            $questions = $controller->SelectQuestionsByCompetenceId($competence->getId()); // make the call to the controller ?>
            <div class="panel panel-primary
            <?php if (!array_key_exists($competence->getId(), $controller->getCompetencesToShow())) {
                echo ' collapse';
            } ?>
            " id="questionssection<?php echo $competence->getId() ?>">
                <div class="panel-heading" role="tab" id="heading-<?php echo $q; ?>">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                           href="#<?php echo 'competence-id-' . $competence->getId(); ?>">
                            <?php echo $competence->getName();
                            //echo the competence name for section title ?>
                        </a>
                    </h4>
                </div>
                <div id="<?php echo 'competence-id-' . $competence->getId(); ?>" class="panel-collapse collapse" role="tabpanel">
                    <?php
                    foreach ($questions as $question) { // iterate through questions array and echo each full question ?>
                        <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" class="questionsCheck" id="question-<?php echo $question->getId(); ?>"
                            <?php if (array_key_exists($question->getId(), $controller->getQuestionsMarked())) { echo ' checked'; } ?>>
                        </span>

                            <div class="list-group-item">
                                <label for="question-<?php echo $question->getId(); ?>">
                                    <?php echo $question->getFullQuestion(); ?>
                                </label>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!--
$().button('toggle')

Toggles push state. Gives the button the appearance that it has been activated.

$().button('reset')

Resets button state - swaps text to original text.

$().button(string)

Swaps text to any data defined text state.
-->


