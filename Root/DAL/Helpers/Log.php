<?php
namespace DAL\Helpers;
/**
* Logbook class.
* This class logs feedback objects
* @lastmodified 17/01/2015
* @since 25/8/2014          
* @author Entreprise de Modes et de Manieres Modernes - e3M       
* @version 0.1
*/    
class Log extends Feedback
{
    private $book = array();

    public function __construct()
    {
    }

    public function getBook()
    {
        return $this->book;
    }

    // return one entry in the log based in the name
    public function getEntry($name) 
    {
        return $this->book[$name];
            
    }

    public function log()
    {
        $this->push($this->copy());
    }

    public function push($feedbackObject)
    {
        // haal de naam eruit want die wil ik
        // als string index gebruiken voor 
        // de book array
        // naam is niet hooflettergevoelig
        // geef een volgnummer gescheiden door -
        $name = count($this->book) . '-' . $feedbackObject->getName();
        $this->book[$name] = $feedbackObject;
    }

    public function delete($name)
    {
        $entry = $this->get($name);
        // unset is of type void
        unset($this->book[$name]);
        return $entry;
    }

    public function clear() 
    {
        $this->book = array();
    }

    public function append($value)
    {
        if (count($this->book) == 0)
        {
            $this->book = $value;
        }
        else
        {
            $this->book = array_merge($this->book, $value);
        }
    }
}


