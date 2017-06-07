<?php
require "config/session.php";
 if(!customerloggedin()){
   header("location: index.php");
 }
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME | Eservices </title>

    <?php include "inc/css.php"; ?>

  </head>

  <body style = "background:url('tools/images/tent-rental-slider.jpg'); background-size:cover; background-attachment: fixed; padding-top:70px;">
<?php include "template/navigation.php"; ?>

          <div class="container home-content">
          
            <div class="row" id="concept">


  <?php include "customer/view_services.php"; ?>

                          </div>                                        
            </div>

          </div>















<?php include "inc/js.php"; ?>
<script>
$("#requests").click(function(){
  $("#concept").load("customer/requests.php");
});
</script>
  </body>

</html>