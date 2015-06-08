<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 1/06/2015
 * Time: 12:40
 */

// not working as this is right now.
// this should be a test for connection, maybe a select all functions to show the db actually works
// use a controller method to show this.

include "../../vendor/autoload.php";
$controller = new \Controller\Controller();
$data = $controller->getJobFunctions();
$log = $controller->getLog();

?>
<html>
<head>
    <title>ControllerTest</title>
</head>
<body>
<h3>Data Loaded by the controller:</h3>
<pre>
    <?php var_dump($data) ?>
</pre>
<h3>Content of the logbook</h3>
<?php
foreach ($log->getBook() as $key => $feedback) { ?>
    <h1><?php echo $key;?></h1>
    <p><b>Name</b> <?php echo $feedback->getName();?></p>
    <p><b>Feedback</b> <?php echo $feedback->getText();?></p>
    <p><b>Error code</b> <?php echo $feedback->getErrorCode();?></p>
    <p><b>Error message</b> <?php echo $feedback->getErrorMessage();?></p>
    <p><b>Error Code Driver</b> <?php echo $feedback->getErrorCodeDriver();?></p>
    <p><b>Is error</b> <?php echo $feedback->getIsError();?></p>
    <p><b>Start</b> <?php echo $feedback->getStartTime();?></p>
    <p><b>End</b> <?php echo $feedback->getEndTime();?></p>
<?php } ?>
</body>
</html>