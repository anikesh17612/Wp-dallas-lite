/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dallaslite
 */

jQuery(function($){
	$( '.dallaslite_loadmore' ).click(function(){

		var button = $( this ),
			data = {
				'action': 'loadmore',
				'query': dallaslite_loadmore_params.posts, // that's how we get params from wp_localize_script() function.
				'page' : dallaslite_loadmore_params.current_page
		};
		$.ajax({
			url : dallaslite_loadmore_params.ajaxurl, // AJAX handler.
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text( 'Loading...' ); // change the button text, you can also add a preloader image.
			},
			success : function ( data ) {
				if ( data ) {
					button.text( 'Load More' ).prev().after( data ); // insert new posts.
					dallaslite_loadmore_params.current_page++;
					var currentpage = dallaslite_loadmore_params.current_page;
					var maxpage = dallaslite_loadmore_params.max_page;
					if (currentpage == maxpage ) {
						  button.remove(); // if last page, remove the button.
					}

				} else {
					button.remove(); // if no data, remove the button as well.
				}
			}
		});
	});
});


/* ****************	BACK TO TOP LINK  ***********************/

jQuery( document ).ready(function(){
	jQuery( ".backtotop" ).hide();
	jQuery( ".backtotop" ).on('click',function(){
		jQuery( "html, body" ).animate( {scrollTop: jQuery( "body" ).offset().top}, 500 );
	});
})

jQuery( window ).scroll(function(){
	if ( jQuery( this ).scrollTop() > 150 ) {
		jQuery( ".backtotop" ).stop( true, true ).fadeIn();
	} else {
		jQuery( ".backtotop" ).stop( true, true ).fadeOut();
	}
});

/* ****************	MOBILE MENU CLICK  ***********************/

jQuery( document ).ready(function(){
	jQuery( ".menu-toggle" ).on('click',function(){
		jQuery( '.main_body' ).toggleClass( 'mobile_menu_open' );
	})
})

/************ ADD CLASS IN BODY IN CASE OF BOX LAYOUT	***********/

jQuery( document ).ready(function(){
	var currentBodyLayout = dallaslite_loadmore_params.body_layout;
	if (currentBodyLayout == 'box_layout') {
		jQuery( '.main_body' ).addClass( 'box_layout' );
	}
})
