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
                      <li><a href="vendor.php"><span class="glyphicon glyphicon-home"></span> Vendor Page</a></li>

                    </ul>

                  </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
                </div>
              </nav>
              <?php

              $name = $_GET['service_name'];
              $service_id = $_GET['service_id'];
               ?>
<div class="container">
<center>
<h2>UPLOAD <?=$name;?> PHOTO</h2>
<hr>
</center>


<div class="row">
  <div class="col-sm-6 col-md-6 col-md-offset-3">
    <div class="thumbnail" >
      <center><div id="targetLayer"><img width="90%" src="../assets/img/uploads/noPic.jpg" class="thumbnail"></div></center>
      <div class="caption">
            <form id="upload_service_image" method="post">
              <div class="form-group">
                <label for="exampleInputFile">Upload Product Now</label>
                <hr>
                <input type="file" name="service_image" id="exampleInputFile">
                <p class="help-block">This image will appear in all specifications that features this product.</p>
              </div>

              <div class="form-group">
                <input style="visibilty:hidden !important;" type="text" name="service_id" value="<?=$service_id;?>">
              </div>
              <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-open-file"></span> Upload Now</button>
            </form>
      </div>
    </div>
  </div>
</div>

<?php include "inc/mjs.php"; ?>
<script>
$("#upload_service_image").on('submit',(function(e) {
  e.preventDefault();
  alert("ahem");
  var formData = new FormData($(this)[0]);
  $.ajax({
        url: "config/upload_service_image.php",
    type: "POST",
    data:  formData,
    contentType: false,
        cache: false,
    processData:false,
    success: function(data)
      {
    $("#targetLayer").html(data);
  },
  error: function()
  {
  }
});
}));

</script>

                    </div>














  </body>

</html>
