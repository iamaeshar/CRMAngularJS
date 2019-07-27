	<?php
	session_start();
	if(!isset($_SESSION['adminLogged'])){
		header('Location:index.php');
	}
	 include 'include/head.php'; ?>
	<script src="js/guserjs.js"></script>
	<link rel="stylesheet" type="text/css" href="css/media.css">
	<title>WAMP CRM</title>
</head>
<body>
	<section id="guser-sec">
		<div class="main-container">
			<?php include 'include/nav.php';  ?>
			<div class="space"></div>
			<div class="space"></div>
			<div class="main-body">
				<div class="main-body-header text-center">
					<h5>WAMP CRM</h3>
				</div>
				<div class="form-body">
					<div class="form-header text-center">
						<h5>Generate Sale Agent User ID</h5>
					</div>
					<form onsubmit="return validate();" method="post" action="php/generate-agent.php">
						<div class="form-group">
							<input type="text" name="name" id="nameid" class="form-control" placeholder="Agent Name *">
							<small class="error" id="error-msg-name"></small>
						</div>
						<div class="form-group">
							<input type="text" name="user" id="userid" class="form-control" placeholder="User ID *">
							<small class="error" id="error-msg-userid"></small>
						</div>
						<div class="form-group">
							<input type="text" name="conuser" id="conuserid" class="form-control" placeholder="Confirm User ID *">
							<small class="error" id="error-msg-conuserid"></small>
						</div>
						<div class="form-group">
							<input type="password" name="pass" id="passid" class="form-control" placeholder="Password *">
							<small class="error" id="error-msg-password"></small>
						</div>
						<div class="form-group">
							<input type="password" name="conpass" id="conpassid" class="form-control" placeholder="Confirm Password *">
							<small class="error" id="error-msg-cpassword"></small>
						</div>
						<div class="sub-btn text-right">
							<button class="btn" name="login-sub" type="submit">Generate</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<?php include 'include/foot.php'; ?>