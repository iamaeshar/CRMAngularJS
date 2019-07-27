app.controller('adminLoginController',['$scope','myAdminService',function($s,madmin){
	$s.submitAdmin = function(){
		var LoginFromData = {
			userid:$s.username,
			password:encodeURIComponent($s.password)
		}
		// console.log(LoginFromData);
		madmin.loginAdmin(LoginFromData,function(data){
           $s.resData = data;
           // console.log($s.resData);
           $s.isShow = false;
           if(data==" "){
           		$s.isShow = true;
           		$s.username = "";
           		$s.password = "";
           }
           else{
	           setTimeout(function(){window.location.href = "dashboard.php";},500);
           }
        });;
	}
}]);

app.controller('adminFetchCustomerController',['$scope','myAdminService',function($s,madmin){
	madmin.fetchCustomer(function(data){
		$s.results = data;
		$s.isShowError = false;
		if($s.results==" "){
			$s.isShowError = true;
		}
	});
	$s.getExcel = function(x){

        var data = x;
        if(data == '')
            return;
        
        var arrOfObject = [];
        arrOfObject.push(data);
        arrOfObject = JSON.stringify(arrOfObject);
        console.log(arrOfObject);
        
        JSONToCSVConvertor(arrOfObject, "Wamp Report", true);

		function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel) {
		    
		    //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
		    var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
		    
		    var CSV = '';    
		    //Set Report title in first row or line
		    
		    CSV += ReportTitle + '\r\n\n';

		    //This condition will generate the Label/Header
		    if (ShowLabel) {
		        
		        var row = "";
		        
		        //This loop will extract the label from 1st index of on array
		        for (var index in arrData[0]) {
		            //Now convert each value to string and comma-seprated
		            row += index + ',';
		        }

		        row = row.slice(0, -1);
		        
		        //append Label row with line break
		        CSV += row + '\r\n';
		    }
		    
		    //1st loop is to extract each row
		    for (var i = 0; i < arrData.length; i++) {
		        var row = "";
		        
		        //2nd loop will extract each column and convert it in string comma-seprated
		        for (var index in arrData[i]) {
		            row += '"' + arrData[i][index] + '",';
		        }

		        row.slice(0, row.length - 1);
		        
		        //add a line break after each row
		        CSV += row + '\r\n';
		    }

		    if (CSV == '') {        
		        alert("Invalid data");
		        return;
		    }   
		    
		    //Generate a file name
		    var fileName = "MyReport_";
		    //this will remove the blank-spaces from the title and replace it with an underscore
		    fileName += ReportTitle.replace(/ /g,"_");   
		    
		    //Initialize file format you want csv or xls
		    var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
		    
		    // Now the little tricky part.
		    // you can use either>> window.open(uri);
		    // but this will not work in some browsers
		    // or you will not get the correct file extension    
		    
		    //this trick will generate a temp <a /> tag
		    var link = document.createElement("a");    
		    link.href = uri;
		    //set the visibility hidden so it will not effect on your web-layout
		    link.style = "visibility:hidden";
		    link.download = fileName + ".csv";
		    
		    //this part will append the anchor tag and remove it after automatic click
		    document.body.appendChild(link);
		    link.click();
		    document.body.removeChild(link);
		}
	}
}]);
app.controller('fetchAgentController',['$scope','myAdminService',function($ss,myadmin){
	myadmin.fetchAgentDetails(function(d){
		$ss.myresult = d;
		// console.log($ss.myresult);
		$ss.isErrorShow = false;
		if($ss.myresult==" "){
			// console.log('no data found');
			$ss.isErrorShow = true;
		}
		else{
			// console.log("data found");
		}
	});
}]);
app.controller('servedCustomerController',['$scope','myAdminService',function($s,myadmin){
	$s.agenttInit = function(x){
		myadmin.fetchServedCustomer(x,function(myresp){
			$s.servedCustomers = myresp;
			$s.isShow = false;
			if($s.servedCustomers==" "){
				$s.isShow = true;
			}
			// console.log($s.servedCustomers);
		});
	}
}]);
app.service('myAdminService',function($http){
	this.loginAdmin = function(x,cb){
		var myFormData = JSON.stringify(x);
		// console.log(myFormData);
		$http({
			method:'POST',
			url:'php/admin-login.php?myFormData='+myFormData
		})
		.then(function success(res){
			cb(res.data);
		},function error(err){
			console.log(err);
		});
	}
	this.fetchCustomer = function(cb){
		$http({
			method:'get',
			url:'php/fetch-customer.php'
		})
		.then(function(res){cb(res.data)},function(err){console.log(err)});
	}
	this.fetchAgentDetails = function(cb){
		$http({
			method:'get',
			url:'php/fetch-agent.php'
		})
		.then(function success(response){
			cb(response.data);
		},function error(err){
			console.log(err);
		});
	}
	this.fetchServedCustomer = function(id,cb){
		$http({
			method:'get',
			url:'php/served-customer.php?agid='+id
		})
		.then(function success(resp){
			cb(resp.data);
		},function erroR(err){
			console.log(err);
		});
	}
});