<?php
require "../config/session.php";
require "config/database.conf.php";
if(vendor()) {
    header("location: ../vendor/vendor.php");
}

 if(customerloggedin()){
   header("location: ../home.php");
 }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eservices</title>

<?php include "inc/mcss.php"; ?>
<?php include "../inc/css.php"; ?>
  </head>

  <body >

              <nav class="navbar navbar-custom" >
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
                      <li><a href="../index.php">Login as Service Provider</a></li>
                    </ul>
                  </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
                </div>
              </nav>
          <div class="container">

<div class="col-md-12">
<div class="card">
<div class="card-header" data-background-color="green">
<h4 class="title">Report on jobs that have been completed.</h4>
<p class="category">Detailed item list with financial description</p>
</div>
<div class="col-md-offset-1">
<form action="reg.php" method="post">

  <div class="form-group">
    <label >First Name</label>
    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
  </div>

  <div class="form-group">
    <label >Last Name</label>
    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
  </div> 

  <div class="form-group">
    <label >ID Number</label>
    <input type="text" class="form-control" id="idno" name="idno" placeholder="Identity Number" required>
  </div> 

  <div class="form-group">
    <label >Phone Number</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
  </div>    

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Password" required>
  </div>  

  <button type="submit" class="btn btn-default">Register</button>
</form>

<?php
if($_POST){
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $idno =$_POST['idno'];
    $phone =$_POST['phone'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $cpassword =$_POST['cpassword'];

if($password==$cpassword){
$register = "INSERT INTO `vendor`(`id`, `firstname`, `lastname`, `idno`, `email`, `phone`, `password`) VALUES (NULL,'$fname','$lname','$idno','$email','$phone','$password')";
if(mysqli_query($connect, $register)){
    echo "Vendor registered successfully";
    $_SESSION['vendor_email'] = $email;
    header("location: vendor.php");

}else{
    echo "Failed to register Vendor";
}    
}else{
    echo "Password do not match";
}
}

?>
</div></div></div>


          </div>
<?php include "inc/mjs.php"; ?>
</body>
</html>                        