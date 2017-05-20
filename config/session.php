<?php
session_start();
ob_start();
  $current_file = $_SERVER['SCRIPT_NAME'];

     
     function customerloggedin(){
          
          if (isset($_SESSION['customer_email']) && !empty($_SESSION['customer_email'])) {
          	return true;
          } else
          {
          	return false;
          }


     }

     /*===================================================================================*/
     function vendor(){
          
         if (isset($_SESSION['vendor_email']) && !empty($_SESSION['vendor_email'])) {
            return true;
          } else
          {
            return false;
          }
     }


     /*=====================================================================================*/

?>
