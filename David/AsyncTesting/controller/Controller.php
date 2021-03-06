<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 11/05/2015
 * Time: 21:12
 */

namespace controller;
include('model/Question.php');
include('model/Competence.php');
include('model/JobTitle.php');
include('model/JobTitleQuestion.php');

class Controller
{

    protected $questions = array();
    protected $competences = array();
    protected $jobTitles = array();
    protected $jobTitlesQuestions = array();


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
        return $this->jobTitles;
    }

    public function LoadTestData()
    {
        // simple data for testing
        $vraag1 = new \model\Question(1, 'Vraag 1', 1);
        $this->questions[$vraag1->getId()] = $vraag1;

        $vraag2 = new \model\Question(2, 'Vraag 2', 1);
        $this->questions[$vraag2->getId()] = $vraag2;

        $vraag3 = new \model\Question(3, 'Vraag 3', 2);
        $this->questions[$vraag3->getId()] = $vraag3;

        $vraag4 = new \model\Question(4, 'Vraag 4', 2);
        $this->questions[$vraag4->getId()] = $vraag4;

        $comp1 = new \model\Competence(1, 'Competentie 1');
        $this->competences[$comp1->getId()] = $comp1;

        $comp2 = new \model\Competence(2, 'Competentie 2');
        $this->competences[$comp2->getId()] = $comp2;

        $jobTitle1 = new \model\JobTitle(1, 'Functie 1');
        $this->jobTitles[$jobTitle1->getId()] = $jobTitle1;

        $jobTitle2 = new \model\JobTitle(2, 'Functie 2');
        $this->jobTitles[$jobTitle2->getId()] = $jobTitle2;

        $jobTitleQuestion1 = new \model\JobTitleQuestion(1, 1, 1);
        $this->jobTitlesQuestions[$jobTitleQuestion1->getId()] = $jobTitleQuestion1;

        $jobTitleQuestion2 = new \model\JobTitleQuestion(2, 3, 1);
        $this->jobTitlesQuestions[$jobTitleQuestion2->getId()] = $jobTitleQuestion2;

        $jobTitleQuestion3 = new \model\JobTitleQuestion(3, 1, 2);
        $this->jobTitlesQuestions[$jobTitleQuestion3->getId()] = $jobTitleQuestion3;

        $jobTitleQuestion4 = new \model\JobTitleQuestion(4, 2, 2);
        $this->jobTitlesQuestions[$jobTitleQuestion4->getId()] = $jobTitleQuestion4;
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

    public function SelectCompetenceById($competenceId)
    {
        if (isset($competenceId)) {
            if (array_key_exists($competenceId, $this->competences)) {
                return $this->competences[$competenceId];
            }
        }
    }
}