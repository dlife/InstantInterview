<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 9/05/2015
 * Time: 16:30
 */

namespace app\controller;
include('../model/Vraag.php');
include('../model/Competentie.php');

use app\model\Competentie;
use app\model\Vraag;

class Controller
{
    protected $vragen = array();
    protected $vragenIds = array();
    protected $competenties = array();
    protected $competentiesIds = array();

    public function getVragen()
    {
        return $this->vragen;
    }

    public function getVragenIds()
    {
        return $this->vragenIds;
    }

    public function getCompetenties()
    {
        return $this->competenties;
    }

    public function getCompetentiesIds()
    {
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
        $vraag1 = new Vraag(1, 'Vraag 1', 1);
        $this->vragen[$vraag1->getId()] = $vraag1;

        $vraag2 = new Vraag(2, 'Vraag 2', 1);
        $this->vragen[$vraag2->getId()] = $vraag2;

        $vraag3 = new Vraag(3, 'Vraag 3', 2);
        $this->vragen[$vraag3->getId()] = $vraag3;

        $vraag4 = new Vraag(4, 'Vraag 4', 2);
        $this->vragen[$vraag4->getId()] = $vraag4;

        $comp1 = new Competentie(1, 'Competentie 1');
        $this->competenties[$comp1->getId()] = $comp1;

        $comp2 = new Competentie(2, 'Competentie 2');
        $this->competenties[$comp2->getId()] = $comp2;

    }

    public function SelectBasedOnSession()
    {
        // check the values from the $_SESSION array
        if (isset($_SESSION)) {
            if (isset($_SESSION['checkedCompetenties'])) {
                $this->competentiesIds = Array();
                while (list($key, $val) = each($_SESSION['checkedCompetenties'])) {
                    if ($val != 'false') {
                        $this->competentiesIds[$key] = $key;
                    }
                }
            }
            if (isset($_SESSION['checkedVragen'])) {
                $this->vragenIds = Array();
                while (list($key, $val) = each($_SESSION['checkedVragen'])) {
                    if ($val != 'false') {
                        $this->vragenIds[$key] = $key;
                    }
                }
            }
        }

        // use those values to make a query to the server.

        // TEST PHASE: manually remove the items from the array
        foreach ($this->vragen as $vraag) {
            if (isset($this->getCompetentiesIds()[$vraag->getCompetentieId()]))
                continue;
            unset($this->vragen[$vraag->getID()]);
        }
    }

    public function IsVraagChecked($vraagId)
    {
        if (isset($this->vragenIds[$vraagId])){
            return true;
        }
        return false;

    }
}


