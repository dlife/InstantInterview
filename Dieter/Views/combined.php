<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 9/05/2015
 * Time: 17:21
 */

/*
 * this page should create a controller,
 * make the controller perform its necessary actions,
 * then use the vars from the controller to combine the views.
 *
 * This page COULD be called with params to signal if it's called from marking a competence or selected a function.
 * Marking a competence is a much shorter flow than selecting a function
 */

namespace app\view;

// namespace issue, use autoloader to fix this
include '../controller/Controller.php';

// using session at some point.
session_start();

// create a controller
use app\controller\Controller;

$controller = new Controller();

// using testdata for now
$controller->LoadTestData();
$controller->SelectBasedOnSession();



?>



<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />
    <title></title>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>
<body>

<h2>combined.php</h2>
<h3>This page will combine the views</h3>

<?php

print_r($_SESSION);
echo 'competentieIDs';
print_r($controller->getCompetentiesIds());

// Insert the CompetenceView
require_once 'CompetenceView.php';

// Insert the QuestionsView
require_once 'QuestionsView.php';
?>

</body>
</html>






