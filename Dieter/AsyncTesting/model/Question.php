<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 9/05/2015
 * Time: 18:32
 */

namespace model;

class Question
{
    private $id;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    private $fullQuestion;

    public function setFullQuestion($fullQuestion) {
        $this->fullQuestion = $fullQuestion;
    }

    public function getFullQuestion() {
        return $this->fullQuestion;
    }

    private $competenceId;

    public function setCompetenceId($competenceId) {
        $this->competenceId = $competenceId;
    }

    public function getCompetenceId() {
        return $this->competenceId;
    }

    public function __construct($id, $fullQuestion, $competenceId)
    {
        $this->id = $id;
        $this->fullQuestion = $fullQuestion;
        $this->competenceId = $competenceId;
    }
}