<?php
session_start();
include_once 'database.class.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $con=new dataBase('localhost', 'paystore1', 'root','');
    $con->setTable('customer'); 
    $email  = $_POST['email'];
    $pass   = $_POST['pass'];

    if($email == 'admin_paystore@gmail.com' && $pass == 951753852) {
            $_SESSION['admin_id'] = 0;
            echo "<SCRIPT> alert('welcome: Admin'); </SCRIPT>";
            echo "<script> window.location.assign('../Views/index.php'); </script>";
        } 
    else{
        $dataRec = $con->select("id,name", array('email','password'), array($email,$pass));
        if(sizeof($dataRec)>0){
            $_SESSION['s_id'] = $dataRec[0][0];
            $_SESSION['s_name'] = $dataRec[0][1];
            header("location:../Views/index.php");
        }
    }
header("location:../Views/login.php");
}
?>

