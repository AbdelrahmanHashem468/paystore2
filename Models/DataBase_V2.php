<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class DataBase_V2{
     private $host = "localhost";
     private $user = "root";
     private $pass = "";
     private $name = "mydb";
     private $conn;
     
     public function __construct() {
          $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name) or die("Failed Connection");
     }
     
     public function close_connection() {
        mysqli_close($this->conn);
    }
     public function get_connection() {
        return $this->conn;
    }
    
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
}

