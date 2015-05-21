<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 11/05/2015
 * Time: 21:12
 */

include('controller/Controller.php');
use controller\Controller;

$controller = new Controller();
$controller->LoadTestData();

parse_str($_SERVER['QUERY_STRING']); // parses the query string and makes vars with the key => $q is created
$questions = [];
if (isset($q)) {
    $questions = $controller->SelectQuestions($q); // make the call to the controller
}
?>
<div class="panel-heading" role="tab" id="heading-<?php echo $q; ?>">
    <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
           href="#<?php echo 'competence-id-' . $q; ?>">
            <?php $comp = $controller->SelectCompetenceById($q);
            if (isset($comp)) {
                echo $comp->getName();
            } //echo the competence name for section title ?>
        </a>
    </h4>
</div>
<div id="<?php echo 'competence-id-' . $q; ?>" class="panel-collapse collapse" role="tabpanel">
    <?php
    foreach ($questions as $question) { // iterate through questions array and echo each full question ?>
        <div class="input-group">
                    <span class="input-group-addon">
                        <input type="checkbox" id="question-<?php echo $question->getId(); ?>">
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

<script>
    $(".collapse").collapse();
</script>