<?php
include('header.php');

   
print '    <div class="span9">';

printheader('News');
print'<p align="right">
<a href="add_news.php" class="btn btn-primary" type="button">Add a New News</a>
</p>';
$query1="SELECT * FROM news ";
$result = mysql_query($query1);
print' <table class="table table-striped">';   
print '<tr class="success"> <td>  Serial No</td><td> News Title</td><td>News Dscription</td><td> Action</td></tr>';    
while($row= mysql_fetch_array($result)){
print '<tr> <td>  '.$row['n_id'].' </td><td>'.$row['n_title'].'</td><td>'.substr($row['n_desc'],0,100).'...</td><td><a href="edit_news.php?id='.$row['n_id'].'">Edit</a>  |  <a href="delete_news.php?id='.$row['n_id'].'">Delete</a></td></tr>';    
}	
print '</table>';

print'    </div>';
	

include('footer.php');
?>

