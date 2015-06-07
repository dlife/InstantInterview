<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 14/05/2015
 * Time: 0:48
 */

?>
<form>
    <div class="form-group col-xs-12 col-md-6">
        <h2>Selecteer hier een functie.</h2>
        <select  class="form-control" id="jobfunction-select" onchange="jobFunctionSelectChanged()">
            <option selected disabled hidden value=''></option>
            <?php foreach ($controller->getJobFunctions() as $jobFunction) { // iterate through all the JobFunctions and make an option in the dropdown for each function ?>
                <option
                     value="<?php echo $jobFunction->getId()?>" ><?php echo $jobFunction->getName() ?>
                </option>
            <?php } ?>
        </select>
    </div>
</form>
<div id="fetchCompetencesDiv"></div>
