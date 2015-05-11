<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 11/05/2015
 * Time: 21:12
 */

$controller = new \controller\Controller();
$controller->LoadTestData();

?>

<div>
    This div will contain the competences
<?php foreach ($competenties as $competentie) { ?>
    <div>
        <label><input name="<?php echo $competentie->getId()?>" type='checkbox' onclick='handleCompetenceClick(this);'><?php echo $competentie->getNaam() ?></label>
    </div>
<?php } ?>
</div>
<div id="questions">
    <?php foreach ($competenties as $competentie) { ?>
        <div id="question <?php echo $competentie->getId() ?>">

        </div>
    <?php } ?>
</div>


