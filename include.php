<?php

function check_session(){
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
if (!isset($_SESSION['password'])) {
//session_destroy();
header('Location: login.php');
exit;
}

}

}

function check_session_admin(){
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['admin_username'])) {
if (!isset($_SESSION['admin_password'])) {
header('Location: login.php');
exit;
}
}
}


function top_menu($link,$title='Home',$titlelink='index.php'){
 print ' <div class="navbar">
    <div class="navbar-inner">
    <a class="brand" href="'.$titlelink.'">'.$title.'</a>
    <ul class="nav">
    <li class="divider-vertical"></li>
   ';
  reset($link);

while (list($key, $val) = each($link)){
print ' <li ><a href="'.$val.'">'.$key.'</a></li>
	<li class="divider-vertical"></li>
   ';
}
  print ' </ul>
    </div>
    </div>';


}
// hashPassword - returns a hash of $pw, including a salt
function hashPassword($pw, $salt=NULL) {
define('SALT_LENGTH', 10); // password hash salt length
	if ($salt === NULL) {
		$salt = substr(md5(uniqid(rand(),TRUE)), 0, SALT_LENGTH);
	} else {
		$salt = substr($salt,0,SALT_LENGTH);
	}
	return $salt . sha1($salt . $pw);
}


function validate(){

print '<script type="text/javascript">
function check_required(field,alerttxt)
{
with (field)
{
if (value==null||value=="")
  {alert(alerttxt);return false;}
else {return true}
}
}
function check_email(field,alerttxt) {
with (field)
{
    
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(value)) {
    alert(alerttxt);
    return false;}
	else{return true}
	}
 }
  function check_number(field,alerttxt) {
with (field)
{
        if (isNaN(value)) {
                alert(alerttxt);
           return false;}
	else{return true}
	}
}

function check_same_value(field1,field2,alerttxt)
{

if (field1.value!=field2.value)
  {alert(alerttxt);return false;}
else {return true}

}



</script>';

}
//several row 1 column return
function multiple_value($query){
	$value=array();
	$result= mysql_query($query);
	while($row = mysql_fetch_array($result))
  {
  array_push($value,$row[0]);
  }
	//$value=mysql_result($result,0);
	return $value;
	
	}
function myfunction($value,$key) 
{
print '<option value="'.$value.'">'.$value.'</option>';
}

function select_option($arr,$label,$name){
print '<div class="control-group info">
<label class="control-label" for="inputInfo">'.$label.'</label>
<div class="controls">';
print'<select id="'.$name.'" name="'.$name.'" >';
array_walk($arr,"myfunction");
print '</select><span class="help-inline">*</span>
</div>
</div>';
}

function save_image($inputname,$dir,$filename){
//for image upload

if ($_FILES[$inputname]["error"] > 0)
    {
    echo "Return Code: " . $_FILES[$inputname]["error"] . "<br />";
    }
  else
    {
	$msg = "ERROR: ";
$itemimageload="true";
	
    // echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    // echo "Type: " . $_FILES["file"]["type"] . "<br />";
    // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
	if ($_FILES[$inputname]['size']>250000000){$msg=$msg."Your uploaded file size is more than 250KB so please reduce the file size and then upload.<BR>";
$itemimageload="false";}


    if($itemimageload=="true")
{
	 
	 $newname = $dir . $filename .".jpg";
      move_uploaded_file($_FILES[$inputname]["tmp_name"],$newname);
	  //move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
      // echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
 }
else
{
    echo $msg;
} 
 }   


//image closed



}


function save_pdf($inputname,$dir,$filename){
//for image upload

if ($_FILES[$inputname]["error"] > 0)
    {
    //echo "Return Code: " . $_FILES[$inputname]["error"] . "<br />";
	echo "Return Code: No file was uploaded.  try again .<br />";
    }
  else
    {
	$msg = "ERROR: ";
$itemimageload="true";
	
    // echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    // echo "Type: " . $_FILES["file"]["type"] . "<br />";
    // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
	//if ($_FILES[$inputname]['size']>250000000){$msg=$msg."Your uploaded file size is more than 250KB so please reduce the file size and then upload.<BR>";
//$itemimageload="false";}


    if($itemimageload=="true")
{
	 
	 $newname = $dir . $filename .".pdf";
     if( move_uploaded_file($_FILES[$inputname]["tmp_name"],$newname)){
     print '    <div class="alert alert-success">    Well done! You successfully uploaded File.    </div>'; 
     }else{
      print '    <div class="alert alert-error">    File cant be uploaded. Try again.   </div>'; 
     }
	  //move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
      // echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
 }
else
{
    echo $msg;
} 
 }   


//image closed



}

function table_menu($link){
 print '  <table class="table table-bordered">   <tr>';
  reset($link);
while (list($key, $val) = each($link)){
print ' <td><a href="'.$val.'">'.$key.'</a></td> ';
}
print ' </tr>    </table>';
}


function printfooter(){
print '</div>';
include('footer.php');
}
/*
    <input class="input-mini" type="text" placeholder=".input-mini">
    <input class="input-small" type="text" placeholder=".input-small">
    <input class="input-medium" type="text" placeholder=".input-medium">
    <input class="input-large" type="text" placeholder=".input-large">
    <input class="input-xlarge" type="text" placeholder=".input-xlarge">
    <input class="input-xxlarge" type="text" placeholder=".input-xxlarge">

*/
function input_text($label,$name,$value='',$class='input-xxlarge'){
print '<div class="control-group">
<label class="control-label" for="inputInfo">'.$label.'</label>
<div class="controls">
<input class="'.$class.'" type="text" id="'.$name.'" name="'.$name.'"  value="'.$value.'">
<span class="help-inline">*</span>
</div>
</div>';

}

function set_input_text($title,$message){
print '<div class="control-group info">
<label >
<p><b>'.$title.' : </b>'.$message.'</p>
</label>
</div>';

}

function set_input_text2($title,$message){
print '<div class="control-group info">
    <dl class="dl-horizontal">
    <dt>'.$title.':</dt>
    <dd>'.$message.'</dd>
    </dl>
</div>';

}
function input_message($message,$class='text-success'){
print '<p class="'.$class.'">'.$message.'</p>';

}
//fieldname array
function create_table($query,$fieldname){


   print' <table class="table table-striped">';
   
   print'<tr>';
	for($i=0;$i<sizeof($fieldname);$i++){
	print'<td><b>'.$fieldname[$i].'</b></td>';
	}
	print'</tr>';
	
	
	$result = mysql_query($query);
	while($row= mysql_fetch_array($result)){
	
	print ' <tr>';
	
	for($i=0;$i<sizeof($row);$i++){
	print'<td>'.$row[$i].'</td>';
	}
	
	print' </tr>';
	
	}
	
    print'</table>';


}


function input_radio($label,$name,$query){
//in query you must select 2 column first for value and 2nd for show message
print '<div class="control-group info">
<label class="control-label" for="inputInfo">'.$label.'</label>
<div class="controls">';

$result = mysql_query($query);
	while($row= mysql_fetch_array($result)){
print '

<label class="radio">
<input type="radio" name="'.$name.'" id="'.$name.'" value="'.$row[0].'" >
'.$row[1].'
</label>';

}
print '

</div>
</div>';
print '';

}
function input_radio_arr($label,$name,$arr){
//in query you must select 2 column first for value and 2nd for show message
print '<div class="control-group info">
<label class="control-label" for="inputInfo">'.$label.'</label>
<div class="controls">';
reset($arr);

while (list($key, $val) = each($arr)){
print '

<label class="radio"><input type="radio" name="'.$name.'" id="'.$name.'" value="'.$val.'" >'.$val.'</label>';

}
print '

</div>
</div>';
print '';

}
//need 2 column in query 1st for value 2nd for show
function input_dropdown_query_admin($label,$name,$query,$class='',$value=''){
//in query you must select 2 column first for value and 2nd for show message
print '<div class="control-group info">
<label class="control-label" for="inputInfo">'.$label.'</label>
<div class="controls">';
print '<select name='.$name.' class="'.$class.'"> ';
$result = mysql_query($query);
while($row= mysql_fetch_array($result)){
if($value==$row[1]){
print '<option value="'.$row[0].'" selected="selected" >'.$row[1].'</option>';
}else{
print '<option value="'.$row[0].'">'.$row[1].'</option>';
}
}
print'</select>';
print '</div></div>';
}

function input_dropdown_query($label,$name,$query,$size,$value=''){
//in query you must select 2 column first for value and 2nd for show message
print '<div class="control-group info">
<label class="control-label" for="inputInfo">'.$label.'</label>
<div class="controls">';
print '<select  name="'.$name.'" size = "'.$size.'" >';
$result = mysql_query($query);
	while($row= mysql_fetch_array($result)){
	if($value==$row[1]){
print '<option value="'.$row[0].'" selected="selected">'.$row[1].'</option>';
}else{
print '<option value="'.$row[0].'">'.$row[1].'</option>';
}
}
print '</select>';
print '</div></div>';

}

function input_dropdown($label,$name,$arr,$class='',$value=''){
//in query you must select 2 column first for value and 2nd for show message
print '<div class="control-group info"><label class="control-label" for="inputInfo">'.$label.'</label>
<div class="controls">';
print '<select name='.$name.' class="'.$class.'"> ';
reset($arr);
while (list($key, $val) = each($arr)){
if($value==$val){
print '<option value="'.$val.'" selected="selected" >'.$val.'</option>';
}else{
print '<option value="'.$val.'">'.$val.'</option>';
}
}
print'</select>';
print '</div></div>';
}

/*
    <input class="input-mini" type="text" placeholder=".input-mini">
    <input class="input-small" type="text" placeholder=".input-small">
    <input class="input-medium" type="text" placeholder=".input-medium">
    <input class="input-large" type="text" placeholder=".input-large">
    <input class="input-xlarge" type="text" placeholder=".input-xlarge">
    <input class="input-xxlarge" type="text" placeholder=".input-xxlarge">

*/
function input_area($label,$name,$value='',$class='input-large',$rows='3'){
print '
<div class="control-group info">
<label class="control-label" for="inputInfo">'.$label.'</label>
<div class="controls">
<textarea rows="'.$rows.'" class ="'.$class.'" id="'.$name.'" name="'.$name.'">'.$value.'</textarea>
<span class="help-inline"></span>
</div>
</div>';

}
function input_date($label,$name){
print'
<div class="control-group info">
<label class="control-label" for="inputInfo">'.$label.'</label>
<div class="controls">
<div class="input-append date form_datetime">
<input  type="text" id="'.$name.'" name="'.$name.'" value="" readonly>
<span class="add-on"><i class="icon-th"></i></span>
</div>
</div>
</div>';
}
function input_jpg($label,$name){
print '
<div class="control-group info">
<label class="control-label" for="inputInfo">'.$label.'</label>
<div class="controls">
<img src="../image/twitter.jpg" name="blah" width="150" height="150" id = "blah"/>
<input type="file" id="'.$name.'" name="'.$name.'" onchange="readURL(this)"><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<span class="help-inline">Upload image in JPEG format</span>
</div>
</div>';

}function input_file($label,$name,$message,$accept='image/jpg'){
print '
<div class="control-group info">
<label class="control-label" for="inputInfo">'.$label.'</label>
<div class="controls">

<input type="file" id="'.$name.'" name="'.$name.'" accept="'.$accept.'"><br>
<span class="help-inline">"'.$message.'"</span>
</div>
</div>';

}
function input_simple_file($label,$name){
print '
<div class="control-group info">
<label class="control-label" for="inputInfo">'.$label.'</label>
<div class="controls">
<input type="file" id="'.$name.'" name="'.$name.'" onchange="readURL(this)"><br>
<span class="help-inline">Upload image in PDF format</span>
</div>
</div>';

}


	function printheader($value){
	print '<div class="page-header"> <h3>'.$value.'</h3>    </div>';
	}
	
	function printheaderh5($value){
	print '<div class="page-header"> <h5> 	<span class="label label-info">'.$value.'</span></h5>    </div>';
	}

	//for important date page
	function value_return($query){
	
	$result= mysql_query($query);
	$value=mysql_result($result,0);
	return $value;
	
	}
	//used in Important date.php
	function cross($value,$key,$last){
	if($value!=$last)
	print '<span style="color:#ff0000;"><del>'.$value.'</del> </span>| ';
	else
	print $value;
	}
	function loop($heading,$arr){
	print '<li>'.$heading;
	array_walk(explode('|',$arr),"cross",end(explode('|',$arr)));
	print '</li>';
	
	}
	function imp_date(){
	
	$query ="SELECT s_name, s_value FROM settings where s_variable in ('submission_deadline','acceptance_notification','registration','camera_ready') order by order_no";
	$result= mysql_query($query);
	print '<ul class="unstyled">';
	while($row= mysql_fetch_array($result)){
	loop('<b>'.$row['s_name'].': </b>',$row['s_value']);
	
	}
	print '</ul>';
	
	}	
	//end of important date
	
	
//news function
function show_news($start,$end){
print '<p class="text-right"><a href="all_news.php">All News</a></p>';
$query1="SELECT * FROM news ORDER BY `news`.`date_time` DESC limit ".$start.", ".$end."";
$result = mysql_query($query1);
while($row= mysql_fetch_array($result)){
print '<blockquote><p>'.$row['n_title'].'</p><small>'.substr($row['n_desc'],0,100).'... <a href="detail_news.php?news_id='.$row['n_id'].'">Details</a></small>  </blockquote>';
//print '<p class="text-info">'.$row['n_title'].'</p>';
//substr("Hello world!",6,5)
}
//print '    <div class="pagination">    <ul>    <li class="disabled"><a href="#">&laquo;</a></li>    <li class="active"><a href="#">1</a></li>    ...    </ul>    </div>'
}
//end of news function
	
	
	//Decode Function
	function strip_html_tags( $text )
{
    $text = preg_replace(
        array(
          // Remove invisible content
            '@<head[^>]*?>.*?</head>@siu',
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu',
            '@<object[^>]*?.*?</object>@siu',
            '@<embed[^>]*?.*?</embed>@siu',
            '@<applet[^>]*?.*?</applet>@siu',
            '@<noframes[^>]*?.*?</noframes>@siu',
            '@<noscript[^>]*?.*?</noscript>@siu',
            '@<noembed[^>]*?.*?</noembed>@siu',
          // Add line breaks before and after blocks
            '@</?((address)|(blockquote)|(center)|(del))@iu',
            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
            '@</?((table)|(th)|(td)|(caption))@iu',
            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
            '@</?((frameset)|(frame)|(iframe))@iu',
        ),
        array(
            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
            "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
            "\n\$0", "\n\$0",
        ),
        $text );
    return strip_tags( $text );
}
//end of decode function


function show_html($filename,$dir="../need/"){

if(file_exists($dir.$filename) == FALSE){
$file = fopen($dir.$filename,"w") or die("Unable to open file");
echo fwrite($file,NULL);
fclose($file);
}

/* Read an HTML file */
$raw_text = file_get_contents( $dir.$filename);
 
/* Get the file's character encoding from a <meta> tag */
preg_match( '@<meta\s+http-equiv="Content-Type"\s+content="([\w/]+)(;\s+charset=([^\s"]+))?@i',$raw_Text, $matches );
$encoding = $matches[3];
 
/* Convert to UTF-8 before doing anything else */
$utf8_text = iconv( $encoding, "utf-8", $raw_text );
 
/* Strip HTML tags and invisible text */
$utf8_text = strip_html_tags( $utf8_text );

 
/* Decode HTML entities */
$utf8_text = html_entity_decode( $utf8_text, ENT_QUOTES, "UTF-8" ); 
echo $utf8_text;

}


//6 parrameter
function send_email($from,$to,$subject,$message,$successMessage,$errorMessage){
	 $headers = "From: iCEEiCT 2015<".$from.">\r\n";
	$headers .= "Reply-To: ".$from."\r\n";
	$headers .= "Return-Path: ".$from."\r\n";
	$headers .= "Content-type: text/html\r\n"; 

	if (mail($to,$subject,$message,$headers) ) {
       print'   <div class="alert alert-success">'.$successMessage.'</div>';
   }
   else
   {
      print'   <div class="alert alert-error">'.$errorMessage.'</div>';
   }

}



function email_chair($name_value='',$email_value='',$message_value=''){
	  //javascriprt
validate();
print '<script type="text/javascript">
function validate_form(thisform)
{
with (thisform)
{
if (check_required(name,"Name must be filled out!")==false)
  {name.focus();return false;}
  
  if (check_required(email,"Email must be filled out!")==false)
  {email.focus();return false;}
  
  if (check_email(email,"Email is not in correct format!")==false)
  {email.focus();return false;}
  
  if (check_required(message,"Speaker Topic must be filled out!")==false)
  {message.focus();return false;}
  
  }
}
</script>';
//end of javascript

if(isset($_POST['send'])){
  require_once('recaptchalib.php');
  $privatekey = "6Lf96ewSAAAAALOMFxFRcDabgnbb5LtL9uQGnKh1";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
	    print '<div class="alert alert-success">   The reCAPTCHA wasnt entered correctly. try it again.    </div>';
    //die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." . "(reCAPTCHA said: " . $resp->error . ")");
  } else {
 

$to = "info@iceeict.org";
$subject = "Email From User: ".$_POST['name'];
$txt = $_POST['message'];
$headers = "From: ".$_POST['email'] . "\r\n";

if(mail($to,$subject,$txt,$headers)){
 print' <div class="alert alert-success">    Message sent successfully.    </div>';
}else{
print' <div class="alert alert-success">    Message is not sent. Internet connection may be not found.    </div>';
}
}
  
  }


print '<form  method="post" action="'.$_SERVER['PHP_SELF'].'" onsubmit="return validate_form(this)">';
input_text('Name','name',$name_value,'input-xxlarge');
input_text('Email','email',$email_value,'input-xxlarge');
input_area('Message','message',$message_value,'input-xxlarge');



          require_once('recaptchalib.php');
          $publickey = "6Lf96ewSAAAAADzXPZdc50Rpy2CZTfZbxUZkdqnq"; // you got this from the signup page
          echo recaptcha_get_html($publickey);
		 // set_input_text2('Captcha',recaptcha_get_html($publickey));
          
        print '  <button name="send" type="submit"  class="btn btn-primary btn-lg">Send</button>';
        
					print ' </form>';
}



function input_password($label,$name,$value='',$class='input-xxlarge'){
print '<div class="control-group">
<label class="control-label" for="inputInfo">'.$label.'</label>
<div class="controls">
<input class="'.$class.'" type="password" id="'.$name.'" name="'.$name.'"  value="'.$value.'">
<span class="help-inline">*</span>
</div>
</div>';

}


function input_dropdown_perfect($label,$name,$arr,$class='',$value=''){
//in query you must select 2 column first for value and 2nd for show message
print '<div class="control-group info"><label class="control-label" for="inputInfo">'.$label.'</label>
<div class="controls">';
print '<select name='.$name.' class="'.$class.'"> ';
reset($arr);
while (list($key, $val) = each($arr)){
if($value==$val){
print '<option value="'.$key.'" selected="selected" >'.$val.'</option>';
}else{
print '<option value="'.$key.'">'.$val.'</option>';
}
}
print'</select>';
print '</div></div>';
}

//1 row several column return
function multiple_value_1row($query){
	$value=array();
	$result= mysql_query($query);
	while($row = mysql_fetch_array($result))
  {
	$i=0;
	for($i=0;$i<mysql_num_fields($result);$i++)
	array_push($value,$row[$i]);
  
  }
	//$value=mysql_result($result,0);
	return $value;
	
	}

?>