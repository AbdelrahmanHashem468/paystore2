<?php
session_start();

include_once './DataBase.php';
$file_name = "./credential.php";
$db = DataBase::getInstance($file_name);
$conn = $db->get_connection();

$id       = filter_input(INPUT_POST, 'id');
$name     = filter_input(INPUT_POST, 'name');
$brand    = filter_input(INPUT_POST, 'brand');
$price    = filter_input(INPUT_POST, 'price');
$quantity = filter_input(INPUT_POST, 'quantity');
$image_name=null;
$bool = TRUE;
// Validation
if($price > 0 &&is_numeric($price)) {

    if($quantity > 0) {
        //Do No Thing
    } else {
       echo "<script> alert('Unvalid Quantity, Enter Positive Value!'); </script>";
        $bool = FALSE;
    }
} else {
     echo "<script> alert('Unvalid Price, Enter Positive Value!'); </script>";
    $bool = FALSE;
}
$test=$_FILES["image"]['name'];
if(strlen($test)>0&&$bool){
include_once './file_uploader.php';
$image_name = load_new_name();
    if($image_name=='non'){
        $bool = FALSE;
        echo "<script> alert('can't be added'); </script>";
    }else{
         $sql = "SELECT image_name from product where Id = $id";
         $success = $conn->query($sql);
         if (!$success) {
                die("<br />Can't update the image: " . $conn->error);
         }else{
              $success=$db->fetch_query($sql);
              $res=$success[0]['image_name'];
              unlink('../Views/img/'.$res);
        $sql = "UPDATE product SET  image_name = '$image_name' where Id = $id";
         }
         $success = $conn->query($sql);
         if (!$success) {
                die("<br />Can't update the image: " . $conn->error);
         }
    }
}
if($bool) {
 $sql = "UPDATE product SET Name = '$name', Brand = '$brand', Price = $price, Quantity = $quantity  where Id = $id";
 
    $success = $conn->query($sql);
    if (!$success) {
        die("<br />Couldn't Enter Data: " . $conn->error);
    } else {
        echo "<SCRIPT>alert('The Product updated Successfully :');</SCRIPT>";
    }
    echo '<SCRIPT>window.location.assign("../Views/index.php");</SCRIPT>';
   
} else {
    // bool = false
    echo "<SCRIPT>alert('Can't update the product);</SCRIPT>";
    echo "<script> window.location.assign('../Views/index.php'); </script>";
}
