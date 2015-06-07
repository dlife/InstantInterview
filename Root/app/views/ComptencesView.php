<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 11/05/2015
 * Time: 21:16
 */
include('../../vendor/autoload.php');

header('Content-type: text/html; charset=UTF-8') ;

$controller = new Controller\Controller();

parse_str($_SERVER['QUERY_STRING']); // parses the query string and makes vars with the key => $q is created
if (isset($q)) {
    $controller->LoadDataByFunction($q); // loads all data needed to construct the view
}

// now $controller->getCompetencesToShow() will contain the competences that need to be shown
// and $controller->getQuestionsMarked() will contain the questions that have to be marked
// this is used when generating the controls

?>
<div class="col-xs-12" id="questions">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php foreach ($controller->getCompetences() as $competence) { // iterate through all the competences and prepare a div for questions for each competence
            $questions = $controller->SelectQuestionsByCompetenceId($competence->getId()); // gets all questions for this competence ?>
            <div class="panel panel-primary
            <?php if (!array_key_exists($competence->getId(), $controller->getCompetencesToShow())) {
                echo ' collapse'; // hide the competence if its id can't be found in getCompetencesToShow
            } ?>
            " id="questionssection<?php echo $competence->getId() // name the div questionssection + competence Id ?>">
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
                    <?php foreach ($questions as $question) { // iterate through the questions array and echo each full question ?>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="checkbox" class="questionsCheck" id="question-<?php echo $question->getId(); // name the checkbox ?>"
                                    <?php if (array_key_exists($question->getId(), $controller->getQuestionsMarked())) 
                                        { echo ' checked'; } // mark the checkbox if the question Id is in getQuestionsMarked ?>>
                            </span>
                            <div class="list-group-item">
                                <label for="question-<?php echo $question->getId(); ?>">
                                    <?php echo $question->getFullQuestion(); ?>
                                </label>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>