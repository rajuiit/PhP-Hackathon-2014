<?php
include('header.php');
check_session_admin();


   
print'    <div class="span9">';
printheader('Add New keynote Speaker');

 if(isset($_POST['submit'])){
 $query="INSERT INTO `keynote` (`k_id` ,`k_name` ,`k_bio` ,`k_topic`,`k_t_desc`) VALUES ( NULL , '".$_POST['s_name']."', '".$_POST['s_bio']."','".$_POST['s_topic']."','".$_POST['s_desc']."')";
mysql_query($query);


//for image upload

if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
	$msg = "ERROR: ";
$itemimageload="true";
	
    // echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    // echo "Type: " . $_FILES["file"]["type"] . "<br />";
    // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
	if ($_FILES['file']['size']>250000000){$msg=$msg."Your uploaded file size is more than 250KB so please reduce the file size and then upload.<BR>";
$itemimageload="false";}


    if($itemimageload=="true")
{
	 $newname =  "../need/keynote/" . mysql_insert_id().".jpg";
      copy($_FILES["file"]["tmp_name"],$newname);
	  //move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
      // echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
 }
else
{
    echo $msg;
} 
 }   


//image closed





print '    <div class="alert alert-success">
    Well done! You successfully add keynote speaker to the website. Are you want to another? <a href="keynote_speaker.php">Yes</a> || <a href="index.php">No</a>
    </div>'; 
 }   
	
else{

print '	<form  class="form-horizontal" name="form" action="edit_keynote.php" method="post" enctype="multipart/form-data">';

	$id=$_GET['id'];
	$select=mysql_query("select * from keynote where k_id='$id' "); 
						while($row=mysql_fetch_array($select)){
						
					
						

	input_text("Speaker Name","s_name");
	input_area("Speaker's biography","s_bio");
    input_text("Speaker's Topic","s_topic");
	input_area("Topic Description","s_desc");
	input_file("Image Upload","file");
	}
	print '<div class="form-actions">
    <button type="submit" name="submit" id="submit" class="btn btn-primary">Save changes</button>
    <button type="button" class="btn">Cancel</button>
    </div>
	
</form>';
}	



    print '</div>';
	

include('footer.php');
?>
