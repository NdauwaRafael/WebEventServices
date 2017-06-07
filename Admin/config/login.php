<?php

include "../../inc/database.php";
session_start();
ob_start();


if($_POST){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = "SELECT * FROM `admin` WHERE `email`='$email' AND `password`='$password'";
    $result= mysqli_query($connect, $check);
    if(mysqli_num_rows($result)>0){
       $_SESSION['admin_email']=$email;
       echo "<script>window.location.href ='admin.php';</script>";	
    }else{
        echo "Invalid login details. Username and password combination do not match";
    }
}
?>