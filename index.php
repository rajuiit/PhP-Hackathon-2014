
<?php 
include('connect.php');
ob_start();
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['admin_username']) && !isset($_SESSION['admin_password'])) {
header('Location: login.php');
exit;

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Home page - </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
	    <script src="js/bootstrap-modal.js"></script>
		
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>
    <script src="js/bootstrap-affix.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/holder.js"></script>
    <script src="js/prettify.js"></script>

    <script src="js/application.js"></script>
	    <script src="js/jquery.min.js"></script>
		
		<script src="nivoslider/scripts/jquery.nivo.slider.js"></script>
	    <script src="nivoslider/scripts/jquery.nivo.slider.pack.js"></script>
		<script src="nivoslider/scripts/jquery-1.4.3.min.js"></script>
    <!-- Le styles -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/docs.css" rel="stylesheet">
<link href="css/prettify.css" rel="stylesheet">
<link href="css/social-buttons.css" rel="stylesheet">

    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="container">

 <!-- Navbar
 
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <!-- <div class="navbar-inner"> -->
      <div style="background-color: #006dcc;">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  
          <a class="brand" style="color:white;" href="index.php">SHETS</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
			
              <li class="">
                <a style="color:white;" href="http://www.police.gov.bd/">Home</a>
              </li>
             
              <li class="">
                <a style="color:white;" href="logout.php">Log Out</a>
              </li>
             
            </ul>
          </div>
        </div>
      </div>
    </div>
	<?php
if(isset($_POST['submit'])){
if($_POST['cat']=='emergency'){
header('Location: emergency.php');
}else{
header('Location: complain.php');
}
}else{
?>
	
	
      <form class="form-signin" name="form" action="index.php" method="post" onsubmit="return validate_form(this)" enctype="multipart/form-data">
        <img src="image/police.png" alt="no images" >
		<h5 class="form-signin-heading">Sexual Harrasement Emergency Tracking System</h5>
        <h4 class="form-signin-heading">Choose a Category</h4>		
        <select name="cat">
<option value="emergency">Emergency</option>
<option value="complain">Complain</option>

</select>

        <!--<label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label> -->
        <button class="btn btn-large btn-primary" type="submit" name="submit" id="submit">Submit</button>
      </form>
	<?php  
	}
	?>
    </div> <!-- /container -->
 <!-- Footer
    ================================================== -->
    <footer class="footer">
      <div class="container">
	  
<p align="center">Powered By:<a href="">Angry Boys</a></p>
        
      </div>
    </footer>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script>

  </body>
</html>
