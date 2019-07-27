$(document).ready(function() {
	$('.open-btn').click(function() {
		$('.admin-nav').css({
			"margin-left":"0px"
		});
		$(this).hide();
		$('.close-btn').show();
	});
	$('.close-btn').click(function() {
		$('.admin-nav').css({
			"margin-left":"-250px"
		});
		$(this).hide();
		$('.open-btn').show();
	});
	$('#search-customer').click(function(){
		$('.admin-nav').css({
			"margin-left":"-250px"
		});
		$('.close-btn').hide();
		$('.open-btn').show();
	});
});