<?php
include('header.php');
check_session_admin();


   
print'    <div class="span9">';
printheader('Add a News');

 if(isset($_POST['submit'])){
 $query="INSERT INTO `news` (`n_id` ,`n_title` ,`n_desc` ,`date_time`) VALUES ( NULL , '".$_POST['n_title']."', '".$_POST['n_desc']."',CURRENT_TIMESTAMP)";
mysql_query($query);
print '    <div class="alert alert-success">
    Well done! You successfully add this important News to the website. Are you want to another? <a href="add_news.php">Yes</a> || <a href="index.php">No</a>
    </div>'; 
 }   
	
else{
print'<p align="right">
<a href="news.php" class="btn btn-primary" type="button">Back To News Settings</a>

</p>';
print '	<form  class="form-horizontal" name="form" action="add_news.php" method="post">';
	input_text("News Title","n_title");
	input_area("News Description","n_desc",'','input-xxlarge');
	print '<div class="form-actions">
    <button type="submit" name="submit" id="submit" class="btn btn-primary">Save changes</button>
    <button type="button" class="btn">Cancel</button>
    </div>
	
</form>';	
}


    print '</div>';
	

include('footer.php');
?>
