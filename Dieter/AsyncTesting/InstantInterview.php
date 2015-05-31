<?php
namespace InstantInterview\DAL;

use InstantInterview\Helpers\LogApp;
use InstantInterview\Helpers\Provider;

class Dal
{
    public function InsertCompentence($competentie)
    {
        $log = new LogApp('en_US');
        $connection = new Provider($log);
        $pdo = new \PDO($connection->connectionString, $connection->getUserName(), $connection->getPassword());

        $preparedStatement = $pdo->prepare("call CompetentieInsert(@pId,:name);");
        $preparedStatement->bindParam(':name', $competentie, \PDO::PARAM_STR);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function InsertQuestion($vraag, $cId)
    {
        $log = new LogApp('en_US');
        $connection = new Provider($log);
        $pdo = new \PDO($connection->connectionString, $connection->getUserName(), $connection->getPassword());
        $preparedStatement = $pdo->prepare("call VraagInsert(@pId,:vraag,:compId);");
        $preparedStatement->bindParam(':vraag', $vraag, \PDO::PARAM_STR);
        $preparedStatement->bindParam(':compId', $cId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function InsertFunction($functie)
    {
        $log = new LogApp('en_US');
        $connection = new Provider($log);
        $pdo = new \PDO($connection->connectionString, $connection->getUserName(), $connection->getPassword());
        $preparedStatement = $pdo->prepare("call FunctieInsert(@pId,:name);");
        $preparedStatement->bindParam(':name', $functie, \PDO::PARAM_STR);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function SelectAllCompetences()
    {
        $log = new LogApp('en_US');
        $connection = new Provider($log);
        $pdo = new \PDO($connection->connectionString, $connection->getUserName(), $connection->getPassword());
        $preparedStatement = $pdo->prepare("call CompetentiesSelectAll();");
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
//        echo http_build_query($data) . "\n";
    }

    public function SelectOneCompetence($cId)
    {
        $log = new LogApp('en_US');
        $connection = new Provider($log);
        $pdo = new \PDO($connection->connectionString, $connection->getUserName(), $connection->getPassword());
        $preparedStatement = $pdo->prepare("call CompetentiesSelectOne(:pId);");
        $preparedStatement->bindParam(':pId',$cId,\PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
//        echo http_build_query($data) . "\n";
    }

    public function SelectQuestionsFromOneCompetence($cId)
    {
        $log = new LogApp('en_US');
        $connection = new Provider($log);
        $pdo = new \PDO($connection->connectionString, $connection->getUserName(), $connection->getPassword());
        $preparedStatement = $pdo->prepare("call CompetentiesSelectQuestions(:pId);");
        $preparedStatement->bindParam(':pId',$cId,\PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
//        echo http_build_query($data) . "\n";
    }

    public function UpdateCompetence($cId,$cName)
    {
        $log = new LogApp('en_US');
        $connection = new Provider($log);
        $pdo = new \PDO($connection->connectionString, $connection->getUserName(), $connection->getPassword());
        $preparedStatement = $pdo->prepare("call CompetentieUpdate(:pId, :pName);");
        $competentie = 10;
        $compNaam = "UpdateTest";
        $preparedStatement->bindParam(':pId',$cId,\PDO::PARAM_INT);
        $preparedStatement->bindParam(':pName',$cName,\PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function UpdateQuestion($qId,$qName)
    {
        $log = new LogApp('en_US');
        $connection = new Provider($log);
        $pdo = new \PDO($connection->connectionString, $connection->getUserName(), $connection->getPassword());
        $preparedStatement = $pdo->prepare("call VraagUpdate(:pId, :pName);");
        $preparedStatement->bindParam(':pId',$qId,\PDO::PARAM_INT);
        $preparedStatement->bindParam(':pName',$qName,\PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function UpdateFunction($fId,$fName)
    {
        $log = new LogApp('en_US');
        $connection = new Provider($log);
        $pdo = new \PDO($connection->connectionString, $connection->getUserName(), $connection->getPassword());
        $preparedStatement = $pdo->prepare("call FunctieUpdate(:pId, :pName);");
        $preparedStatement->bindParam(':pId',$fId,\PDO::PARAM_INT);
        $preparedStatement->bindParam(':pName',$fName,\PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function DeleteCompetence($cId)
    {
        $log = new LogApp('en_US');
        $connection = new Provider($log);
        $pdo = new \PDO($connection->connectionString, $connection->getUserName(), $connection->getPassword());
        $preparedStatement = $pdo->prepare("call CompetentieDelete(:pId);");
        $preparedStatement->bindParam(':pId', $cId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function DeleteQuestion($qId)
    {
        $log = new LogApp('en_US');
        $connection = new Provider($log);
        $pdo = new \PDO($connection->connectionString, $connection->getUserName(), $connection->getPassword());
        $preparedStatement = $pdo->prepare("call VraagDelete(:pId);");
        $preparedStatement->bindParam(':pId', $qId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }
    public function DeleteFunction($fId)
    {
        $log = new LogApp('en_US');
        $connection = new Provider($log);
        $pdo = new \PDO($connection->connectionString, $connection->getUserName(), $connection->getPassword());
        $preparedStatement = $pdo->prepare("call FunctieDelete(:pId);");
        $preparedStatement->bindParam(':pId', $fId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function SelectQuestionsFromCompetenceWithFunction($cId)
    {
        $log = new LogApp('en_US');
        $connection = new Provider($log);
        $pdo = new \PDO($connection->connectionString, $connection->getUserName(), $connection->getPassword());
        $preparedStatement = $pdo->prepare("call SelectQuestionsFunctionCompetencesOrderByCompetence(:pId);");
        $preparedStatement->bindParam(':pId',$cId,\PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
//        echo http_build_query($data) . "<Br>";
    }
    public function SelectQuestionsFromFunction($fId)
    {
        $log = new LogApp('en_US');
        $connection = new Provider($log);
        $pdo = new \PDO($connection->connectionString, $connection->getUserName(), $connection->getPassword());
        $preparedStatement = $pdo->prepare("call SelectQuestionsFunctionCompetencesOnFunction(:pId);");
        $preparedStatement->bindParam(':pId',$fId,\PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
//        echo http_build_query($data) . "<Br>";
    }
}
?>