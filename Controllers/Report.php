<?php

include_once '../Models/DataBase.php';

class Report {
    private $text;
    private $time;
    
    function __construct() {
       $this->time = date("Y-m-d");
    }
	
    function __set($name, $value) {
        switch ($name) {
            case 'text':
                $this->text = $value;
                break;
            default:
                echo $name . ' Not Found<br />';
        }
        #echo 'Set ' . $name . ' To ' . $value . '<br />';
    }

    function __get($name) {
        #echo 'Asked for ' . $name . '<br />';
        return $this->$name;
    }
    
    public function get_db() {
        $file_name = '../Models/credential.php';
        $db = DataBase::getInstance($file_name);
        $db->getInstance($file_name);
        return $db;
    }
    
    public function write($tex , $cust_id) {
        $db = $this->get_db();
        $conn=$db->get_connection();
        $text = mysqli_real_escape_string($conn,$tex);
        
        $my_query = "insert into report(cust_id, text, time) values($cust_id, '$text', '$this->time')";
        $result = $db->database_query($my_query);
        if(!$result) {
            die("<br />Error in query<br />");
            return false;
        }
        return true;
    }
    
    public function get_reports() {
        $db = $this->get_db();
        
        $query = "SELECT * FROM report";
        $reports = $db->fetch_query($query);
        return $reports;
    }
    
}