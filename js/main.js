app.controller('salesLoginController',['$scope','loginService',function($s,lser){
	$s.saleslogin = function(){
		var LofinFromData = {
			userid:$s.username,
			password:encodeURIComponent($s.password)
		}
		lser.loginFunc(LofinFromData,function(data){
           $s.resData = data;
           console.log($s.resData);
           $s.isShow = false;
           if(data==" "){
           		$s.isShow = true;
           		$s.username = "";
           		$s.password = "";
           }
           else{
	           setTimeout(function(){window.location.href = "agent.php";},500);
           }
        });
	}
}]);
app.service('loginService',function($http){
	this.loginFunc = function(formData,cb){
		myFormData = JSON.stringify(formData);
		$http({
			method:'post',
			url:'php/sales-login.php?data='+myFormData
		}).then(function success(res){
			     cb(res.data);
			    } 
			    ,function error(err){
			    	console.log('error in servie'+err);
		    	}
			);
	}
});
app.controller('fetchCustomerController',['$scope','$http',function($s,$h){
	$h.get('php/fetch-customer-data.php')
	.then(function success(res){ 
		    $s.result = res.data;
		  }
		,function error(){console.log(error)});
	
	// console.log('good');
}]);
app.filter('myformatedEmail',function(){
	return function formatEmail(emilString){
	    var splitEmail = emilString.split("@")
	    var domain = splitEmail[1];
	    var name = splitEmail[0];
	    return  name.substring(0,2).concat("******@").concat(domain);
	    // console.log(emilString);
	}
});
app.filter('myFormatMobile',function(){
	return function(mobileno){
		let x = (mobileno.length/2);
		// console.log(x);
		return "****"+mobileno.substring(x,mobileno.length);
	}
});
