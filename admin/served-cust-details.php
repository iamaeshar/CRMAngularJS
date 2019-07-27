	<?php 
	session_start();
	if(!isset($_SESSION['adminLogged'])){
		header('Location:index.php');
	}
	include 'include/head.php'; ?>
	<link rel="stylesheet" type="text/css" href="css/served-custstyle.css">
	<link rel="stylesheet" type="text/css" href="css/media.css">
	<title>WAMP CRM</title>
</head>
<body ng-app="myApp">
	<section id="allagent-sec" ng-controller="servedCustomerController">
		<div class="main-container" ng-init="agenttInit(<?php echo $_GET['agentId'] ?>)">
			<?php include 'include/nav.php'; ?>
			<div class="space"></div>
			<div class="space"></div>
			<div class="main-body">
				<div class="main-body-header text-center">
					<h3>Customer Served By <?php echo $_GET['name']; ?></h3>
				</div>
				<div class="details-body">
					<div class="details-body-header">
						<h5>Customer Deatils: </h5>
					</div>
					<div ng-if="isShow==false">
						<div class="details-body-content" ng-repeat="customer in servedCustomers">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Name: {{customer.fname}}&nbsp;{{customer.lname}}</h6>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Email: {{customer.email}}</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Mobile No:{{customer.mobileno}}</h6>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">	
										<h6>Alternate Mobile :{{customer.alt_mobile}}</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Customer ID:{{customer.customer_id}}</h6>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Merchant:{{customer.merchant}}</h6>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Plan Validity:{{customer.plan_validity}}</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Card Type:{{customer.card_type}}</h6>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Last 4 Digit Card Number:{{customer.cardno}}</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Date:{{customer.c_date}}</h6>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Time:{{customer.c_time}}</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Description:</h6>
										<p>
											{{customer.description}}
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div ng-if="isShow==true" class="alert alert-danger">
						No User Served 
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include 'include/foot.php'; ?>