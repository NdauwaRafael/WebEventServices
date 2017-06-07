<?php 
session_start();
  require "config/database.conf.php";

  if($_POST){
      $status = $_POST['status'];
   ?>

<div class="col-md-12">
<div class="card">
<div class="card-header" <?php
  if($status=='requested'){
      ?>data-background-color="purple"<?php
  }elseif($status=='Accepted'){
      ?>data-background-color="green"<?php
  }elseif($status=='Declined'){
      ?>data-background-color="red"<?php
  }elseif($status=='Completed'){
      ?>data-background-color="blue"<?php
  }

?> >

<?php
  if($status=='requested'){
      ?><h4 class="title">Services Requested By Customers</h4>
        <p class="category">Detailed request list</p>
      <?php
  }elseif($status=='Accepted'){
      ?><h4 class="title">Services Requests that have been accepted</h4>
        <p class="category">Detailed accepted list</p>
      <?php
  }elseif($status=='Declined'){
      ?><h4 class="title">Services Requests You Declined</h4>
        <p class="category">Detailed rejected list</p>
      <?php
  }elseif($status=='Completed'){
      ?><h4 class="title">Services Requests already Completed</h4>
        <p class="category">Detailed request list of completed requests</p>
      <?php
  }
?>

</div>
<div class="card-content table-responsive">
<table class="table">
    <thead class="text-primary">
     <th>#</th>
     <th>Service</th>
     <th>Requested By</th>
     <th>For When</th>
     <th>No of Hours</th>
     <th>Where</th>
     <th>Special Request</th>
     <th>Requested On</th>
      <th>Cost to Charge</th>
     <th>Action</th>     
</thead>
<tbody>
<?php

      $select = "SELECT `requests`.`id`, `event_location`, `event_date`, `event_duration`, `service_id`, `special_request`, `customer`, `status`, `amount`, `request_date`,`name`, `classification`, `city`, `county`, `subcounty`, `description`, `owner`, `price` FROM `service`,`requests` WHERE `requests`.`service_id`=`service`.`id` AND `service`.`owner`='{$_SESSION['vendor_email']}' AND `requests`.`status`='$status' ";
      $resu = mysqli_query($connect, $select);
      $r = 0; 
      while($request = mysqli_fetch_array($resu)){
          $request_id = $request['id'];
          $event_date = $request['event_date'];
          $event_location = $request['event_location'];
          $event_duration = $request['event_duration'];
          $special_request = $request['special_request'];
          $customer = $request['customer'];
          $amount = $request['amount'];
          $request_date = $request['request_date'];
          $name = $request['name'];
          $r++;
?>

<tr>
<td><?=$r; ?></td>
<td><?=$name; ?></td>
<td><?=$customer; ?></td>
<td><?=$event_date; ?></td>
<td><?=$event_duration; ?> Hours</td>
<td><?=$event_location; ?></td>
<td><?=$special_request; ?></td>
<td><?=$request_date;?></td>
<td>Ksh. <?=$amount;?></td>

<td><?php
   if($status=='requested'){
      ?>
      <button class="btn btn-default btn-sm" id="accept<?=$request_id;?>" type="button">Accept</button>  <button id="decline<?=$request_id;?>" class="btn btn-danger btn-sm" type="text">Decline</button>
      <?php
   }elseif($status=='Accepted'){
?><button class="btn btn-default" id="complete<?=$request_id;?>" type="button">Complete</button><?php
   }else{

   }
   ?>
</td>

</tr>
<script>
/*Accept Request*/
$("#accept<?=$request_id;?>").click(function(){
    var change1 = 'Accepted';
    var id1 = '<?=$request_id; ?>';

    if(change1==''){

    }else{
        $.post("config/request_conf.php", {change:change1, id:id1}, function(data){
            alert(data);
            new_request();
        });
    }
});

/*Decline Request*/
$("#decline<?=$request_id;?>").click(function(){
    var change1 = 'Declined';
    var id1 = '<?=$request_id; ?>';

    if(change1==''){

    }else{
        $.post("config/request_conf.php", {change:change1, id:id1}, function(data){
            alert(data);
            new_request();
        });
    }
});

/*Complete Request*/
$("#complete<?=$request_id;?>").click(function(){
    var change1 = 'Completed';
    var id1 = '<?=$request_id; ?>';

    if(change1==''){

    }else{
        $.post("config/request_conf.php", {change:change1, id:id1}, function(data){
            alert(data);
            accepted_request();
        });
    }
});
</script>


<?php
      }
  
  }



?>
    </tbody>
</table>

</div>
</div>
</div>
