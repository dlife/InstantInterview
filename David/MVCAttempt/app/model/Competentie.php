<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 10/05/2015
 * Time: 19:51
 */

namespace app\model;


class Competentie {
    private $id;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    private $naam;

    public function setNaam($naam) {
        $this->naam = $naam;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function __construct($id, $naam)
    {
        $this->id = $id;
        $this->naam = $naam;
    }
}