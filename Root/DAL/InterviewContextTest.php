<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 1/06/2015
 * Time: 9:02
 */

// valid test 08/06/2015 20:06

include_once('../vendor/autoload.php');
$context = new DAL\InterviewContext();

?>
<html>
<head>
    <title>ControllerTest</title>
</head>
<body>
<h3>Data Loaded by the InterviewContext:</h3>
<pre>
    <?php var_dump($context->selectAllFunctions()); ?>
</pre>
</body>
</html>

