$(function(){
	var loginSubmit = $('#li-login-submit input');
	loginSubmit.prop('disabled',true);
	var submit = $('#li-submit input');
	submit.prop('disabled',true);
	$('* mark').hide();
	
	$('#li-login-email input').focusout(function(){
		noLoginEmail = !/\S+@\S+\.\S+/.test(this.value);
		if(noLoginEmail) $('#li-login-email mark').fadeIn(1000);
		else $('#li-login-email mark').fadeOut(1000);
		loginSubmit.prop('disabled', (noLoginEmail||noLoginPassword));
	});
	
	$('#li-login-password input').focusout(function(){
		noLoginPassword = !this.value;
		if(noLoginPassword) $('#li-login-password mark').fadeIn(1000);
		else $('#li-login-password mark').fadeOut(1000);
		loginSubmit.prop('disabled', (noLoginEmail||noLoginPassword));
	});
	
	$('#li-name input').focusout(function(){
		noName = !this.value;
		if(noName) $('#li-name mark').fadeIn(1000);
		else $('#li-name mark').fadeOut(1000);
		submit.prop('disabled', (noName||noLastName||noEmail||noPassword));
	});
	
	$('#li-lastname input').focusout(function(){
		noLastName = !this.value;
		if(noLastName) $('#li-lastname mark').fadeIn(1000);
		else $('#li-lastname mark').fadeOut(1000);
		submit.prop('disabled', (noName||noLastName||noEmail||noPassword));
	});
	
	$('#li-email input').focusout(function(){
		noEmail = !/\S+@\S+\.\S+/.test(this.value);
		if(noEmail) $('#li-email mark').fadeIn(1000);
		else $('#li-email mark').fadeOut(1000);
		submit.prop('disabled', (noName||noLastName||noEmail||noPassword));
	});
	
	$('#li-password input').focusout(function(){
		noPassword = !this.value;
		if(noPassword) $('#li-password mark').fadeIn(1000);
		else $('#li-password mark').fadeOut(1000);
		submit.prop('disabled', (noName||noLastName||noEmail||noPassword));
	});
});