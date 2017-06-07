<?php  
session_start();
 require "config/database.conf.php"; ?>
<div class="col-md-12">
<div class="card">
<div class="card-header" data-background-color="green">
<h4 class="title">Report on jobs that have been completed.</h4>
<p class="category">Detailed item list with financial description</p>
</div>
<div class="col-md-offset-2">
<form class="form-inline">
    <div class="form-group">
        <label class="sr-only" for="exampleInputEmail2">Select a month</label>
        <select id="month" class="form-control" placeholder="Select a month" name="month">
            <option value="">----- Select another month (viewing only) ------</option>
            <option name="month" value="1">January</option>
            <option name="month" value="2">February</option>
            <option name="month" value="3">March</option>
            <option name="month" value="4">April</option>
            <option name="month" value="5">May</option>
            <option name="month" value="6">June</option>
            <option name="month" value="7">July</option>
            <option name="month" value="8">August</option>
            <option name="month" value="9">September</option>
            <option name="month" value="10">Octomber</option>
            <option name="month" value="11">November</option>
            <option name="month" value="12">December</option>
                </select>
        </div>
        <button type="button" id="filer_report" class="btn btn-info btn-sm">Filter</button>

</form>

<div id="report_status"></div>
</div>
<div class="card-content table-responsive" id="report">
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
      <th>Total Cost Charged</th>  
</thead>
<tbody>
<?php

      $select = "SELECT `requests`.`id`, `event_location`, `event_date`, `event_duration`, `service_id`, `special_request`, `customer`, `status`, `amount`, `request_date`,`name`, `classification`, `city`, `county`, `subcounty`, `description`, `owner`, `price` FROM `service`,`requests` WHERE `requests`.`service_id`=`service`.`id` AND `service`.`owner`='{$_SESSION['vendor_email']}' AND `requests`.`status`='Completed' ";
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
</tr>
<?php
}
?>

<?php
$sum = "SELECT SUM(amount) FROM `requests` WHERE  `status`='Completed' AND `service_id` IN (SELECT `id` FROM `service` WHERE `owner`='{$_SESSION['vendor_email']}')";
$result_sum = mysqli_query($connect, $sum);
while ($summ = mysqli_fetch_array($result_sum)){
  $total = $summ['SUM(amount)'];

?>
<tr class="danger">
<td></td>
<td>Averall Total</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td>Requests</td>
<td></td>
<td><strong>Ksh. <?=$total;?></strong></td>
</tr>
<?php } ?>
</tbody>
</table>

</div>
</div>
</div>

<script type="text/javascript">
	$("#filer_report").click(function(){
      var month1 = $("#month").val();
      if (month1=='') {
         $("#report_status").html("Select A month");
      }else{
         $.post("config/request_report.php",{month:month1},function(data){
         	$("#report").html(data);
             $("#report_status").html("");
         })
      }
	})
</script>