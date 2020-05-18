<?php
ob_start();
include('header.php');
check_session_admin();


   
print'    <div class="span9">';
printheader('Edit News');
if(!isset($_GET['id']) && !isset($_POST['submit'])){
header('Location: news.php');
exit;
}
if(isset($_POST['submit'])){
$query="UPDATE `news` SET `n_title` = '".$_POST['n_title']."', `n_desc` = '".$_POST['n_desc']."' WHERE `news`.`n_id` = ".$_POST['n_id'].";";
if(mysql_query($query)){
print '<div class="alert alert-success">    Well done! You successfully update news to the website. </div>'; 
}else{
print '<div class="alert alert-error">    Failed! Update news is failed.try again. </div>'; 
}
}else{

print '	<form  class="form-horizontal" name="form" action="edit_news.php" method="post" enctype="multipart/form-data">';

$select=mysql_query("select `n_title`, `n_desc` from news where n_id='".$_GET['id']."' "); 
print '<input type="hidden" name="n_id" value="'.$_GET['id'].'" />';
while($row=mysql_fetch_array($select)){
input_text("News Title","n_title",$row['n_title']);
input_area("News Description","n_desc",$row['n_desc'],'input-xxlarge','6');
}
print '<div class="form-actions"><button type="submit" name="submit" id="submit" class="btn btn-primary">Save changes</button><button type="button" class="btn">Cancel</button>    </div>';
print '</form>';
}	



    print '</div>';
	

include('footer.php');
?>
