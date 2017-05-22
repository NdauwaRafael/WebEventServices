<?php
 include "../../inc/database.php";



 if($_POST){
     $location = $_POST['location'];
     $date = $_POST['date'];
     $duration = $_POST['duration'];
     $quantity = $_POST['quantity'];
     $description = $_POST['description'];

     $insert_request = "";
     if(mysqli_query($connect, $insert_request)){
         echo '<div class="btn  btn-danger" role="alert"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Congratulations!! Job request added succesfully</div>';
     }else{
         echo '<div class="btn  btn-warning" role="alert"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> An error occurred,sorry your job request could not be added  <span class="glyphicon glyphicon-alert"></span></div>';
     }
 }

 ?>