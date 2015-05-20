<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 14/05/2015
 * Time: 0:48
 */

// JobTitlesView

?>

<div>
This div will contain the jobtitles
    <select id="jobTitleSelect" onchange="jobTitlesSelectChanged()">
        <option selected disabled hidden value=''></option>

<?php foreach ($controller->getJobTitles() as $jobTitle) { // iterate through all the jobtitles and make an option in the listbox for each jobtitles ?>
    <option
         value="<?php echo $jobTitle->getId()?>" ><?php echo $jobTitle->getName() ?>
    </option>
<?php } ?>

    </select>
</div>

<script type="text/javascript">
    function jobTitlesSelectChanged() {
        var select = document.getElementById("jobTitleSelect");
        alert("Should call fetch with Id="+select.options[select.selectedIndex].value);
    }
</script>