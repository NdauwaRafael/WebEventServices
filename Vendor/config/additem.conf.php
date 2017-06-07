<?php
  require "database.conf.php";
session_start();
  if($_POST){
       $name = $_POST["name"];
        $category = $_POST["category"];
        $city = $_POST["city"];
        $county = $_POST["county"];
        $subcounty = $_POST["subcounty"];
        $description = $_POST["description"];

        $insert = "INSERT INTO `service`(`id`, `name`, `classification`, `city`, `county`, `subcounty`, `description`, `owner`) VALUES (NULL,'$name','$category','$city','$county','$subcounty','$description','{$_SESSION['vendor_email']}')";
        if(mysqli_query($connect, $insert)){
            echo "Item have been added successfully";
            
            echo '<script> $("#addservicefrm")[0].reset();</script>';
        }else{
            ?>
                 <script> $("#status").attr("data-background-color", "red");</script>
                 <h4 class="title">Something went wrong</h4>
                 <p class="category">Item could not be submitted due to network problems, try again and if problem persists, contact our support services!!</p>          
            <?php
        }

  }

?>