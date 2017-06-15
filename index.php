<?php
require "config/session.php";

if(vendor()) {
    header("location: vendor/vendor.php");
}

 if(customerloggedin()){
   header("location: home.php");
 }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eservices</title>

<?php include "inc/css.php" ?>

  </head>

  <body style = "background:url('tools/images/tent.jpg'); background-size:cover;">

              <nav class="navbar navbar-custom">
              <div class="container">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Eservices</a>
                  </div>

                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                      <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                      <li><a href="#">Link</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="vendor/reg.php">Register as Service Provider</a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
                </div>
              </nav>


          <div class="container">
            
            <div class="row home-start">
                    <div class="col-md-6">
                      <h4>Event Site Services</h4>
                      <hr>

                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                  <!-- Indicators -->
                                  <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                                  </ol>

                                  <!-- Wrapper for slides -->
                                  <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                      <img src="tools/images/jazz.jpg" alt="...">
                                      <div class="carousel-caption">
                                       <h4>Jazz Group</h4>
                                       <hr>
                                       Fusce rutrum lectus id nibh ullamcorper aliquet. Pellentesque pretium mauris et augue fringilla non bibendum turpis iaculis. Donec sit amet nunc lorem.                                       
                                      </div>
                                    </div>
                                    <div class="item">
                                      <img src="tools/images/dj.jpg" alt="...">
                                      <div class="carousel-caption">
                                        ...
                                      </div>
                                    </div>

                                    <div class="item">
                                      <img src="tools/images/wit.jpg" alt="...">
                                      <div class="carousel-caption">
                                        ...
                                      </div>
                                    </div>                                    

                                    <div class="item">
                                      <img src="tools/images/4.jpg" alt="...">
                                      <div class="carousel-caption">
                                        ...
                                      </div>
                                    </div> 

                                    <div class="item">
                                      <img src="tools/images/wedding-space.jpg" alt="...">
                                      <div class="carousel-caption">
                                        ...
                                      </div>
                                    </div> 

                                    <div class="item">
                                      <img src="tools/images/weddi.jpg" alt="...">
                                      <div class="carousel-caption">
                                        Quitar group
                                      </div>
                                    </div> 
                                  </div>

                                  <!-- Controls -->
                                  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                  </a>
                                </div>                      
                    </div>

                    <div class="col-md-6">
                      <h4>Login to access services</h4>
                      <hr>
                      <div id="status"></div>                    
                          <form action="index.php" method="post">

                            <div class="form-group">
                              <label >Login as??</label>
                                  <select class="form-control" id="user">
                                  <option value="">--------------[SELECT A CATEGORY TO LOGIN]--------------</option>
                                    <option  value="customer">Customer</option>
                                    <option value="vendor">Vendor</option>
                                  </select>
                            </div>

                            <div class="form-group">
                              <label >Email address</label>
                              <input type="email" id="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>                         

                            <div class="form-group">
                              <label >Password</label>
                              <input type="password" id="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>

                            <div class="checkbox">
                              <label>
                                <input type="checkbox"> Remember Me
                              </label>
                            </div>
                            <button type="button" id="login_home_btn" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                          </form> 
                          
                             <div class="form-group">
                              <label >Dont have an account yet??</label>
                              <a href="customer/userreg.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-user" ></span> Create account</button></a> 
                            </div>                           

                                          
                    </div>
            </div>

          </div>















<?php include("inc/js.php"); ?>
<script>
  $(document).ready(function(){
        $("#login_home_btn").click(function(){
            var user1 = $("#user").val();
            var email1 = $("#email").val();
            var password1 = $("#password").val();

              if(user1==''|| email1==''|| password1==''){
                  $("#status").html('<div class="alert  btn-danger" role="alert"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Fill all fields before submitting the form else loging error will occur.! <span class="glyphicon glyphicon-alert"></span></div>');
              }else{

                  $.post("config/login.conf.php",
                  {
                              user:user1,
                              email:email1,
                              password:password1
                          },
                          function(data){
                            $("#status").html(data);
                          }
                          );

              }

        });

     
  });

</script> 
  </body>

</html>