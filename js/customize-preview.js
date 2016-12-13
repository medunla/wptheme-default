/**
 * Live-update changed settings in real time in the Customizer preview.
 */

( function( $ ) {

	// Site Logo(desktop).
	wp.customize( 'pogaam_logo_desktop', function( value ) {
		value.bind( function( newval ) {
			$( '.custom-logo-desktop' ).attr( "src", newval );
		} );
	} );

	// Site Logo(mobile).
	wp.customize( 'pogaam_logo_mobile', function( value ) {
		value.bind( function( newval ) {
			$( '.custom-logo-mobile' ).attr( "src", newval );
			if (newval != "") {
				$( '.custom-logo-mobile' ).removeClass( "hidden" );
			}
			else {
				$( '.custom-logo-mobile' ).addClass( "hidden" );
			}
		} );
	} );


} )( jQuery );
