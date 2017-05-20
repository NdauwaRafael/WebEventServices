<?php   require "config/database.conf.php"; ?>
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="green">
	                                <h4 class="title">Services List You Have added</h4>
	                                <p class="category">Detailed item list</p>
	                            </div>
	                            <div class="card-content table-responsive">
	                                <table class="table">
	                                    <thead class="text-primary">
                                            <th>Profile</th>
	                                    	<th>Name</th>
                                            <th>Classification</th>	                                    	
	                                    	<th>City</th>
                                            <th>County</th>
                                            <th>SubCounty</th>
											<th>Description</th>
                                            <th>Price/h</th>
                                            <th>Control</th>
	                                    </thead>
	                                    <tbody>

 <?php
 /*================================SELECT ALL ITEMS FROM ITEM LIST===============*/
   $select = "SELECT * FROM `service` LIMIT 20";
   $result = mysqli_query($connect, $select);
   while($service=mysqli_fetch_array($result)){
       $name = $service['name'];
       $category = $service['classification'];
       $city = $service['city'];
       $county = $service['county'];
       $subcounty = $service['subcounty'];
       $description = $service['description'];
       $price = $service['price'];
       $id = $service['id'];

?>

                <tr>
                <td><img src="../assets/img/f4.jpg"  class="img-thumbnail" ></td>
                    <td><?= $name; ?></td>
                    <td><?= $category;  ?></td>
                    <td><?= $city; ?></td>
                    <td><?= $county; ?></td>
                    <td><?= $subcounty; ?></td>
                    <td><?= $description; ?></td>
                    <td class="text-primary"><?= $price;  ?></td>
                    <td><button class="btn btn-default" data-toggle="modal" data-backdrop=false data-target="#edit<?= $id; ?>">Edit</button></td>
                </tr>


                <div class="modal fade " id="edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-content">
                        <div class="modal-header" data-background-color="green" style="padding:10px;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><?= $name; ?> Details Edit</h4>
                        </div>
                        <div class="modal-body">
                        <div  id="status<?= $id; ?>"></div>
	                                <form id="update_service_frm<?= $id; ?>" method="post">


	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label>Item Name</label>
													<input value="<?= $name; ?>" type="text" class="form-control" id="name<?= $id; ?>">
												</div>
	                                        </div>

	                                    
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label>Category</label>
													<input value="<?= $category; ?>" type="text" class="form-control" id="category<?= $id; ?>">
												</div>
	                                        </div>
                                        </div>
	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label>City</label>
													<input value="<?= $city; ?>" type="text" class="form-control" id="city<?= $id; ?>">
												</div>
	                                        </div>
 	                                   
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label>County</label>
													<input value="<?= $county; ?>" type="text" class="form-control" id="county<?= $id; ?>">
												</div>
	                                        </div>
                                         </div> 

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label>Subcounty</label>
													<input value="<?= $subcounty; ?>" type="text" class="form-control" id="subcounty<?= $id; ?>">
												</div>
	                                        </div>
                                             

	                                    
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label>Price per Hour</label>
													<input value="<?= $price; ?>" type="text" class="form-control" id="price<?= $id; ?>">
												</div>
	                                        </div>
                                       </div>   
	                                    <div class="row">
	                                        <div class="col-md-12">
	                                            <div class="form-group">
	                                                <label>Item Description</label>
													<div class="form-group label-floating">
									    				<label class="control-label"> In you own words, provide an appealing description of the item that will serve as a pitch in the product or service description area</label>
								    					<textarea  class="form-control" rows="3" id="description<?= $id; ?>"><?= $description; ?></textarea>
		                        					</div>
	                                            </div>
	                                        </div>
	                                    </div> 

	                                    <button type="submit" class="btn btn-info pull-right" id="update_service_btn<?= $id; ?>">Update Now!!</button>
	                                    <div class="clearfix"></div>
                                    </form>                                                                                                                                                                          
                        </DIV>
                        </div>
                    </div>
                </div>
                </div>  

<script>
  $("#update_service_btn<?= $id; ?>").click(function() {
       var id1 = "<?= $id; ?>";
        var name1 = $("#name<?= $id; ?>").val();
        var category1 = $("#category<?= $id; ?>").val();
        var city1 = $("#city<?= $id; ?>").val();
        var county1 = $("#county<?= $id; ?>").val();
        var subcounty1 = $("#subcounty<?= $id; ?>").val();
        var description1 = $("#description<?= $id; ?>").val();
        var price1 = $("#price<?= $id; ?>").val();
           
            if(name1=='' || category1==''  || city1=='' || county1=='' || subcounty1=='' || description1=='' || price1==''){
                 $("#status<?= $id; ?>").attr("data-background-color", "red");
                 $("#status<?= $id; ?>").html('<h4 class="title">Fill in all empty fields before submitting</h4><p class="category">All fields must be filled before you hit add button!!</p>');
            }else{
                $.post("config/update_service.conf.php", {name:name1, category:category1, city:city1, county:county1, subcounty:subcounty1, description:description1,price:price1, id:id1}, function(data){
                  $("#status<?= $id; ?>").html(data);
                  
                })
            }        
  });
</script>                              
<?php       
   }

 ?>                                       


	                                    </tbody>
	                                </table>

	                            </div>
	                        </div>
	                    </div>