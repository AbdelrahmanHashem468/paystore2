<?php

$id = filter_input(INPUT_POST, 'id');

include_once '../Controllers/Admin.php';
$adm = new Admin();

$res = $adm->delete_customer_by_id($id);

if($res) {
    echo "<SCRIPT> alert('The Customer Deleted Succesfully'); </SCRIPT>";
    echo "<SCRIPT> window.location.assign('../Views/List_customers.php'); </SCRIPT>";
} else {
    echo "<SCRIPT> alert('Something gone wrong'); </SCRIPT>";
    echo "<script> window.location.assign('../Views/List_customers.php'); </script>";
}