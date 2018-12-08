<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_REQUEST['searchdata'])){
    include '../Controllers/Customer.php';
    include '../Models/DataBase_V2.php';
    $db=new DataBase_V2();
    $data=$_REQUEST['searchdata'];
    $cu=new customer();
    $ids=$cu->search($data);
    for($i=0;$i<count($ids);$i++){
        $query="select * from product where Id=$ids[$i]";
        $result=$db->fetch_query($query);
        
    }
    
}
