<?php
include('header.php');


   
print'    <div class="span9" align="justify">';
printheader('Success');
 
	
print '    <div class="alert alert-success">
    Well done! You successfully update information.
    </div>'; 
	
	print'<p align="center">
<a href="page.php" class="btn btn-primary" type="button">Back To Page Settings</a>

</p>';
  


if (!empty($_POST))
{
	foreach ( $_POST as $key => $value )
	{
		if ( ( !is_string($value) && !is_numeric($value) ) || !is_string($key) )
			continue;

		if ( get_magic_quotes_gpc() )
			$value = htmlspecialchars( stripslashes((string)$value) );
		else
			$value = htmlspecialchars( (string)$value );
?>
	<tr>
			<th style="vertical-align: top"><?php echo htmlspecialchars( (string)$key ); ?></th>
			<td><pre class="samples"><?php echo $value; ?></pre></td>
		</tr>
	<?php
	$dir="../need/";
	$file = fopen($dir.$_POST['filename'].".html","w") or die("Unable to open file");
echo fwrite($file,$value);
fclose($file);
	}
}
?>


<?php


	
    print '</div>';
	

include('footer.php');
?>












