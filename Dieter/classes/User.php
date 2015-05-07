<?php
/**
 * Created by PhpStorm.
 * User: Dieter
 * Date: 6/05/2015
 * Time: 12:50
 */
class User {
    private $_db,
            $_data,
            $_sessionName;
    public function __construct($user = null){
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('session/session_name');

    }

    public function create($fields){
        if(!$this->_db->insert('users', $fields)){
            throw new Exception('There was a problem creating an account.');
        }
    }

    public function login($username = null, $password = null){
        $user = $this->find($username);

        if ($user){
            if($this->data()->password === Hash::make($password, $this->data()->salt)){
               Session::put($this->_sessionName, $this->data()->id);
                return true;
            }
        }

        return false;
    }

    /**
     * @param $username
     */
    public function find($user = null)
    {
        if($user){
            $field = (is_numeric($user)) ? 'id': 'username';
            $data = $this->_db->get('users', array($field, '=', $user));

            if($data->count()){
                $this->_data = $data->first();
                return true;
            }
       }
    }

    private function data(){
        return $this->_data;
    }
}