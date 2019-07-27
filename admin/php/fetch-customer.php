<?php
session_start();
  if(!isset($_SESSION['adminLogged'])){
  	header('Location:../index.php');
  }
require_once('../../php/db-connect.php');
$sql = "SELECT * FROM customerdetails ORDER BY c_date DESC";
if($conn->query($sql)){
	$res = $conn->query($sql);
	$arr = array();
	if($res->num_rows>0){
		while($row=$res->fetch_assoc()){
			$row = (object)$row;
			array_push($arr,$row);
		}
		echo json_encode($arr);
	}
	else{
		echo "";
	}
}
else{
	echo json_encode("fetch customer query not work");
}
?>