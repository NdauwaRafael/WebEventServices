<?php
require "config/session.php";
 if(adminloggedin()){
   header("location: admin.php");
 }
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME | Eservices </title>

    <?php include "../inc/css.php"; ?>

  </head>

  <body>

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
                      <li><a href="../index.php">Home</a></li>

                    </ul>

                  </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
                </div>
              </nav>

<div class="container">
                    <div class="col-xs-offset-3 col-xs-6">
                      <div id="status"></div>                    
                          <form action="index.php" method="post">

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
                            <button type="button" id="login_admin_btn" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                          </form> 
                          
                           

                                          
                    </div>
                    </div>













<?php include "../inc/js.php"; ?>
<script>
 $("#login_admin_btn").click(function(){

     var email1 = $("#email").val();
     var password1 = $("#password").val();

     if(email1==''||password1==''){
         $("#status").html('Fill in empty fields');
     }else{
         $.post("config/login.php",{email:email1, password:password1}, function(data){
              $("#status").html(data);
         })
     }
 })
</script>
  </body>

</html>