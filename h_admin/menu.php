<?php 
function create_menu($link,$message,$classnum=1,$value=1){
if($classnum==1)
print '<li><a href='.$link.'><i class="icon-chevron-right"></i> '.$message.'</a></li>';
if($classnum==2)
print '<li><a href='.$link.'> '.$message.'<span  class="badge badge-success">'.$value .'</span></a> </li>';


}

?>

 <!-- Docs nav
    ================================================== -->
   <div class="row-fluid">
      <div class="span4 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
          
		  
		  <?php
		 

		  
		  create_menu('index.php','Dashboard',1);
		  create_menu('emergency.php','Emergency');
		   create_menu('complain.php','Complain');
		   create_menu('graph_basic_complain.php','Basic Complain Graph');
		 create_menu('graph_bar_complain.php','Complain Graph (Bar Chart)');
		  
		  
		  ?>
		  
		  
		 
        </ul>
      </div>
      </div>