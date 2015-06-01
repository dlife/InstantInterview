<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 1/06/2015
 * Time: 9:02
 */
include_once('../vendor/autoload.php');
$context = new DAL\InterviewContext();
var_dump($context->SelectAllFunctions());