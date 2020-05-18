<?php 
include('connect.php');


if(isset($_POST['insert'])){

$insert_query = "INSERT INTO `hack`.`h_user` (`u_id`, `u_name`, `u_dob`, `u_address`, `u_imei`) VALUES (NULL, '".$_POST['u_name']."', '".$_POST['u_dob']."', '".$_POST['u_address']."', '".$_POST['u_imei']."');";
if(mysql_query($insert_query)){
print 'success';
$insert_query ='';

}else{
print 'fail';
}



}else{

print 'Name: <input type="text" id="u_name" name="u_name" /><br>';
print 'DOB: <input type="text" id="u_dob" name="u_dob" /><br>';
print 'Address: <input type="text" id="u_address" name="u_address" /><br>';
print 'imei: <input type="text" id="u_imei" name="u_imei" /><br><br>';



print 'Number 1: <input type="text" id="u_number[]" name="u_number[]" /><br>';
print 'Number 2: <input type="text" id="u_number[]" name="u_number[]" /><br>';


print '<input type="submit" name="insert" value="Insert profile Data" />';


}





?>