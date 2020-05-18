<?php
include('header.php');

   
print '    <div class="span9">';

printheader('Complain');

$query1="SELECT `c_id`, `c_subject`, `c_description`, `u_id`, `c_area`, `c_type`, `c_time` FROM `h_complain` WHERE 1 ";
$result = mysql_query($query1);
print' <table class="table table-striped">';   
print '<tr class="success"> <td>  Serial No</td><td> Complain Subject</td><td>C Dscription</td><td> Action</td></tr>';    
while($row= mysql_fetch_array($result)){
print '<tr> <td>  '.$row['c_id'].' </td><td>'.$row['c_subject'].'</td><td>'.substr($row['c_description'],0,100).'...</td><td><a href="view_complain.php?id='.$row['c_id'].'">View</a>  </td></tr>';    
}	
print '</table>';

print'    </div>';
	

include('footer.php');
?>

