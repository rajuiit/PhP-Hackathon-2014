<?php
include('header.php');
check_session_admin();
   
print '    <div class="span9" align="justify">';

printheader('Keynote Speaker');
print'<p align="right">
<a href="add_keynote.php" class="btn btn-primary" type="button">Add a New Keynote Speaker</a>
</p>';
$query1="SELECT * FROM keynote ";
$result = mysql_query($query1);
print' <table class="table table-striped">';   
print '<tr class="success"> <td>  Serial No</td><td> Menu Name</td><td>Biography</td><td> Action</td></tr>';  
 
while($row= mysql_fetch_array($result)){
print '<tr> <td>  '.$row['k_id'].' </td><td>'.$row['k_name'].'</td><td>'.$row['k_bio'].'</td><td><a href="delete_keynote.php?id='.$row['k_id'].'">Delete</a></td></tr>';  
  
}	
print '</table>';

print'    </div>';
	

include('footer.php');
?>

