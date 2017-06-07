<?php
 include "../../inc/database.php";
session_start();
ob_start();
?>

<div class="panel panel-default">
  <div class="panel-body">


<table class="table">
<thead>
   <th>#</th>
   <th>Requested On:</th>
   <th>Location</th>
   <th>For Date</th>
   <th>Duration</th>
   <th>Amount</th>
   <th>Status</th>
   <th>Action</th>

</thead>
<?php
if($_POST){
    $status = $_POST['status'];


    $select_req = "SELECT * FROM `requests` WHERE `customer`='{$_SESSION['customer_email']}' AND `status`='$status' ORDER BY `request_date` DESC";
    $select_res = mysqli_query($connect, $select_req);
    $a = 0;
    while($req = mysqli_fetch_array($select_res)){
        $location = $req['event_location'];
        $date = $req['event_date'];
        $duration = $req['event_duration'];
        $status = $req['status'];
        $when = $req['request_date'];
        $amount = $req['amount'];
        $a++;

?>
<tr class="success">
   <td><?=$a; ?></td>
   <td><?=$when; ?></td>
   <td><?=$location; ?></td>
   <td><?=$date; ?></td>
   <td><?=$duration; ?></td>
   <td><?=$amount; ?></td>
   <td><?=$status; ?></td>
   <td><?php
      if($status=='requested'){
            ?>
            <a tabindex="0" type="button" class="btn btn-default" role="button" data-toggle="popover" title="Cancel Request" data-content="Sorry, request cancel expired">Cancel Request</a>
            <?php
      }else{
          ?><a class="btn btn-default">No Action</a><?php
      }
   
   ?></td>
</tr>
<?php
    }
}


?>
</table>
  </div>
</div>