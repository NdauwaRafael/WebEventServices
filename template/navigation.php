<?php

 $page = basename($_SERVER['PHP_SELF']);

$user = $_SESSION["customer_email"];

$url = $_SERVER['REQUEST_URI']; //returns the current URL
$parts = explode('/',$url);
$dir = $_SERVER['SERVER_NAME'];
for ($i = 0; $i < count($parts) - 1; $i++) {
 $dir .= $parts[$i] . "/";
}


?>  

<script src="tools/js/jquery-2.1.4.min.js"></script>
<script src="tools/js/bootstrap.min.js"></script>          
              <nav class="navbar navbar-custom navbar-fixed-top">
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
                      <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                      <li><a id="requests">Requests Details</a></li>
                      <li><a href="#">Messages</a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Transport</a></li>
                          <li><a href="#">Shelter</a></li>
                          <li><a href="#">Cattering</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="#">Fashion</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="#">Venue</a></li>
                        </ul>
                      </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                        <a  class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php if(isset($user) && !empty($user)){echo $user; }?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a id="logout" href=" <?php if($page == 'home.php'){ echo "config/logout.php"; }else{echo "../config/logout.php";}  ?>">logout</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
                </div>
              </nav>
<div id="loggedinuser"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
 $(document).ready(function(){
            var url = '<?php echo $dir; ?>';
            if (url =='localhost/WebEventServices/'){
            $("#logout").attr('href', 'config/logout.php');
            }  


 })

 
</script>

