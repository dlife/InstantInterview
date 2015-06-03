<?php
/**
* Created by PhpStorm.
 * User: 11791
* Date: 11/05/2015
* Time: 21:12
*/

namespace Controller;

class Controller
{
    protected $questions = array();
    protected $competences = array();
    protected $jobFunctions = array();
    protected $questionsMarked = array();
    protected $competencesToShow = array();

    public function getQuestions()
    {
        return $this->questions;
    }

    public function getCompetences()
    {
        return $this->competences;
    }

    public function getQuestionsMarked()
    {
        return $this->questionsMarked;
    }

    public function getCompetencesToShow()
    {
        return $this->competencesToShow;
    }
    
    public function getJobFunctions()
    {
        // uses a stored procedure that gets all job functions
        $context = new \DAL\InterviewContext();
        $return = $context->SelectAllFunctions();
        $result = array();
        foreach ($return as $value) {
            array_push($result, new \Models\JobFunction(intval($value['Id']), $value['Naam']));
        }
        $this->jobFunctions = $result; // voorlopig bijhouden in controller
        return $this->jobFunctions;
    }
    
    public function LoadDataByFunction($functionId)
    {
        // this should only be called once per controller !! 
        
        // - loading ALL questions in $this->questions
        $this->LoadQuestions();
        // - loading ALL competences in $this->competences
        $this->LoadCompetences();
        // - loading all the questions that are tied to a function in $this->questionsMarked
        $this->LoadQuestionsToMark($functionId);
        // then make an array $this->competencesNotNeeded using $this->questions and $this->questionsMarked that will be used to hide competences
        $this->FillCompetencesToShow();
    }

    public function LoadQuestions()
    {
        // uses a stored procedure that gets all questions into the questions array
        // save each object at index object Id => makes it easier to search by id
        $context = new \DAL\InterviewContext();
        $return = $context->SelectAllQuestions();
        foreach ($return as $value) {
            $this->questions[intval($value['Id'])] = new \Models\Question(intval($value['Id']), $value['Vraag'], intval($value['CompetentieId']));
        }
    }

    public function LoadCompetences()
    {
        // uses a stored procedure that gets all competences into the competences array
        // save each object at index object Id => makes it easier to search by id
        $context = new \DAL\InterviewContext();
        $return = $context->SelectAllCompetences();
        foreach ($return as $value) {
            $this->competences[intval($value['Id'])] = new \Models\Competence(intval($value['Id']), $value['Naam']);
        }
    }

    public function LoadQuestionsToMark($functionId)
    {
        // uses a stored procedure that gets questions linked to a function
        // save each object at index object Id => makes it easier to search by id
        $context = new \DAL\InterviewContext();
        $return = $context->SelectQuestionIdsFromFunction($functionId);
        foreach ($return as $value) {
            $this->questionsMarked[intval($value['Id'])] = intval($value['Id']);
        }
    }
    
    
    public function FillCompetencesToShow()
    {
        // makes an array $this->competencesToShow using $this->questions and $this->questionsMarked 
        // that will be used to hide competences that don't have any marked questions
        foreach ($this->questionsMarked as $questionId) {
            $question = $this->SelectQuestionById($questionId);
            if (isset ($question)) {
                if (!array_key_exists($question->getCompetenceId(), $this->competencesToShow)) {
                    $this->competencesToShow[$question->getCompetenceId()] = $question->getCompetenceId();
                }
            }
        }
    }
    
    public function SelectCompetenceById($competenceId)
    {
        // gets the competence object, based on the id
        if (isset($competenceId)) {
            if (array_key_exists($competenceId, $this->competences)) {
                return $this->competences[$competenceId];
            }
        }
    }

    public function SelectQuestionById($questionId)
    {
        // gets the question object, based on the id
        if (isset($questionId)) {
            if (array_key_exists($questionId, $this->questions)) {
                return $this->questions[$questionId];
            }
        }
    }
    
    public function SelectQuestionsByCompetenceId($competenceId)
    {
        // selects all questions from 1 competence, needed for the view
        $v = Array();

        foreach ($this->questions as $question) {
            if ($question->getCompetenceId() == $competenceId) {
                $v[] = $question;
            }
        }
        return $v;

    }

    public function GetReport($ids){
        // uses a stored procedure that gets Selected Ids
        // save each object at index object Id => makes it easier to search by id
        $context = new \DAL\InterviewContext();
        $return = $context->SelectQuestionsOnID($ids);
        $result = array();
        foreach ($return as $value) {
            array_push($result, $value);
        }
        return $result;
    }
    
    /*
    // loads test date, should no longer be needed
    public function LoadTestData()
    {
        // simple data for testing
        $vraag1 = new \Models\Question(1, 'Vraag 1', 1);
        $this->questions[$vraag1->getId()] = $vraag1;

        $vraag2 = new \Models\Question(2, 'Vraag 2', 1);
        $this->questions[$vraag2->getId()] = $vraag2;

        $vraag3 = new \Models\Question(3, 'Vraag 3', 2);
        $this->questions[$vraag3->getId()] = $vraag3;

        $vraag4 = new \Models\Question(4, 'Vraag 4', 2);
        $this->questions[$vraag4->getId()] = $vraag4;

        $comp1 = new \Models\Competence(1, 'Competentie 1');
        $this->competences[$comp1->getId()] = $comp1;

        $comp2 = new \Models\Competence(2, 'Competentie 2');
        $this->competences[$comp2->getId()] = $comp2;

        $jobTitle1 = new \Models\JobTitle(1, 'Functie 1');
        $this->jobTitles[$jobTitle1->getId()] = $jobTitle1;

        $jobTitle2 = new \Models\JobTitle(2, 'Functie 2');
        $this->jobTitles[$jobTitle2->getId()] = $jobTitle2;

        $jobTitleQuestion1 = new \Models\JobTitleQuestion(1, 1, 1);
        $this->jobTitlesQuestions[$jobTitleQuestion1->getId()] = $jobTitleQuestion1;

        $jobTitleQuestion2 = new \Models\JobTitleQuestion(2, 3, 1);
        $this->jobTitlesQuestions[$jobTitleQuestion2->getId()] = $jobTitleQuestion2;

        $jobTitleQuestion3 = new \Models\JobTitleQuestion(3, 1, 2);
        $this->jobTitlesQuestions[$jobTitleQuestion3->getId()] = $jobTitleQuestion3;

        $jobTitleQuestion4 = new \Models\JobTitleQuestion(4, 2, 2);
        $this->jobTitlesQuestions[$jobTitleQuestion4->getId()] = $jobTitleQuestion4;

        $this->questionsMarked[] = 3;
        $this->questionsMarked[] = 4;
    }
    */
}
