<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 1/06/2015
 * Time: 9:02
 */
include_once('../vendor/autoload.php');
$context = new DAL\InterviewContext();
$Ids = "1,2,11,31";
var_dump($context->SelectAllFunctions());