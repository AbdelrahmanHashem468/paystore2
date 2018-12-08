<?php

include_once '../Models/DataBase.php';

class WhiteList {
    
    function __construct() {}
    
    public function connect_db() {
        $file_name = '../Models/credential.php';
        $db = DataBase::getInstance($file_name);
        $conn = $db->get_connection();
        return $conn;
    }
    
    public function add_to_love($user_id, $pro_id) {
        $conn = $this->connect_db();
        
        $query = "insert into love (cust_id, pro_id) values($user_id, $pro_id)";
        $result = $conn->query($query);
        return $result;
    }
    
    public function remove_from_love($user_id, $pro_id) {
        $conn = $this->connect_db();
        
        $query = "delete from love where cust_id = $user_id and pro_id = $pro_id";
        $result = $conn->query($query);
        return $result;
    }
    
    public function  get_my_likes($user_id) {
        $file_name = '../Models/credential.php';
        $db = DataBase::getInstance($file_name);
        
        $query = "SELECT pro_id FROM love WHERE cust_id = $user_id";
        $likes = $db->fetch_query($query);
        return $likes;
        
    }
    
}