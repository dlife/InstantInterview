<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 10/05/2015
 * Time: 22:08
 */

/*  // should have available
    // - array of competence objects that will then be displayed.
    // - array of id's of the competence objects that should be marked.

    // foreach competence in the competences array
    //     make a competence html part with
    //         - a checkbox (or similar)
    //         - a label for the control with value the actual competence
    //         - check if this needs to be marked
    //         - attach a trigger to notify a change when a competence is marked

marking a competence will request a new combined.php view because the questions sections is likely to be updated.
consider sending a param to notify this request comes from marking a competenc.
*/

//$competenties = $controller->getCompetenties();

// creeer voorbeeld array voor id en name
$competenties = array(
    array(
        'id' => 1,
        'name' => 'Bestuurlijk Organisatorisch Competenties'),
    array(
        'id' => 2,
        'name' => 'Sociaal Communicatieve Competenties'),
    array(
        'id' => 3,
        'name' => 'Intellectuele Competenties'),
    array(
        'id' => 5,
        'name' => 'Emotionele Competenties'),
    array(
        'id' => 6,
        'name' => 'Taakgerichte Competenties'),
);

?>

<div id="competences">
    <div class="row">
        <div class="btn-group-vertical col-xs-12 col-sm-4" role="group" data-toggle="buttons">
            <p><b>Competences View</b></p>
            <?php foreach ($competenties as $competentie) { ?>
                <label class="btn btn-info" for="<?php echo $competentie['id'] ?>"><?php echo $competentie['name'] ?>
                    <input name="<?php echo $competentie['id'] ?>"
                           type='checkbox'
                           onclick='handleCompetenceClick(this);'
                           id="<?php echo $competentie['id'] ?>"/>
                </label>
            <?php } ?>
        </div>
    </div>
</div>