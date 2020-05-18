<?php
include('header.php');

?>


   <?php

   
print'    <div class="span9">';
printheader('Add/Edit/delete a new menu');
 
	print'<p align="right">
<a href="add_page.php" class="btn btn-primary" type="button">Add a New Page</a>

</p>';

if(isset($_GET['show_status']) && isset($_GET['id'])){
$update_query = 'UPDATE `menu` SET `show_menu` = '.$_GET['show_status'].' WHERE `menu`.`m_id` ='.$_GET['id'].';';
if(mysql_query($update_query)){
print '    <div class="alert alert-success">Menu Status updated succesfully    </div>'; 
}else{
print '    <div class="alert alert-error">Menu Status can\'t updated succesfully    </div>'; 
}
}
if(isset($_POST['save_order'])){
reset($_POST['serial']);
$i= 0;
$att =TRUE;
while (list($key, $val) = each($_POST['serial']))
  {
  $query_order_update= 'UPDATE `menu` SET `serial_order` = '.$val.' WHERE `menu`.`m_id` ='.$_POST['m_id'][$i].' ';
  if(mysql_query($query_order_update)){
$att= $att & TRUE;
}else{
$att = $att & FALSE;
}
$i++;
  }
  
  
  
  if($att){
print '    <div class="alert alert-success">Menu order updated succesfully   </div>'; 
}else{
print '    <div class="alert alert-error">Menu order can\'t updated succesfully  </div>'; 
}
}

print '<form class="form-horizontal" method="post" action="page.php" onsubmit="return validate_form(this)">';
print '<button id="save_order" name="save_order" type="submit" value="Save Order" class="btn btn-primary btn-lg">Save Order</button>';
$query1="SELECT `m_id`,`m_link`, `m_header` ,`serial_order`,`show_menu` ,`menu_type` FROM `menu` order by serial_order ";
$result = mysql_query($query1);
print' <table class="table table-striped">';   
print '<tr class="success"> <td>  Order No</td><td> Menu Name</td><td>Edit Action</td><td> Delete Action</td><td> Action</td></tr>';
$row_num =     mysql_num_rows($result);
while($row= mysql_fetch_array($result)){
if($row['show_menu']==1){
$text_type = "Hide";
$text_value=0;
}else{
$text_type = "Show";
$text_value=1;
}
if($row['menu_type']!='static'){
$str = '<a href="edit.php?link='.$row['m_link'].'"> Edit </a>';
$str_delete = '<a href="delete_page.php?page='.$row['m_id'].'">Delete</a>';
}else{
$str= '';
$str_delete='';
}



print '<input type="hidden" name="m_id[]" value="'.$row['m_id'].'" />';
print '<tr> <td> <input class="input-mini" name="serial[]" type="number" min="0" max="'.($row_num+1).'" value="'.$row['serial_order'].'" /></td><td>'.$row['m_header'].'</td><td>    '.$str.'  </td><td> '.$str_delete.'  </td><td> <a href="page.php?show_status='.$text_value.'&id='.$row['m_id'].'" >'.$text_type.'</a>   </td></tr>';    

}	
print '</table>';
print '</form>';

    print '</div>';
	

include('footer.php');
?>
