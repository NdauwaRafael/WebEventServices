<?php
require "config/session.php";
 if(!adminloggedin()){
   header("location: index.php");
 }
 include "../inc/database.php";
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME | Eservices </title>

    <?php include "../inc/css.php"; ?>
    <?php include "../inc/js.php"; ?>
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
                      <li class="active"><a href="#">Admin ~ <?=$_SESSION['admin_email'];?> <span class="sr-only">(current)</span></a></li>
                      <li><a href="logout.php">Logout</a></li>

                    </ul>

                  </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
                </div>
              </nav>

<div class="container">

<div class="col-xs-6">
<h4>Customers</h4>
<hr>
<table class="table table-condensed">
<thead>
   <th>#</th>
   <th>First Name</th>
   <th>Last Nmae</th>
   <th>Phone</th>
   <th>Action</th>
   <th>Control</th>
</thead>
<?php 
  $select_cust = "SELECT * FROM `customer`";
  $res_cust = mysqli_query($connect, $select_cust);
  $a =0;
  while($customer=mysqli_fetch_array($res_cust)){
      $fname = $customer['firstname'];
      $lname = $customer['lastname'];
      $email = $customer['email'];
      $phone = $customer['phone'];
      $cust_id = $customer['id'];
      $cust_permission = $customer['permission'];
      $a++;

?>
<tr>
   <td><?=$a; ?></td>
   <td><?=$fname;?></td>
   <td><?=$lname;?></td>
   <td><?=$phone;?></td>
   <td><button class="btn btn-default btn-sm" id="action<?=$cust_id;?>">
     <?php if($cust_permission=='Active'){ ?>Deactivate<?php }else{ ?>Activate<?php } ?>
   </button></td>
   <td><button id="delete<?=$cust_id;?>" class="btn btn-danger btn-sm">Delete</button></td>
</tr>
<script>
  $("#action<?=$cust_id;?>").click(function(){
    var permission1 = "<?=$cust_permission; ?>"; 
    var id1 ="<?=$cust_id;?>";

    if(permission1=='' || id1=='' ){

    }else{
      $.post("config/permission.php",{permission:permission1, id:id1}, function(data){
          alert(data);
          window.location.href="admin.php";
      })
    }
  })

  $("#delete<?=$cust_id;?>").click(function(){
    var custid1 = "<?=$cust_id;?>";
    if(custid1==''){

    }else{
      $.post("config/delete.php",{custid:custid1}, function(data){
          alert(data);
          window.location.href="admin.php";        
      })
    }
  })
</script>
<?php      
  }
?>


</table>
</div>

<div class="col-xs-1">h</div>
<div class="col-xs-5">
<h4>Vendors</h4>
<hr>

<table class="table table-condensed">
<thead>
   <th>#</th>
   <th>First Name</th>
   <th>Last Nmae</th>
   <th>Phone</th>
   <th>Action</th>
   <th>Control</th>
</thead>

<?php
  $select_ven = "SELECT * FROM `vendor`";
  $res_ven = mysqli_query($connect, $select_ven);
  $i = 0;
  while($vendor = mysqli_fetch_array($res_ven)){
      $firstname = $vendor['firstname'];
      $laststname = $vendor['lastname'];
      $idno = $vendor['idno'];
      $id = $vendor['id'];
      $vemail = $vendor['email'];
      $vphone = $vendor['phone'];
      $vpermis = $vendor['permission'];
      $i++;
?>

<tr>
   <td><?=$i; ?></td>
   <td><?=$firstname; ?></td>
   <td><?=$laststname; ?></td>
   <td><?=$vphone ?></td>
   <td><button class="btn btn-default btn-sm" id="active<?=$idno;?>">
     <?php if($vpermis=='Active'){ ?>Deactivate<?php }else{ ?>Activate<?php } ?>
   </button></td>
   <td><button id="delete_vendor<?=$idno;?>" class="btn btn-danger btn-sm">Delete</button></td>
</tr>
<script>
  $("#active<?=$idno;?>").click(function(){
    var idno1 = "<?=$idno;?>";
    var permission1 = "<?=$vpermis;?>";

    if(permission1=='' || idno1==''){

    }else{
        $.post("config/vendor_permission.php",{idno:idno1, permission:permission1}, function(data){
           alert(data);
          window.location.href="admin.php";         
        });
    }
  })

  $("#delete_vendor<?=$idno;?>").click(function(){
    var vidno1 = "<?=$idno;?>";
    if(vidno1==''){

    } else{
      $.post("config/delete_vendor.php", {vidno:vidno1},function(data){
           alert(data);
          window.location.href="admin.php";         
      })
    }
  })
</script>
<?php
  }
?>
</table>


</div>

 </div>















  </body>

</html>