<?php
final class Order {
    
     private $starttime;
     private $endtime;
    function __construct() {
        $date =new DateTime();
        $this->starttime = date("Y-m-d");
        $this->endtime = $date->modify("+6 days")->format('Y/m/d');
    }
    public function add_end_time($cust_id){
         include_once '../Models/DataBase.php';
        $file_name = '../Models/credential.php';
        $db = DataBase::getInstance($file_name);
        $conn = $db->get_connection();
        
        $my_query = "Update invoice set end_time = '$this->endtime' where cust_id=$cust_id and end_time='0000-00-00'";
        $result = mysqli_query($conn, $my_query);
        if(!$result){
        die("error in query");
        } else {
            return $this->endtime;
        }
    }

    public function __get($name) {
        return $this->$name;
    }
}







