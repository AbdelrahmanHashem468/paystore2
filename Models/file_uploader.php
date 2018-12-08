<?php
function load_new_name(){
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
                  $file_des='../Views/img/'.$file_name;
                   echo "loading...";
                   if(move_uploaded_file($file_tmp,$file_des)){
                       $done=true;
                       echo "<script>alert('image has been loaded')</script>";
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
return $new_name;
}
