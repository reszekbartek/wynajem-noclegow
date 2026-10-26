/**
 * Skrypty motywu.
 *
 * Menu mobilne: przycisk "hamburger" rozwija i zwija nawigację poniżej 768 px.
 */
( function () {
	'use strict';

	var naglowek = document.querySelector( '.naglowek' );
	var przycisk = document.querySelector( '.naglowek__przycisk-menu' );
	var menu = document.getElementById( 'nawigacja' );

	if ( ! naglowek || ! przycisk || ! menu ) {
		return;
	}

	var szerokosc = window.matchMedia( '(min-width: 768px)' );

	function ustawMenu( otwarte ) {
		naglowek.classList.toggle( 'naglowek--otwarte', otwarte );
		przycisk.setAttribute( 'aria-expanded', otwarte ? 'true' : 'false' );
	}

	przycisk.addEventListener( 'click', function () {
		ustawMenu( przycisk.getAttribute( 'aria-expanded' ) !== 'true' );
	} );

	// Escape zamyka menu i oddaje fokus przyciskowi.
	document.addEventListener( 'keydown', function ( zdarzenie ) {
		if ( zdarzenie.key === 'Escape' && naglowek.classList.contains( 'naglowek--otwarte' ) ) {
			ustawMenu( false );
			przycisk.focus();
		}
	} );

	// Po przejściu na szerokość komputera menu wraca do stanu zwiniętego.
	szerokosc.addEventListener( 'change', function ( zdarzenie ) {
		if ( zdarzenie.matches ) {
			ustawMenu( false );
		}
	} );
}() );
