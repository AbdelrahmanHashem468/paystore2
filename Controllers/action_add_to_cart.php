<?php
session_start();

if(isset($_SESSION['s_id'])) {
    
    include_once './ShoppingCart.php';
    $cart = new ShoppingCart();
    
    include_once './Product.php';
    $pro = new Product(NULL);
    
    $user_id = $_SESSION['s_id'];
    $pro_id  = filter_input(INPUT_POST, 'id');
    $result  = $cart->add_to_cart($user_id, $pro_id);
    
    if($result) {
        echo "<script>alert('The Product added successfully');</script>";
        $pro->dec_quantity($pro_id, 1);
        
    } else {
        echo "<script>alert('Something goes wrong');</script>";
    }
    echo "<script> window.location.assign('../Views/index.php'); </script>";
    
} else {
    echo "<script>alert('You are not logged in yet');</script>";
    echo "<script> window.location.assign('../Views/login.php'); </script>";
}