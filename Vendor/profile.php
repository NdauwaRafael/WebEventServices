<?php
session_start();
require "config/database.conf.php";
  require "config/profile_details.conf.php";

?>
	                    <div class="col-md-8">
	                        <div class="card">
	                            <div class="card-header" data-background-color="green">
	                                <h4 class="title">Edit Profile</h4>
									<p class="category">Complete your profile</p>
	                            </div>
	                            <div class="card-content">
	                                <form>
	                                    <div class="row">
	                                        <div class="col-md-5">
												<div class="form-group label-floating">
													<label class="control-label">Company (disabled)</label>
													<input type="text" class="form-control" disabled>
												</div>
	                                        </div>
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Phone</label>
													<input value="<?= $vendor_phone;  ?>" type="text" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group label-floating">
													<label class="control-label">Email address</label>
													<input value="<?= $vendor_email; ?>" type="email" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label >Fist Name</label>
													<input value="<?= $vendor_firstname;  ?>" type="text" class="form-control" >
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label >Last Name</label>
													<input value="<?= $vendor_lastname;  ?>" type="text" class="form-control" >
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-12">
												<div class="form-group label-floating">
													<label >Identification Number/ Passport Number</label>
													<input value="<?= $vendor_idno;  ?>" type="text" class="form-control" >
												</div>
	                                        </div>
	                                    </div>


	                                    <div class="row">
	                                        <div class="col-md-12">
	                                            <div class="form-group">
	                                                <label>About Me</label>
													<div class="form-group label-floating">
									    				<label > Few description about who you are. Create customers confidence by identifying with your parsona</label>
								    					<textarea  class="form-control" rows="3"><?= $vendor_bio;  ?></textarea>
		                        					</div>
	                                            </div>
	                                        </div>
	                                    </div>

	                                    <button type="submit" class="btn btn-warning pull-right">Update Profile</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
						<div class="col-md-4">
    						<div class="card card-profile">
    							<div class="card-avatar">
    								<a href="#pablo">
    									<img class="img" src="../assets/img/faces/user.jpg" />
    								</a>
    							</div>

    							<div class="content">
    								<h6 class="category text-gray">SERVICE PROVIDER / EVENT ORGANIZER</h6>
    								<h4 class="card-title"><?= $vendor_firstname  ?> <?= $vendor_lastname  ?></h4>
    								<p class="card-content">
    									<?=$vendor_bio;?>
    								</p>
    								<a href="#pablo" class="btn btn-warning btn-round">LIKE</a>
    							</div>
    						</div>
		    			</div>
	                </div>
