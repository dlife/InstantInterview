<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 6/05/2015
 * Time: 12:52
 */
function escape($string){
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}