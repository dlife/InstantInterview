<?php

/* Original created by AnOrmApart
 * Adapted by Cedric Jacobs
 *
 */
namespace DAL;

class Provider extends \DAL\Helpers\Connection
{
    public function __construct($log)
    {
        $this->log = $log;
        $this->databaseName = 'InterviewDB';
        $this->password = '9uPZV)U;z_)+';
        $this->userName = 'CvoProject';
        $this->hostName = 'trouw.benoot-cupers.com:3306';

    }
}

