<?php
include('header.php');
check_session_admin();

printheader(' Delete Keynote Speaker');
   
print'<div class="span9">';
$id=$_GET['id'];
	
		
$del=mysql_query("delete from keynote where k_id='$id' "); 
if($del){
print '    <div class="alert alert-success">    Well done! You successfully delete keynote speaker from the website. Are you want to another? <a href="keynote_speaker.php">Yes</a> || <a href="index.php">No</a>
    </div>'; 
 }
 else{	echo "data is not deleted.";}		
						
  print '</div>';
	

include('footer.php');
?>
