<?php
if(isset($_POST['login-sub'])){
	$name = $_POST['name'];
	$userid = $_POST['user'];
	$pass = $_POST['pass'];
	require_once('../../php/db-connect.php');
	$sql = "INSERT INTO salesagent(agent_name,agent_userid,password) VALUES('$name','$userid','$pass')";
	if($conn->query($sql)){
		echo "<h1 style='color:#555;margin-top:20px;'>Succesfully Generated Sales Agent</h1>
		<script>setTimeout(function(){window.location.href='../dashboard.php'},700)</script>";
	}
	else{
		echo "not submitted";
	}

}
else{
	header('Location:../index.php');
}
?>