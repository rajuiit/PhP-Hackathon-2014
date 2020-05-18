<?php 
include('connect.php');
?>
<html>
 <head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
 <title>Tracking System</title>
 <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
      #panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }
    </style>

 <style type="text/css">
 body { font: normal 10pt Helvetica, Arial; }
 #map { width: 100%; height: 100%; border: 0px; padding: 0px; }
 </style>
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

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
 $query = mysql_query("SELECT `init_track_id`, `u_id`, `lat`, `long`, `init_time` FROM `h_init_track` ");
 while ($row = mysql_fetch_array($query)){

 $lat=$row['lat'];
 $lon=$row['long'];
 $info='<img src="image/'.$row['u_id'].'.png" width="50" height="50"><br>Last Updated:'.$row['init_time'].'<br><a target="_blank" href="map_details.php?id='.$row['init_track_id'].'" >Track Details</a>';
 echo ("addMarker($lat, $lon,'$info');\n");
 }
 ?>
 center = bounds.getCenter();
 map.fitBounds(bounds);
 
 }
 </script>
 
 <script>
 var geocoder;
 function codeAddress() {
 geocoder = new google.maps.Geocoder();
  var address = document.getElementById('address').value;
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}
 </script>
 </head>
 <body onload="initMap()" style="margin:0px; border:0px; padding:0px;">
 
 
  <div ><form  name="form2" action="index.php" method="post">

<p align="right"><input type="submit"  name="l" value="Back" /></p>

</form></div>
 <div id="panel">
      <input id="address" type="textbox" value="">
      <input type="button" value="Search" onclick="codeAddress()">
    </div>

 <div id="map"></div>
 </html>