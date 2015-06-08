<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 14/05/2015
 * Time: 0:48
 */

// Warning: include_once(../../vendor/autoload.php): failed to open stream: No such file or directory in C:\Users\David\PhpstormProjects\InstantInterview\InstantInterview\Root\app\views\JobFunctionsView.php on line 10
include_once('../../vendor/autoload.php'); // dit geeft een fout, maar het werkt wel !!

$controller = new Controller\Controller();
$i=0;

if (isset($_SERVER['QUERY_STRING'])) {
    parse_str($_SERVER['QUERY_STRING']); // parses the query string and makes vars with the key => $q is created
    if (isset($q)) {
        $i = intval($q);
    }
}
?>
<div class="row">
    <div id="testdiv"></div>
</div>
<form>
    <div class="form-group col-xs-12 col-md-6">
        <h2>Selecteer hier een functie.</h2>
        <select class="form-control" id="jobfunction-select" onchange="jobFunctionSelectChanged()">
            <?php if (!isset($q)) { echo '<option selected disabled hidden value=""></option>'; } ?>
            <?php foreach ($controller->getJobFunctions() as $jobFunction) { // iterate through all the JobFunctions and make an option in the dropdown for each function ?>
                <option
                    <?php if ($i != 0 && $jobFunction->getId() == $i) { echo 'selected'; } // select the previously selected jobFunction ?>
                     value="<?php echo $jobFunction->getId()?>" ><?php echo $jobFunction->getName() ?>
                </option>
            <?php } ?>
        </select>
    </div>
</form>
<div id="fetch-competences-div"></div>