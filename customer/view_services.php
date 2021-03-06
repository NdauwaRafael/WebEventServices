<div class="row">


<?php
 @include "inc/database.php";
 @include "../inc/database.php";
if ($_POST) {
$city = $_POST['city'];
$county = $_POST['county'];
$category = $_POST['category'];

if($city==''&& $county==''&& $category==''){
 $services_query = "SELECT `service`.`id`, `name`, `classification`, `city`, `county`, `subcounty`, `description`, `owner`, `price`, `image`, `firstname`, `lastname`,`phone` FROM `service`,`vendor` WHERE `vendor`.`email`=`service`.`owner`";
}else{

if($city==''){
   $scity = "`service`.`city`!= 'NUll'";
}else{
   $scity="`service`.`city`='$city'";
}

if($county==''){
   $scounty ="`service`.`county`!= 'NUll'";
}else{
   $scounty="`service`.`county`='$county'";
}

if($category==''){
   $scategory = "`service`.`classification`!= 'NUll'";
}else{
   $scategory="`service`.`classification`='$category'";
}

$services_query = "SELECT `service`.`id`, `name`, `classification`, `city`, `county`, `subcounty`, `description`, `owner`, `price`, `image`, `firstname`, `lastname`,`phone` FROM `service`,`vendor` WHERE `vendor`.`email`=`service`.`owner` AND $scategory AND $scity AND $scounty";
}









 $service_result = mysqli_query($connect, $services_query);

 while($service_array= mysqli_fetch_array($service_result)){
     $service_id = $service_array['id'];
     $service_name = $service_array['name'];
     $service_classification = $service_array['classification'];
     $service_city = $service_array['city'];
     $service_county = $service_array['county'];
     $service_subcounty = $service_array['subcounty'];
     $service_description = $service_array['description'];
     $service_owner = $service_array['owner'];
     $service_price = $service_array['price'];
     $service_image = $service_array['image'];
     $service_owner_name = $service_array['firstname']. " ". $service_array['lastname'];
     $service_owner_phone = $service_array['phone'];



?>

  <div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <img src="assets/img/uploads/<?=$service_image;?>" >
      <div class="caption">
        <h3><?= $service_name; ?></h3>
                <ul class="list-group">
                <li class="list-group-item">City: <?= $service_city; ?></li>
                <li class="list-group-item">County: <?= $service_county; ?></li>
                <li class="list-group-item"><strong>Price (per hour):</strong> <?="Ksh ". $service_price; ?></li>
                </ul>
        <p><a href="#" class="btn btn-success btn-lg btn-block" role="button" data-toggle="modal" data-target=".select<?= $service_id; ?>">Select this Item</a></p>
      </div>
    </div>
  </div>



<div class="modal fade select<?= $service_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
            <div class="modal-header" data-background-color="green" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?= $service_name; ?></h4>
                </div>
                <div class="modal-body">

                        <div class="thumbnail">
                        <img src="assets/img/uploads/<?=$service_image;?>" >
                        <div class="caption">
                            <h3><?= $service_name; ?></h3>
                            <p><strong><?= $service_name; ?></strong> provides mainly <strong><?= $service_classification; ?></strong> services located mainly at <strong><?= $service_city; ?></strong> city at <strong><?= $service_county; ?></strong> County and <strong><?= $service_subcounty; ?></strong> subcounty
                            To Gain More Insight on service you can contact <strong><?=$service_owner_name;?></strong> @ <strong><?=$service_owner_phone;?></strong> </p>
                            <p><?= $service_description; ?></p>


                               <form id="request_service_customer_frm<?= $service_id; ?>" method="post">


	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label>Event Location (subcounty)</label>
													<input  type="text" class="form-control" id="location<?= $service_id; ?>">
												</div>
	                                        </div>


	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label>Event Date</label>
													<input type="date" class="form-control" id="date<?= $service_id; ?>">
												</div>
	                                        </div>
                                        </div>
	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label>Event Duration (No of hours)</label>
													<input type="text" class="form-control" id="duration<?= $service_id; ?>">
												</div>
	                                        </div>

	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label>Price (Ksh.)</label>
													<input style="color:red; "  type="text" value="<?="Ksh ".$service_price; ?>" class="form-control" id="price<?= $service_id; ?>" readonly>
												</div>
	                                        </div>
                                         </div>

	                                    <div class="row">
	                                        <div class="col-md-12">
	                                            <div class="form-group">
	                                                <label>Special request</label>
													<div class="form-group label-floating">
									    				<label class="control-label"> In your own words, provide a description of the service specification that you expect/prefer to be derivered</label>
								    					<textarea  class="form-control" rows="3" id="description<?= $service_id; ?>"></textarea>
		                        					</div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="clearfix"></div>
                                        <div id="status<?= $service_id;?>"></div>
                                    </form>

                            <h2 data-background-color="green">
                                <span><i class="fa fa-cc-paypal" aria-hidden="true"></i></span>
                               <span><i class="fa fa-cc-mastercard" aria-hidden="true"></i></i></span>
                               <span><i class="fa fa-cc-visa" aria-hidden="true"></i></span>
                               <span><i class="fa fa-google-wallet" aria-hidden="true"></i></i></span>
                               <span><i class="fa fa-cc-discover" aria-hidden="true"></i></span>
                               <span><i class="fa fa-cc-stripe" aria-hidden="true"></i></span>
                            </h2>
                            <p><a href="#" id="request_service_customer_btn<?= $service_id; ?>"  class="btn btn-primary" role="button">Request the service</a>
                            <a tabindex="0" type="button" class="btn btn-default" role="button" data-toggle="popover" title="Payment alert" data-content="Sorry, it seems payment have not yet been approved for this module">Pay for this service</a></p>
                        </div>
                        </div>

                </div>
    </div>
  </div>
</div>
<script>

$("#duration<?= $service_id; ?>").keyup(function(){
    var qtty = $("#duration<?= $service_id; ?>").val();
    var price = "<?=$service_price; ?>";
    var amt =qtty * price;


    $("#price<?= $service_id; ?>").val(amt);

})

    $("#request_service_customer_btn<?= $service_id; ?>").click(function(){
        var Location1 = $("#location<?= $service_id; ?>").val();
        var Date1 = $("#date<?= $service_id; ?>").val();
        var Duration = $("#duration<?= $service_id; ?>").val();
        var Quantity = $("#quantity<?= $service_id; ?>").val();
        var Description = $("#description<?= $service_id; ?>").val();
        var service_price1 = $("#price<?= $service_id; ?>").val();
        var service_id1 = "<?=$service_id; ?>"

        if(Location1==''|| Date1==''|| Duration=='' || Quantity=='' || Description==''){
           $("#status<?= $service_id; ?>").html('<div class="btn  btn-danger" role="alert"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Fill in all fields before submitting the form to avoid this error from occuring.! <span class="glyphicon glyphicon-alert"></span></div>');
        }else{
            $.post( "customer/config/request_service_customer_conf.php",
            {
                location: Location1,
                date: Date1,
                duration: Duration,
                description: Description,
                service_id:service_id1,
                service_price:service_price1
            },
            function(data){
               $("#status<?= $service_id; ?>").html(data);
               $("#request_service_customer_frm<?= $service_id; ?>")[0].reset();
            })
        }
    })
</script>



<?php
 }


















}else{

 $services_query = "SELECT `service`.`id`, `name`, `classification`, `city`, `county`, `subcounty`, `description`, `owner`, `price`, `image`, `firstname`, `lastname`,`phone` FROM `service`,`vendor` WHERE `vendor`.`email`=`service`.`owner`";
 $service_result = mysqli_query($connect, $services_query);

 while($service_array= mysqli_fetch_array($service_result)){
     $service_id = $service_array['id'];
     $service_name = $service_array['name'];
     $service_classification = $service_array['classification'];
     $service_city = $service_array['city'];
     $service_county = $service_array['county'];
     $service_subcounty = $service_array['subcounty'];
     $service_description = $service_array['description'];
     $service_owner = $service_array['owner'];
     $service_price = $service_array['price'];
     $service_image = $service_array['image'];
     $service_owner_name = $service_array['firstname']. " ". $service_array['lastname'];
     $service_owner_phone = $service_array['phone'];


?>

  <div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <img src="assets/img/uploads/<?=$service_image;?>" >
      <div class="caption">
        <h3><?= $service_name; ?></h3>
                <ul class="list-group">
                <li class="list-group-item">City: <?= $service_city; ?></li>
                <li class="list-group-item">County: <?= $service_county; ?></li>
                <li class="list-group-item"><strong>Price (per hour):</strong> <?="Ksh ". $service_price; ?></li>
                </ul>
        <p><a href="#" class="btn btn-success btn-lg btn-block" role="button" data-toggle="modal" data-target=".select<?= $service_id; ?>">Select this Item</a></p>
      </div>
    </div>
  </div>



<div class="modal fade select<?= $service_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
            <div class="modal-header" data-background-color="green" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?= $service_name; ?></h4>
                </div>
                <div class="modal-body">

                        <div class="thumbnail">
                        <img src="assets/img/uploads/<?=$service_image;?>">
                        <div class="caption">
                            <h3><?= $service_name; ?></h3>
                            <p><strong><?= $service_name; ?></strong> provides mainly <strong><?= $service_classification; ?></strong> services located mainly at <strong><?= $service_city; ?></strong> city at <strong><?= $service_county; ?></strong> County and <strong><?= $service_subcounty; ?></strong> subcounty
                            To Gain More Insight on service you can contact <strong><?=$service_owner_name;?></strong> @ <strong><?=$service_owner_phone;?></strong> </p>
                            <p><?= $service_description; ?></p>


                               <form id="request_service_customer_frm<?= $service_id; ?>" method="post">


	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label>Event Location (subcounty)</label>
													<input  type="text" class="form-control" id="location<?= $service_id; ?>">
												</div>
	                                        </div>


	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label>Event Date</label>
													<input type="date" class="form-control" id="date<?= $service_id; ?>">
												</div>
	                                        </div>
                                        </div>
	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label>Event Duration (No of hours)</label>
													<input type="text" class="form-control" id="duration<?= $service_id; ?>">
												</div>
	                                        </div>

	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label>Price (Ksh.)</label>
													<input style="color:red; "  type="text" value="<?="Ksh ".$service_price; ?>" class="form-control" id="price<?= $service_id; ?>" readonly>
												</div>
	                                        </div>
                                         </div>

	                                    <div class="row">
	                                        <div class="col-md-12">
	                                            <div class="form-group">
	                                                <label>Special request</label>
													<div class="form-group label-floating">
									    				<label class="control-label"> In your own words, provide a description of the service specification that you expect/prefer to be derivered</label>
								    					<textarea  class="form-control" rows="3" id="description<?= $service_id; ?>"></textarea>
		                        					</div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                    <div class="clearfix"></div>
                                        <div id="status<?= $service_id;?>"></div>
                                    </form>

                            <h2 data-background-color="green">
                                <span><i class="fa fa-cc-paypal" aria-hidden="true"></i></span>
                               <span><i class="fa fa-cc-mastercard" aria-hidden="true"></i></i></span>
                               <span><i class="fa fa-cc-visa" aria-hidden="true"></i></span>
                               <span><i class="fa fa-google-wallet" aria-hidden="true"></i></i></span>
                               <span><i class="fa fa-cc-discover" aria-hidden="true"></i></span>
                               <span><i class="fa fa-cc-stripe" aria-hidden="true"></i></span>
                            </h2>
                            <p><a href="#" id="request_service_customer_btn<?= $service_id; ?>"  class="btn btn-primary" role="button">Request the service</a>
                            <a tabindex="0" type="button" class="btn btn-default" role="button" data-toggle="popover" title="Payment alert" data-content="Sorry, it seems payment have not yet been approved for this module">Pay for this service</a></p>
                        </div>
                        </div>

                </div>
    </div>
  </div>
</div>
<script>

$("#duration<?= $service_id; ?>").keyup(function(){
    var qtty = $("#duration<?= $service_id; ?>").val();
    var price = "<?=$service_price; ?>";
    var amt =qtty * price;


    $("#price<?= $service_id; ?>").val(amt);

})

    $("#request_service_customer_btn<?= $service_id; ?>").click(function(){
        var Location1 = $("#location<?= $service_id; ?>").val();
        var Date1 = $("#date<?= $service_id; ?>").val();
        var Duration = $("#duration<?= $service_id; ?>").val();
        var Quantity = $("#quantity<?= $service_id; ?>").val();
        var Description = $("#description<?= $service_id; ?>").val();
        var service_price1 = $("#price<?= $service_id; ?>").val();
        var service_id1 = "<?=$service_id; ?>"

        if(Location1==''|| Date1==''|| Duration=='' || Quantity=='' || Description==''){
           $("#status<?= $service_id; ?>").html('<div class="btn  btn-danger" role="alert"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Fill in all fields before submitting the form to avoid this error from occuring.! <span class="glyphicon glyphicon-alert"></span></div>');
        }else{
            $.post( "customer/config/request_service_customer_conf.php",
            {
                location: Location1,
                date: Date1,
                duration: Duration,
                description: Description,
                service_id:service_id1,
                service_price:service_price1
            },
            function(data){
               $("#status<?= $service_id; ?>").html(data);
               $("#request_service_customer_frm<?= $service_id; ?>")[0].reset();
            })
        }
    })
</script>



<?php
 }
}

?>
</div>

<script>

$(function () {
  $('[data-toggle="popover"]').popover();
});

function filter_service(){
    var county1 = $("#county").val();
    var category1 = $("#category").val();
    var city1 = $("#city").val();

    $.post("customer/view_services.php",{county:county1, category:category1, city:city1}, function(data){
          $("#concept").html(data);
    });
}
</script>
