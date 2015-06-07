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
    protected $context;

    public function __construct()
    {
        $this->context = new \DAL\InterviewContext();
    }

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

    private function getContext()
    {
        return $this->context;
    }

    public function getJobFunctions()
    {
        // uses a stored procedure that gets all job functions
        $return = $this->getContext()->SelectAllFunctions();
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
        $return = $this->getContext()->SelectAllQuestions();
        foreach ($return as $value) {
            $this->questions[intval($value['Id'])] = new \Models\Question(intval($value['Id']), $value['Vraag'], intval($value['CompetentieId']));
        }
    }

    public function LoadCompetences()
    {
        // uses a stored procedure that gets all competences into the competences array
        // save each object at index object Id => makes it easier to search by id
        $return = $this->getContext()->SelectAllCompetences();
        foreach ($return as $value) {
            $this->competences[intval($value['Id'])] = new \Models\Competence(intval($value['Id']), $value['Naam']);
        }
    }

    public function LoadQuestionsToMark($functionId)
    {
        // uses a stored procedure that gets questions linked to a function
        // save each object at index object Id => makes it easier to search by id
        $return = $this->getContext()->SelectQuestionIdsFromFunction($functionId);
        foreach ($return as $value) {
            $this->questionsMarked[intval($value['Id'])] = intval($value['Id']);
        }
    }

    public function FillCompetencesToShow()
    {
        // makes an array $this->competencesToShow using $this->questions and $this->questionsMarked 
        // that will be used to hide competences that don't have any marked questions by default
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

    public function InsertNewQuestion($competenceId, $question)
    {
        return $this->getContext()->InsertQuestion($question, $competenceId);
    }
}
