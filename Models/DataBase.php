<?php

class DataBase {
    
    //Atrr
    private $host;
    private $user;
    private $pass;
    private $name;
    private $conn;
    // for design patteren
    private static $instance;
    
    // Constructor
    private function __construct($fileName) {
        try {
            include_once $fileName;
        } catch (Exception $e) {
            echo "Error in calling file: " . $e;
        }
        // Assign Values
        $this->host = $dbhost;
        $this->user = $dbuser;
        $this->pass = $dbpass;
        $this->name = $dbname;
        $this->connection();
    }// End of Constructor
    
    // Connect to server
    private function connection() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name) or die("Failed Connection");
    }
    
    // Close Connection
    function close_connection() {
        mysqli_close($this->conn);
    }
    
    // Get Connection
    function get_connection() {
        return $this->conn;
    }
    
    // create only one object for databse
    public static function getInstance($filename) {
        if(!self::$instance) {
            self::$instance = new self($filename);
        }
        return self::$instance;
    }
    
    // apply query and return assc aaray
    public function fetch_query($query) {
        $result = $this->database_query($query);
        
        if(isset($result) && $result != False) {
            return $this->database_all_assoc($result);
        }
    }
    //apply query
    public function database_query($database_query) {
        $sSQL= 'SET CHARACTER SET utf8';
        mysqli_query($this->conn, $sSQL);
    
        $result = mysqli_query($this->conn, $database_query);
        return $result;
    }
    // return assc array
    public function database_all_assoc($result) {
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        if(isset($arr)) {
            return $arr;
        }
    }
    
}// End of Class DataBase