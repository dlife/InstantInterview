<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 3/06/2015
 * Time: 22:02
 */

include('../vendor/autoload.php');

header('Content-type: text/html; charset=UTF-8') ;

$controller = new \Controller\Controller();

if (isset($_POST['selectCompetence'])) {
    $competence = strip_tags($_POST['selectCompetence']);
    $question = strip_tags($_POST['questionText']);
    $result = $controller->InsertNewQuestion($competence, $question);

    if($result == true){
    $message = <<<DOC
    <br><div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> De nieuwe vraag is toegevoegd aan de databank. De pagina zal binnen enkele seconden vernieuwen<br>
        <stong>Competence: </strong>$competence<br>
        <stong>Question: </strong>$question<br>
    </div>
DOC;
    echo $message;
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
?>

