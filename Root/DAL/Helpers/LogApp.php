<?php
namespace DAL\Helpers;
/**
* Logbook LogApp.
* This class logs app system feed objects
* @since 16/4/2015          
* @author Entreprise de Modes et de Manieres Modernes - e3M       
* @version 0.1
*/
class LogApp extends Log
{  
    protected $locale;
    protected $message;

    public function __construct($locale = 'en_US')
    {
        $this->locale = $locale;
        $this->message['en_US'] =
                array('CONNECTION' => 
                    "Connection with host {0} to {1} database {2, select, e {already exists} o {opened} c {closed} n {not connected} other {failed}}.");

        $this->message['fr_FR'] =
            array('CONNECTION' => 
                "Connexion avec hôte {0} avec banque de données {1} {2, select, e {déjà établie} o {ouverte} c {fermée} n {n'existe pas} other {ratée}}.");

        $this->message['nl_NL'] =
            array('CONNECTION' => 
                "Verbinding met host {0} met database {1} {2, select, e {bestaat al} o {geopend} c {gesloten} n {bestaat niet} other {mislukt}}.");
    
    }

    public function connectionFailed($hostName, $databaseName)
    {
        return 'stuff failed';

        return \MessageFormatter::formatMessage($this->locale,
            $this->message[$this->locale]['CONNECTION'], 
            array($hostName, $databaseName, 'f'));
    }

    public function connectionOpened($hostName, $databaseName)
    {
        return \MessageFormatter::formatMessage($this->locale,
            $this->message[$this->locale]['CONNECTION'],
            array($hostName, $databaseName, 'o'));
    }

    public function connectionClosed($hostName, $databaseName)
    {
        return \MessageFormatter::formatMessage($this->locale,
            $this->message[$this->locale]['CONNECTION'],
            array($hostName, $databaseName, 'c'));
    }

    public function connectionNotConnected($hostName, $databaseName)
    {
        return 'stuff did not connect';
        return \MessageFormatter::formatMessage($this->locale,
            $this->message[$this->locale]['CONNECTION'],
            array($hostName, $databaseName, 'n'));
    }

    public function connectionEstablished($hostName, $databaseName)
    {
        return \MessageFormatter::formatMessage($this->locale,
            $this->message[$this->locale]['CONNECTION'], 
            array($hostName, $databaseName, 'e'));
    }
}
