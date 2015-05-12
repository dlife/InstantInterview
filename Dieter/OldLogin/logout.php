<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 6/05/2015
 * Time: 12:47
 */
require_once 'core/init.php';

$user = new User();
$user->logout();

Redirect::to('index.php');