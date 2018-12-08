<?php
session_start();

if(isset($_SESSION['s_id'])) {
    
    include_once './WhiteList.php';
    $love = new WhiteList();
    
    $user_id = $_SESSION['s_id'];
    $pro_id = filter_input(INPUT_POST, 'id');
    $result = $love->add_to_love($user_id, $pro_id);
    
    if($result) {
        echo "<script>alert('The Product added successfully to love list');</script>";
    } else {
        echo "<script>alert('Something goes wrong');</script>";
    }
    echo "<script> window.location.assign('../Views/index.php'); </script>";    
} else {
    echo "<script>alert('You are not logged in yet');</script>";
    echo "<script> window.location.assign('../Views/login.php'); </script>";
}