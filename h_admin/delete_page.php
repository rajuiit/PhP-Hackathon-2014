<?php
include('header.php');
check_session_admin();

printheader(' Delete Menu');
   
print'<div class="span9">';

					$id=$_GET['page'];
	
		
					$del=mysql_query("delete from menu where m_id='$id' "); 
						if($del){
							print '<div class="alert alert-success">  Well done! You have successfully deleted menu from the website.</div>'; 
						print'<p align="center"><a href="page.php" class="btn btn-primary" type="button">Back To Page Settings</a></p>';

						}  
						
						else{
							echo "data is not deleted.";
						}		
						
				
				
			
 	



    print '</div>';
	

include('footer.php');
?>
