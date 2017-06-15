<?php
include "../../inc/database.php";

if($_POST){
    $id = $_POST['idno'];
    $permission = $_POST['permission'];

    if($permission == 'Active'){
        $update = "UPDATE `vendor` SET `permission`='Deactivated' WHERE `idno`='$id'";
    }elseif($permission=='Deactivated'){
        $update = "UPDATE `vendor` SET `permission`='Active' WHERE `idno`='$id'";
    }

    if(mysqli_query($connect, $update)){
        echo "Vendor details modified successfuly";
    }else{
        echo "Failed to modify concept of Vendor";
    }
}
?>