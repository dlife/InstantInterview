<?php
/**
 * Created by PhpStorm.
 * User: 11791
 * Date: 11/05/2015
 * Time: 21:12
 */

namespace controller;

class Controller {

    protected $vragen = array();
    protected $competenties = array();

    public function getVragen()
    {
        return $this->vragen;
    }

    public function getCompetenties()
    {
        return $this->competenties;
    }

    public function LoadTestData()
    {
        // simple data for testing
        $vraag1 = new \model\Vraag(1, 'Vraag 1', 1);
        $this->vragen[$vraag1->getId()] = $vraag1;

        $vraag2 = new \model\Vraag(2, 'Vraag 2', 1);
        $this->vragen[$vraag2->getId()] = $vraag2;

        $vraag3 = new \model\Vraag(3, 'Vraag 3', 2);
        $this->vragen[$vraag3->getId()] = $vraag3;

        $vraag4 = new \model\Vraag(4, 'Vraag 4', 2);
        $this->vragen[$vraag4->getId()] = $vraag4;

        $comp1 = new \model\Competentie(1, 'Competentie 1');
        $this->competenties[$comp1->getId()] = $comp1;

        $comp2 = new \model\Competentie(2, 'Competentie 2');
        $this->competenties[$comp2->getId()] = $comp2;

    }
}