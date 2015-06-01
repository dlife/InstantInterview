<?php
//include ('Feedback.php');
//include('Log.php');
//include "LogApp.php";
//include('Connection.php');

    // maak een logboek
    //$log = new LogApp();

include_once('../vendor/autoload.php');

    $log = new DAL\Helpers\LogApp('en_US');

    $provider = new DAL\Provider($log);
    $provider->open();
    $provider->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Connection class test</title>
</head>
<body>
<?php
foreach ($log->getBook() as $key => $feedback)
{
    ?>
    <h1><?php echo $key;?></h1>
    <p><b>Name</b> <?php echo $feedback->getName();?></p>
    <p><b>Feedback</b> <?php echo $feedback->getText();?></p>
    <p><b>Error code</b> <?php echo $feedback->getErrorCode();?></p>
    <p><b>Error message</b> <?php echo $feedback->getErrorMessage();?></p>
    <p><b>Error Code Driver</b> <?php echo $feedback->getErrorCodeDriver();?></p>
    <p><b>Is error</b> <?php echo $feedback->getIsError();?></p>
    <p><b>Start</b> <?php echo $feedback->getStartTime();?></p>
    <p><b>End</b> <?php echo $feedback->getEndTime();?></p>
<?php            }?>
</body>
</html>
