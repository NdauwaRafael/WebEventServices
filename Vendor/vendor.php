<?php
require "../config/session.php"; 
require "config/database.conf.php";
  require "config/profile_details.conf.php";
require "../config/permission.php";
if(!vendor_active()){
   header("location: ../error/error.php");
}
if(!vendor()) {
    header("location: ../index.php");
} 
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favres.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Eservices | Online event services access</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

<?php include "inc/mcss.php"; ?>
</head>

<body>

	<div class="wrapper">

	    <div class="sidebar" data-color="green" data-image="../assets/img/10.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="#" class="simple-text">
					Eservices
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	                <li class="active">
	                    <a href="vendor.php">
	                        <p>Dashboard</p>
	                    </a>
	                </li>
	                <li>
	                    <a id="vendor_profile">
	                        <p><?= $vendor_firstname  ?> <?= $vendor_lastname  ?> Profile</p>
	                    </a>
	                </li>
	                <li>
	                    <a id="addservice">
	                        
	                        <p>Add services</p>
	                    </a>
	                </li>
	                <li>
	                    <a id="viewservice">
	                        
	                        <p>View Services</p>
	                    </a>
	                </li>
	                <li>
	                    <a id="new_request">
	                        
	                        <p>New Request</p>
	                    </a>
	                </li>

	                <li>
	                    <a id="accepted_request">
	                        
	                        <p>Confirmed Requests</p>
	                    </a>
	                </li> 

 	                <li>
	                    <a id="declined_request">
	                        
	                        <p>Declined Requests</p>
	                    </a>
	                </li> 

 	                <li>
	                    <a id="completed_request">
	                        
	                        <p>Completed Requests</p>
	                    </a>
	                </li>					

	                <li>
	                    <a id="reports">
	                        
	                        <p>Reports</p>
	                    </a>
	                </li>                                                         	              
	            </ul>
	    	</div>
	    </div>

	    <div class="main-panel">
<nav class="navbar navbar-default" role="navigation">

	<div class="container-fluid">
    	<div class="navbar-header">
    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
    		</button>
    		<a class="navbar-brand" href="#">Welcome <?= $vendor_firstname  ?> <?= $vendor_lastname  ?></a>
    	</div>

    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    		<ul class="nav navbar-nav">
        		<li class="dropdown">
        			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../tools/images/settings-24.png"> settings <b class="caret"></b></a>
        			<ul class="dropdown-menu">
					  <li><a href="#">Profile</a></li>
					  <li><a href="#">Update Profile</a></li>
					  <li><a href="#">Messages</a></li>
					  <li class="divider"></li>
					  <li><a href="#">Notifications</a></li>
					  <li class="divider"></li>
				      <li><a href="config/logout_vendor.php">Logout</a></li>
        			</ul>
        		</li>
    		</ul>
    	</div>
	</div>
</nav>      
			<div class="content" id="vendorspace">

				<div class="container-fluid" >
					
				

					<div class="row">
						<div class="col-lg-7 col-md-12">
							<div class="card card-nav-tabs">
								<div class="card-header" data-background-color="green">
									<h4>Web Eservices</h4>
								</div>

								<div class="card-content">
									<img src="../tools/images/user8.jpg">
								</div>
							</div>
						</div>

						<div class="col-lg-5 col-md-12">
							<div class="card">
	                            <div class="card-header" data-background-color="orange">

	                            </div>
	                            <div class="card-content table-responsive">
	                               
	                            </div>
	                        </div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

</body>

<?php include "inc/mjs.php"; ?>
<script>
   $(document).ready(function(){
       $("#addservice").click(function(){
           $("#vendorspace").load("addservice.php");
       });


       $("#viewservice").click(function(){
           $("#vendorspace").load("viewservice.php");
       })


       $("#vendor_profile").click(function(){
           $("#vendorspace").load("profile.php");
       })

       $("#reports").click(function(){
           $("#vendorspace").load("reports.php");
       })	   


/*New Requests*/
	   $("#new_request").click(function(){
		   var status1 = 'requested';
		   if(status1==''){

		   }else{
			   $.post("requests.php",{status:status1}, function(data){
				   $("#vendorspace").html(data);
			   })
		   }
         
	   });

/*Accepted Requests*/
	   $("#accepted_request").click(function(){
		   var status1 = 'Accepted';
		   if(status1==''){

		   }else{
			   $.post("requests.php",{status:status1}, function(data){
				   $("#vendorspace").html(data);
			   })
		   }
         
	   });


/*Declined Requests*/
	   $("#declined_request").click(function(){
		   var status1 = 'Declined';
		   if(status1==''){

		   }else{
			   $.post("requests.php",{status:status1}, function(data){
				   $("#vendorspace").html(data);
			   })
		   }
         
	   });


/*New Requests*/
	   $("#completed_request").click(function(){
		   var status1 = 'Completed';
		   if(status1==''){

		   }else{
			   $.post("requests.php",{status:status1}, function(data){
				   $("#vendorspace").html(data);
			   })
		   }
         
	   });	   	   

   })


/*Functions*/

function new_request(){
		   var status1 = 'requested';
		   if(status1==''){

		   }else{
			   $.post("requests.php",{status:status1}, function(data){
				   $("#vendorspace").html(data);
			   })
		   }	
}

function accepted_request(){
		   var status1 = 'Accepted';
		   if(status1==''){

		   }else{
			   $.post("requests.php",{status:status1}, function(data){
				   $("#vendorspace").html(data);
			   })
		   }
}

/*reports*/
</script>
</html>
