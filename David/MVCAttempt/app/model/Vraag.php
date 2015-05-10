<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 9/05/2015
 * Time: 18:32
 */

namespace app\model;

class Vraag
{
    private $id;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    private $echteVraag;

    public function setEchteVraag($echteVraag) {
        $this->echteVraag = $echteVraag;
    }

    public function getEchteVraag() {
        return $this->echteVraag;
    }

    private $competentieId;

    public function setCompetentieId($competentieId) {
        $this->competentieId = $competentieId;
    }

    public function getCompetentieId() {
        return $this->competentieId;
    }

    public function __construct($id, $echteVraag, $competenceId)
    {
        $this->id = $id;
        $this->echteVraag = $echteVraag;
        $this->competentieId = $competenceId;
    }
}