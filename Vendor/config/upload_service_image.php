<?php
require "database.conf.php";

/*=======================================
Read a value from text file
========================================*/

if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['service_image']['tmp_name'])) {
  $id = $_POST['service_id'];
$sourcePath = $_FILES['service_image']['tmp_name'];
$targetPath = "../../assets/img/uploads/".$_FILES['service_image']['name'];
if(move_uploaded_file($sourcePath,$targetPath)) {
	$newImage = $_FILES['service_image']['name'];
?>
<img src="<?php echo "../assets/img/uploads/"; echo $newImage; ?>" width="90%" />
<?php

$image= "UPDATE `service` SET `image`='$newImage' WHERE `id`='$id' ";
if (mysqli_query($connect, $image)) {
	echo "Path uploaded successfully";
}else{
	echo "file uploaded but coul not be stored. Try again later";
}



}
}
}

?>
