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
printheader('Add/Change Call For Paper');

 if(isset($_POST['submit'])){

//for poster
save_image("poster","../need/","poster");
//for flyer
save_image("flyer","../need/","flyer");




print '    <div class="alert alert-success">
    Well done! You successfully add sponsors to the website. Are you want to another? <a href="call_paper.php">Yes</a> || <a href="index.php">No</a>
    </div>'; 
 }   
	
else{
print '	<form  class="form-horizontal" name="form" action="call_paper.php" method="post" enctype="multipart/form-data">';
	$a=array("Poster","Flyer");
	select_option($a,"Select type of image to upload","name");
	input_jpg("Image Upload","file");
    
	
	print '<div class="form-actions">
    <button type="submit" name="submit" id="submit" class="btn btn-primary">Save changes</button>
    <button type="button" class="btn">Cancel</button>
    </div>
	
</form>';	
}


    print '</div>';
	

include('footer.php');
?>
