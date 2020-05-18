<?php
include('header.php');
?>


<?php
   
print'    <div class="span6">';
printheader('Website Settings');

 if(isset($_POST['submit'])){
 
 $query1="SELECT s_value FROM settings where s_variable='submission_deadline'";
	$query2="SELECT s_value FROM settings where s_variable='acceptance_notification'";
	$query3="SELECT s_value FROM settings where s_variable='registration'";
	$query4="SELECT s_value FROM settings where s_variable='camera_ready'";
	$sd = value_return($query1);
	$an = value_return($query2);
	$r = value_return($query3);
	$cr = value_return($query4);
	$i=0;
if($_POST['con_date']!=""){
$query="UPDATE `settings` SET `s_value` = '".$_POST['con_date']."' WHERE `settings`.`s_variable` = 'date-time'";
 //$query="UPDATE `settings` SET `s_value` = '".$_POST['con_date']."' WHERE `settings`.`s_variable` = 'date_time' ";
mysql_query($query);
$i++;} 
 if($_POST['sd']!=""){
 $query="UPDATE `settings` SET `s_value` = '".$sd." | ".$_POST['sd']."' WHERE `settings`.`s_variable` = 'submission_deadline' ";
mysql_query($query);
$i++;}
if($_POST['an']!=""){
 $query="UPDATE `settings` SET `s_value` = '".$an." | ".$_POST['an']."' WHERE `settings`.`s_variable` = 'acceptance_notification' ";
mysql_query($query);
$i++;}
if($_POST['rstart']!="" && $_POST['rend']!=""){
$update_string=$_POST['rstart']." - ".$_POST['rend'];
 $query="UPDATE `settings` SET `s_value` = '".$r." | ".$update_string."' WHERE `settings`.`s_variable` = 'registration' ";
mysql_query($query);
$i++;}
if($_POST['crstart']!="" && $_POST['crend']!=""){
$update_string=$_POST['crstart']." - ".$_POST['crend'];
 $query="UPDATE `settings` SET `s_value` = '".$cr." | ".$update_string."' WHERE `settings`.`s_variable` = 'camera_ready' ";
mysql_query($query);
$i++;}

if($_POST['venue']!="" && $_POST['venue_website']!=""){
$update_string='<a href="'.$_POST['venue_website'].'">'.$_POST['venue'].'</a>';
 $query="UPDATE `settings` SET `s_value` = '".$update_string."' WHERE `settings`.`s_variable` = 'venue' ";
mysql_query($query);
$i++;}

print '    <div class="alert alert-success">
    Well done! You have successfully update '.$i.' Feature to the website. Are you want to go to ? <a href="index.php">Home Page</a> || <a href="settings.php">Website Settings</a>
    </div>'; 
 }   
	
else{



print '	<form  class="form-horizontal" name="form" action="settings.php" method="post">';

    	input_text("Conference Date Time","con_date",'','input-large');
	
	input_date("Submission Deadline","sd");
	input_date("Acceptance Notification","an");
	input_date("Registration start Date","rstart");
	input_date("Registration End Date","rend");
	input_date("Camera Ready Submission Start Date","crstart");
	input_date("Camera Ready Submission End Date","crend");
	input_text("Venue","venue",'','input-large');
	input_text("Venue Website Link","venue_website",'','input-large');
	
	
	
	
	print '<div class="form-actions">
    <button type="submit" name="submit" id="submit" class="btn btn-primary">Update</button>
    <button type="button" class="btn">Cancel</button>
    </div>
	
</form>';	
}
   print '</div>';
      
print'    <div class="span3">';
printheader('Important Dates');
imp_date();
print '</div>';
?>

 
	<script type="text/javascript" src="../js/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
 
 <script type="text/javascript">
$(".form_datetime").datetimepicker({
format: "MM dd, yyyy",
autoclose: true,
todayBtn: true,
pickerPosition: "bottom-left"
});
</script>

<?php
include('footer.php');
?>
