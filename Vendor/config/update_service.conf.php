<?php
  require "database.conf.php";

  if($_POST){
       $name = $_POST["name"];
        $category = $_POST["category"];
        $city = $_POST["city"];
        $county = $_POST["county"];
        $subcounty = $_POST["subcounty"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $id = $_POST["id"];

        $insert = "UPDATE `service` SET `name`='$name',`classification`='$category',`city`='$city',`county`='$county',`subcounty`='$subcounty',`description`='$description',`price`='$price' WHERE `id`='$id'";
        if(mysqli_query($connect, $insert)){
            ?> 
            <div class="alert alert-default" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>           
            <h4 class="title">Conratulations!!!</h4>
            <p class="category">Item have been Updated successfully</p>
            </div>
            <?php
        }else{
            ?>
                 <script> $("#status<?= $id; ?>").attr("data-background-color", "red").css("color","#fffde7");</script>
                 <h4 class="title">Something went wrong</h4>
                 <p class="category">Item could not be Updated due to network problems, try again and if problem persists, contact our support services!!</p>          
            <?php
        }

  }

?>