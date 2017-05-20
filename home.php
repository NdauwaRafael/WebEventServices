<?php
require "config/session.php";
 if(!customerloggedin()){
   header("location: index.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME | Eservices </title>

    <?php include "inc/css.php"; ?>

  </head>

  <body>
<?php include "template/navigation.php"; ?>


          <div class="container">
            
            <div class="row">



                      <div class="row">
                           <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                             <img src="tools/images/tr.jpg" alt="...">
                               <div class="caption">
                                <h3>Transport</h3>
                                 <p>text herre</p>
                                 <p><a href="#" class="btn btn-primary" role="button">Button</a> 
                             </div>
                           </div>
                         </div>

                           <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                             <img src="tools/images/dj.jpg" alt="...">
                               <div class="caption">
                                <h3>Entertainment</h3>
                                 <p>...</p>
                                 <p><a href="#" class="btn btn-primary" role="button">Button</a> 
                             </div>
                           </div>
                         </div>

                           <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                             <img src="tools/images/wit.jpg" alt="...">
                               <div class="caption">
                                <h3>Cattering</h3>
                                 <p>...</p>
                                 <p><a href="#" class="btn btn-primary" role="button">Button</a> 
                             </div>
                           </div>
                         </div>
                          </div>                                        
            </div>

          </div>















<?php include "inc/js.php"; ?>
  </body>

</html>