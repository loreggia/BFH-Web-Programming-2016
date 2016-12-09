$(function(){
	$('* mark').hide();
	
	// ---- Login-Bereich
	
	var loginSubmit = $('#li-login-submit input');
	loginSubmit.prop('disabled',true);
	var noLoginEmail = !/\S+@\S+\.\S+/.test($('#li-login-email input').value);
	var noLoginPassword = !$('#li-login-password input').value;
	
	$('#li-login-email input').on('keydown blur', function(){
		noLoginEmail = !/\S+@\S+\.\S+/.test(this.value);
		if(noLoginEmail) $('#li-login-email mark').fadeIn(1000);
		else $('#li-login-email mark').fadeOut(1000);
		loginSubmit.prop('disabled', (noLoginEmail||noLoginPassword));
	});
	
	$('#li-login-password input').on('keydown blur', function(){
		noLoginPassword = !this.value;
		if(noLoginPassword) $('#li-login-password mark').fadeIn(1000);
		else $('#li-login-password mark').fadeOut(1000);
		loginSubmit.prop('disabled', (noLoginEmail||noLoginPassword));
	});
	
	
	var submit = $('#li-submit input');
	submit.prop('disabled',true);
	var noName = !$('#li-name input').value;
	var noLastName = !$('#li-lastname input').value;
	var noEmail = !/\S+@\S+\.\S+/.test($('#li-email input').value);
	var noPassword = !$('#li-password input').value;
	
	$('#li-name input').on('keydown blur', function(){
		noName = !this.value;
		if(noName) $('#li-name mark').fadeIn(1000);
		else $('#li-name mark').fadeOut(1000);
		submit.prop('disabled', (noName||noLastName||noEmail||noPassword));
	});
	
	$('#li-lastname input').on('keydown blur', function(){
		noLastName = !this.value;
		if(noLastName) $('#li-lastname mark').fadeIn(1000);
		else $('#li-lastname mark').fadeOut(1000);
		submit.prop('disabled', (noName||noLastName||noEmail||noPassword));
	});
	
	$('#li-email input').on('keydown blur', function(){
		noEmail = !/\S+@\S+\.\S+/.test(this.value);
		if(noEmail) $('#li-email mark').fadeIn(1000);
		else $('#li-email mark').fadeOut(1000);
		submit.prop('disabled', (noName||noLastName||noEmail||noPassword));
	});
	
	$('#li-password input').on('keydown blur', function(){
		noPassword = !this.value;
		if(noPassword) $('#li-password mark').fadeIn(1000);
		else $('#li-password mark').fadeOut(1000);
		submit.prop('disabled', (noName||noLastName||noEmail||noPassword));
	});
	
	// ---- Personal-Bereich
	
	var userSubmit = $('#user-submit input');
	userSubmit.prop('disabled',true);
	var noUserName = !$('#user-name input').value;
	var noUserLastName = !$('#user-lastname input').value;
	var noUserPassword = !$('#user-password input').value;
	
	$('#user-name input').on('keydown blur', function(){
		noUserName = !this.value;
		if(noUserName) $('#user-name mark').fadeIn(1000);
		else $('#user-name mark').fadeOut(1000);
		userSubmit.prop('disabled', (noUserName||noUserLastName||noUserPassword));
	});
	
	$('#user-lastname input').on('keydown blur', function(){
		noUserLastName = !this.value;
		if(noUserLastName) $('#user-lastname mark').fadeIn(1000);
		else $('#user-lastname mark').fadeOut(1000);
		userSubmit.prop('disabled', (noUserName||noUserLastName||noUserPassword));
	});
	
	$('#user-password input').on('keydown blur', function(){
		noUserPassword = !this.value;
		if(noUserPassword) $('#user-password mark').fadeIn(1000);
		else $('#user-password mark').fadeOut(1000);
		userSubmit.prop('disabled', (noUserName||noUserLastName||noUserPassword));
	});
	
	$('#user-name input').trigger('keydown');
	$('#user-lastname input').trigger('keydown');
	
	
	var mailSubmit = $('#mail-submit input');
	mailSubmit.prop('disabled',true);
	var noMailEmail = !/\S+@\S+\.\S+/.test($('#mail-email input').value);
	var noMailPassword = !$('#mail-password input').value;
	
	$('#mail-email input').on('keydown blur', function(){
		noMailEmail = !/\S+@\S+\.\S+/.test(this.value);
		if(noMailEmail) $('#mail-email mark').fadeIn(1000);
		else $('#mail-email mark').fadeOut(1000);
		mailSubmit.prop('disabled', (noMailEmail||noMailPassword));
	});
	
	$('#mail-password input').on('keydown blur', function(){
		noMailPassword = !this.value;
		if(noMailPassword) $('#mail-password mark').fadeIn(1000);
		else $('#mail-password mark').fadeOut(1000);
		mailSubmit.prop('disabled', (noMailEmail||noMailPassword));
	});
	
	$('#mail-email input').trigger('keydown');
	
	
	var passwordSubmit = $('#pw-submit input');
	passwordSubmit.prop('disabled',true);
	noPwOld = !$('#pw-passwordOld input').value;
	noPwNew = !$('#pw-passwordNew input').value;
	
	$('#pw-passwordOld input').on('keydown blur', function(){
		noPwOld = !this.value;
		if(noPwOld) $('#pw-passwordOld mark').fadeIn(1000);
		else $('#pw-passwordOld mark').fadeOut(1000);
		passwordSubmit.prop('disabled', (noPwOld||noPwNew));
	});
	
	$('#pw-passwordNew input').on('keydown blur', function(){
		noPwNew = !this.value;
		if(noPwNew) $('#pw-passwordNew mark').fadeIn(1000);
		else $('#pw-passwordNew mark').fadeOut(1000);
		passwordSubmit.prop('disabled', (noPwOld||noPwNew));
	});
	
	// ---- Address-Bereich
	
	var billingSubmit = $('#billing-submit input');
	billingSubmit.prop('disabled',true);
	var noBillingName = !$('#billing-name input').value;
	var noBillingLastname = !$('#billing-lastname input').value;
	var noBillingStreet = !$('#billing-street input').value;
	var noBillingZip = !$('#billing-zip input').value;
	var noBillingCity = !$('#billing-city input').value;
	
	$('#billing-name input').on('keydown blur', function(){
		noBillingName = !this.value;
		if(noBillingName) $('#billing-name mark').fadeIn(1000);
		else $('#billing-name mark').fadeOut(1000);
		billingSubmit.prop('disabled', (noBillingName||noBillingLastname||noBillingStreet||noBillingZip||noBillingCity));
	});
	
	$('#billing-lastname input').on('keydown blur', function(){
		noBillingLastname = !this.value;
		if(noBillingLastname) $('#billing-lastname mark').fadeIn(1000);
		else $('#billing-lastname mark').fadeOut(1000);
		billingSubmit.prop('disabled', (noBillingName||noBillingLastname||noBillingStreet||noBillingZip||noBillingCity));
	});
	
	$('#billing-street input').on('keydown blur', function(){
		noBillingStreet = !this.value;
		if(noBillingStreet) $('#billing-street mark').fadeIn(1000);
		else $('#billing-street mark').fadeOut(1000);
		billingSubmit.prop('disabled', (noBillingName||noBillingLastname||noBillingStreet||noBillingZip||noBillingCity));
	});
	
	$('#billing-zip input').on('keydown blur', function(){
		noBillingZip = !this.value;
		if(noBillingZip) $('#billing-zip mark').fadeIn(1000);
		else $('#billing-zip mark').fadeOut(1000);
		billingSubmit.prop('disabled', (noBillingName||noBillingLastname||noBillingStreet||noBillingZip||noBillingCity));
	});
	
	$('#billing-city input').on('keydown blur', function(){
		noBillingCity = !this.value;
		if(noBillingCity) $('#billing-city mark').fadeIn(1000);
		else $('#billing-city mark').fadeOut(1000);
		billingSubmit.prop('disabled', (noBillingName||noBillingLastname||noBillingStreet||noBillingZip||noBillingCity));
	});
	
	$('#billing-name input').trigger('keydown');
	$('#billing-lastname input').trigger('keydown');
	$('#billing-street input').trigger('keydown');
	$('#billing-zip input').trigger('keydown');
	$('#billing-city input').trigger('keydown');
	
	
	var shippingSubmit = $('#shipping-submit input');
	shippingSubmit.prop('disabled',true);
	var noShippingName = !$('#shipping-name input').value;
	var noShippingLastname = !$('#shipping-lastname input').value;
	var noShippingStreet = !$('#shipping-street input').value;
	var noShippingZip = !$('#shipping-zip input').value;
	var noShippingCity = !$('#shipping-city input').value;
	
	$('#shipping-name input').on('keydown blur', function(){
		noShippingName = !this.value;
		if(noShippingName) $('#shipping-name mark').fadeIn(1000);
		else $('#shipping-name mark').fadeOut(1000);
		shippingSubmit.prop('disabled', (noShippingName||noShippingLastname||noShippingStreet||noShippingZip||noShippingCity));
	});
	
	$('#shipping-lastname input').on('keydown blur', function(){
		noShippingLastname = !this.value;
		if(noShippingLastname) $('#shipping-lastname mark').fadeIn(1000);
		else $('#shipping-lastname mark').fadeOut(1000);
		shippingSubmit.prop('disabled', (noShippingName||noShippingLastname||noShippingStreet||noShippingZip||noShippingCity));
	});
	
	$('#shipping-street input').on('keydown blur', function(){
		noShippingStreet = !this.value;
		if(noShippingStreet) $('#shipping-street mark').fadeIn(1000);
		else $('#shipping-street mark').fadeOut(1000);
		shippingSubmit.prop('disabled', (noShippingName||noShippingLastname||noShippingStreet||noShippingZip||noShippingCity));
	});
	
	$('#shipping-zip input').on('keydown blur', function(){
		noShippingZip = !this.value;
		if(noShippingZip) $('#shipping-zip mark').fadeIn(1000);
		else $('#shipping-zip mark').fadeOut(1000);
		shippingSubmit.prop('disabled', (noShippingName||noShippingLastname||noShippingStreet||noShippingZip||noShippingCity));
	});
	
	$('#shipping-city input').on('keydown blur', function(){
		noShippingCity = !this.value;
		if(noShippingCity) $('#shipping-city mark').fadeIn(1000);
		else $('#shipping-city mark').fadeOut(1000);
		shippingSubmit.prop('disabled', (noShippingName||noShippingLastname||noShippingStreet||noShippingZip||noShippingCity));
	});
	
	$('#shipping-name input').trigger('keydown');
	$('#shipping-lastname input').trigger('keydown');
	$('#shipping-street input').trigger('keydown');
	$('#shipping-zip input').trigger('keydown');
	$('#shipping-city input').trigger('keydown');
});