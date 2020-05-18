<?php
ob_start();
include('header.php');
check_session_admin();


   
print'    <div class="span9">';
printheader('View Complain');
if(!isset($_GET['id']) && !isset($_POST['submit'])){
header('Location: complain.php');
exit;
}


print '	<form  class="form-horizontal" name="form" action="edit_news.php" method="post" enctype="multipart/form-data">';

$select=mysql_query("SELECT hc.`c_id`, hc.`c_subject`, hc.`c_description`, hu.`u_name`,hu.`u_address`, hc.`c_area`, hc.`c_type`, hc.`c_time` FROM `h_complain` as hc,`h_user` as hu WHERE hc.u_id=hu.u_id and hc.c_id='".$_GET['id']."' "); 
while($row=mysql_fetch_array($select)){
set_input_text("Complainer name",$row['u_name']);
set_input_text("Complainer Address",$row['u_address']);
set_input_text("Complain Subject",$row['c_subject']);
set_input_text("Complain Description",$row['c_description']);
}

print '</form>';




    print '</div>';
	

include('footer.php');
?>
