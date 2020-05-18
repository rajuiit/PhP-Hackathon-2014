<?php
include('header.php');
check_session_admin();


printheader(' Delete Menu');
   
print'<div class="span9">';

					$id=$_GET['id'];
	
		
					$del=mysql_query("delete from news where n_id='$id' "); 
						if($del){
							print '<div class="alert alert-success">  Well done! You have successfully deleted news from the website.</div>'; 
						print'<p align="center"><a href="news.php" class="btn btn-primary" type="button">Back To News Settings</a></p>';

						}  
						
						else{
						print '<div class="alert alert-error">  Oh snap! Data is not deleted. Change a few things up or Contact your Administrator. </div>'; 
							
						}		
						
				
				
			
 	



    print '</div>';
	

include('footer.php');
?>
