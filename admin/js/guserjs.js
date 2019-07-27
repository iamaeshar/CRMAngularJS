$(document).ready(function() {
	function myhide(x){
		$(x).next().hide();
	}
	var x = "Required Field *";
	$('#nameid').on('blur',function() {
		var name=$(this).val();
		if (name=="") {
			$('#error-msg-name').text(x);
		}
		else{
			myhide(this);
		}
	});
	$('#userid').on('blur',function() {
		var userid=$(this).val();
		if (userid=="") {
			$('#error-msg-userid').text(x);
		}else{
			myhide(this);
		}
	});
	$('#conuserid').on('blur',function() {
		var conuserid=$(this).val();
		if (conuserid=="") {
			$('#error-msg-conuserid').text(x);
		}
		else if(conuserid!=$('#userid').val()){
			$('#error-msg-conuserid').text('Id should match');
		}
		else{
			myhide(this);
		}
	});
	$('#passid').on('blur',function() {
		var conuserid=$(this).val();
		if (conuserid=="") {
			$('#error-msg-password').text(x);
		}
		else if(conuserid.length<7){
			$('#error-msg-password').text('minimum length 7');
		}
		else{
			myhide(this);
		}	
	});
	$('#conpassid').on('blur',function(){
		var cpass = $(this).val();
		if(cpass==""){
			$('#error-msg-cpassword').text(x);
		}
		else if(x!=$('#passid').val()){
			$('#error-msg-cpassword').text('Password should match');
		}
		else{
			myhide(this);
		}
	});
	// var conuserid=$('#conuserid').val();
	// var pass=$('#passid').val();
	// var conpass=$('#conpassid').val();
});
function validate(){
	if($('#nameid').val()==""){
		$(this).text('Enter Agent Name');
		return false;
	}
	else{
		return true;
	}
}