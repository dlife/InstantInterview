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
$vragen = [];
if (isset($q)) {
    $vragen = $controller->SelectQuestions($q); // make the call to the controller
}
?>
<div>
    <p>Vragen voor Competentie
        <?php $comp = $controller->SelectCompetenceById($q);
        if (isset($comp)) { echo $comp->getNaam(); } ?></p>
<?php

foreach ($vragen as $vraag) { ?>
    <p> <?php echo $vraag->getEchteVraag(); ?><p>
<?php
}
?>
</div>