<?php

include_once 'DataBase.php';
include_once '../Controllers/Customer.php';
//include_once "file_uploader.php";
$file_name = "credential.php";
$db = DataBase::getInstance($file_name);
$conn = $db->get_connection();

$cus = new Customer();
$cust_id = filter_input(INPUT_POST, 'cust_id');
  $new_name='non';
if(isset($_FILES["image"])&&isset($_POST['submit'])) {
      $file=$_FILES["image"];
      $file_name=$file['name'];
      $file_tmp=$file['tmp_name'];
      $file_size=$file['size']; 
      $file_error=$file['error'];
      $file_ext=explode('.',$file_name);
      $file_ext=strtolower(end( $file_ext));
      $allowed=array("jpeg","jpg","png");
      $done=false;
      
      if(in_array($file_ext,$allowed)){
          if($file_error==0){
              if($file_size<=3000000){
                  $file_name=uniqid('',true).'.'.$file_ext;
                  $new_name= $file_name;
                  $file_des='../Models/uploads/'.$file_name;
                   echo "loading...";
                   if(move_uploaded_file($file_tmp,$file_des)){
                       $done=true;
                       $cus->update_profile($cust_id, $file_name);
                        echo "<SCRIPT> alert('The Image Uploaded Successfully'); </SCRIPT>";
                        echo "<script> window.location.replace('/Views/profile.php'); </script>";
                   }
                   if(!$done){
                      echo "<script>alert('can't be loaded')</script>";
                   }
              }else{
                  echo "<script>alert('image size should be less than 3mb')</script>";
              }
          }else{
               echo "<script>alert('file error')</script>";
          }
      }else{
          echo"<script>alert('not allowed file')</script>";
      }
}
