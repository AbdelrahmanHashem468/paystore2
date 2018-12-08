<?php
session_start();

include_once './DataBase.php';
$file_name = "./credential.php";
$db = DataBase::getInstance($file_name);
$conn = $db->get_connection();

include_once '../Controllers/Invoice.php';
$inv = new Invoice();

include_once '../Controllers/ShoppingCart.php';
$car = new ShoppingCart(); 

$id = $_SESSION['s_id'];

$addr =  mysqli_real_escape_string($conn,$_POST['address']);
$city =  mysqli_real_escape_string($conn,$_POST['city']);
$count = mysqli_real_escape_string($conn,$_POST['country']);
$zip =   mysqli_real_escape_string($conn,$_POST['zip-code']);
$tel =   mysqli_real_escape_string($conn,$_POST['tel']);

$payment = mysqli_real_escape_string($conn,filter_input(INPUT_POST,'payment'));

$pay_method = filter_input(INPUT_POST,'payments');

$bool = TRUE;

if(is_numeric($addr)) {
    echo "<SCRIPT> alert('Address should be string'); </SCRIPT>";
    $bool = FALSE;
} else if(is_numeric($city)) {
    echo "<SCRIPT> alert('City should be string'); </SCRIPT>";
    $bool = FALSE;
} else if(is_numeric($count)) {
    echo "<SCRIPT> alert('Country should be string'); </SCRIPT>";
    $bool = FALSE;

} else if(!is_numeric($tel)||strlen($tel)<11) {
    echo "<SCRIPT> alert('wrong telephone number'); </SCRIPT>";
    $bool = FALSE;
    } else if(!is_numeric($zip)||strlen($zip)!=5) {
    echo "<SCRIPT> alert('zip code should have 5 numbers '); </SCRIPT>";
    $bool = FALSE;
}else if($pay_method=='Visa'&&!is_numeric($payment)) {
      echo "<SCRIPT> alert('visa should be a number'); </SCRIPT>";
    $bool = FALSE;
}else if ($pay_method=='Visa'&&strlen($payment)!=16) {
         echo "<SCRIPT> alert('visa should have 16 numbers'); </SCRIPT>";
    $bool = FALSE;
}else if($pay_method=='Paypal'&&strpos($payment,"@")==false){
    echo "<SCRIPT> alert('Not a valid paypal account'); </SCRIPT>";
    $bool = FALSE;
}else if($pay_method=='Paypal'&&strpos($payment,".com")==false){
         echo "<SCRIPT> alert('Not a valid paypal account'); </SCRIPT>";
    $bool = FALSE;
} else {
    echo "Done";
}

if(!$bool) {
    echo "<script> window.location.assign('../Views/checkout.php'); </script>";
} else {
    
    $sql = "UPDATE customer SET address = '$addr', city = '$city', country = '$count', zip_code = '$zip', phone_n = $tel where id = $id";
    
    $res = $conn->query($sql);
    if (!$res) {
        die("<br />Couldn't Enter Data: " . $conn->error);
    } else {
        echo "<br />The Customer updated Successfully :)";
        
        $check = $inv->new_invoice($id, $pay_method,$payment);
                  
        if($check) {
            if($car->clear_cart($id)) {
                 
 echo "<script> window.location.assign('orderpdf.php'); </script>";

            }
        } else {
            echo "<script> alert('Something gone wrong'); </script>";
        }
    }
}