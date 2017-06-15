<?php
include "../../inc/database.php";

if($_POST){
    $id = $_POST['custid'];

    $delete_cust = "DELETE FROM `customer` WHERE `id`='$id'";
    if(mysqli_query($connect, $delete_cust)){
       echo "Customer deleted successfully";
    }else{
        echo "Failed to delete the customer. an error occurred";
    }
}


?>