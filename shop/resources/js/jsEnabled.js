$(function(){

	$( "#addToCart" ).submit(function( event ) {

		// Stop form from submitting normally
		event.preventDefault();

		// Get some values from elements on the page:
		var $form = $( this ),
		orderNr = $form.find( "input[name='ordernumber']" ).val(),
		counter = $form.find( "input[name='count']" ).val(),
		url = $form.attr( "action" );

		// Send the data using post
		var posting = $.post( url, { ordernumber: orderNr, count: counter } );

		// Put the results in a div
		posting.done(function( data ) {
			$('.nav-basket-content').html(data);
		});
	});
});