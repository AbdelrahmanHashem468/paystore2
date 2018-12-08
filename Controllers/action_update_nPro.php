<?php
session_start();

include_once './ShoppingCart.php';
$cart = new ShoppingCart();

$user_id = $_SESSION['s_id'];
$pro_id = filter_input(INPUT_POST, 'id');
$nPro = filter_input(INPUT_POST, 'nPro');

$res = $cart->update_nPro($user_id, $pro_id, $nPro);

if($res) {
    echo "Done";
    echo "<script> window.location.assign('../Views/cart.php'); </script>";
} else {
    echo "Some Thing Goes Wrong";
}