<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 27/05/2015
 * Time: 20:10
 */

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);
$appDir = realpath($baseDir . '/app/');
$dalDir = realpath($baseDir . '/DAL/');
$bllDir = realpath($baseDir . '/BLL/');


return array(
    'Controller\\' => array($appDir . '/controller'),
    'InstantInterview\\' => array($appDir . '/InstantInterview'),
    'Models\\' => array($appDir . '/models'),
    'Views\\' => array($appDir . '/views'),
    'DAL\\' => array($dalDir),
    'BLL\\' => array($bllDir),

);