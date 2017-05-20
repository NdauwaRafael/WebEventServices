<?php

$select_vendor = "SELECT * FROM `vendor` WHERE `email` = '{$_SESSION['vendor_email']}'";
if($result_vendor = mysqli_query($connect, $select_vendor)){
    while($vendor_array = mysqli_fetch_array($result_vendor)){
        $vendor_firstname = $vendor_array['firstname'];
        $vendor_lastname = $vendor_array['lastname'];
        $vendor_email = $vendor_array['email'];
        $vendor_phone = $vendor_array['phone'];
        $vendor_idno = $vendor_array['idno'];
        $vendor_bio = $vendor_array['bio'];
    }
}


    
?>