<?php
session_start();
if(!isset($_SESSION['salesLogged'])){
	header('Location:../index.php');
}
require_once('db-connect.php');
$agentid = $_SESSION['agentid'];
$arr = array();
$sql = "SELECT * FROM customerdetails WHERE agent_id = $agentid ORDER BY c_date DESC";
if($conn->query($sql)){
	$res = $conn->query($sql);
	while($row = $res->fetch_assoc()){
		$row = (object)$row;
		array_push($arr, $row);
	}
	echo json_encode($arr);
}
else{
	echo json_encode("not fetched customer data");
}

?>