<?php
session_start();

include_once './DataBase.php';
include_once '../Controllers/Admin.php';
include_once '../rsa.class.php';
    $file_name = './credential.php';
    $db = DataBase::getInstance($file_name);
    $conn = $db->get_connection();include_once '../rsa.class.php';
    $RSA = new RSA();
    $keys = $RSA->generate_keys ('9990454949', '9990450271', 0);
    
$email =mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'email'));
$pass  = mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'pass' ));

$admin = new Admin();

if($email == $admin->email) {
    $check = $admin->log_in($pass);
    if ($check) {
        $_SESSION['admin_id'] = $admin->id;
        echo "<SCRIPT> alert('welcome: Admin'); </SCRIPT>";
        echo "<script> window.location.assign('../Views/index.php'); </script>";
    } else {
        echo "<SCRIPT> alert('Wrong email or password');</SCRIPT>";
        echo "<script> window.location.assign('../Views/login.php'); </script>";
    }
} else {

    $my_query = "SELECT email FROM customer";
    $result = mysqli_query($conn, $my_query);
    $customer = $db->fetch_query($result);
    echo "<script>console.log(".var_dump($customer).");</script>"; 
    $result= $RSA->decrypt($result[0][0], $keys[2], $keys[0]);

    if(!$result) {
        die("error in query");

    } else {
        $bool = false;

        while($row = mysqli_fetch_assoc($result)) {
            if($email == $row['email']) {    
                $bool = true;
                break;
            }
        }

        if($bool) {
            $my_query2 = "SELECT password FROM customer WHERE email = '$email'";
            $result2 = mysqli_query($conn, $my_query2);
            $result2= $RSA->decrypt($result2[0][0], $keys[2], $keys[0]);

            if(!$result2) {
                die("Error in query");
            } else {
                $row2 = mysqli_fetch_assoc($result2);
                include_once '../Controllers/Customer.php';
                $cu=new Customer();
                if($pass != $cu->$row2['password']) {
                    echo "<SCRIPT> alert('Wrong email or password');</SCRIPT>";
                    echo "<script> window.location.assign('../Views/login.php'); </script>";
                } else {
                    $email= $RSA->decrypt($email, $keys[2], $keys[0]);
                    $my_query3 = "SELECT id, name FROM customer where email = '$email'";
                    $result3 = mysqli_query($conn, $my_query3);
                    $result3= $RSA->decrypt($result3[0][1], $keys[2], $keys[0]);

                    $row3 = mysqli_fetch_assoc($result3);

                    $id = $row3['id'];
                    $name = $row3['name'];
                    $_SESSION['s_id'] = $id;
                    $_SESSION['s_name'] = $name;

                    if(isset($_SESSION['s_id'])) {
                        echo "<SCRIPT> alert('welcome: $name,'); </SCRIPT>";
                        echo "<script> window.location.assign('../Views/index.php'); </script>";
                    }
                }
            }

        } else {

            echo "<SCRIPT> alert('Wrong email or password'); </SCRIPT>";
            echo "<script> window.location.assign('../Views/login.php'); </script>";
        }
    }
}