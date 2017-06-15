<?php
include "../../inc/database.php";

if($_POST){
    $id = $_POST['id'];
    $permission = $_POST['permission'];

    if($permission == 'Active'){
        $update = "UPDATE `customer` SET `permission`='Deactivated' WHERE `id`='$id'";
    }elseif($permission=='Deactivated'){
        $update = "UPDATE `customer` SET `permission`='Active' WHERE `id`='$id'";
    }

    if(mysqli_query($connect, $update)){
        echo "User details modified successfuly";
    }else{
        echo "Failed to modify concept";
    }
}
?>