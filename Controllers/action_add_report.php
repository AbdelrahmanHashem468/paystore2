<?php session_start();

if(isset($_REQUEST['data'])){ 
    $text = filter_input(INPUT_POST, 'data');
    $c_id = $_SESSION['s_id'];
    
    include_once 'Report.php';
    $my_report = new Report();
    
    $res = $my_report->write($text, $c_id);
    
    if($res) {
        echo "<script> alert('Your report has been sended successfully'); </script>";
    } else {
        echo "<script> alert('Something goes wrong');</script>";
    }
    echo "<script> window.location.assign('../Views/index.php'); </script>";
}
else{
     echo "<script> alert('you can't send nothing!);</script>";
}
