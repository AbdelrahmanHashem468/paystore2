<?php
include_once 'database.class.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
$con=new dataBase('localhost', 'paystore1', 'root','');
$con->setTable('customer');
    $name   = $_POST['name'];
    $age    = $_POST['age'];
    $email  = $_POST['email'];
    $pass   = $_POST['password'];
    $con->insert(array('name', 'age','email','password'),array($name, $age,$email,$pass));

header("location:../Views/login.php");
}
?>