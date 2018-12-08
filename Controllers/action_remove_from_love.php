<?php
session_start();

if(isset($_SESSION['s_id'])) {
    
    include_once './WhiteList.php';
    $love = new WhiteList();
    
    $user_id = $_SESSION['s_id'];
    $pro_id  = filter_input(INPUT_POST, 'id');
    $result  = $love->remove_from_love($user_id, $pro_id);
    
    if($result) {
        echo "<script>alert('The Product deleted successfully from love list');</script>";
    } else {
        echo "<script>alert('Something goes wrong');</script>";
    }
    echo "<script> window.location.assign('../Views/index.php'); </script>";
} else {
    echo "<script>alert('Something goes wrong');</script>";
    echo "<script> window.location.assign('../Views/login.php'); </script>";
}