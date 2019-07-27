function validate(){
	var query=$('#searchid').val();
	if (query=="") {
		$('#error-msg-custid').text("Type Customer ID First");
		return false;
	}else{
		return true;
	}
}