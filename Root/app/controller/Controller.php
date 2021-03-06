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

    public function getLog()
    {
        return $this->context->getController()->getLog();
    }

    public function getJobFunctions()
    {
        // uses a stored procedure that gets all job functions
        $return = $this->getContext()->selectAllFunctions();
        $result = array();
        foreach ($return as $value) {
            array_push($result, new \Models\JobFunction(intval($value['Id']), $value['Naam']));
        }
        $this->jobFunctions = $result;
        return $this->jobFunctions;
    }

    public function loadDataByFunction($functionId)
    {
        // this should only be called once per controller !! 

        // - loading ALL questions in $this->questions
        $this->loadQuestions();
        // - loading ALL competences in $this->competences
        $this->loadCompetences();
        // - loading all the questions that are tied to a function in $this->questionsMarked
        $this->loadQuestionsToMark($functionId);
        // then make an array $this->competencesNotNeeded using $this->questions and $this->questionsMarked that will be used to hide competences
        $this->fillCompetencesToShow();
    }

    private function loadQuestions()
    {
        // uses a stored procedure that gets all questions into the questions array
        // save each object at index object Id => makes it easier to search by id
        $return = $this->getContext()->selectAllQuestions();
        foreach ($return as $value) {
            $this->questions[intval($value['Id'])] = new \Models\Question(intval($value['Id']), $value['Vraag'], intval($value['CompetentieId']));
        }
    }

    private function loadCompetences()
    {
        // uses a stored procedure that gets all competences into the competences array
        // save each object at index object Id => makes it easier to search by id
        $return = $this->getContext()->selectAllCompetences();
        foreach ($return as $value) {
            $this->competences[intval($value['Id'])] = new \Models\Competence(intval($value['Id']), $value['Naam']);
        }
    }

    private function loadQuestionsToMark($functionId)
    {
        // uses a stored procedure that gets questions linked to a function
        // save each object at index object Id => makes it easier to search by id
        $return = $this->getContext()->selectQuestionIdsFromFunction($functionId);
        foreach ($return as $value) {
            $this->questionsMarked[intval($value['Id'])] = intval($value['Id']);
        }
    }

    private function fillCompetencesToShow()
    {
        // makes an array $this->competencesToShow using $this->questions and $this->questionsMarked 
        // that will be used to hide competences that don't have any marked questions by default
        foreach ($this->questionsMarked as $questionId) {
            $question = $this->selectQuestionById($questionId);
            if (isset ($question)) {
                if (!array_key_exists($question->getCompetenceId(), $this->competencesToShow)) {
                    $this->competencesToShow[$question->getCompetenceId()] = $question->getCompetenceId();
                }
            }
        }
    }

    public function selectCompetenceById($competenceId)
    {
        // gets the competence object, based on the id
        if (isset($competenceId)) {
            if (array_key_exists($competenceId, $this->competences)) {
                return $this->competences[$competenceId];
            } else {
                $this->loadCompetences();
                return $this->competences[$competenceId];
            }
        }
    }

    public function selectQuestionById($questionId)
    {
        // gets the question object, based on the id
        if (isset($questionId)) {
            if (array_key_exists($questionId, $this->questions)) {
                return $this->questions[$questionId];
            }
        }
    }

    public function selectQuestionsByCompetenceId($competenceId)
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

    public function insertNewQuestion($competenceId, $question)
    {
        return $this->getContext()->InsertQuestion($question, $competenceId);
    }
}
