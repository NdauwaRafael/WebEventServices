<?php
require "database.conf.php";

if($_POST){
    $change = $_POST['change'];
    $id = $_POST['id'];

    $update = "UPDATE `requests` SET `status`='$change' WHERE `id`='$id'";
    if(mysqli_query($connect, $update)){
                if($change=='Accepted'){
                    echo "You have accepted to deriver this service to the customer";
                }elseif($change=='Declined'){
                    echo "You have declined this job offer to offer your services to this customer";
                }elseif($change=='Completed'){
                    echo "You have finished this task. The customer has been satisfied by your services";
                }
    }else{
        echo "Error!! occured trying to config service request, try again in a bit or contact application service";
    }
}

?>