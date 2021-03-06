<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 12/05/2015
 * Time: 23:34
 */

namespace model;

class JobTitleQuestion {
    private $id;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    private $questionId;

    public function setQuestionId($questionId) {
        $this->questionId = $questionId;
    }

    public function getQuestionId() {
        return $this->questionId;
    }

    private $jobTitleId;

    public function setJobTitleId($jobTitleId) {
        $this->jobTitleId = $jobTitleId;
    }

    public function getJobTitleId() {
        return $this->jobTitleId;
    }

    public function __construct($id, $questionId, $jobTitleId)
    {
        $this->id = $id;
        $this->questionId = $questionId;
        $this->jobTitleId = $jobTitleId;
    }
}