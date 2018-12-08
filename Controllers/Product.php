<?php
include_once '../rsa.class.php';

class Product {
    private $id;
    private $name;
    private $type;
    private $brand;
    private $price;
    private $quantity;
    private $image_name;
    private $number_sold;
     
    
    public static $number_of_products = 0;
    
    function __construct($val) {
        if($val == NULL) {
            // Do No Thing
        } else {
            Product::$number_of_products++;
        }
    }//End Of Constructor
    
    function __set($name, $value) {
        switch($name) {
            case 'id' : $this->id = $value; break;
            case 'name' : $this->name = $value; break;
            case 'type' : $this->type = $value; break;
            case 'brand' : $this->brand = $value; break;
            case 'price' : $this->price = $value; break;
            case 'quantity' : $this->quantity = $value; break;
            case 'image_name' : $this->image_name = $value; break;
            case 'number_sold' : $this->number_sold = $value; break;
            default : 
                echo $name . ' Not Found';
        }
        #echo 'Set ' . $name . ' To ' . $value . '<br />';
    }//end of function set
    
    function __get($name) {
        #echo 'Asked for ' . $name . '<br />';
        return $this->$name;
    }
    
    function __toString() {
        return "Product Name: " . $this->name . "<br />Product Id: " . $this->id . ",<br />Product Type: " . $this->type . 
                "<br />Product Brand: " . $this->brand . "<br />Product Price: " . $this->price . 
                "<br />Product Quantity" . $this->quantity . "<br />Number Of Sold Item: " . $this->number_sold;
    }
    
    public function check_quantity() {
        if($this->quantity > 0) {
            return True;
        } else {
            return False;
        }
    }
    
    public function connect() {
        include_once '../Models/DataBase.php';
        $file_name = '../Models/credential.php';
        $db = DataBase::getInstance($file_name);
        
        return $db;
    }
    
    public function get_products() {
        $RSA = new RSA();
        $keys = $RSA->generate_keys ('9990454949', '9990450271', 0);  
        $db = $this->connect();
        $query = "SELECT id, name, type, brand, price, quantity, image_name FROM product";
        $product = $db->fetch_query($query);
        $arr = [];
        for($i=0;$i<sizeof($product);$i++){
            $arr[$i]['id'] = $product[$i]['id'];
            $arr[$i]['type'] =$RSA->decrypt($product[$i]['type'] , $keys[2], $keys[0]);
            $arr[$i]['price'] =$RSA->decrypt($product[$i]['price'] , $keys[2], $keys[0]);
            $arr[$i]['name'] =$RSA->decrypt($product[$i]['name'] , $keys[2], $keys[0]);
            $arr[$i]['brand'] =$RSA->decrypt($product[$i]['brand'] , $keys[2], $keys[0]);
            $arr[$i]['quantity'] =$RSA->decrypt($product[$i]['quantity'] , $keys[2], $keys[0]);
            $arr[$i]['image_name'] =$RSA->decrypt($product[$i]['image_name'] , $keys[2], $keys[0]);
        }
        return $arr;
    }
    public function get_product_by_id($pro_id) {
        $RSA = new RSA();
        $keys = $RSA->generate_keys ('9990454949', '9990450271', 0);         
        $db = $this->connect();
        $query = "SELECT * FROM product WHERE id = $pro_id";
        $product = $db->fetch_query($query);
        $arr = [];
        for($i=0;$i<sizeof($product);$i++){
            $arr[$i]['id'] = $product[$i]['Id'];
            $arr[$i]['type'] =$RSA->decrypt($product[$i]['Type'] , $keys[2], $keys[0]);
            $arr[$i]['price'] =$RSA->decrypt($product[$i]['Price'] , $keys[2], $keys[0]);
            $arr[$i]['name'] =$RSA->decrypt($product[$i]['Name'] , $keys[2], $keys[0]);
            $arr[$i]['brand'] =$RSA->decrypt($product[$i]['Brand'] , $keys[2], $keys[0]);
            $arr[$i]['quantity'] =$RSA->decrypt($product[$i]['Quantity'] , $keys[2], $keys[0]);
            $arr[$i]['image_name'] =$RSA->decrypt($product[$i]['image_name'] , $keys[2], $keys[0]);
        }
        return $arr;
    }
    
    
    public function dec_quantity($pro_id, $nPro) {
        $db = $this->connect();
        $conn = $db->get_connection();
        $RSA = new RSA();
        $keys = $RSA->generate_keys ('9990454949', '9990450271', 0); 
        
        $query = "SELECT Quantity FROM product WHERE Id = $pro_id";
        $arrqun = $db->fetch_query($query);
        $arrqun[0]['Quantity']=$RSA->decrypt($arrqun[0]['Quantity'], $keys[2], $keys[0]);
        $qun = $arrqun[0]['Quantity'];
        
        $newqun = $qun - $nPro;
        $newqun=$RSA->encrypt ($newqun, $keys[1], $keys[0], 5);
        $query2 = "UPDATE product SET Quantity = $newqun WHERE Id = $pro_id";
        $res = $conn->query($query2);
        return $res;
    }
    
    public function inc_quantity($pro_id, $nPro) {
        $db = $this->connect();
        $conn = $db->get_connection();
        $RSA = new RSA();
        $keys = $RSA->generate_keys ('9990454949', '9990450271', 0); 
        
        $query = "SELECT Quantity FROM product WHERE Id = $pro_id";
        $arrqun = $db->fetch_query($query);
        $qun = $arrqun[0]['Quantity'];
        $arrqun[0]['Quantity']=$RSA->decrypt($arrqun[0]['Quantity'], $keys[2], $keys[0]);
        $newqun = $qun + $nPro;
        $newqun=$RSA->encrypt ($newqun, $keys[1], $keys[0], 5);

        $query2 = "UPDATE product SET Quantity = $newqun WHERE Id = $pro_id";
        $res = $conn->query($query2);
        return $res;
    }
    
    public function get_most_paid() {
        $db = $this->connect();
        $RSA = new RSA();
        $keys = $RSA->generate_keys ('9990454949', '9990450271', 0); 
    
        $sql = "SELECT * FROM product INNER JOIN sold_products ON product.id = sold_products.pro_id ORDER BY sold_products.pro_qn DESC";
        $product= $db->fetch_query($sql);
    
        $arr = [];
        if (!is_null($product)){
        for($i=0;$i<sizeof($product);$i++){
            $arr[$i]['type'] =$RSA->decrypt($product[$i]['type'] , $keys[2], $keys[0]);
            $arr[$i]['price'] =$RSA->decrypt($product[$i]['price'] , $keys[2], $keys[0]);
            $arr[$i]['name'] =$RSA->decrypt($product[$i]['name'] , $keys[2], $keys[0]);
            $arr[$i]['brand'] =$RSA->decrypt($product[$i]['brand'] , $keys[2], $keys[0]);
            $arr[$i]['quantity'] =$RSA->decrypt($product[$i]['quantity'] , $keys[2], $keys[0]);
            $arr[$i]['image_name'] =$RSA->decrypt($product[$i]['image_name'] , $keys[2], $keys[0]);
        }
        }
        return $arr;
    }
    
    
    
}//End Of Class Product

/*
$pro = new Product(NULL);
$arr = $pro->get_most_paid();
print_r($arr);
*/