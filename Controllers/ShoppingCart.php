<?php

include_once '../Models/DataBase.php';
include_once 'Product.php';

class ShoppingCart {
    
    function __construct() {}
    
    function __set($name, $value) {
        $this->$name = $value;
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
    
    public function add_to_cart($user_id, $pro_id) {
        $conn = $this->connect_db();
        
        $query = "insert into cart (cust_id, pro_id) values($user_id, $pro_id)";
        $result = $conn->query($query);
        return $result;
    }
    
    public function remove_product($user_id, $pro_id) {
        $db = $this->get_db();
        $conn = $this->connect_db();
        
        $sql = "SELECT n_pro FROM cart WHERE cust_id = $user_id and pro_id = $pro_id";
        $nPro = $db->fetch_query($sql);
        $num = $nPro[0]['n_pro'];
        
        $pro = new Product(NULL);
        $pro->inc_quantity($pro_id, $num);
        
        $query = "delete from cart where cust_id = $user_id and pro_id = $pro_id";
        $result = $conn->query($query);
        return $result;
    }
    
    public function clear_cart($user_id) {
        $conn = $this->connect_db();
        
        $query = "delete from cart where cust_id = $user_id";
        $result = $conn->query($query);
        return $result;
    }
    
    public function get_db() {
        $file_name = '../Models/credential.php';
        $db = DataBase::getInstance($file_name);
        return $db;
    }
    
    public function get_my_products($user_id) {
        $db = $this->get_db();
        
        $query2 = "SELECT * FROM product INNER JOIN cart ON product.id = cart.pro_id WHERE cart.cust_id = $user_id";
        $products = $db->fetch_query($query2);
        return $products;
    }
    
    public function get_my_products_ids($user_id) {
        $db = $this->get_db();
        
        $query2 = "SELECT pro_id FROM cart WHERE cust_id = $user_id";
        $products_ids = $db->fetch_query($query2);
        return $products_ids;
    }
    
    public function get_my_products_qns($user_id) {
        $db = $this->get_db();
        
        $query2 = "SELECT n_pro FROM cart WHERE cust_id = $user_id";
        $products_qns = $db->fetch_query($query2);
        return $products_qns;
    }
    
    public function get_total_price($user_id) {
        $db = $this->get_db();
        
        $products = $this->get_my_products($user_id);
        $total_price = 0;
        
        $query = "SELECT n_pro FROM cart WHERE cust_id = $user_id";
        $arrNpro = $db->fetch_query($query);
        
        $nPro = array();
        if(!is_null($arrNpro))
        for($j=0; $j<sizeof($arrNpro); $j++) {
            $nPro[] = $arrNpro[$j]['n_pro'];
        }
        if (!is_null($products)){
        for($i=0; $i<sizeof($products); $i++) {
            $total_price += $products[$i]['Price']*$nPro[$i]; 
        }
    }
        return $total_price;
    }
    
    public function get_n_pro($user_id) {
        $db = $this->get_db();
        
        $query = "SELECT n_pro FROM cart WHERE cust_id = $user_id";
        $nPro = $db->fetch_query($query);
        return $nPro;
    }
    
    public function update_nPro($user_id, $pro_id, $n_pro) {
        $db = $this->get_db();
        $conn = $this->connect_db();
        
        $pro = new Product(NULL);
        
        $sql = "SELECT n_pro FROM cart WHERE cust_id = $user_id and pro_id = $pro_id";
        $nPro = $db->fetch_query($sql);
        $num = $nPro[0]['n_pro'];
        
        if($num < $n_pro) {
            $result = $n_pro - $num;
            $pro->dec_quantity($pro_id, $result);
        } else if($num > $n_pro) {
            $result = $num - $n_pro;
            $pro->inc_quantity($pro_id, $result);
        }
        
        $query = "UPDATE cart SET n_pro = $n_pro WHERE cust_id = $user_id and pro_id = $pro_id";
        $res = $conn->query($query);
        return $res;
    }
    
}