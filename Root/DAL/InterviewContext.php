<?php
namespace DAL;

class InterviewContext
{
    protected $controller;

    public function __construct()
    {
        $this->controller = new \DAL\ContextController();
    }

    public function insertCompentence($competentie)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call CompetentieInsert(@pId,:name);");
        $preparedStatement->bindParam(':name', $competentie, \PDO::PARAM_STR);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function insertQuestion($vraag, $cId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call VraagInsert(@pId,:vraag,:compId);");
        $preparedStatement->bindParam(':vraag', $vraag, \PDO::PARAM_STR);
        $preparedStatement->bindParam(':compId', $cId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function insertFunction($functie)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call FunctieInsert(@pId,:name);");
        $preparedStatement->bindParam(':name', $functie, \PDO::PARAM_STR);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function selectAllCompetences()
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call CompetentiesSelectAll();");
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function selectOneCompetence($cId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call CompetentiesSelectOne(:pId);");
        $preparedStatement->bindParam(':pId', $cId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function selectQuestionsFromOneCompetence($cId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call CompetentiesSelectQuestions(:pId);");
        $preparedStatement->bindParam(':pId', $cId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function updateCompetence($cId, $cName)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call CompetentieUpdate(:pId, :pName);");
        $competentie = 10;
        $compNaam = "UpdateTest";
        $preparedStatement->bindParam(':pId', $cId, \PDO::PARAM_INT);
        $preparedStatement->bindParam(':pName', $cName, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function updateQuestion($qId, $qName)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call VraagUpdate(:pId, :pName);");
        $preparedStatement->bindParam(':pId', $qId, \PDO::PARAM_INT);
        $preparedStatement->bindParam(':pName', $qName, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function updateFunction($fId, $fName)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call FunctieUpdate(:pId, :pName);");
        $preparedStatement->bindParam(':pId', $fId, \PDO::PARAM_INT);
        $preparedStatement->bindParam(':pName', $fName, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function deleteCompetence($cId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call CompetentieDelete(:pId);");
        $preparedStatement->bindParam(':pId', $cId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function deleteQuestion($qId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call VraagDelete(:pId);");
        $preparedStatement->bindParam(':pId', $qId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function deleteFunction($fId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call FunctieDelete(:pId);");
        $preparedStatement->bindParam(':pId', $fId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        return $result;
    }

    public function selectQuestionsFromCompetenceWithFunction($cId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call SelectQuestionsFunctionCompetencesOrderByCompetence(:pId);");
        $preparedStatement->bindParam(':pId', $cId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function selectQuestionsFromFunction($fId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call SelectQuestionsFunctionCompetencesOnFunction(:pId);");
        $preparedStatement->bindParam(':pId', $fId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function selectAllFunctions()
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call FunctiesSelectAll();");
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function selectFunctionById($id)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call FunctiesSelectAll(:pId);");
        $preparedStatement->bindParam(':pId', $id, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function selectAllQuestions()
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call QuestionsSelectAll();");
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function selectQuestionsOnID($Ids)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call SelectReportData(:pListId);");
        $preparedStatement->bindParam(':pListId', $Ids, \PDO::PARAM_STR);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function selectQuestionIdsFromFunction($fId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call SelectQuestionsIdsOnFunction(:pId);");
        $preparedStatement->bindParam(':pId', $fId, \PDO::PARAM_INT);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function selectReportData($qId)
    {
        $preparedStatement = $this->controller->getPDO()->prepare("call SelectReportData(:pId);");
        $preparedStatement->bindParam(':pId', $qId, \PDO::PARAM_STR);
        $result = $preparedStatement->execute();
        $data = $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }
}
?>
