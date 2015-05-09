<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 9/05/2015
 * Time: 16:32
 */

/*  // should have available
    // - array of question objects that will then be displayed.
    // - array of id's of the question objects that should be marked.

    // foreach question in the questions array
    //     make a question html part with
    //         - a checkbox (or similar)
    //         - a label for the control with value the actual question
    //         - check if this needs to be marked
    //         - attach a trigger to notify a change when a question is marked

marking a question should only update the session var.
Use different php page with param to make the change happen.
A refresh is not needed.

Possible solution:
*/
/*

http://stackoverflow.com/questions/11958243/button-that-runs-a-php-script-without-changing-current-page

It's easy to do using jQuery:
<script>
$(function(){
    $('#your_button_dom_id').click(function(){
        $.ajax({
            url: 'your_php_script_url',
            type: 'POST', // GET or POST
            data: 'param1=value1&param2=value2', // will be in $_POST on PHP side
            success: function(data) { // data is the response from your php script
                // This function is called if your AJAX query was successful
                alert("Response is: " + data);
            },
            error: function() {
                // This callback is called if your AJAX query has failed
                alert("Error!");
            }
        });
    });
});
</script>
*/

$vragen = $controller->getVragen();

?>

<div id="questions">
    <p><b>Questions View</b></p>
    This div will contain the questions
    <?php foreach ($vragen as $vraag) { ?>
        <div>
            <label><input type='checkbox' onclick='handleQuestionClick(this);'><?php echo $vraag->getEchteVraag() ?></label>
        </div>
    <?php } ?>

</div>


<!--
this needs to be a function that will change the session or JSON to include or exclude the id of the marked checkbox
for now this is just alerting the value of the checkbox
-->
<script>
    function handleQuestionClick(cb) {
        alert("Clicked, new value = " + cb.checked);
    }
</script>


