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
    <p>Vragen voor Competentie "
        <?php $comp = $controller->SelectCompetenceById($q);
        if (isset($comp)) { echo $comp->getName(); } //echo the competence name for section title ?>"</p>
<?php

foreach ($questions as $question) { // iterate through questiosn array and echo each full question ?>
    <p> <?php echo $question->getFullQuestion(); ?><p>
<?php
}
?>