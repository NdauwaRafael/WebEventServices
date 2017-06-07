<?php
session_start();
  require "database.conf.php";
?>
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
  if($_POST){

      $month = $_POST['month'];

   $query = "SELECT `requests`.`id`, `event_location`, `event_date`, `event_duration`, `service_id`, `special_request`, `customer`, `status`, `amount`, `request_date`,`name`, `classification`, `city`, `county`, `subcounty`, `description`, `owner`, `price` FROM `service`,`requests` WHERE `requests`.`service_id`=`service`.`id` AND `service`.`owner`='{$_SESSION['vendor_email']}' AND `requests`.`status`='Completed' AND MONTH(requests.event_date)='$month'  ";

      $result_q = mysqli_query($connect, $query);
      $r = 0; 
      while($request = mysqli_fetch_array($result_q)){
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

$sum = "SELECT SUM(amount) FROM `requests` WHERE  `status`='Completed' AND MONTH(event_date)='$month' AND `service_id` IN (SELECT `id` FROM `service` WHERE `owner`='{$_SESSION['vendor_email']}')";
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
<?php      

  }

  ?>