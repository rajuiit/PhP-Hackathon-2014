
<?php 
include('../connect.php');
ob_start();
// Inialize session
session_start();
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['admin_username']) && !isset($_SESSION['admin_password'])) {
header('Location: login.php');
exit;

}

?>

<html>
 <head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
 <title>Tracking System</title>
 <style type="text/css">
 body { font: normal 10pt Helvetica, Arial; }
 #map { width: 100%; height: 100%; border: 0px; padding: 0px; }
 </style>
 <script src="http://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript"></script>
 <script type="text/javascript">
 //Sample code written by August Li
 var icon = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/micons/blue.png",
 new google.maps.Size(32, 32), new google.maps.Point(0, 0),
 new google.maps.Point(16, 32));
 var center = null;
 var map = null;
 var currentPopup;
 var bounds = new google.maps.LatLngBounds();
 function addMarker(lat, lng, info) {
 var pt = new google.maps.LatLng(lat, lng);
 bounds.extend(pt);
 var marker = new google.maps.Marker({
 position: pt,
 icon: icon,
 map: map
 });
 var popup = new google.maps.InfoWindow({
 content: info,
 maxWidth: 300
 });
 google.maps.event.addListener(marker, "click", function() {
 if (currentPopup != null) {
 currentPopup.close();
 currentPopup = null;
 }
 popup.open(map, marker);
 currentPopup = popup;
 });
 google.maps.event.addListener(popup, "closeclick", function() {
 map.panTo(center);
 currentPopup = null;
 });
 }
 function initMap() {
 map = new google.maps.Map(document.getElementById("map"), {
 center: new google.maps.LatLng(0, 0),
 zoom: 14,
 mapTypeId: google.maps.MapTypeId.ROADMAP,
 mapTypeControl: false,
 mapTypeControlOptions: {
 style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
 },
 navigationControl: true,
 navigationControlOptions: {
 style: google.maps.NavigationControlStyle.SMALL
 }
 });
 <?
 $query = mysql_query("SELECT `movement_id`, `u_id`, `lat`, `long`, `move_time` FROM `h_movement_track` WHERE `u_id`=".$_GET['id']);
 while ($row = mysql_fetch_array($query)){

 $lat=$row['lat'];
 $lon=$row['long'];
 $info='Last Updated:'.$row['move_time'];
 echo ("addMarker($lat, $lon,'$info');\n");
 }
 ?>
 center = bounds.getCenter();
 map.fitBounds(bounds);
 
 }
 </script>
 </head>
 <body onload="initMap()" style="margin:0px; border:0px; padding:0px;">
 <div> <table border="1" width="100%" align="center"><tr>
 <?php
 $query = mysql_query("SELECT `u_id`, `u_name`, `u_dob`, `u_address`, `u_imei` FROM `h_user` where `u_id`=".$_GET['id']);
 while ($row = mysql_fetch_array($query)){
 print'<td width="33%"><b>Basic Information<br></b>Name: '.$row['u_name'].'<br>Date of Birth: '.$row['u_dob'].'<br> Address: '.$row['u_address'].'<br> IMEI Number: '.$row['u_imei'].'<br></td>';
 } 
 ?>
 
  <?php
 $query = mysql_query("SELECT `h_contact_id`, `u_id`, `number`, `relation` FROM `h_contacts` WHERE `u_id`=".$_GET['id']);
 print'<td width="33%" ><b>Contact Information</b><br>';
 while ($row = mysql_fetch_array($query)){
 print'Number : '.$row['number'].' & Relation: '.$row['relation'].'<br>';
 } 
 print'</td>';
 ?>
 
 <td width="34%"> <img src="image/1.png" width="100" height="100"></td>
 </tr></table>
 </div>
 <div id="map"></div>
 </html>