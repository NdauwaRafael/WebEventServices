<?php
include "../inc/database.php";
session_start();
ob_start();
   if($_POST){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $_POST['user'];

  if($user=='customer'){
        $select = "SELECT * FROM `customer` WHERE `email`='$email' AND `password`='$password' ";

        $result = mysqli_query($connect, $select);
                
                if(mysqli_num_rows($result)==1){
                   $_SESSION['customer_email'] = $email;
                   echo "<script>window.location.href ='home.php';</script>";		  
                }else{
                  echo '<div class="alert alert-danger" role="alert">Invalid Email and Password Combination, try again!!</div>';
                }	    
  }elseif($user=='vendor'){
        $select = "SELECT * FROM `vendor` WHERE `email`='$email' AND `password`='$password' ";
        $result = mysqli_query($connect, $select);               
                if(mysqli_num_rows($result)==1){
                   $_SESSION['vendor_email'] = $email;
                   echo "<script>window.location.href ='Vendor/vendor.php';</script>";		  
                }else{
                  echo '<div class="alert alert-danger" role="alert">Invalid Vendor Email and Password Combination, try again!!</div>';
                }	    
  }        

   }
 ?>  