<?php
  if(!isset($_GET['data'])){
  	header('Location:../index.php');
  }
  $formData = json_decode($_GET['data']);
  require_once('db-connect.php');
  $sql = "SELECT * FROM salesagent WHERE agent_userid='$formData->userid' AND password='$formData->password'";
  if($conn->query($sql)){
  	$res = $conn->query($sql);
  	if($res->num_rows>0){
  		session_start();
	  	$_SESSION['salesLogged'] = 1;
	  	$row = $res->fetch_assoc();
	  	$_SESSION['agentid'] = $row['agent_id'];
	  	$_SESSION['agentName'] = $row['agent_name'];
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
