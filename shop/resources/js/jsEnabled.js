$(function(){

	$( "#addToCart" ).submit(function( event ) {
		event.preventDefault();

		var $form = $( this ),
		art = $form.find( "input[name='article']" ).val(),
		counter = $form.find( "input[name='count']" ).val(),
		javS = "yes",
		url = $form.attr( "action" );

		var posting = $.post( url, { article: art, count: counter, js: javS } );

		posting.done(function( data ) {
			$('.nav-basket-content').html(data);
		});
	});


	$(document).on('submit', '#changeQuantity', function( event ){
		var $this = $(this);

		event.preventDefault();

		art = $this.find( "input[name='article']" ).val(),
		quant = $this.find( "select[name='quantity']" ).val(),
		javS = "yes",
		url = $this.attr( "action" );
		
		var posting = $.post( url, { article: art, quantity: quant, js: javS } );

		posting.done(function( data ) {
			var res = data.split("XXXXXX");
			$('.nav-basket-content').html(res[0]);
			$('#basket').html(res[1]);

		});
	});
	
	$(document).on('submit', '#removeArticle', function( event ){
		var $this = $(this);

		event.preventDefault();

		art = $this.find( "input[name='article']" ).val(),
		javS = "yes",
		url = $this.attr( "action" );
		
		var posting = $.post( url, { article: art, js: javS } );

		posting.done(function( data ) {
			var res = data.split("XXXXXX");
			$('.nav-basket-content').html(res[0]);
			$('#basket').html(res[1]);

		});
	});
});