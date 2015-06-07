<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 10/05/2015
 * Time: 19:51
 */

namespace Models;

class Competence {
    private $id;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    private $name;

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}