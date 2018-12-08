<?php

include_once '../Models/DataBase.php';

class Admin { 
    private $password;
    private $email;
    private $id;
    
    function __construct()
    {
        $this->id = 0;
        $this->password = 951753852;
        $this->email = 'admin_paystore@gmail.com';
    }
    
    function __get($name) {
        return $this->$name;
    }
    
    public function log_in($pass)
    {
        if($pass == $this->password) {
            return true;
        } else {
            return false;
        }
    }
    
    public function connect_db() {
        $file_name = '../Models/credential.php';
        $db = DataBase::getInstance($file_name);
        $conn = $db->get_connection();
        return $conn;
    }
    
    public function remove_product($pro_id) {
        $conn = $this->connect_db();
        
        $query = "delete from product where id = $pro_id";
        $result = $conn->query($query);
        return $result;
    }
    
    public function get_customer_by_id($cust_id) {
        $file_name = '../Models/credential.php';
        $db = DataBase::getInstance($file_name);
        
        $query = "SELECT * FROM customer WHERE id = $cust_id";
        $customer = $db->fetch_query($query);
        
        if($customer == NULL) {
            return false;
        } else {
            return $customer;
        }
        
    }
    
    public function delete_customer_by_id($cust_id) {
        $conn = $this->connect_db();
        
        $query = "DELETE FROM customer WHERE id = $cust_id";
        $res = $conn->query($query);
        return $res; 
    }
    
    public function get_customers() {
        $file_name = '../Models/credential.php';
        $db = DataBase::getInstance($file_name);
        
        $query = "SELECT * FROM customer";
        $customers = $db->fetch_query($query);
        
        return $customers;
    }
    
}