<?php
namespace InstantInterview\Helpers;
/**
* Logbook LogApp.
* This class logs app system feed objects
* @since 16/4/2015          
* @author Entreprise de Modes et de Manieres Modernes - e3M       
* @version 0.1
*/
class LogApp extends \InstantInterview\Helpers\Log
{  
    protected $locale;
    protected $message;

    public function __construct($locale = 'en_US')
    {
        $this->locale = $locale;
        $this->message['en_US'] =
            array(
            'CONNECTION' => 
                "Connection with host {0} to {1} database {2, select, e {already exists} o {opened} c {closed} n {not connected} other {failed}}.",
            'SESSION' =>
                "{0, select, s {Secured} other {Not secured}} session with name {1} {2, select, s {started} a {already started} u {not safe and not started (ini_set)} other {undefined}}");

        $this->message['fr_FR'] =
            array(
            'CONNECTION' => 
                "Connexion avec hôte {0} avec banque de données {1} {2, select, e {déjà établie} o {ouverte} c {fermée} n {n'existe pas} other {ratée}}.",
            'SESSION' =>
                "session {0, select, s {securisée} other {non securisée}} avec nom {1} {2, select, s {ouverte} as {déjà ouverte} u {pas securisée et donc pas ouverte (ini_set)} other {inéterminé}}.");

        $this->message['nl_NL'] =
            array(
            'CONNECTION' => 
                "Verbinding met host {0} met database {1} {2, select, e {bestaat al} o {geopend} c {gesloten} n {bestaat niet} other {mislukt}}.",                
            'SESSION' =>
                 "{0, select, s {Beveiligde} other {Onbeveiligde}} sessie met de naam {1} {2, select, s {gestart} as {reeds gestart} u {niet vielig en niet gestart (ini_set)} other {niet nader bapaald}}.");
    
    }


    public function sessionUnsafe($secure, $name)
    {
        return \MessageFormatter::formatMessage($this->locale, 
            $this->message[$this->locale]['SESSION'], 
            array($secure ? 's' : 'i', $name, 'u'));
    }

    public function sessionStarted($secure, $name)
    {
        return \MessageFormatter::formatMessage($this->locale, 
            $this->message[$this->locale]['SESSION'], 
            array($secure ? 'Secured' : 'Insecured', $name, 's'));
    }

    public function sessionAlreadyStarted($secure, $name)
    {
        return \MessageFormatter::formatMessage($this->locale, 
            $this->message[$this->locale]['SESSION'], 
            array($secure ? 'Secured' : 'Insecured', $name, 'as'));
    }

    public function sessionEnded($secure, $name)
    {
        return \MessageFormatter::formatMessage($this->locale, 
            $this->message[$this->locale]['SESSION'], 
            array($secure ? 'Secured' : 'Insecured', $name, 'e'));
    }
    public function connectionFailed($hostName, $databaseName)
    {
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

