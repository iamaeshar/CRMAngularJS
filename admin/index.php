	<?php include 'include/head.php'; ?>
	<link rel="stylesheet" type="text/css" href="css/indexstyle.css">
	<title>WAMP CRM</title>
</head>
<body ng-app="myApp">
	<section id="index-sec" ng-controller="adminLoginController">
		<div class="main-container">
			<div class="logo">
				<img src="image/logo1.png">
			</div>
			<div class="main-body">
				<div class="main-body-header text-center">
					<h5>Admin Panel WAMP CRM</h3>
						<span style="color: #f00" ng-show="isShow">Login Error</span>
				</div>
				<div class="form-body">
					<div class="form-header text-center">
						<h5>Login</h5>
					</div>
					<form ng-submit="submitAdmin()">
						<div class="form-group">
							<input type="text" name="user" id="userid" class="form-control" placeholder="User ID *" required ng-model="username">
						</div>
						<div class="form-group">
							<input type="password" name="pass" id="passid" class="form-control" placeholder="Password *" required ng-model="password">
						</div>
						<div class="sub-btn text-right">
							<button class="btn" name="login-sub" type="submit">Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<?php include 'include/foot.php'; ?>