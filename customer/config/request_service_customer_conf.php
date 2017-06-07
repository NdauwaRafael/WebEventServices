<?php
 include "../../inc/database.php";
session_start();
ob_start();


 if($_POST){
     $location = $_POST['location'];
     $date = $_POST['date'];
     $duration = $_POST['duration'];
     $price = $_POST['service_price'];
     $description = $_POST['description'];
     $service_id = $_POST['service_id'];

     $check = "SELECT * FROM `requests` WHERE `customer`='{$_SESSION['customer_email']}' AND `status`='requested' AND `service_id`='$service_id'";
     $check_result = mysqli_query($connect, $check);

     if(mysqli_num_rows($check_result)>0){
         echo '<div class="btn  btn-warning" role="alert"><i class="fa fa-exclamation-triangle fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> Error!! It seems you already have another unconfirmed Request for this item. Please be patient as your request is being processed</div>';

     }else{



     $insert_request = "INSERT INTO `requests`(`id`, `event_location`, `event_date`, `event_duration`, `service_id`, `special_request`, `customer`, `status`,`amount`) VALUES (NULL,'$location','$date','$duration','$service_id','$description','{$_SESSION['customer_email']}','requested','$price')";
     if(mysqli_query($connect, $insert_request)){
         echo '<div class="btn  btn-success" role="alert"><i class="fa fa-handshake-o" aria-hidden="true"></i> Congratulations!! Request succeeded Now wait to hear from job owner</div>';
     }else{
         echo '<div class="btn  btn-warning" role="alert"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> An error occurred,sorry your job request could not be added  <span class="glyphicon glyphicon-alert"></span></div>';
     }

     }





 }

 ?>