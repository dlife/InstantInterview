<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 8/06/2015
 * Time: 12:20
 */
include('../Root/vendor/autoload.php');

$data = new \DAL\InterviewContext();
//$array = $data->selectQuestionsOnID("1,2,11,31,52,34");
$array = array(
    'functionId' => "1",
    'questionId' => array(
        "1","2","3"
    )

);
echo var_dump($array);



