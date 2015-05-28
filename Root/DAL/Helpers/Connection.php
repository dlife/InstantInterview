<?php
    /**
        Connection class
        @since 10 april 2012
        @lastmodified 15 april 2015
        @author JI
        @version 1.0
    */

    // name of namespace should be semantically meaningfull:
    // cover the domain of the code
    namespace DAL\Helpers;

    class Connection 
    {
        // design means identifying data and methods
        protected $log;
        protected $databaseName;
        protected $pdo;
        protected $userName;
        protected $hostName;
        protected $password;

	    public function getDatabaseName()
	    {
		    return $this->databaseName;
	    }
	    public function setDatabaseName($value)
	    {
		    $this->databaseName = $value;
	    }

        public function SetPassword($value)
        {
            $this->password = $value;
        }

        public function SetUserName($value)
        {
            $this->userName = $value;
        }

        public function SetHostName($value)
        {
            $this->hostName = $value;
        }

	    public function getPdo()
	    {
		    return $this->pdo;
	    }

	    public function isConnected()
	    {
            return ($this->pdo ? TRUE : false);
	    }

        // constructor wordt uitgevoerd met
        // het new keyword
        public function __construct($log)
        {
            $this->log = $log;
        }

        /**
        * Maakt een connectie met de database
        * @return Bool true als de connectie is gelukt, false als mislukt
        */
        public function open()
        {
            $this->log->startTimeInKey('open connection');

            if ($this->pdo)
            {
                $text = $this->log->connectionEstablished($this->hostName, $this->databaseName);
                $this->log->setText($text);
                $this->log->log();
            }
            else
            {
                try
                {

                     $connectionString =
                        "mysql:host={$this->hostName};dbname={$this->databaseName}";
                    // je moet aangeven dat de PDO klasse in de root namespace
                    // gezocht moet worden in niet in MyBib\Dal
                    $this->pdo = new \PDO($connectionString, $this->userName, $this->password);
                    $text = $this->log->connectionOpened($this->hostName, $this->databaseName);
                    $this->log->setText($text);
 			        $this->log->setErrorCodeDriver('DAL Connection');
                    $this->log->log();
                }
                catch (\PDOException $e)
                {
                    echo '<pre>';
                    var_dump( $this->pdo);
                    echo '</pre>';

                    $text = $this->log->connectionFailed($this->hostName, $this->databaseName);
                    $this->log->setText($text);
 				    $this->log->setErrorMessage('Fout: ' . $e->getMessage());
				    $this->log->setErrorCode($e->getCode());
 			        $this->log->setErrorCodeDriver('DAL Connection');
                    $this->log->end();
                    $this->log->log();
               }
            }
            return (!is_null($this->pdo));
        }

        public function close()
        {
            // $this->log->clear();
            $this->log->startTimeInKey('close connection');
            if (is_null($this->pdo))
            {
                $text = $this->log->connectionNotConnected($this->hostName, $this->databaseName);
                $this->log->setText($text);
                $this->log->log();
            }
            else
            {
                $this->pdo = NULL;
                $text = $this->log->connectionClosed($this->hostName, $this->databaseName);
                $this->log->setText($text);
                $this->log->end();
                $this->log->log();
            }
        }
    }

