<?php
namespace DAL;

class InterviewContext
{
    protected $controller;

    public function __construct()
    {
        $this->controller = new \DAL\ContextController();
    }

    public function InsertCompentence($competentie)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call CompetentieInsert(@pId,:name);");
        $preparedStatement->bindParam(':name', $competentie, \PDO::PARAM_STR);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function InsertQuestion($vraag, $cId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call VraagInsert(@pId,:vraag,:compId);");
        $preparedStatement->bindParam(':vraag', $vraag, \PDO::PARAM_STR);
        $preparedStatement->bindParam(':compId', $cId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function InsertFunction($functie)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call FunctieInsert(@pId,:name);");
        $preparedStatement->bindParam(':name', $functie, \PDO::PARAM_STR);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function SelectAllCompetences()
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call CompetentiesSelectAll();");
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
//        echo http_build_query($data) . "\n";
    }

    public function SelectOneCompetence($cId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call CompetentiesSelectOne(:pId);");
        $preparedStatement->bindParam(':pId', $cId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
//        echo http_build_query($data) . "\n";
    }

    public function SelectQuestionsFromOneCompetence($cId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call CompetentiesSelectQuestions(:pId);");
        $preparedStatement->bindParam(':pId', $cId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
//        echo http_build_query($data) . "\n";
    }

    public function UpdateCompetence($cId, $cName)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call CompetentieUpdate(:pId, :pName);");
        $competentie = 10;
        $compNaam = "UpdateTest";
        $preparedStatement->bindParam(':pId', $cId, \PDO::PARAM_INT);
        $preparedStatement->bindParam(':pName', $cName, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function UpdateQuestion($qId, $qName)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call VraagUpdate(:pId, :pName);");
        $preparedStatement->bindParam(':pId', $qId, \PDO::PARAM_INT);
        $preparedStatement->bindParam(':pName', $qName, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function UpdateFunction($fId, $fName)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call FunctieUpdate(:pId, :pName);");
        $preparedStatement->bindParam(':pId', $fId, \PDO::PARAM_INT);
        $preparedStatement->bindParam(':pName', $fName, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function DeleteCompetence($cId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call CompetentieDelete(:pId);");
        $preparedStatement->bindParam(':pId', $cId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function DeleteQuestion($qId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call VraagDelete(:pId);");
        $preparedStatement->bindParam(':pId', $qId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function DeleteFunction($fId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call FunctieDelete(:pId);");
        $preparedStatement->bindParam(':pId', $fId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function SelectQuestionsFromCompetenceWithFunction($cId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call SelectQuestionsFunctionCompetencesOrderByCompetence(:pId);");
        $preparedStatement->bindParam(':pId', $cId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
//        echo http_build_query($data) . "<Br>";
    }

    public function SelectQuestionsFromFunction($fId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call SelectQuestionsFunctionCompetencesOnFunction(:pId);");
        $preparedStatement->bindParam(':pId', $fId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
//        echo http_build_query($data) . "<Br>";
    }

    public function SelectAllFunctions()
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call FunctiesSelectAll();");
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
//        echo http_build_query($data) . "\n";
    }

    public function SelectFunctionById($id)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call FunctiesSelectAll(:pId);");
        $preparedStatement->bindParam(':pId', $id, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
//        echo http_build_query($data) . "\n";
    }

    //Added stored procedures
    public function SelectAllQuestions()
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call QuestionsSelectAll();");
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
//        echo http_build_query($data) . "\n";
    }

    public function SelectQuestionsOnID($Ids)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call SelectReportData(:pListId);");
        $preparedStatement->bindParam(':pListId', $Ids, \PDO::PARAM_STR);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
//        echo http_build_query($data) . "\n";
    }

    public function SelectQuestionIdsFromFunction($fId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call SelectQuestionsIdsOnFunction(:pId);");
        $preparedStatement->bindParam(':pId', $fId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
//        echo http_build_query($data) . "<Br>";
    }

    public function SelectReportData($qId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call SelectReportData(:pId);");
        $preparedStatement->bindParam(':pId', $qId, \PDO::PARAM_STR);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
//      echo http_build_query($data) . "<Br>";
        return $data;
    }
}
//Added stored procedures
?>
