<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 9/05/2015
 * Time: 16:30
 */

namespace app\controller;
include('../model/Vraag.php');

use app\model\Vraag;

class Controller
{
    protected $vragen = array();
    protected $vragenIds = array();
    protected $competenties = array();
    protected $competentiesIds = array();

    public function getVragen() {
        return $this->vragen;
    }

    public function getVragenIds() {
        return $this->vragenIds;
    }

    public function getCompetenties() {
        return $this->competenties;
    }

    public function getCompetentiesIds() {
        return $this->competentiesIds;
    }
    /*
     * summary
     * receives 2 arrays of id's of checkboxes to be marked (competence and question)
     * the controller will perform all db actions through a DAL class
     * these actions will be based on the id's of the checkboxes that are marked
     * results will be stored in 4 vars:
     * - $questions
     * - $questionIds
     * - $competences
     * - $competenceIds
     * these vars can then be used from different php file.
    */

    public function LoadTestData()
    {
        // simple data for testing
        $vraag1 = new Vraag(1, 'Vraag 1');
        $this->vragen[] = $vraag1;

        $vraag2 = new Vraag(2, 'Vraag 2');
        $this->vragen[] = $vraag2;

    }


}