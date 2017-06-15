<?php
require "config/session.php";
require "config/permission.php";
require "config/customer.php";
 if(!customerloggedin()){
   header("location: index.php");
 }else{

 if(!customer_active()){
   header("location: error/error.php");
 }

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
<div id="filter">

<div class="col-xs-4">
<select id="category" onchange="filter_service()" class="form-control">
  <option value="">[SERVICES CARTEGORIES]</option>
  <option value="Transport">Transport</option>
  <option value="Shelter">Shelter</option>
  <option value="Catering">Catering</option>
  <option value="Transport">Transport</option>
  <option value="Entertainment">Entertainment</option>
  <option value="Fashion">Fashion</option>
  <option value="Reception">Reception</option>
  <option value="Security">Security</option>
  <option value="Photography">Photography</option>
  <option value="Videography">Videography</option>
</select>
</div>

<div class="col-xs-4">
<select id="city" onchange="filter_service()" class="form-control">
  <option value="">[SERVICE CITY]</option>
  <option value="">Null</option>

</select>
</div>

<div class="col-xs-4">
<select id="county" onchange="filter_service()" class="form-control">
  <option value="">[SERVICE COUNTY]</option>
  <?php
   require "Vendor/config/database.conf.php";
    $select_county = "SELECT * FROM `counties`";
    $county_result = mysqli_query($connect, $select_county);
    while ($county = mysqli_fetch_array($county_result)) {
      ?>
      <option value="<?=$county['name'];?>"><?=$county['name'];?></option>
      <?php
    }
  ?>

</select>
</div>

</div>
<hr>
            <div class="row" id="concept">


  <?php include "customer/view_services.php"; ?>

                          </div>
            </div>

          </div>















<?php include "inc/js.php"; ?>
<script>
$("#requests").click(function(){
  $("#concept").load("customer/requests.php");
  $("#filter").html("");
});
</script>
  </body>

</html>
