<?php
include('header.php');
check_session_admin();
   
print '    <div class="span9">';
printheader('Edit A page');
print'<p align="right">
<a href="page.php" class="btn btn-primary" type="button">Back To Page Settings</a>

</p>';
print '<script src="../ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="sample.css">';
print 'File Name : '.$_GET['link'];	
	print '<form action="posteddata.php" method="post">';
print '<input type="hidden" name="filename" value="'.$_GET['link'].'" />';
print '<p>
			<label for="editor1">
			</label>
			<textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10" >';
			show_html($_GET['link'].".html");
print'			</textarea>
		</p>
		<p>
			<input type="submit" value="Submit">
		</p>';

print '</form>';
//include('editor.php');
print'    </div>';
	

include('footer.php');
?>

