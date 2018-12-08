<?php

include_once '../Models/DataBase.php';
include_once 'ShoppingCart.php';

class Invoice {
    
    private $products_ids;
    private $products_qns;
    private $total_cost;
    private $pay_method;
    
    function __construct() {}
    
    function __set($name, $value) {
        switch($name) {
            case 'products_ids': 
                $this->products_ids = $value;
                break;
            case 'products_qns': 
                $this->products_qns = $value;
                break;
            case 'total_cost': 
                $this->total_cost = $value;
                break;
            case 'pay_method': 
                $this->pay_method = $value;
                break;
            default :
                echo 'not found';
                break;
        }
    }
    
    function __get($name) {
        return $this->$name;
    }
    
    public function connect_db() {
        $file_name = '../Models/credential.php';
        $db = DataBase::getInstance($file_name);
        $conn = $db->get_connection();
        return $conn;
    }
    
    function new_invoice($cust_id, $pay_method,$payment){
        $conn = $this->connect_db();
        $cart = new ShoppingCart();
        
        $this->total_cost = $cart->get_total_price($cust_id);
        $arr = $cart->get_my_products_ids($cust_id);
        $arr2 = $cart->get_my_products_qns($cust_id);
        
        $ids = array();
        $qns = array();
        $res=null;
        for($i=0; $i<sizeof($arr); $i++) {
            $pid = $arr[$i]['pro_id']; $pqn = $arr2[$i]['n_pro'];
            $sql = "INSERT INTO sold_products (pro_id, pro_qn, cust_id) values($pid, $pqn, $cust_id)";
            $res = $conn->query($sql);
            
            $ids[] = $arr[$i]['pro_id'];
            $qns[] = $arr2[$i]['n_pro'];
        }
        $this->products_ids = implode(".", $ids);
        $this->products_qns = implode(".", $qns);
        if($res) {
            $query = "INSERT INTO invoice (cust_id, products, quantities, total_cost, pay_method,Visa_Acc) values($cust_id, '$this->products_ids', '$this->products_qns', $this->total_cost, '$pay_method','$payment')";
            $result = $conn->query($query);
            return $result;
        } else {return FALSE;}
    }
    
    function get_invoice($cust_id) {
        $file_name = '../Models/credential.php';
        $db = DataBase::getInstance($file_name);
        
        $query = "SELECT * FROM invoice WHERE cust_id = $cust_id";
        $result = $db->fetch_query($query);
        return $result;
    }
    
}
