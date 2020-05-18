<?php
include('header.php');
check_session_admin();

printheader(' Delete Sponsors');
   
print'<div class="span9">';

					$id=$_GET['id'];
	
		
					$del=mysql_query("delete from  sponsors where sp_id='$id' "); 
						if($del){
							print '    <div class="alert alert-success">
    Well done! You successfully delete sponsors from the website. Are you want to another? <a href="sponsors.php">Yes</a> || <a href="index.php">No</a>
    </div>'; 
 }  
						
						else{
							echo "data is not deleted.";
						}		
						
				
				
			
 	



    print '</div>';
	

include('footer.php');
?>
