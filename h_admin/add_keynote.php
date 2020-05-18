<?php
include('header.php');
check_session_admin();
?>
<script type="text/JavaScript">
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                 
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>

<?php
print'    <div class="span9">';
printheader('Add New keynote Speaker');

 if(isset($_POST['submit'])){
 $query="INSERT INTO `keynote` (`k_id` ,`k_name` ,`k_bio` ,`k_topic`,`k_t_desc`) VALUES ( NULL , '".$_POST['s_name']."', '".$_POST['s_bio']."','".$_POST['s_topic']."','".$_POST['s_desc']."')";
mysql_query($query);
//for image save
save_image("file","../need/keynote/", mysql_insert_id());


print '    <div class="alert alert-success">    Well done! You successfully add keynote speaker to the website. Are you want to another? <a href="add_keynote.php">Yes</a> || <a href="keynote_speaker.php">No</a>    </div>'; 
 }   
	
else{
print'<p align="right"><a href="keynote_speaker.php" class="btn btn-primary" type="button">Back To Keynote Settings</a></p>';
//javascriprt
validate();
print '<script type="text/javascript">
function validate_form(thisform)
{
with (thisform)
{
if (check_required(s_name,"Keynote Speaker Name must be filled out!")==false)
  {s_name.focus();return false;}
  
  if (check_required(s_bio,"Speaker Biography must be filled out!")==false)
  {s_bio.focus();return false;}
  if (check_required(s_topic,"Speaker Topic must be filled out!")==false)
  {s_topic.focus();return false;}
  if (check_required(s_desc,"Topic Description must be filled out!")==false)
  {s_desc.focus();return false;}
  if (check_required(file,"Image must be filled out!")==false)
  {file.focus();return false;}
  }
}
</script>';
//end of javascript
print '	<form  class="form-horizontal" name="form" action="add_keynote.php" method="post" onsubmit="return validate_form(this)" enctype="multipart/form-data">';
	input_text("Speaker Name","s_name");
	input_area("Speaker's biography","s_bio");
    input_text("Speaker's Topic","s_topic");
	input_area("Topic Description","s_desc");
	input_file("Image Upload","file");
	print '<div class="form-actions">
    <button type="submit" name="submit" id="submit" class="btn btn-primary">Save changes</button>
    <button type="button" class="btn">Cancel</button>
    </div>
	
</form>';	
}


    print '</div>';
	

include('footer.php');
?>
