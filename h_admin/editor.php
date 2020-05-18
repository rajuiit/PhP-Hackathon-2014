<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="../ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="sample.css">
</head>
<body>
	<form action="posteddata.php" method="post">
<?php

print'	Select Your Page: <p><select name="filename" id="filename">';
		$query="SELECT `m_id`, `m_link`, `m_header`, `serial_order`, `show_menu`, `menu_type` FROM `menu` where `menu_type`!='static'";
	$result= mysql_query($query);
	    
	while($row = mysql_fetch_array($result)){
print '<option value="'.$row['m_link'].'">'.$row['m_header'].'</option>';

}
print '</select></p>';
 ?>


		<p>
			<label for="editor1">
			</label>
			<textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10">
			</textarea>
		</p>
		<p>
			<input type="submit" value="Submit">
		</p>
	</form>
</body>
</html>
