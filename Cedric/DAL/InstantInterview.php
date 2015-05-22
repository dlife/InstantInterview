<?php

namespace InstantInterview\DAL;
use InstantInterview\Helpers\LogApp;
use InstantInterview\Helpers\Provider;

define('VENDOR_PATH', $_SERVER['DOCUMENT_ROOT'] . '/Cedric/');
require(VENDOR_PATH.'Helpers/Feedback.php');
require(VENDOR_PATH.'Helpers/Log.php');
require(VENDOR_PATH.'Helpers/LogApp.php');
require(VENDOR_PATH.'Helpers/Connection.php');
require(VENDOR_PATH.'Helpers/Provider.php');

$dal = new Dal();
$dal->InsertQuestion('TestDALVraag',21);
class Dal
{

    public function InsertCompentence($competentie)
    {
        $log = new LogApp('en_US');
        $connection = new Provider($log);
        $pdo = new \PDO($connection->connectionString,$connection->getUserName(),$connection->getPassword());

        $preparedStatement = $pdo->prepare("call CompetentieInsert(@pId,:name);");
        $preparedStatement->bindParam(':name',$competentie,\PDO::PARAM_STR);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function InsertQuestion($vraag, $competentie)
    {
        $log = new LogApp('en_US');
        $connection = new Provider($log);
        $pdo = new \PDO($connection->connectionString,$connection->getUserName(),$connection->getPassword());
        $preparedStatement = $pdo->prepare("call VraagInsert(@pId,:vraag,:compId);");
        $preparedStatement->bindParam(':vraag',$vraag,\PDO::PARAM_STR);
        $preparedStatement->bindParam(':compId',$competentie,\PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    /*public function InsertQuestion($vraag, $competentie)
    {
        $log = new LogApp('en_US');
        $connection = new Provider($log);
        $pdo = new \PDO($connection->connectionString,$connection->getUserName(),$connection->getPassword());
        $preparedStatement = $pdo->prepare("call VraagInsert(@pId,:vraag,:compId);");
        $preparedStatement->bindParam(':vraag',$vraag,\PDO::PARAM_STR);
        $preparedStatement->bindParam(':compId',$competentie,\PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }*/
}
?>