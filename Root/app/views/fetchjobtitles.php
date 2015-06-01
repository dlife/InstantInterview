<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 14/05/2015
 * Time: 0:48
 */

// JobTitlesView

?>
<form>
    <div class="form-group col-xs-12 col-md-6">
        <h2>Selecteer hier een functie.</h2>
    <select  class="form-control" id="jobTitleSelect" onchange="jobTitlesSelectChanged()">
        <option selected disabled hidden value=''></option>

<?php foreach ($controller->getJobTitles() as $jobTitle) { // iterate through all the jobtitles and make an option in the listbox for each jobtitles ?>
    <option
         value="<?php echo $jobTitle->getId()?>" ><?php echo $jobTitle->getName() ?>
    </option>
<?php } ?>

    </select>
    </div>
</form>