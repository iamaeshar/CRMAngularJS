	<?php 
	session_start();
	if(!isset($_SESSION['adminLogged'])){
		header('Location:index.php');
	}
	include 'include/head.php'; ?>
	<link rel="stylesheet" type="text/css" href="css/allagentstyle.css">
	<link rel="stylesheet" type="text/css" href="css/media.css">
	<title>WAMP CRM</title>
</head>
<body ng-app="myApp">
	<section id="allagent-sec" ng-controller="fetchAgentController">
		<div class="main-container">
			<?php include 'include/nav.php'; ?>
			<div class="space"></div>
			<div class="space"></div>
			<div class="main-body">
				<div class="main-body-header text-center">
					<h3>All Agent Details</h3>
				</div>
				<div class="main-body-content">
					<div class="agent-search-box">
						<h4 align="center">Search Agent</h4>
						<div class="form-group">
							<input type="text" name="searchagent" class="form-control" placeholder="Agent Name" ng-model="agentName">
						</div>
					</div>
					<h4>Agent Details:</h4>
					<div ng-if="isErrorShow==false">
						<div class="user-box" ng-repeat="x in myresult|filter:agentName">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<div class="user-name">
											<h5>Agent Name:{{x.agent_name}}</h5>
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										<div class="user-id">
											<h5>Agent ID:{{x.agent_userid}}</h5>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="user-name">
											<h6>No of Served Customers: {{x.noofcustomer}}</h6>
											<p>To know more about served sale by this agent <a href="served-cust-details.php?agentId={{x.agent_id}}&name={{x.agent_name}}">click here</a>.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<div ng-if="isErrorShow==true" class="alert alert-danger">
						No Registered Agent
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include 'include/foot.php'; ?>
