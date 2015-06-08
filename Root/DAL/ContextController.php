<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 6/06/2015
 * Time: 10:23
 */

namespace DAL;

class ContextController
{
    // helper class to use one single PDO for multiple stored procedures on a single page

    private $log;
    private $connection;
    private $pdo;

    public function __construct()
    {
        $this->log = new Helpers\LogApp('en_US');
        $this->connection = new Provider($this->log);
        $this->pdo = new \PDO($this->connection->connectionString, $this->connection->getUserName(), $this->connection->getPassword());
    }

    public function getLog()
    {
        return $this->log;
    }

    public function getPDO()
    {
        return $this->pdo;
    }
}