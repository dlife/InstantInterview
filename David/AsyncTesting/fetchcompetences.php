<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 11/05/2015
 * Time: 21:16
 */

include('controller/Controller.php');
use controller\Controller;

$controller = new Controller();
$controller->LoadTestData();

?>

<div>
    This div will contain the competences
    <?php foreach ($controller->getCompetenties() as $competentie) { ?>
        <div>
            <label><input name="<?php echo $competentie->getId()?>" type='checkbox' onclick='handleCompetenceClick(this);'><?php echo $competentie->getNaam() ?></label>
        </div>
    <?php } ?>
</div>
<div id="questions">
    <?php foreach ($controller->getCompetenties() as $competentie) { ?>
        <div id="questionssection<?php echo $competentie->getId() ?>" class="questionsection">
            Loading...
        </div>
    <?php } ?>
</div>