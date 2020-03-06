
$(document).ready( function()
{
	$('#login-PopUp').hide();
	$('#login-PopUp-main').hide();

	$('body').on('click','.site',showMainlong);
	$('body').on('click','.close',closeMainlong);


	function showMainlong(event) 
	{
		$('#login-PopUp').fadeIn();
		$('#login-PopUp-main').show();
	}

	function closeMainlong (event) 
	{
		$('#login-PopUp').fadeOut();
		$('#login-PopUp-main').fadeOut();
	}	

});	                             