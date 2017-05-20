
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eservices</title>

<?php include "inc/css.php" ?>

  </head>

  <body style = "background:url('tools/images/wit.jpg'); background-size:cover;">

              <nav class="navbar navbar-default">
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
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="#">One more separated link</a></li>
                        </ul>
                      </li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                      </div>
                      <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="#">Link</a></li>
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
                      <h4>Halloooooooooooooooooooooooo</h4>
                      <hr>
                    </div>

                    <div class="col-md-6">
                      <h4>Login to access services</h4>
                      <hr>                    
                          <form action="index.php" method="post">

                            <div class="form-group">
                              <label >Login as??</label>
                                  <select class="form-control" id="user">
                                  <option>--------------[SELECT A CATEGORY TO LOGIN]--------------</option>
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
                          <div id="status"></div>
                             <div class="form-group">
                              <label >Dont have an account yet??</label>
                              <a href="customer/userreg.php"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-user" ></span> Create account</button></a> 
                            </div>                           

                                          
                    </div>
            </div>

          </div>















<?php include "inc/js.php"; ?>
<script>
  $(document).ready(function(){
$("#login_home_btn").click(function(){
     var user1 = $("#user").val();
     var email1 = $("#email").val();
     var password1 = $("#password").val();

     $.post("config/login.conf.php",
     {
                 user:user1,
                 email:email1,
                 password:password1
            },
            function(data){
              $("#status").html(data);
            }
            )

});

     
  });

</script> 
  </body>

</html>