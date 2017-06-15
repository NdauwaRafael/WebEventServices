<?php


if (isset($_SESSION['customer_email']) && !empty($_SESSION['customer_email'])) {
	$custEmail = $_SESSION['customer_email'];
  $connect = mysqli_connect('localhost', 'root', '', 'eservices') OR die('could not connect to database because'. mysqli_connect_error());

	$query = "SELECT * FROM `customer` WHERE `email`='$custEmail' ";
    $result = mysqli_query($connect, $query);
/*Data is fetched in a result which is then converted to an array called customer*/

    while ($customer=mysqli_fetch_array($result)) {
    	$custFname = $customer['firstname'];
    	$custLname = $customer['lastname'];
          $custEmail = $customer['email'];
          $custPhone = $customer['phone'];

    }
}


?>
