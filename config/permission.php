<?php

function vendor_active()
{
	$vendor_email = $_SESSION['vendor_email'];
    $connect = mysqli_connect('localhost', 'root', '', 'eservices') OR die('could not connect to database because'. mysqli_connect_error());
	
    $check_vendor_active ="SELECT * FROM `vendor` WHERE `email`='$vendor_email' AND `permission`='Active'";
	$check_vendor_result = mysqli_query($connect, $check_vendor_active);

	if (mysqli_num_rows($check_vendor_result)==1) {
		return true;
	}else{
		return false;
	}
}

function customer_active()
{
	$customer_email = $_SESSION['customer_email'];
    $connect = mysqli_connect('localhost', 'root', '', 'eservices') OR die('could not connect to database because'. mysqli_connect_error());
	
    $check_customer_active ="SELECT * FROM `customer` WHERE `email`='$customer_email' AND `permission`='Active'";
	$check_customer_result = mysqli_query($connect, $check_customer_active);

	if (mysqli_num_rows($check_customer_result)==1) {
		return true;
	}else{
		return false;
	}
}
?>
