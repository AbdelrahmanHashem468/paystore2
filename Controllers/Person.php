<?php

trait Person {
    
    public $username;
    public $password;
    public $id;
    public $age;
    public $email;

    function __construct() {}
    
    function __set($name, $value) {
        switch($name) {
            case 'username': 
                $this->username = $value;
                break;
            case 'password': 
                $this->password = $value;
                break;
            case 'age': 
                $this->age = $value;
                break;
            case 'email': 
                $this->email = $value;
                break;
            default:
                echo $name . ' Not Found';
        }
    }
    
    function __get($name) {
        return $this->$name;
    }
    
}