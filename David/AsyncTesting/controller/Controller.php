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

class Controller
{

    protected $questions = array();
    protected $competences = array();

    public function getVragen()
    {
        return $this->questions;
    }

    public function getCompetences()
    {
        return $this->competences;
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