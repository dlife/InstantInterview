<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 1/06/2015
 * Time: 12:40
 */
include "../../vendor/autoload.php";
$controller = new \Controller\Controller();
$jobTitles = $controller->getJobTitles();

?>
    <html>
    <head>
        <title>ControllerTest</title>
    </head>
<body>
<?php
foreach ($jobTitles as $obj){
?>

    <p>ID = <?php echo $obj->getId();?> Name = <?php echo $obj->getName();?></p>
<?php } ?>
</body>
    </html>