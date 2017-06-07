<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active" id="new_req"><a href="#new" aria-controls="home" role="tab" data-toggle="tab">New Requests</a></li>
    <li role="presentation" id="accept_req"><a href="#accepted" aria-controls="profile" role="tab" data-toggle="tab">Accepted Requests</a></li>
    <li role="presentation" id="decline_req"><a href="#declined" aria-controls="messages" role="tab" data-toggle="tab">Declined Requests</a></li>
    <li role="presentation" id="complete_req"><a href="#completed" aria-controls="settings" role="tab" data-toggle="tab">Completed Requests</a></li>
  </ul>

  <!-- Tab panes -->
<div class="tab-content">
  <!-- New Requests -->
  <div role="tabpanel" class="tab-pane fade in active" id="new"> 
    <div id="request_new_tab"></div>  
  </div>



 <!-- Accepted Requests -->
  <div role="tabpanel" class="tab-pane fade" id="accepted">
     <div id="request_accepted_tab"></div> 
  </div>

<!-- Declined Requests -->
  <div role="tabpanel" class="tab-pane fade" id="declined">
     <div id="request_declined_tab"></div> 
  </div>

<!-- Completed Requests -->
  <div role="tabpanel" class="tab-pane fade" id="completed">
      <div id="request_completed_tab"></div> 
  </div>

</div>

</div>

<script>
/*New Request*/
  $("#new_req").click(function(){
    var status1="requested";
     if(status1==''){
      alert('No cartegory');
     } else {
         $.post("customer/config/requests_status.php",{status:status1}, function(data){
             $("#new").html(data);
         })
     }
  });


/*Accepted Request*/
  $("#accept_req").click(function(){
    var status1="Accepted";
     if(status1==''){

     } else {
         $.post("customer/config/requests_status.php",{status:status1}, function(data){
             $("#request_accepted_tab").html(data);
         })
     }
  })  


  /*Declined Request*/
  $("#decline_req").click(function(){
    var status1="Declined";
     if(status1==''){

     } else {
         $.post("customer/config/requests_status.php",{status:status1}, function(data){
             $("#request_declined_tab").html(data);
         })
     }
  })


 /*Completed Request*/
  $("#complete_req").click(function(){
    var status1="Completed";
     if(status1==''){

     } else {
         $.post("customer/config/requests_status.php",{status:status1}, function(data){
             $("#request_completed_tab").html(data);
         })
     }
  }) 

</script>