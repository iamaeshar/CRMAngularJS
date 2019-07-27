<?php
 if(isset($_POST['record-sub'])){
 	session_start();
 	require_once('db-connect.php');
 	$agentid = $_SESSION['agentid'];
 	$fName = $_POST['fname'];
 	$lName = $_POST['lname'];
 	$email = $_POST['email'];
 	$mobile = $_POST['mobno'];
 	$alterNo = $_POST['amobno'];
 	$customerId = $_POST['cust'];
 	$planvalue = $_POST['planval'];
 	$cardtype = $_POST['cardtype'];
 	$cardno = $_POST['cardno'];
 	$merchant =$_POST['merchant'];
 	$desc =  $conn->real_escape_string($_POST['desc']);
 	$sql = "INSERT INTO customerdetails(fname,lname,email,mobileno,alt_mobile,customer_id,plan_validity,card_type,cardno,merchant,description,c_date,c_time,agent_id) VALUES('$fName','$lName','$email','$mobile','$alterNo','$customerId','$planvalue','$cardtype',$cardno,'$merchant','$desc',NOW(),NOW(),$agentid)";
 	$sql2 = "UPDATE salesagent SET noofcustomer=noofcustomer+1 WHERE agent_id=$agentid";
 	if($conn->query($sql)){
 		if($conn->query($sql2)){
 			
 		}
 		else{
 			echo "not working".$conn->error;
 		}
 		echo "<h1 align='center' style='color:#555'>Succesfully Add Customer</h1>
 		<script>setTimeout(function(){window.location.href='../agent.php'},700);</script>
 		";
 	}
 	else{
 		echo $sql."error".$conn->error;
 	}
 }
 else{
 	header('Location:../index.php');
 }
?>