<?php
include('header.php');

   
print '    <div class="span9">';

printheader('Sponsors');
print'<p align="right">
<a href="add_sponsors.php" class="btn btn-primary" type="button">Add a New Sponsors</a>
</p>';
$query1="SELECT * FROM sponsors";
$result = mysql_query($query1);
print' <table class="table table-striped">';   
print '<tr class="success"> <td>  Serial No</td><td> Menu Name</td><td> Action</td></tr>';    
while($row= mysql_fetch_array($result)){
print '<tr> <td>  '.$row['sp_id'].' </td><td>'.$row['sp_name'].'</td><td><a href="delete_sponsors.php?page='.$row['sp_id'].'">Delete</a></td></tr>';    
}	
print '</table>';


print'    </div>';
	

include('footer.php');
?>

