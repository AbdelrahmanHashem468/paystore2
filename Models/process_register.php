<?php
session_start();
include_once '../rsa.class.php';
$RSA = new RSA();
$keys = $RSA->generate_keys ('9990454949', '9990450271', 0); 

if(isset($_REQUEST['email'])&&isset($_REQUEST['password'])&&isset($_REQUEST['name'])&&isset($_REQUEST['age'])){          
    
    include_once './DataBase.php';
    $file_name = "./credential.php";
    $db = DataBase::getInstance($file_name);
    $conn = $db->get_connection();
    
    $name     = mysqli_real_escape_string($conn,$_POST['name']);
    $age      = filter_input(INPUT_POST, 'age');
    $email    = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    if(!is_numeric($age) || $age<6 || $age>120){
        echo '<SCRIPT> alert("NOT a vaild age!"); </SCRIPT>';
        echo "<script> window.location.assign('../Views/register.php'); </script>";
    }
    else if(strlen($password)<8){
        echo '<SCRIPT> alert("NOT a vaild password!\nPassword should be more than 8 characters"); </SCRIPT>';
        echo "<script> window.location.assign('../Views/register.php'); </script>";
    }else if(strpos($password,'~') !== false||strpos($password,' ') !== false){
        echo '<SCRIPT> alert("NOT a vaild password!\nTRY another one"); </SCRIPT>';
        echo "<script> window.location.assign('../Views/register.php'); </script>";
    }
    else {
        $my_query = "SELECT email FROM customer";
        $result = mysqli_query($conn, $my_query);
        if(!$result) {
            die("Error in query");
        } else {
            $bool = true;
            while($row = mysqli_fetch_assoc($result)) {
                if($email == $row['email']) {
                    $bool = false;
                    break;
                }
            }
            
            if(!$bool) {
                echo '<SCRIPT> alert("This email is already exist");</SCRIPT>';
                echo "<script> window.location.assign('../Views/register.php'); </script>";
            } else {
                include_once '../Controllers/Customer.php';
                $cu=new Customer();
                $pass= $_POST['password'];
                
                $name = $RSA->encrypt ($name, $keys[1], $keys[0], 5); 
                $age = $RSA->encrypt ($age, $keys[1], $keys[0], 5); 
                $email = $RSA->encrypt ($email, $keys[1], $keys[0], 5); 
                $pass = $RSA->encrypt ($pass, $keys[1], $keys[0], 5);
                
                $query   = "INSERT into customer (name, age, email, password) VALUES('" . $name . "','" . $age . "','" . $email . "','" . $pass . "')";
                $success = $conn->query($query);

                if (!$success) {
                    die("Couldn't enter data: " . $conn->error);
                } else {
                    echo '<SCRIPT> alert("The registration has been completed\n,Thank You");</SCRIPT>';
                    $email= $RSA->decrypt($email[0][0], $keys[2], $keys[0]);
                    $my_query2 = "SELECT id FROM customer where email = '$email'";
                    $result = mysqli_query($conn, $my_query2);
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    
                    $_SESSION['s_id'] = $id;
                    $_SESSION['s_name'] = $name;
                    
                    if(isset($_SESSION['s_id']) && isset($_SESSION['s_name'])) {
                        echo '<SCRIPT> alert("you are logged in now");</SCRIPT>';
                         echo "<script> window.location.assign('../Views/index.php'); </script>";
                    } else {
                        echo '<SCRIPT> alert("something went wrong please login again");</SCRIPT>';
                        echo "<script> window.location.assign('../Views/login.php'); </script>";
                    }
                    
                }
                
            }
        }
    }
}