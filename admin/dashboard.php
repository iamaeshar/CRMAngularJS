	<?php 
	session_start();
	if(!isset($_SESSION['adminLogged'])){
		header('Location:./');
	}
	include 'include/head.php'; ?>
	<script src="js/dashbaordjs.js"></script>
	<link rel="stylesheet" type="text/css" href="css/dashboardstyle.css">
	<link rel="stylesheet" type="text/css" href="css/media.css">
	<title>DASHBAORD | WAMP CRM</title>
</head>
<body  ng-app="myApp">
	<section id="dashboard-sec" ng-controller="adminFetchCustomerController">
		<div class="main-container">
			<?php include 'include/nav.php';  ?>
			<div class="space"></div>
			<div class="space"></div>
			<div class="main-body">
				<div class="main-body-header text-center">
					<h3>Customer Deatils</h3>
				</div>
				<div class="form-body">
					<div class="form-header text-center">
						<h5>Search Customer</h5>
					</div>
					<form onsubmit="return validate();">
						<div class="input-group">
					      <input type="text" class="form-control" placeholder="Customer ID *" id="searchid" name="search" ng-model="customerId">
					      <!-- <span class="input-group-btn">
					        <button class="btn btn-secondary" type="submit" id="search-sub-btn">Search</button>
					      </span> -->
					    </div>
					    <small class="error" id="error-msg-custid"></small>
					</form>
				</div>
				<div class="details-body" >
					<div class="details-body-header">
						<h5>Customer Deatils: </h5>
					</div>
					<div ng-if="isShowError==false">
						<div class="details-body-content" ng-repeat="x in results|filter:customerId">

							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Name: {{x.fname}}&nbsp;{{x.lname}}</h6>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Email: {{ x.email}}</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Mobile No: {{x.mobileno}}</h6>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">	
										<h6>Alternate Mobile: {{x.alt_mobile}}</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Customer ID: {{x.customer_id}}</h6>
									</div>
									<!-- <div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Sold By:</h6>
									</div> -->
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Merchant: {{x.merchant}}</h6>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Plan Validity: {{x.plan_validity}}</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Card Type: {{x.card_type}}</h6>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Last 4 Digit Card Number : {{x.cardno}}</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Date: {{x.c_date|date:'short'}}</h6>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Time: {{x.c_time}}</h6>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<h6>Description:</h6>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										<a href="" ng-click=getExcel(x)><span class="fa fa-download"> </span> Download</a>
									</div>
								</div>
								<div class="row">
									<p>
										{{x.description}}
									</p>
								</div>
							</div>
						</div>
					</div>
					<div ng-if="isShowError==true" class="alert alert-danger">
						No Customer Data Found
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include 'include/foot.php'; ?>