	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="green" id="status">
	                                <h4 class="title">Add A New Service</h4>
									<p class="category">Fill the form below and submit</p>

	                            </div>
	                            <div class="card-content">
	                                <form id="addservicefrm">


	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label>Item Name</label>
													<input type="text" class="form-control" id="name">
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label >Item Classification</label>
													<select class="form-control" id="category">
                                                      <option>----[SELECT A CATEGORY]----</option>
                                                      <option value="Transport">Transport</option>
                                                      <option value="Entertainment">Entertainment</option>
                                                      <option value="Catering">Catering</option>
                                                    </select>
												</div>
	                                        </div>
	                                    </div>

<!--	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													<label>Adress</label>
													<input type="text" class="form-control" id="address" >
												</div>
	                                        </div>
	                                    </div>
-->
	                                    <div class="row">
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label >City</label>
													<input type="text" class="form-control" id="city" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label >County</label>
													<input type="text" class="form-control" id="county" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label >Sub County</label>
													<input type="text" class="form-control" id="subcounty" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-12">
	                                            <div class="form-group">
	                                                <label>Item Description</label>
													<div class="form-group label-floating">
									    				<label class="control-label"> In you own words, provide an appealing description of the item that will serve as a pitch in the product or service description area</label>
								    					<textarea class="form-control" rows="5" id="description"></textarea>
		                        					</div>
	                                            </div>
	                                        </div>
	                                    </div>

	                                    <button type="button" class="btn btn-success pull-right" id="additembtn">Add item</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>

 <script>
    $(document).ready(function(){


        $("#additembtn").click(function(){

        var name1 = $("#name").val();
        var category1 = $("#category").val();
        var city1 = $("#city").val();
        var county1 = $("#county").val();
        var subcounty1 = $("#subcounty").val();
        var description1 = $("#description").val();
           
            if(name1=='' || category1==''  || city1=='' || county1=='' || subcounty1=='' || description1==''){
                 $("#status").attr("data-background-color", "red");
                 $("#status").html('<h4 class="title">Fill in all empty fields before submitting</h4><p class="category">All fields must be filled before you hit add button!!</p>');
            }else{
                $.post("config/additem.conf.php", {name:name1, category:category1, city:city1, county:county1, subcounty:subcounty1, description:description1}, function(data){
                  $("#status").html(data);
                  
                })
            }
        })
    })
 </script>                       