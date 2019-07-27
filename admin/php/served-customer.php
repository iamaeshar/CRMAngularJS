<?php
session_start();
if(!isset($_GET['agid'])||!isset($_SESSION['adminLogged'])){
	header('Location:../index.php');
}
$id = $_GET['agid'];
$sql = "SELECT * FROM customerdetails WHERE agent_id = $id ";
require_once('../../php/db-connect.php');
if($conn->query($sql)){
	$res = $conn->query($sql);
	$arr = array();
	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			$row = (object)$row;
			array_push($arr, $row);
		}
		echo json_encode($arr);
	}
	else{
		echo "";
	}
}
else{
	echo json_encode("served customer query error");
}
?>