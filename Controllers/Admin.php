<?php

include_once '../Models/DataBase.php';
include_once '../rsa.class.php';

class Admin { 
    private $password;
    private $email;
    private $id;

    function construct()
    {
        $this->id = 0;
        $this->password = 951753852;
        $this->email = 'admin_paystore@gmail.com';
    }

    function get($name) {
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
        $customers = $db->fetch_query($query);

        if($customers == NULL) {
            return false;
        } else {
            $RSA = new RSA();
            $keys = $RSA->generate_keys ('9990454949', '9990450271', 0);
            $res = [];
            $i=0;
            $res[$i]['name'] = $RSA->decrypt($customers[$i]['name'], $keys[2], $keys[0]);
            $res[$i]['age'] = $RSA->decrypt($customers[$i]['age'], $keys[2], $keys[0]);
            $res[$i]['email'] = $RSA->decrypt($customers[$i]['email'], $keys[2], $keys[0]);
            $res[$i]['password'] = $RSA->decrypt($customers[$i]['password'], $keys[2], $keys[0]);
            $res[$i]['address'] = $customers[$i]['address'];
            $res[$i]['city'] = $customers[$i]['city'];
            $res[$i]['country'] = $customers[$i]['country'];
            $res[$i]['zip_code'] = $customers[$i]['zip_code'];
            $res[$i]['phone_n'] = $customers[$i]['phone_n'];
            $res[$i]['my_image'] = $customers[$i]['my_image'];
            $res[$i]['id'] = $customers[$i]['id']; 
            return $res;
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
        $res= [];
        $RSA = new RSA();
        $keys = $RSA->generate_keys ('9990454949', '9990450271', 0);
        if(!is_null($customers)){
            for($i=0;$i<sizeof($customers);$i++){
                $res[$i]['name'] = $RSA->decrypt($customers[$i]['name'], $keys[2], $keys[0]);
                $res[$i]['age'] = $RSA->decrypt($customers[$i]['age'], $keys[2], $keys[0]);
                $res[$i]['email'] = $RSA->decrypt($customers[$i]['email'], $keys[2], $keys[0]);
                $res[$i]['password'] = $RSA->decrypt($customers[$i]['password'], $keys[2], $keys[0]);
                $res[$i]['address'] = $customers[$i]['address'];
                $res[$i]['city'] = $customers[$i]['city'];
                $res[$i]['country'] = $customers[$i]['country'];
                $res[$i]['zip_code'] = $customers[$i]['zip_code'];
                $res[$i]['phone_n'] = $customers[$i]['phone_n'];
                $res[$i]['my_image'] = $customers[$i]['my_image'];
                $res[$i]['id'] = $customers[$i]['id'];
            }
        }
        return $res;
    }
}