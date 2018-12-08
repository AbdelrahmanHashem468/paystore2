<?php
session_start();

if(isset($_SESSION['s_id'])) {
    
    include_once './ShoppingCart.php';
    $cart = new ShoppingCart();
    
    $user_id = $_SESSION['s_id'];
    $pro_id  = filter_input(INPUT_POST, 'id');
    $result  = $cart->remove_product($user_id, $pro_id);
    
    if($result) {
        echo "<script>alert('The Product deleted successfully');</script>";
    } else {
        echo "<script>alert('Something goes wrong');</script>";
    }
    echo "<script> window.location.assign('../Views/cart.php'); </script>";
} else {
    echo "<script>alert('Something goes wrong');</script>";
    echo "<script> window.location.assign('../Views/login.php'); </script>";
}