<?php
if(!isset($_GET['myFormData'])){
	header('Location:../index.php');
}
 require_once('../../php/db-connect.php');
 echo $_GET['myFormData'];
 $formData = json_decode($_GET['myFormData']);
  $sql = "SELECT * FROM admin WHERE username='$formData->userid' AND password='$formData->password'";
  if($conn->query($sql)){
  	$res = $conn->query($sql);
  	if($res->num_rows>0){
  		session_start();
	  	$_SESSION['adminLogged'] = 1;
	  	$row = $res->fetch_assoc();
	  	$_SESSION['user'] = $row['username'];
	  	// $row = (object)$row;
	  	// echo json_encode($row);
	  	echo json_encode("succesfully Logged In");
  	}
  	else{
  		echo "";
  	}
  }
  else{
  	echo json_encode('not working');
  }
?>
