<?php
include('header.php');
check_session_admin();
  
print'    <div class="span9">';
printheader('Add a new page');
print'<p align="right"><a href="page.php" class="btn btn-primary" type="button">Back To Page Settings</a></p>';

 if(isset($_POST['submit'])){
$query='INSERT INTO `menu` (`m_id`, `m_link`, `m_header`,`show_menu`,`menu_type`) VALUES (NULL, "'.$_POST['m_link'].'", "'.$_POST['m_name'].'",0,"dynamic")';
if(mysql_query($query)){
print '    <div class="alert alert-success">    Well done! You successfully add new menu to the website. Are you want to add content of new menu <a href="edit.php?link='.$_POST['m_link'].'">Yes</a> || <a href="page.php">No</a>    </div>'; 
}else{
print '    <div class="alert alert-error"> Error Occured: Menu is not added. Contact with administrator </div>'; 
}
}else{


//javascriprt
validate();
print '<script type="text/javascript">
function validate_form(thisform)
{
with (thisform)
{
if (check_required(m_name,"Menu Name must be filled out!")==false)
  {m_name.focus();return false;}
  
  if (check_required(m_link,"Menu Link must be filled out!")==false)
  {m_link.focus();return false;}
}
}
</script>';
//end of javascript
print '	<form  class="form-horizontal" name="form" action="add_page.php" method="post" onsubmit="return validate_form(this)" enctype="multipart/form-data">';
	
	input_text('Menu Name','m_name');
	input_text('Menu Link','m_link');
	
	print '<div class="form-actions">
    <button type="submit" name="submit" id="submit" class="btn btn-primary">Save changes</button>
    <button type="button" class="btn">Cancel</button>
    </div>
	
</form>';	
}


    print '</div>';
	

include('footer.php');
?>
