<?php

require './DataBase.php';
include '../Controllers/Product.php';
include_once './file_uploader.php';
include_once '../rsa.class.php';
$RSA = new RSA();
$keys = $RSA->generate_keys ('9990454949', '9990450271', 0); 
$pro = new Product('value');

$file_name = "./credential.php";
$db = DataBase::getInstance($file_name);

$conn = $db->get_connection();

$name     = mysqli_real_escape_string($conn,filter_input(INPUT_POST,'name'));
$type     = mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'type'));
$brand    = mysqli_real_escape_string($conn,filter_input(INPUT_POST,'brand'));
$price    = mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'price'));
$quantity = mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'quantity'));

$image_name =load_new_name();

$bool = TRUE;
// Validation
if($price > 0 &&is_numeric($price)) {
    
    if($quantity > 0) {
        //Do No Thing
    } else {
        echo "Unvalid Quantity, Enter Positive Value!";
        $bool = FALSE;
    }
} else {
    echo "Unvalid Price, Enter Positive Value!";
    $bool = FALSE;
}
if($image_name=='non'){
    $bool = FALSE;
        echo "<script> alert('image can't be added); </script>";
}
if($bool) {
    $name = $RSA->encrypt ($name, $keys[1], $keys[0], 5); 
    $type = $RSA->encrypt ($type, $keys[1], $keys[0], 5); 
    $brand = $RSA->encrypt ($brand, $keys[1], $keys[0], 5); 
    $price = $RSA->encrypt ($price, $keys[1], $keys[0], 5); 
    $quantity = $RSA->encrypt ($quantity, $keys[1], $keys[0], 5); 
    $image_name = $RSA->encrypt ($image_name, $keys[1], $keys[0], 5); 
    $sql = "INSERT INTO product (Name, Type, Brand, Price, Quantity, image_name) "
        . " VALUES ('$name', '$type', '$brand', $price, $quantity, '$image_name')";
    
    $success = $conn->query($sql);
    
    if (!$success) {
        die("<br />Couldn't Enter Data: ".$conn->error);
    } else {
        echo '<SCRIPT> alert("The Product Added To DB Successfully"); </SCRIPT>';
        echo "<script> window.location.assign('../Views/index.php'); </script>";    
    }
    
} else {
    // bool = false
    //echo '<br /><br /><a href="../Views/add_new_product.php">Back To Add New Product Page</a>';
    echo "<script> window.location.assign('../Views/add_new_product.php'); </script>";
}
