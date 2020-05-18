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
printheader('Add New Sponsors');

 if(isset($_POST['submit'])){
 $query="INSERT INTO `sponsors` (`sp_id` ,`sp_name` ,`sp_desc`) VALUES ( NULL , '".$_POST['sp_name']."', '".$_POST['sp_desc']."')";
mysql_query($query);


//for image save
save_image("file","../need/sponsor/", mysql_insert_id());



print '    <div class="alert alert-success">
    Well done! You successfully add sponsors to the website. Are you want to another? <a href="add_sponsors.php">Yes</a> || <a href="index.php">No</a>
    </div>'; 
 }   
	
else{
print'<p align="right">
<a href="sponsors.php" class="btn btn-primary" type="button">Back To Sponsors Settings</a>

</p>';
print '	<form  class="form-horizontal" name="form" action="add_sponsors.php" method="post" enctype="multipart/form-data">';
	input_text("Sponsors Name","sp_name");
	input_area("Sponsors Description","sp_desc");
    
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
