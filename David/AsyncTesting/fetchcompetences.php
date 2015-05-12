<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 11/05/2015
 * Time: 21:16
 */

?>


<div>
    This div will contain the competences
    <?php foreach ($controller->getCompetences() as $competence) { // iterate through all the competences and make a checkbox for each competence ?>
        <div>
            <label><input name="<?php echo $competence->getId()?>" type='checkbox' onclick='handleCompetenceClick(this.name);'><?php echo $competence->getName() ?></label>
        </div>
    <?php } ?>
</div>
<div id="questions">
    <?php foreach ($controller->getCompetences() as $competence) { // iterate through all the competences and prepare a div for questions for each competence?>
        <div id="questionssection<?php echo $competence->getId() ?>" class="questionsection">
            Loading...
        </div>
    <?php } ?>
</div>

<script type="text/javascript">
    function handleCompetenceClick(id) {
        $( "#questionssection" + id ).toggle();
    }
</script>

