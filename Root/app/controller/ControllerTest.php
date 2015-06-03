<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 1/06/2015
 * Time: 12:40
 */
include "../../vendor/autoload.php";
$controller = new \Controller\Controller();
$controller->LoadDataByFunction(2);

?>
<html>
<head>
    <title>ControllerTest</title>
</head>
<body>
<pre>
<?php
    var_dump($controller->GetReport("1,31"));
?>
    </pre>
</body>
</html>