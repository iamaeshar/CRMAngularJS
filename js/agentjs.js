$(document).ready(function(){
	
	setTimeout(function(){
        $('h3.text').hide();
    },1000);
	$('#search-customer').click(function(){
		$('.form-container').hide();
		$('.search-container').show();
	});

	// Form Validation
	$('#fnameid').blur(function() {
		var fname=$(this).val();
		if (fname=="") {
			$(this).next().text('Enter Customer First Name');
		}else{
			hide(this);
		}
	});
	$('#lnameid').blur(function() {
		var lname=$(this).val();
		if (lname=="") {
			$(this).next().text('Enter Customer Last Name');
		}else{
			hide(this);
		}
	});
	$('#emailid').blur(function() {
		var email=$(this).val();
		if (email=="") {
			$(this).next().text('Enter Customer Email');
		}else{
			hide(this);
		}
	});
	$('#mobnoid').blur(function() {
		var mobno=$(this).val();
		if (mobno=="") {
			$(this).next().text('Enter Customer Mobile Number');
		}else if(isNaN(mobno) || mobno.length<10 || mobno.length>10){
			$(this).next().text('Enter Customer Mobile Number Correctly');
		}else{
			hide(this);
		}
	});
	$('#custid').blur(function() {
		var custid=$(this).val();
		if (custid=="") {
			$(this).next().text('Enter Customer ID');
		}else{
			hide(this);
		}
	});
	$('#cardtypeid').blur(function() {
		var cardtype=$(this).val();
		if (cardtype=="Card Type *") {
			$(this).next().text('Enter Card Type');
		}else{
			hide(this);
		}
	});
	$('#cardnoid').blur(function() {
		var cardno=$(this).val();
		if (cardno=="") {
			$(this).next().text('Enter last 4 digit of Card');
		}else if(cardno.length<4||cardno.length>4){
			$(this).next().text('Enter last 4 digit Only.');
		}else{
			hide(this);
		}
	});
	$('#merchantid').blur(function() {
		var merchant=$(this).val();
		if (merchant=="Select Merchant *") {
			$(this).next().text('Choose Merchant');
		}else{
			hide(this);
		}
	});
	$('#descid').blur(function() {
		var desc=$(this).val();
		if (desc=="") {
			$(this).next().text('Enter Description.');
		}else{
			hide(this);
		}
	});
});

function hide(ele) {
	$(ele).next().hide();
}

// Validation on Submit
function validate() {
	var fname=$('#fnameid').val();
	var lname=$('#lnameid').val();
	var email=$('#emailid').val();
	var mobno=$('#mobnoid').val();
	var custid=$('#custid').val();
	var cardtype=$('#cardtypeid').val();
	var cardno=$('#cardnoid').val();
	var merchant=$('#merchantid').val();
	var desc=$('#descid').val();
	
	if (fname=="") {
		$('#fnameid').next().text('Enter Customer First Name');
		return false;
	}else if (lname=="") {
		$('#lnameid').next().text('Enter Customer Last Name');
		return false;
	}else if (email=="") {
		$('#emailid').next().text('Enter Customer Email');
		return false;
	}else if (mobno=="") {
		$('#mobnoid').next().text('Enter Customer Mobile Number');
		return false;
	}else if(isNaN(mobno) || mobno.length<10 || mobno.length>10){
		$('#mobnoid').next().text('Enter Customer Mobile Number Correctly');
		return false;
	}else if (custid=="") {
		$('#custid').next().text('Enter Customer ID');
		return false;
	}else if (cardtype=="Card Type *") {
		$('#cardtypeid').next().text('Enter Card Type');
		return false;
	}else if (cardno=="") {
		$('#cardnoid').next().text('Enter last 4 digit of Card');
		return false;
	}else if(cardno.length<4||cardno.length>4){
		$('#cardnoid').next().text('Enter last 4 digit Only.');
		return false;
	}else if (merchant=="Select Merchant *") {
		$('#merchantid').next().text('Choose Merchant');
		return false;
	}else if (desc=="") {
		$('#descid').next().text('Enter Description.');
		return false;
	}else{
		return true;
	}

}