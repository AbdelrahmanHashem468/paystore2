<?php

include_once 'Person.php';
include_once 'ShoppingCart.php';
include_once '../Models/DataBase.php';

class Customer {
    private $my_cart;
    private $my_report;
    
    use Person;
    private $zipcode;
    private $address;
    private $phone_n;
    
    public function __construct() {
        $this->my_cart = new ShoppingCart();
    }
    
    function __set($name, $value) {
        switch($name) {
            case 'zipcode':
                $this->zipcode = $value;
                break;
            case 'address':
                $this->address = $value;
                break;
            case 'phone_n':
                $this->phone_n = $value;
                break;
            default :
                echo 'Not Valid';
                break;
        }
    }
    
    function __get($name) {
        return $this->$name;
    }
    
    public function get_db() {
        $file_name = "../Models/credential.php"; 
        $db = DataBase::getInstance($file_name);
        return $db;
    }
    
    public function search($strword){
        $db = $this->get_db();
        $str = strtolower($strword); $chars = str_split($str); $str2 = ''; $idarr = array(); $n = strpos($str, ' ');
        if(!is_numeric($n)) {
            $str2 = implode($str2, $chars);
            $my_query="SELECT id from product where name LIKE'$str2%' or brand LIKE'$str2%' or type LIKE'$str2%'";
            $row = $db->fetch_query($my_query);
            for($m=0;$m<count($row);$m++){
                array_push($idarr,$row[$m]['id']);
            }
        }
        $newstr= explode(" ", $str);
        for($i=0; $i<count($newstr); $i++){
            $word = $newstr[$i];
            $my_query="SELECT id FROM product WHERE name = '$word' OR brand = '$word' OR type ='$word'";
            $row = $db->fetch_query($my_query);
            for($j=0; $j<count($row); $j++){
                array_push($idarr,$row[$j]['id']);
            }
        }
        return array_unique($idarr);
    }
    
    public function get_customers() {
        $db = $this->get_db();
        
        $query = "SELECT * FROM customer";
        $customers = $db->fetch_query($query);
        return $customers;
    }
    
    public function makeAreport($text){
        include_once 'Report.php';
        $this->my_report = new Report();
        $this->my_report->write($text, $this->id);
    }
    
    public function connect_db() {
        $db = $this->get_db();
        $conn = $db->get_connection();
        return $conn;
    }
    
    public function update_profile($id, $image) {
        $conn = $this->connect_db();
         $sql = "SELECT my_image FROM customer WHERE id = '$id'";
        $img = $conn->query($sql);
        $img=mysqli_fetch_assoc($img);
        if($img['my_image']!='mem.png'){
             unlink('../Models/uploads/'.$img['my_image']);
        }
        
        $sql = "UPDATE customer SET my_image = '$image' WHERE id = $id";
        $res = $conn->query($sql);
        return $res;
    }
    
    public function get_my_image($user_id) {
        $db = $this->get_db();
        
        $sql = "SELECT my_image FROM customer WHERE id = '$user_id'";
        $img = $db->fetch_query($sql);
        return $img;
    }
    public function encrpt($str){
        $new_str="";
        for($i=0;$i<strlen($str);$i++){
            $n=ord($str[$i])+1;
            $new_str=$new_str.chr($n);
        }
        return $new_str;
    }
    public function dencrpt($str){
         $new_str="";
        for($i=0;$i<strlen($str);$i++){
            $n=ord($str[$i])-1;
            $new_str=$new_str.chr($n);
        }
        return $new_str;
    }
}