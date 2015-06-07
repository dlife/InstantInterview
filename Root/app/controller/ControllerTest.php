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
$data = array(
    'functionId'=> 1,
    'questionId' => array(
        1,11,2,33,12
    )

);
$return = $controller->getReport($data);
$return->Output('../../web/tempData/temp1.pdf','I');

?>
<html>
<head>
    <title>ControllerTest</title>
</head>
<body>
<pre>
<?php
?>
    </pre>
</body>
</html>