<?php
session_start();

include_once './Customer.php';
$cus = new Customer();

$id = $_SESSION['s_id'];
