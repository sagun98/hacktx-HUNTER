<!DOCTYPE html>
<html>
  <head>
    <!-- Materialize css CDN-->    
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">      
      <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
      <!-- Materialize css CDN ends-->
     
       <link rel="stylesheet" href="css/flash.css">
   
        <script src="js/confirm_popup.js"></script>
    
    
    <title>Modal</title>

  </head>
 
  <body>
  <style type="text/css">
 
  </style>
     
   <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn blue-grey modal-trigger" href="#modal1">Confirm Pickup</a>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Confirm Order</h4>
      <p>Are you sure you want to confirm you order?</p>
    </div>
    <div class="modal-footer">
      <a href="" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
       <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Confirm</a>
    </div>
  </div>


  </body>
  </html>
  
<?php
include('flash.php');
  flash( 'zip_error', 'Invalid Zip code', 'error-msg' );  
  flash( 'zip_error' );
  
  flash( 'logged', 'Successfully logged in');  
  flash( 'logged' );
  
  flash( 'warning', 'This is a warning message', 'warning-msg' );  
  flash( 'warning' );
  
  flash( 'info', 'Some general information', 'info-msg' );  
  flash( 'info' );
  

?>