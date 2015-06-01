<?php

/* Original created by AnOrmApart
 * Adapted by Cedric Jacobs
 *
 */
namespace InstantInterview\Helpers;

class Provider extends Connection
{
    public function __construct($log)
    {
        $this->log = $log;
        $this->databaseName = 'InterviewDB';
        $this->password = '9uPZV)U;z_)+';
        $this->userName = 'CvoProject';
        $this->hostName = 'trouw.benoot-cupers.com:3306';
        $this->connectionString = "mysql:host=$this->hostName;dbname=$this->databaseName";
    }
}

