<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 3/06/2015
 * Time: 22:02
 */

include('../vendor/autoload.php');

header('Content-type: text/html; charset=UTF-8') ;

if (isset($_POST['functionId'])) {
    $controller = new \Controller\Controller();
    $functionId = strip_tags($_POST['functionId']);
    parse_str(strip_tags($_POST['formdata']), $formData);
    $competence = $formData['competence-select'];
    $question = $formData['question-text'];
    $result = $controller->insertNewQuestion($competence, $question);
    $competenceFull = $controller->selectCompetenceById(intval($competence))->getName();

    if ($result == true) {
        $message = <<<DOC
    <br><div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> De nieuwe vraag is toegevoegd aan de databank.<br>
        <stong>Competentie: </strong>$competenceFull<br>
        <stong>Vraag: </strong>$question<br>
    </div>
DOC;
        echo $message;
        require '../app/views/JobFunctionsView.php';
    } else {
        $message = <<<DOC
    <br><div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <strong>Failed!</strong> Data not entered in database: <br>$result<br>
    </div>
DOC;
        echo $message;
    }
} else {
    $message = <<<DOC
    <br><div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <strong>Failed!</strong> Nothing in post<br>
    </div>
DOC;
    echo $message;
}