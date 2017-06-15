<?php
include "../../inc/database.php";

if($_POST){
    $idno = $_POST['vidno'];

    $delete_ven = "DELETE FROM `vendor` WHERE `idno`='$idno'";
    if(mysqli_query($connect, $delete_ven)){
       echo "Vendor deleted successfully";
    }else{
        echo "Failed to delete the customer. an error occurred";
    }
}


?>