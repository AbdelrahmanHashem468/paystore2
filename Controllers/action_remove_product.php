<?php
session_start();

if(isset($_SESSION['admin_id'])) {
    
    include_once './Admin.php';
    $admin = new Admin();
    
    $pro_id = filter_input(INPUT_POST, 'id');
    $result = $admin->remove_product($pro_id);
    
    if($result) {
        echo "<script>alert('The Product deleted successfully');</script>";
    } else {
        echo "<script>alert('Something goes wrong');</script>";
    }
    echo "<script> window.location.assign('../Views/index.php'); </script>";
    
} else {
    echo "<script>alert('you are not allowed to remove products');</script>";
    echo "<script> window.location.assign('../Views/login.php'); </script>";
}