<?php 

include('../connect.php');
include('../include.php');
check_session_admin();


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SHETS</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
<link href="../css/bootstrap-responsive.css" rel="stylesheet">
<link href="../css/docs.css" rel="stylesheet">
<link href="../css/prettify.css" rel="stylesheet">
<link href="../css/social-buttons.css" rel="stylesheet">
<link href="nivoslider/nivo-slider.css/social-buttons.css" rel="stylesheet">

        <script src="../js/jquery.min.js"></script>
	   
	   
		
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap-transition.js"></script>
    <script src="../js/bootstrap-alert.js"></script>
    <script src="../js/bootstrap-modal.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
    <script src="../js/bootstrap-scrollspy.js"></script>
    <script src="../js/bootstrap-tab.js"></script>
    <script src="../js/bootstrap-tooltip.js"></script>
    <script src="../js/bootstrap-popover.js"></script>
    <script src="../js/bootstrap-button.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <script src="../js/bootstrap-carousel.js"></script>
    <script src="../js/bootstrap-typeahead.js"></script>
    <script src="../js/bootstrap-affix.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script src="../js/holder.js"></script>
    <script src="../js/prettify.js"></script>

    <script src="../js/application.js"></script>
	  
		
		<script src="nivoslider/scripts/jquery.nivo.slider.js"></script>
	    <script src="nivoslider/scripts/jquery.nivo.slider.pack.js"></script>
		<script src="nivoslider/scripts/jquery-1.4.3.min.js"></script>
	    

</head>
<body>
 <!-- Navbar
 
    ================================================== -->
    <div  class="navbar navbar-inverse navbar-fixed-top" >
      <!-- <div  class="navbar-inner"> 
      <div style="background-color: #CB75DC;" class=""> -->
      <div style="background-color: #006dcc;" class="">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand"  style="color:white;" href="../index.php"><?php echo $conf_name ;?></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
             <li class="">
                <a style="color:white;" href="index.php">Home Page</a>
              </li>
             
            </ul>
          </div>
        </div>
      </div>
    </div>
<!-- Subhead
================================================== -->

	




 <div class="container-fluid">
 
    <div class="row-fluid">
    <div class="span3">
    <!--Sidebar content-->
	    <?php include('menu.php');?> 
    </div>