<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 13/05/2015
 * Time: 22:12
 */

$zip = new ZipArchive();

$zip->open('zipfile.zip', ZipArchive::CREATE);
//$zip->addFile('testpdf.pdf');
//$zip->addFile('text.txt');
$zip->extractTo('Uitpakken');
$zip->close();