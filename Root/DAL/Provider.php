<?php

/* Original created by AnOrmApart
 * Adapted by Cedric Jacobs
 *
 */
namespace DAL;

class Provider extends \DAL\Helpers\Connection
{
    public $connectionString;

    public function __construct($log)
    {
        $this->log = $log;
        $this->databaseName = 'InterviewDBTest';
        $this->password = '9uPZV)U;z_)+';
        $this->userName = 'CvoProject';
        $this->hostName = 'trouw.benoot-cupers.com:3306';
        $this->connectionString = "mysql:host=$this->hostName;dbname=$this->databaseName;charset=utf8"; // charset=utf8 fixes the character encoding issue
    }
}

