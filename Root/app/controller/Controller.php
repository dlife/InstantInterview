<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 11/05/2015
 * Time: 21:12
 */

namespace controller;

//include('../vendor/autoload.php');
//include('../models/Question.php');
//include('../models/Competence.php');
//include('../models/JobTitle.php');
//include('../models/JobTitleQuestion.php');

class Controller
{

    protected $questions = array();
    protected $competences = array();
    protected $jobTitles = array();
    protected $jobTitlesQuestions = array();
    protected $questionsMarked = array();
    protected $competencesNotNeeded = array();


    public function getVragen()
    {
        return $this->questions;
    }

    public function getCompetences()
    {
        return $this->competences;
    }

    public function getJobTitles()
    {
        // change this to a stored procedure that fetches ALL jobTitles

        return $this->jobTitles;
    }

    public function getQuestionsMarked()
    {
        return $this->questionsMarked;
    }

    public function getCompetencesNotNeeded()
    {
        return $this->competencesNotNeeded;
    }

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

    public function SelectQuestions($competenceId)
    {
        $v = Array();

        foreach ($this->questions as $question) {
            if ($question->getCompetenceId() == $competenceId) {
                $v[] = $question;
            }
        }
        return $v;
    }


    public function FillCompetencesNotNeeded()
    {
        $this->competencesNotNeeded = Array();

        foreach ($this->competences as $comp) {
            $this->competencesNotNeeded[$comp->getId()] = $comp->getId();
        } // this is a distinct array already!!


        foreach ($this->questionsMarked as $questionId) {
            $question = $this->SelectQuestionById($questionId);
            if (isset ($question)) {
                if (array_key_exists($question->getCompetenceId(), $this->competencesNotNeeded)) {
                    unset($this->competencesNotNeeded[$question->getCompetenceId()]);
                }
            }
        }

        /* for testing the results
        echo '<pre>';
        var_dump($this->competencesNotNeeded);
        echo '</pre>';
         */

    }

    public function LoadDataByFunction($functionId)
    {
        // this should call stored procedures doing
        // - loading ALL questions in $this->questions
        // - loading ALL competences in $this->competences
        // - loading all the questions that are tied to a function in $this->questionsMarked

        // then make an array $this->competencesNotNeeded using $this->questions and $this->questionsMarked that will be used to hide competences
        $this->questionsMarked = Array();

        if ($functionId == 1) {
            $this->questionsMarked[1] = 1;
            $this->questionsMarked[3] = 3;
        } else if ($functionId == 2) {
            $this->questionsMarked[1] = 1;
            $this->questionsMarked[2] = 2;
        }

        $this->FillCompetencesNotNeeded();
    }


    public function SelectCompetenceById($competenceId)
    {
        if (isset($competenceId)) {
            if (array_key_exists($competenceId, $this->competences)) {
                return $this->competences[$competenceId];
            }
        }
    }

    public function SelectQuestionById($questionId)
    {
        if (isset($questionId)) {
            if (array_key_exists($questionId, $this->questions)) {
                return $this->questions[$questionId];
            }
        }
    }
}