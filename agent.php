	<?php
	session_start();
	if(!isset($_SESSION['salesLogged'])){
		header('Location:index.php');
	}
	 include 'include/head.php'; ?>
	 <script src="js/agentjs.js"></script>
	<link rel="stylesheet" type="text/css" href="css/agentstyle.css">
	<link rel="stylesheet" type="text/css" href="admin/css/dashboardstyle.css">
	<link rel="stylesheet" type="text/css" href="admin/css/media.css">
	<title>Agent | WAMP CRM</title>
</head>
<body ng-app="myApp">
	<section id="agent-sec" >
		<div class="main-container">
			<?php include 'include/nav.php'; ?>
			<div class="space"></div>
			<div class="main-body">
				<div class="main-body-header text-center">
					<h3 class="text text-success text-center">Successfully Logged In</h3>
					<h3>Welcome <?php echo $_SESSION['agentName']; ?></h3>
				</div>
				<div class="form-body">
					<div class="form-container">
						<div class="form-header text-center">
							<h5>Customer Record Submission</h5>
						</div>
						<form method="post" action="php/add-customer.php" onsubmit="return validate()">
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<input type="text" name="fname" id="fnameid" class="form-control" placeholder="First Name *">
											<small class="error"></small>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<input type="text" name="lname" id="lnameid" class="form-control" placeholder="Last Name *">
											<small class="error"></small>

										</div>
									</div>
								</div>
								<div class="form-group">
								<input type="email" name="email" id="emailid" class="form-control" placeholder="Email *">
								<small class="error"></small>

							</div>
							<div class="form-group">
								<input type="text" name="mobno" id="mobnoid" class="form-control" placeholder="Mobile Number *">
								<small class="error"></small>
							</div>
							<div class="form-group">
								<input type="text" name="amobno" id="amobnoid" class="form-control" placeholder="Alternate Mobile Number">
								<small class="error"></small>
							</div>
							<div class="form-group">
								<input type="text" name="cust" id="custid" class="form-control" placeholder="Customer ID *">
								<small class="error"></small>

							</div>
							<div class="form-group">
								<select class="form-control" name="planval" id="planvalid">
									<option>Select plan Validity</option>
									<option>1 Year</option>
									<option>2 Year</option>
									<option>3 Year</option>
									<option>4 Year</option>
									<option>5 Year</option>
									<option>Not Applicable</option>
								</select>
								<small class="error"></small>
							</div>
							<div class="form-group">
								<select class="form-control" name="cardtype" id="cardtypeid">
									<option>Card Type *</option>
									<option>Visa</option>
									<option>Maestro</option>
									<option>Discover</option>
								</select>
								<small class="error"></small>
							</div>
							<div class="form-group">
								<input type="text" name="cardno" placeholder="Enter last 4 digit card number" class="form-control" id="cardnoid">
								<small class="error"></small>
							</div>
							<div class="form-group">
								<select class="form-control" name="merchant" id="merchantid">
									<option>Select Merchant *</option>
									<option>Triangle System IT</option>
									<option>Transfast</option>
									<option>Cheque</option>
								</select>
								<small class="error"></small>
								<!-- <input type="text" name="merchant" id="merchantid" class="form-control" placeholder="Merchant *"> -->
							</div>
							<div class="form-group">
								<textarea class="form-control" placeholder="Description *" name="desc" id="descid" cols="20" rows="5"></textarea>
								<small class="error"></small>
							</div>
							<div class="sub-btn text-right">
								<button class="btn" name="record-sub" type="submit">Submit</button>
							</div>
							</div>
						</form>
					</div>
					<div class="search-container" ng-controller="fetchCustomerController">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Enter Customer Id.." ng-model='custid'>
						</div>
						<div class="details-body" >
							<div class="details-body-header">
								<h5>Customer Details: </h5>
							</div>
							<div class="details-body-content" ng-repeat="x in result|filter:custid">
								<div class="container-fluid">
									
									<div class="row">
										<div class=" col-lg-6 col-md-12">
											<h6>Name :{{x.fname}}&nbsp;{{x.lname}}</h6>
										</div>
										<div class="col-lg-6 col-md-12 col-sm-12">
											<h6 >Mobile No: <span id="cust-mobileno">{{x.mobileno|myFormatMobile}}</span></h6>
										</div>
									</div>
									<div class="row">
										
										<div class="col-lg-6 col-md-12 col-sm-12">
											<h6 >Email :<span id="cust-emailid">{{x.email|myformatedEmail}}</span></h6>
										</div>
									</div>

									<!-- <div class="row">
										<div class="col-lg-6 col-md-12 col-sm-12">
											<h6>Customer ID:{{x.customer_id}}</h6>
										</div>
										<div class="col-lg-6 col-md-12 col-sm-12">
											<h6>Sold By: </h6>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 col-md-12 col-sm-12">
											<h6>Merchant:</h6>
										</div>
										<div class="col-lg-6 col-md-12 col-sm-12">
											<h6>Plan Validity:</h6>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 col-md-12 col-sm-12">
											<h6>Card Type:</h6>
										</div>
										<div class="col-lg-6 col-md-12 col-sm-12">
											<h6>Last 4 Digit Card Number:</h6>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6 col-md-12 col-sm-12">
											<h6>Date:</h6>
										</div>
										<div class="col-lg-6 col-md-12 col-sm-12">
											<h6>Time:</h6>
										</div>
									</div> -->
									<div class="row">
										<div class="col-lg-6 col-md-12 col-sm-12">
											<h6>Description:</h6>
											<p>
											   {{x.description}}
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript">
		$(document).ready(function(){
			setTimeout(function(){
				        $('h3.text').hide();
				       },1000);
			$('#search-customer').click(function(){
				$('.form-container').hide();
				$('.search-container').show();
			});
			$('#add-customer').click(function(){
				$('.form-container').show();
				$('.search-container').hide();
			});
		});
	</script>
	<?php include 'include/foot.php'; ?>