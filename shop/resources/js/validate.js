$(function(){
	$('* mark').hide();
	
	// ---- Login-Bereich
	
	var loginSubmit = $('#li-login-submit input');
	loginSubmit.prop('disabled',true);
		
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
	
	
	var submit = $('#li-submit input');
	submit.prop('disabled',true);
	
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
	
	// ---- Personal-Bereich
	
	var userSubmit = $('#user-submit input');
	userSubmit.prop('disabled',true);
	
	$('#user-name input').focusout(function(){
		noUserName = !this.value;
		if(noUserName) $('#user-name mark').fadeIn(1000);
		else $('#user-name mark').fadeOut(1000);
		userSubmit.prop('disabled', (noUserName||noUserLastName||noUserPassword));
	});
	
	$('#user-lastname input').focusout(function(){
		noUserLastName = !this.value;
		if(noUserLastName) $('#user-lastname mark').fadeIn(1000);
		else $('#user-lastname mark').fadeOut(1000);
		userSubmit.prop('disabled', (noUserName||noUserLastName||noUserPassword));
	});
	
	$('#user-password input').focusout(function(){
		noUserPassword = !this.value;
		if(noUserPassword) $('#user-password mark').fadeIn(1000);
		else $('#user-password mark').fadeOut(1000);
		userSubmit.prop('disabled', (noUserName||noUserLastName||noUserPassword));
	});
		
		
	var mailSubmit = $('#mail-submit input');
	mailSubmit.prop('disabled',true);
	
	$('#mail-email input').focusout(function(){
		noMailEmail = !/\S+@\S+\.\S+/.test(this.value);
		if(noMailEmail) $('#mail-email mark').fadeIn(1000);
		else $('#mail-email mark').fadeOut(1000);
		mailSubmit.prop('disabled', (noMailEmail||noMailPassword));
	});
	
	$('#mail-password input').focusout(function(){
		noMailPassword = !this.value;
		if(noMailPassword) $('#mail-password mark').fadeIn(1000);
		else $('#mail-password mark').fadeOut(1000);
		mailSubmit.prop('disabled', (noMailEmail||noMailPassword));
	});
	
	
	var passwordSubmit = $('#pw-submit input');
	passwordSubmit.prop('disabled',true);
	
	$('#pw-passwordOld input').focusout(function(){
		noPwOld = !this.value;
		if(noPwOld) $('#pw-passwordOld mark').fadeIn(1000);
		else $('#pw-passwordOld mark').fadeOut(1000);
		passwordSubmit.prop('disabled', (noPwOld||noPwNew));
	});
	
	$('#pw-passwordNew input').focusout(function(){
		noPwNew = !this.value;
		if(noPwNew) $('#pw-passwordNew mark').fadeIn(1000);
		else $('#pw-passwordNew mark').fadeOut(1000);
		passwordSubmit.prop('disabled', (noPwOld||noPwNew));
	});
	
	// ---- Address-Bereich
	
		var billingSubmit = $('#billing-submit input');
	billingSubmit.prop('disabled',true);
	
	$('#billing-name input').focusout(function(){
		noBillingName = !this.value;
		if(noBillingName) $('#billing-name mark').fadeIn(1000);
		else $('#billing-name mark').fadeOut(1000);
		billingSubmit.prop('disabled', (noBillingName||noBillingLastname||noBillingStreet||noBillingZip||noBillingCity));
	});
	
	$('#billing-lastname input').focusout(function(){
		noBillingLastname = !this.value;
		if(noBillingLastname) $('#billing-lastname mark').fadeIn(1000);
		else $('#billing-lastname mark').fadeOut(1000);
		billingSubmit.prop('disabled', (noBillingName||noBillingLastname||noBillingStreet||noBillingZip||noBillingCity));
	});
	
	$('#billing-street input').focusout(function(){
		noBillingStreet = !this.value;
		if(noBillingStreet) $('#billing-street mark').fadeIn(1000);
		else $('#billing-street mark').fadeOut(1000);
		billingSubmit.prop('disabled', (noBillingName||noBillingLastname||noBillingStreet||noBillingZip||noBillingCity));
	});
	
	$('#billing-zip input').focusout(function(){
		noBillingZip = !this.value;
		if(noBillingZip) $('#billing-zip mark').fadeIn(1000);
		else $('#billing-zip mark').fadeOut(1000);
		billingSubmit.prop('disabled', (noBillingName||noBillingLastname||noBillingStreet||noBillingZip||noBillingCity));
	});
	
	$('#billing-city input').focusout(function(){
		noBillingCity = !this.value;
		if(noBillingCity) $('#billing-city mark').fadeIn(1000);
		else $('#billing-city mark').fadeOut(1000);
		billingSubmit.prop('disabled', (noBillingName||noBillingLastname||noBillingStreet||noBillingZip||noBillingCity));
	});
	
		var shippingSubmit = $('#shipping-submit input');
	shippingSubmit.prop('disabled',true);
	
	$('#shipping-name input').focusout(function(){
		noShippingName = !this.value;
		if(noShippingName) $('#shipping-name mark').fadeIn(1000);
		else $('#shipping-name mark').fadeOut(1000);
		shippingSubmit.prop('disabled', (noShippingName||noShippingLastname||noShippingStreet||noShippingZip||noShippingCity));
	});
	
	$('#shipping-lastname input').focusout(function(){
		noShippingLastname = !this.value;
		if(noShippingLastname) $('#shipping-lastname mark').fadeIn(1000);
		else $('#shipping-lastname mark').fadeOut(1000);
		shippingSubmit.prop('disabled', (noShippingName||noShippingLastname||noShippingStreet||noShippingZip||noShippingCity));
	});
	
	$('#shipping-street input').focusout(function(){
		noShippingStreet = !this.value;
		if(noShippingStreet) $('#shipping-street mark').fadeIn(1000);
		else $('#shipping-street mark').fadeOut(1000);
		shippingSubmit.prop('disabled', (noShippingName||noShippingLastname||noShippingStreet||noShippingZip||noShippingCity));
	});
	
	$('#shipping-zip input').focusout(function(){
		noShippingZip = !this.value;
		if(noShippingZip) $('#shipping-zip mark').fadeIn(1000);
		else $('#shipping-zip mark').fadeOut(1000);
		shippingSubmit.prop('disabled', (noShippingName||noShippingLastname||noShippingStreet||noShippingZip||noShippingCity));
	});
	
	$('#shipping-city input').focusout(function(){
		noShippingCity = !this.value;
		if(noShippingCity) $('#shipping-city mark').fadeIn(1000);
		else $('#shipping-city mark').fadeOut(1000);
		shippingSubmit.prop('disabled', (noShippingName||noShippingLastname||noShippingStreet||noShippingZip||noShippingCity));
	});
});