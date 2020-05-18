<?php
include('connect.php');
include('include.php');
include("phpgraphlib.php");
include("phpgraphlib_pie.php");
$query = "SELECT `c_area`,count(*) FROM `h_complain`GROUP BY `c_area`";
$graph=new PHPGraphLibPie(700,200);
$data = array("Dhaka"=>99, "Chittagong"=>98, "Sylhet"=>70, "Rajshahi"=>90);

//$data=array();
$result =mysql_query($query);
while($row= mysql_fetch_array($result)){

//array_push($data,$row[0]=>$row[1]);
}
//echo $data;

$graph->addData($data);
$graph->setTitle("Department of Police");
$graph->setLabelTextColor("blue");
$graph->createGraph();
?>